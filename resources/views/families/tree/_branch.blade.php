
@if ($branch instanceof \App\Models\Entity)
    <div class="entity">
        <a class="entity-image" style="background-image: url('{{ ($campaign->superboosted() && !empty($branch->image_uuid) && !empty($branch->image) ? Img::crop(40, 40)->url($branch->image->path) : $branch->avatar(true)) }}');"
           title="{{ $branch->name }}"
           href="{{ $branch->url() }}">
        </a>
        {!! $branch->tooltipedLink() !!}
    </div>
@elseif(is_array($branch))
    @php $hasChildren = false; @endphp
    @foreach ($branch as $child)
        @if (is_array($child)) @php $hasChildren = true; @endphp @endif
    @endforeach
    <div class="branch @if ($hasChildren) children @endif">
        @foreach ($branch as $child)
            @include('families.tree._branch', ['branch' => $child])
        @endforeach
    </div>
@endif
