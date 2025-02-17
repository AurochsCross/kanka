<?php
/**
 * @var \App\Models\Map $map
 */
$focus = $map->centerFocus();

if (isset($single) && $single) {
    $focus = "$model->latitude, $model->longitude";
} elseif (request()->has('lat') && request()->has('lng')) {
    $focus = ((float) request()->get('lat')) . ', ' . ((float) request()->get('lng'));
} elseif (request()->has('focus')) {
    /** @var \App\Models\MapMarker $pin */
    $pin = $map->markers->where('id', request()->get('focus', 0))->first();
    if ($pin) {
        $focus = "$pin->latitude, $pin->longitude";
    }
}

?>
<script type="text/javascript">
    /** Kanka map {{ $map->id }} setup **/
    var bounds{{ $map->id }} = {{ $map->bounds() }};
    var maxBounds{{ $map->id }} = {{ $map->bounds(true) }};
    @if ($map->isReal())
    var baseLayer{{ $map->id }} = L.imageOverlay('', bounds{{ $map->id }});
    @else
    var baseLayer{{ $map->id }} = L.imageOverlay('{{ Storage::url($map->image) }}', bounds{{ $map->id }});
    @endif

    /** Layers Init **/
@foreach ($map->layers as $layer)
    @if (empty($layer->image))
        @continue
    @endif
    var layer{{ $layer->id }} = L.imageOverlay('{{ Storage::url($layer->image) }}', bounds{{ $map->id }});
@endforeach

    var baseMaps{{ $map->id }} = {
@foreach ($map->layers->where('type_id', '<', 1)->whereNotNull('image')->sortBy('position') as $layer)
        "{{ $layer->name }}": layer{{ $layer->id }},
@endforeach
        "{{ __('maps/layers.base') }}": baseLayer{{ $map->id }}
    }

@if(!isset($single) || !$single)
    /** Groups Init **/
@foreach($map->groups as $group)
    @if ($map->isClustered())
    var group{{ $group->id }} = L.layerGroup(/**[{{ $group->markerGroupHtml() }}]**/);
    @else
    var group{{ $group->id }} = L.layerGroup([{{ $group->markerGroupHtml() }}]);
    @endif
@endforeach

    var overlayMaps{{ $map->id }} = {
@foreach($map->layers->where('type_id', '>', 0)->whereNotNull('image')->sortBy('position') as $layer)
        "{{ $layer->name }} ({{ $layer->position }})": layer{{ $layer->id }},
@endforeach
@foreach($map->groups->sortBy('position') as $group)
        "{{ $group->name }}": group{{ $group->id }},
@endforeach
    }
@else
    var overlayMaps{{ $map->id }} = {};
@endif
    @if (!$map->isReal() && !$map->isChunked())

    var map{{ $map->id }} = L.map('map{{ $map->id }}', {
        crs: L.CRS.Simple,
        center: [ {{ $focus }} ],
        noWrap: true,
        maxBounds: maxBounds{{ $map->id }},
        maxBoundsViscosity: 0.5,
        dragging: true,
        tap: false,
        attributionControl: false,
        zoom: {{ $map->initialZoom() }},
        zoomSnap: 0.25,
        minZoom: {{ $map->minZoom() }},
        maxZoom: {{ $map->maxZoom() }},
        layers: [{{ $map->activeLayers(!isset($single)) }}]
    });

    L.control.layers(baseMaps{{ $map->id }}, overlayMaps{{ $map->id }}).addTo(map{{ $map->id }});
    @else

    var map{{ $map->id }} = L.map('map{{ $map->id }}', {
        @if ($map->isChunked())
        crs: L.CRS.Simple,
        maxBounds: maxBounds{{ $map->id }},
        maxBoundsViscosity: 0.5,
        @endif
        noWrap: true,
        dragging: true,
        tap: false,
        attributionControl: false,
        minZoom: {{ $map->minZoom() }},
        maxZoom: {{ $map->maxZoom() }},
    }).setView([ {{ $focus }} ], {{ $map->initialZoom() }});

    @if ($map->isReal())
    L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
    }).addTo(map{{ $map->id }});
    @else
    L.tileLayer('{{ route('maps.chunks', $map->id) }}/?z={z}&x={x}&y={y}', {
        attribution: '&copy; Kanka',
    }).addTo(map{{ $map->id }});
    @endif

    L.control.layers(null, overlayMaps{{ $map->id }}).addTo(map{{ $map->id }});

    @endif

    @if ($map->isClustered())
    // This is where we group markers into cluster groups
    var clusterMarkers{{ $map->id }} = L.markerClusterGroup.layerSupport({ chunkedLoading: true });
    @endif
</script>
