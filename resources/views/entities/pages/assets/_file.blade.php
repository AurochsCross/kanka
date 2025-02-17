<?php /** @var \App\Models\EntityAsset $asset */?>
<div class="">
    <div class="entity-asset asset-file">
        <a href="{{ Storage::url($asset->metadata['path']) }}" target="_blank" class="child icon" @if($asset->isImage()) style="background-image: url({{ $asset->imageUrl() }})"@endif>
            @if (!$asset->isImage())
            <i class="fa-solid fa-file-o"></i>
            @endif
        </a>
        <div class="child text">
            {!! $asset->name !!}<br />

            @if(auth()->check() && auth()->user()->can('update', $entity->child))
                <a href="#" data-toggle="ajax-modal" data-target="#entity-modal" data-url="{{ route('entities.entity_assets.edit', [$entity, $asset]) }}">
                    <i class="fa-solid fa-pencil"></i>
                </a>
            @endif
            {!! $asset->visibilityIcon() !!}
        </div>
    </div>
</div>
