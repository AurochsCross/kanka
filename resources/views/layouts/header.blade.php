<?php
$currentCampaign = CampaignLocalization::getCampaign();
?>
<header class="main-header @if(isset($startUI) && $startUI) main-header-start @endif">
    <nav class="navbar navbar-static-top">
        @if ((auth()->check() && auth()->user()->hasCampaigns()) || !auth()->check())
            <button class="sidebar-toggle" data-toggle="tooltip" title="{!! __('crud.keyboard-shortcut', ['code' => '<code>]</code>']) !!}" data-placement="right" data-html="true" tabindex="3">
                <span class="sr-only">{{ __('header.toggle_navigation') }}</span>
            </button>
        @endif

        @if (!empty($currentCampaign))
            {!! Form::open(['route' => 'search', 'class' => 'visible-md visible-lg navbar-form navbar-left live-search-form', 'method'=>'GET']) !!}
            <div class="form-group has-feedback">
                <input type="search" name="q" id="live-search" class="typeahead form-control" autocomplete="off"
                       placeholder="{{ __('sidebar.search') }}" data-url="{{ route('search.live') }}"
                       data-empty="{{ __('search.no_results') }}"
                       tabindex="2">
                <span class="keyboard-shortcut form-control-feedback hidden-xs hidden-sm">K</span>

                <a href="#" class="live-search-close visible-xs visible-sm pull-right" name="search-close">
                    <i class="fa-solid fa-close"></i>
                </a>
            </div>
            {!! Form::close() !!}
        @endif

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                @if (!empty($currentCampaign))
                    <li class="visible-xs visible-sm">
                        <a href="#" class="mobile-search">
                            <span class="fa-solid fa-search"></span>
                        </a>
                    </li>
                @endif
                <!-- Only logged in users can have this dropdown, Also only show this if the user has campaigns -->
                @if (auth()->check() && !\App\Facades\Identity::isImpersonating())
                    <li class="dropdown notifications-menu" data-user-id="{{ auth()->user()->id }}">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                            <i class="far fa-bell"></i>
                            <span id="header-notification-count" class="label label-warning" style="display:none"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="flex">
                                <a href="{{ route('notifications') }}" class="flex-1">
                                    {{ __('header.notifications.read_all') }}
                                </a>

                                <a href="#" class="flex-1 text-right" id="header-notification-mark-all-as-read" data-url="{{ route('notifications.refresh', 'read-all') }}">
                                    {{ __('header.notifications.mark_read') }}
                                </a>
                            </li>
                            <li>
                                <ul class="menu list-none px-2" id="header-notification-list" data-url="{{ route('notifications.refresh') }}">
                                    <li class="text-center"><i class="fa-solid fa-spin fa-spinner"></i></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                @endif
                @guest
                    <li class="messages-menu">
                        <a href="{{ route('login') }}">{{ __('front.menu.login') }}</a>
                    </li>@if(config('auth.register_enabled'))
                    <li class="messages-menu hidden-xs">
                        <a href="{{ route('register') }}">{{ __('front.menu.register') }}</a>
                    </li>@endif
                @endguest

                @auth()

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" title="{{ auth()->user()->name }}">
                        <img src="{{ auth()->user()->getAvatarUrl() }}" class="user-image h-16 w-16 rounded-full" alt="{{ __('header.avatar') }}"/>
                    </a>
                    <ul class="dropdown-menu">

                        @if (\App\Facades\Identity::isImpersonating())
                            <li>
                                <a href="{{ route('users.profile', auth()->user()) }}">
                                    {!! __('header.user.impersonating', ['user' => '<strong>' . auth()->user()->name . '</strong>']) !!}
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="{{ route('identity.back') }}" class="switch-back">
                                    <i class="fa-solid fa-sign-out-alt"></i> {{ __('campaigns.members.actions.switch-back') }}
                                </a>
                            </li>
                        @else
                            <li>
                                <a href="{{ route('users.profile', auth()->user()) }}">
                                    {!! __('header.user.signed-in', ['user' => '<strong>' . auth()->user()->name . '</strong>']) !!}
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="{{ route('users.profile', auth()->user()) }}">
                                    {{ __('header.user.your-profile') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('settings.profile') }}">
                                    {{ __('header.user.settings') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('settings.subscription') }}">
                                    {{ __('settings.menu.subscription') }}
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li class="text-red">
                                <a href="{{ route('logout') }}" class="" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fa-solid fa-sign-out" aria-hidden="true"></i>
                                    {{ __('header.user.sign-out') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        @endif
                    </ul>
                </li>
                @endauth
            </ul>
        </div>
    </nav>
</header>
