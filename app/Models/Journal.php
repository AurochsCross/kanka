<?php

namespace App\Models;

use App\Models\Concerns\Acl;
use App\Models\Concerns\Nested;
use App\Models\Concerns\SortableTrait;
use App\Traits\CalendarDateTrait;
use App\Traits\CampaignTrait;
use App\Traits\ExportableTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class Journal
 * @package App\Models
 *
 * @property int $id
 * @property string $date
 * @property int $character_id
 * @property int $journal_id
 * @property int $author_id
 * @property Character $character
 * @property Entity $author
 * @property Journal $journal
 * @property Journal[] $journals
 * @property Journal[] $descendants
 */
class Journal extends MiscModel
{
    use CampaignTrait,
        ExportableTrait,
        CalendarDateTrait,
        Nested,
        SoftDeletes,
        SortableTrait,
        Acl
    ;

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'campaign_id',
        'slug',
        'type',
        'image',
        'entry',
        'date',
        'character_id',
        'location_id',
        'is_private',
        'journal_id',
        'author_id',

        // calendar date
        'calendar_id',
        'calendar_year',
        'calendar_month',
        'calendar_day',
    ];

    /**
     * Searchable fields
     * @var array
     */
    protected $searchableColumns  = ['name', 'entry', 'type'];

    /**
     * Entity type
     * @var string
     */
    protected $entityType = 'journal';

    /**
     * Fields that can be filtered on
     * @var array
     */
    protected $filterableColumns = [
        'date',
        'character_id',
        'location_id',
        'journal_id',
        'author_id',
        'date_start',
        'date_end',
    ];

    /**
     * Fields that can be sorted on
     * @var array
     */
    protected $sortableColumns = [
        'date',
        'calendar_date',
        'author.name',
    ];
    protected $sortable = [
        'name',
        'date',
        'character.name',
        //'character.name',
    ];

    /**
     * Nullable values (foreign keys)
     * @var array
     */
    public $nullableForeignKeys = [
        'location_id',
        //'character_id',
        'calendar_id',
        'journal_id',
        'author_id',
    ];

    /**
     * Performance with for datagrids
     * @param $query
     * @return mixed
     */
    public function scopePreparedWith(Builder $query)
    {
        return $query->with([
            'entity',
            'entity.image',
            'author',
            'location', 'location.entity',
            'journal', 'journal.entity',
            'calendar',
        ]);
    }

    /**
     * Only select used fields in datagrids
     * @return array
     */
    public function datagridSelectFields(): array
    {
        return ['journal_id', 'author_id', 'date', 'calendar_id', 'calendar_year', 'calendar_month', 'calendar_day'];
    }

    /**
     * @return array
     */
    public function menuItems(array $items = []): array
    {
        $items['second']['journals'] = [
            'name' => 'journals.show.tabs.journals',
            'route' => 'journals.journals',
            'count' => $this->descendants()->count()
        ];
        return parent::menuItems($items);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function journal()
    {
        return $this->belongsTo(Journal::class);
    }

    public function journals()
    {
        return $this->hasMany(Journal::class);
    }
    /**
     * Get all journals in the journal and descendants
     */
    public function allJournals()
    {
        $locationIds = [$this->id];
        foreach ($this->descendants as $descendant) {
            $locationIds[] = $descendant->id;
        };

        $table = new Journal();
        return Journal::whereIn($table->getTable() . '.journal_id', $locationIds)->with('journal');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function character()
    {
        return $this->belongsTo('App\Models\Character', 'character_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author()
    {
        return $this->belongsTo('App\Models\Entity', 'author_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function location()
    {
        return $this->belongsTo('App\Models\Location', 'location_id');
    }

    /**
     * Get the entity_type id from the entity_types table
     * @return int
     */
    public function entityTypeId(): int
    {
        return (int) config('entities.ids.journal');
    }

    /**
     * Parent ID field for the Node trait
     * @return string
     */
    public function getParentIdName()
    {
        return 'journal_id';
    }

    /**
     * Specify parent id attribute mutator
     * @param $value
     */
    public function setJournalIdAttribute($value)
    {
        $this->setParentIdAttribute($value);
    }

    /**
     * Determine if the model has profile data to be displayed
     * @return bool
     */
    public function showProfileInfo(): bool
    {
        if (!empty($this->type) || !empty($this->date)) {
            return true;
        }

        if (!empty($this->author) || !empty($this->location)) {
            return true;
        }

        return false;
    }
}
