<?php /** @var \App\Models\Attribute $attribute */?>

@if ($attributes->count() === 0)
    <div class="help-block">
        {!! __('entities/attributes.helpers.setup', [
    'manage' => '<span class="label label-warning">' . __('entities/attributes.actions.manage') .  '</span>'
]) !!}
    </div>
    @php return @endphp
@endif
@php
$inSection = false;
@endphp
<dl class="dl-horizontal">
@foreach ($attributes as $attribute)
    @if ($attribute->isSection())
        </dl>
        @if ($inSection)
            </div></div>
        @endif
        @php
        $inSection = true;
        @endphp
        <div class="panel panel-default">
            <div class="panel-heading" data-toggle="collapse" data-target="#attribute-section-body-{{ $attribute->id }}">
                <h4 class="panel-title">
                    @if (auth()->check() && auth()->user()->isAdmin() && $attribute->is_private == true)
                        <i class="fa-solid fa-lock pull-right" title="{{ __('crud.is_private') }}"></i>
                    @endif

                    {!! $attribute->name() !!}
                </h4>
            </div>
            <div class="panel-body collapse in" id="attribute-section-body-{{ $attribute->id }}">
                <dl class="dl-horizontal">
        @continue
    @endif
        <dt>
            <span title="{attribute:{{ $attribute->id }}}" data-toggle="tooltip"
                  data-clipboard="{attribute:{{ $attribute->id }}}" data-toast="{{ __('crud.alerts.copy_attribute') }}">
            {!! $attribute->name() !!}
            </span>
            @if (auth()->check() && auth()->user()->isAdmin() && $attribute->is_private == true)
                <i class="fa-solid fa-lock" title="{{ __('crud.is_private') }}"></i>
            @endif
        </dt>
        <dd>
            @if ($attribute->isCheckbox())
                <span class="live-edit" data-id="{{ $attribute->id }}">
                @if ($attribute->value)
                    <i class="fa-solid fa-check"></i>
                @else
                    <i class="fa-solid fa-times"></i>
                @endif
                </span>
            @elseif ($attribute->isText())
                <span class="live-edit @if (empty($attribute->value)) empty-value @endif" data-id="{{ $attribute->id }}">
                    {!! nl2br($attribute->mappedValue()) !!}
                </span>
            @else
                <span class="live-edit @if (empty($attribute->value)) empty-value @endif" data-id="{{ $attribute->id }}">
                    {!! $attribute->mappedValue() !!}
                </span>
            @endif

            @if(\App\Facades\Attributes::isLoop($attribute->name))
                <i class="fa-solid fa-warning" title="{{ __('entities/attributes.errors.loop') }}" data-toggle="tooltip"></i>
            @endif
        </dd>
@endforeach

@if($inSection)
            </dl>
        </div>
    </div>
@else
    </dl>
@endif
