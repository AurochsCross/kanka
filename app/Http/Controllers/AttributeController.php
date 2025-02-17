<?php

namespace App\Http\Controllers;

use App\Facades\CampaignLocalization;
use App\Http\Requests\ApplyAttributeTemplate;
use App\Models\AttributeTemplate;
use App\Models\Character;
use App\Models\Attribute;
use App\Http\Requests\StoreAttribute;
use App\Services\AttributeService;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Session;
use App\Models\Entity;

class AttributeController extends CrudAttributeController
{
    /**
     * @var string
     */
    protected string $view = '';

    /**
     * @var string
     */
    protected string $route = '_attributes';

    /**
     * Redirect tab after manipulating
     * @var string
     */
    protected $tab = 'attribute';

    /**
     * Crud view path
     * @var string
     */
    protected $crudView = 'attributes';

    /**
     * @var string
     */
    protected $model = \App\Models\Attribute::class;

    /**
     * @param Entity $entity
     * @return \Illuminate\Http\Response
     */
    public function index(Entity $entity)
    {
        dump('yo');
        $this->authorize('attributes', $entity);
        return $this->crudIndex($entity);
    }

    /**
     * @param Entity $entity
     * @return \Illuminate\Http\RedirectResponse
     */
    public function show(Entity $entity)
    {
        return response()->redirectToRoute('entities.attributes.index', $entity);
    }

    /**
     * @param Entity $entity
     * @param Attribute $attribute
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Entity $entity, Attribute $attribute)
    {
        return $this->crudCreate($entity, $attribute);
    }

    /**
     * @param StoreAttribute $request
     * @param Entity $entity
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreAttribute $request, Entity $entity)
    {
        return $this->crudStore($request, $entity);
    }


    /**
     * @param Entity $entity
     * @param Attribute $attribute
     * @return \Illuminate\Http\Response
     */
    public function edit(Entity $entity, Attribute $attribute)
    {
        return $this->crudEdit($entity, $attribute);
    }

    /**
     * @param StoreAttribute $request
     * @param Entity $entity
     * @param Attribute $attribute
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(StoreAttribute $request, Entity $entity, Attribute $attribute)
    {
        return $this->crudUpdate($request, $entity, $attribute);
    }

    /**
     * @param Entity $entity
     * @param Attribute $attribute
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Entity $entity, Attribute $attribute)
    {
        return $this->crudDestroy($entity, $attribute);
    }
}
