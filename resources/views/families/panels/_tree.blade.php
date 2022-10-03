<h1>BIG RIP</h1>

<div class="family-tree">
    <div class="branch">
@foreach ($tree as $branch)
    @include('families.tree._branch')
@endforeach
    </div>
</div>
