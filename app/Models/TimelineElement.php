<?php


namespace App\Models;

use App\Facades\Mentions;
use App\Models\Concerns\Blameable;
use App\Traits\VisibilityIDTrait;
use App\User;
use App\Models\EntityUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

/**
 * Class TimelineElement
 * @package App\Models
 *
 * @property int $id
 * @property int $timeline_id
 * @property int $era_id
 * @property int $entity_id
 * @property string $name
 * @property string $entry
 * @property string $date
 * @property int $position
 * @property string $colour
 * @property string $icon
 * @property boolean $use_entity_entry
 * @property boolean $is_collapsed
 * @property boolean $use_event_date
 *
 * @property Timeline $timeline
 * @property TimelineEra $era
 * @property Entity $entity
 *
 * @method static self|Builder ordered()
 */
class TimelineElement extends Model
{
    use VisibilityIDTrait,
        Blameable;

    /** @var string[]  */
    protected $fillable = [
        'timeline_id',
        'era_id',
        'entity_id',
        'name',
        'entry',
        'position',
        'name',
        'colour',
        'visibility_id',
        'icon',
        'date',
        'is_collapsed',
        'use_entity_entry',
        'use_event_date',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function timeline()
    {
        return $this->belongsTo(Timeline::class, 'timeline_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function era()
    {
        return $this->belongsTo(TimelineEra::class, 'era_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function entity()
    {
        return $this->belongsTo(Entity::class, 'entity_id');
    }

    /**
     * @param Builder $query
     * @return Builder
     */
    public function scopeOrdered(Builder $query)
    {
        return $query
            ->with('entity')
            ->orderBy('position');
    }

    /**
     * @return string
     */
    public function elementName(): string
    {
        if (!empty($this->entity_id)) {
            return $this->entity->name;
        }
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getEntryForEditionAttribute()
    {
        $text = Mentions::parseForEdit($this);
        return $text;
    }

    /**
     * @return mixed
     */
    public function entry()
    {
        return Mentions::mapAny($this);
    }

    /**
     * @return string
     */
    public function htmlIcon(): string
    {
        if (!empty($this->icon)) {
            if (Str::startsWith($this->icon, '<i class=')) {
                return str_replace('<i class="', '<i class="bg-' . $this->colour . ' ', $this->icon);
            }
            return '<i class="bg-' . $this->colour . ' ' . $this->icon . '"></i>';
        }

        return '<i class="fa fa-solid fa-hourglass-half bg-' . $this->colour . '"></i>';
    }

    /**
     * @return string
     */
    public function htmlName(): string
    {
        if (empty($this->entity_id)) {
            return $this->name;
        }

        return $this->entity->tooltipedLink($this->name, false);
    }

    public function mentionName(): string
    {
        if (!empty($this->name)) {
            return strip_tags(htmlentities($this->name));
        }

        return strip_tags($this->entity->name);
    }

    /**
     * For legacy tinymce editor
     * @return bool
     */
    public function hasEntity(): bool
    {
        return false;
    }

    public function collapsed(): bool
    {
        return $this->is_collapsed;
    }

    /**
     * @return mixed
     */
    public function editingUsers()
    {
        return $this->belongsToMany(User::class, 'entity_user')
            ->using(EntityUser::class)
            ->withPivot('type_id');
    }

    /**
     * List of entities that mention this entity
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function mentions()
    {
        return $this->hasMany('App\Models\EntityMention', 'timeline_element_id', 'id');
    }
}
