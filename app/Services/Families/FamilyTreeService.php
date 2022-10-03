<?php

namespace App\Services\Families;

use App\Models\Character;
use App\Models\Entity;
use App\Models\Family;
use App\Models\Relation;

class FamilyTreeService
{
    protected Family $family;

    protected array $entityIds = [];
    protected array $entities = [];

    protected array $relations = [];

    protected array $tree = [];

    public function family(Family $family): self
    {
        $this->family = $family;
        return $this;
    }

    public function generate(): array
    {
        /**
         * Get all members, and for each build a tree of their spouses, parents, and children
         */
        $members = $this
            ->family
            ->members()
            ->with([
                'entity', 'entity.familyRelations',
                'entity.familyRelations.target', 'entity.familyRelations.target.familyRelations',
            ])
            ->has('entity')
            ->get();
        foreach ($members as $member) {
            $this->tree = $this->addCharacter($member->entity);
        }
        /*dump($this->entityIds);

        dump($this->tree);*/
        //dd($this->tree);

        /*$this->loadEntities();
        $this->fixTree();*/

        return $this->tree;
    }

    /**
     * Add a character, along with its partners and children
     * @param Entity $entity
     * @return mixed
     */
    protected function addCharacter(Entity $entity): mixed
    {
        //dump('loading ' . $entity->name);
        /*if ($this->hasEntity($entity->id)) {
            return $entity->id;
        }*/

        // By default, we assume a single, un-partnered, childless entity
        $self = $entity;
        $this->trackEntity($entity->id);

        $relations = $entity->familyRelations;
        $partners = $relations->where('type_id', 1);
        if ($partners->isNotEmpty()) {
            $self = [$self];
        }
        foreach ($partners as $relation) {
            //dump('- adding partner ' . $relation->target->name);
            $self[] = $relation->target;
            $this->trackEntity($relation->target_id);
        }

        $childrenIds = [];
        $children = $relations->where('type_id', 4);
        foreach ($children as $child) {
            //dump('- loading child ' . $child->target->name);
            $childrenIdData = $this->addCharacter($child->target);
            /*if (is_array($childrenIdData)) {
                foreach ($childrenIdData as $id) {
                    $childrenIds[] = $id;
                }
            } else {*/
                $childrenIds[] = $childrenIdData;
            //}
        }
        if (!empty($childrenIds)) {
            $self[] = $childrenIds;
        }

        //dump($self);
        return $self;
    }

    protected function trackEntity(int $entityId)
    {
        if (in_array($entityId, $this->entityIds)) {
            return;
        }
        $this->entityIds[] = $entityId;
    }
}
