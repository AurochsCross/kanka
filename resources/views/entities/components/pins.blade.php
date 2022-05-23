
<div class="sidebar-section-box entity-pins">
    <div class="sidebar-section-title cursor" data-toggle="collapse" data-target="#sidebar-pinned-elements">
        <i class="fa-solid fa-chevron-right" style="display: none"></i>
        <i class="fa-solid fa-chevron-down"></i>

        {{ __('entities/pins.title') }}
        <i class="fa-solid fa-question-circle pull-right" data-toggle="ajax-modal" role="button" data-target="#entity-modal" data-url="{{ route('helpers.pins') }}"></i>
    </div>
    <div class="sidebar-elements collapse in" id="sidebar-pinned-elements">

        <ul class="pins m-0 p-0">
            @include('entities.components.relations')
            @includeWhen(method_exists($model, 'pinnedMembers'), 'entities.components.members')
            @includeWhen($model->entity->accessAttributes(), 'entities.components.attributes')
        </ul>
    </div>
</div>

@includeIf('entities.components.profile.' . $name)

@includeWhen(!isset($printing) && $campaign->campaign()->boosted() && $model->entity->hasLinks(), 'entities.components.links')
