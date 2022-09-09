@foreach ($links as $menuLink)
    <?php /** @var \App\Models\MenuLink $menuLink */ ?>
    @if ((isset($childName) && $menuLink->parent == $childName) || (!isset($childName) && $menuLink->parent == $name) || ($menuLink->parent == $name && $menuLink->parent == $childName) )
    <ul class="sidebar-submenu">
        @include('layouts.sidebars._quick-link', ['menuLink' => $menuLink])
    </ul>
    @endif
@endforeach
