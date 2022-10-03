<?php

namespace App\Services\Families;

use App\Models\Character;
use App\Models\Entity;
use App\Models\Family;
use App\Models\Relation;

class FamilyTreeService
{
    protected Family $family;

    /** @var <int $character, array> */
    protected array $entities = [];

    protected array $relations = [];

    protected array $nodes = [];

    protected array $parentedCouples = [];
    protected array $parentlessCouples = [];
    protected array $parsedCouples = [];

    public function family(Family $family): self
    {
        $this->family = $family;
        return $this;
    }

    public function generate(): array
    {
        /**
         * We want to generate a family tree based on the members and their relations in this family.
         * We need to load every node only once to make it easier on us, and figure it out from there.
         */
        $this->loadMembers();

        $couples = [];
        $coupleIds = [];
        /**
         * Create a first group of nodes of spouses
         */
        foreach ($this->entities as $entityId => $entityData) {
            $spouses = [];
            foreach ($this->relations[$entityId] as $relation) {
                if ($relation->type_id !== 1) {
                    continue;
                }
                // We have a spouse! Start tracking painful stuff
                $spouses[] = $relation->target_id;
            }

            if (empty($spouses)) {
                continue;
            }

            $spouses[] = $entityId;

            // Can't duplicate the same couples
            sort($spouses);
            $key = implode('.', $spouses);
            if (in_array($key, $coupleIds)) {
                continue;
            }
            $coupleIds[] = $key;
            $couples[] = $spouses;
        }

        /**
         * Now that we have the couples, check if they have children
         */
        $newCouples = [];
        $debugCouples = [];
        foreach ($couples as $coupleIds) {
            //dump("New couple");
            $children = $data = [];
            $debugChildren = $debugData = [];
            $hasParents = false;
            foreach ($coupleIds as $entityId) {
                //dump($this->entities[$entityId]['character']->name);
                $data[] = $entityId;
                $debugData[] = $this->entities[$entityId]['character']->name;
                if (!isset($this->relations[$entityId])) {
                    //dump('Has no known relations');
                    continue;
                }
                foreach ($this->relations[$entityId] as $relation) {
                    if ($relation->type_id === 3) {
                        $hasParents = true;
                    }
                    if ($relation->type_id !== 4) {
                        continue;
                    }
                    // We already have this child
                    if (in_array($relation->target_id, $children)) {
                        continue;
                    }
                    $children[] = $relation->target_id;
                    $debugChildren[] = $relation->target->name;
                }
            }

            if (!empty($children)) {
                $data[] = $children;
                $debugData[] = $debugChildren;
            }

            if ($hasParents) {
                $data['_hasParents'] = true;
                $debugData['_hasParents'] = true;
            }

            $newCouples[] = $data;
            $debugCouples[] = $debugData;
        }

        /**
         * Loop through all the couples and split the parent and parentless couples
         */
        foreach ($newCouples as $data) {
            if (!isset($data['_hasParents'])) {
                $this->parentlessCouples[] = $data;
            } else {
                $this->parentedCouples[] = $data;
            }
        }

        /**
         * Loop through the parentless couples and build the final tree
         */
        $tree = [];
        dump($this->parentlessCouples);
        foreach ($this->parentlessCouples as $couple) {
            dump('Adding a parentless couple');
            $tree[] = $this->addCouple($couple, 1);
        }
        //dump('end of couple');
        //dump($newCouples);
        dd($tree);
        return $tree;
    }

    protected function addCouple($couple, int $level = 1)
    {
        dump('- Parsing a couple on level ' . $level);
        $data = $kids = [];
        foreach ($couple as $coupleData) {
            if (is_numeric($coupleData)) {
                // A parent's entity ID
                $data[] = $coupleData;
                dump('- Adding ' . $this->entities[$coupleData]['character']->name . '(' . $coupleData . ')');
                continue;
            } elseif (!is_array($coupleData)) {
                // Not something we can take action on
                continue;
            }

            // Loop on the kids and find them to check if they are couples
            foreach ($coupleData as $kid) {
                // Are they part of the couples?
                $kidCouple = false;
                //dump('looking for ' . $kid . ' in the parentedCouples?');
                foreach ($this->parentedCouples as $id => $parentedCouple) {
                    if (in_array($id, $this->parsedCouples)) {
                        continue;
                    }
                    if (!in_array($kid, $parentedCouple)) {
                        // Not a child of a couple
                        continue;
                    }

                    dump('- ' . $id);
                    dump($parentedCouple);
                    //dump('found child ' . $kid . ' in couples, going deeper');
                    $this->parsedCouples[] = $id;
                    $kidCouple[] = $this->addCouple($parentedCouple, $level+1);
                }
                if ($kidCouple === false) {
                    $kids[] = $kid;
                } else {
                    $kids[] = $kidCouple;
                }
            }
        }

        if (!empty($kids)) {
            $data[] = $kids;
        }
        dump('- Returning level ' . $level);
        return $data;
    }

    protected function loadMembers(): self
    {
        $members = $this
            ->family
            ->members()
            ->with([
                'entity', 'entity.familyRelations',
            ])
            ->has('entity')
            ->get();
        foreach ($members as $member) {
            $this->addCharacter($member)
                ->addRelations($member);
        }
        return $this;
    }

    protected function addCharacter(Character $character): self
    {
        if ($this->hasEntity($character->entity->id)) {
            return $this;
        }

        $this->entities[$character->entity->id] = [
            'character' => $character,
            'children' => []
        ];

        return $this;
    }

    protected function addRelations(Character $character)
    {
        $relations = $character->entity->familyRelations;
        foreach ($relations as $relation) {
            if (!$relation->target || $relation->target->typeId() !== 1) {
                continue;
            }
            if ($this->hasRelation($relation)) {
                continue;
            }

            // Add the relation
            $this->relations[$relation->owner_id][$relation->id] = $relation;

            $this->addCharacter($relation->target->child)
            ->addRelations($relation->target->child);
        }
    }

    /**
     * Determine if an entity was previously loaded
     * @param int $entityId
     * @return bool
     */
    protected function hasEntity(int $entityId): bool
    {
        return isset($this->entities[$entityId]);
    }

    /**
     * Determine if a relation was previously loaded
     * @param Relation $relation
     * @return bool
     */
    protected function hasRelation(Relation $relation): bool
    {
        return isset($this->relations[$relation->owner_id][$relation->id]);
    }
}
