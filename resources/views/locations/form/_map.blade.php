@if (!isset($model) || auth()->user()->can('map', $model))

    <p class="alert alert-warning">{!! __('locations.helpers.map_deprecated_2', ['boosted' => link_to_route('front.pricing', __('crud.boosted_campaigns'), '#boost')]) !!}</p>

    <p class="help-block">{{ __('locations.helpers.map') }}</p>
    <label>{{ __('locations.fields.map') }}</label>
    {!! Form::hidden('remove-map') !!}
    <div class="row">
        <div class="col-md-10">
            <div class="form-group">
                {!! Form::file('map', array('class' => 'image form-control')) !!}
            </div>
            <div class="form-group">
                {!! Form::text('map_url', null, ['placeholder' => __('crud.placeholders.image_url'), 'class' => 'form-control']) !!}
            </div>

            <p class="help-block">
                {{ __('crud.hints.image_limitations', ['formats' => 'jpg, png, gif, webp, svg', 'size' => auth()->user()->mapUploadSize(true)]) }}
                @if (!auth()->user()->hasRole('patreon'))
                    <a href="{{ config('patreon.url') }}" target="_blank">{{ __('crud.hints.image_patreon') }}</a>
                @endif
            </p>
        </div>
        <div class="col-md-2">
            @if (!empty($model->map))
                <div class="preview-v2">
                    <div class="image" style="background-image: url('{{ Img::crop(200, 120)->url($model->map) }}')">
                        <a href="#" class="img-delete" data-target="remove-map" title="{{ __('crud.remove') }}">
                            <i class="fa-solid fa-trash"></i> {{ __('crud.remove') }}
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </div>

    @if (auth()->user()->isAdmin())
        <hr>
        <div class="form-group">
            {!! Form::hidden('is_map_private', 0) !!}
            <label>{!! Form::checkbox('is_map_private', 1, empty($model) ? 0 : $model->is_map_private) !!}
                {{ __('locations.fields.is_map_private') }}
            </label>
            <p class="help-block">{{ __('locations.hints.is_map_private') }}</p>
        </div>
    @endif

@endif
