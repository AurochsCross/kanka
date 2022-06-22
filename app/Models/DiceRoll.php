<?php

namespace App\Models;

use App\Models\Concerns\Acl;
use App\Traits\CampaignTrait;
use App\Traits\ExportableTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property string $system
 * @property string $parameters
 * @property int $character_id
 */
class DiceRoll extends MiscModel
{
    use CampaignTrait,
        ExportableTrait,
        SoftDeletes,
        Acl
    ;

    //
    protected $fillable = [
        'name',
        'slug',
        'campaign_id',
        'character_id',
        'system',
        'parameters',
        'is_private',
    ];

    /**
     * Searchable fields
     * @var array
     */
    protected $searchableColumns  = ['name'];

    /**
     * Fields that can be filtered on
     * @var array
     */
    protected $filterableColumns = [
        'character_id',
    ];

    /**
     * Fields that can be sorted on
     * @var array
     */
    protected $sortableColumns = [
        'parameters',
        'character.name',
    ];

    /**
     * Nullable values (foreign keys)
     * @var array
     */
    public $nullableForeignKeys = [
        'character_id',
    ];

    /**
     * Entity type
     * @var string
     */
    protected $entityType = 'dice_roll';

    /**
     * Foreign relations to add to export
     * @var array
     */
    protected $foreignExport = [
        'diceRollResults'
    ];

    /**
     * Who created this entry
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function character()
    {
        return $this->belongsTo('App\Models\Character', 'character_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function diceRollResults()
    {
        return $this->hasMany('App\Models\DiceRollResult', 'dice_roll_id');
    }

    /**
     * Get the entity_type id from the entity_types table
     * @return int
     */
    public function entityTypeId(): int
    {
        return (int) config('entities.ids.dice_roll');
    }

    /**
     * @return mixed|string
     */
    public function entry()
    {
        return '';
    }

    /**
     * Determine if the model has profile data to be displayed
     * @return bool
     */
    public function showProfileInfo(): bool
    {
        return $this->parameters || $this->character;
    }
}
