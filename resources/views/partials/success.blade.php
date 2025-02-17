@if (session('success') or session('success_raw'))
    <div class="alert alert-success alert-dismissable mx-4">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        @if (session('success_raw'))
            {!! session('success_raw') !!}
        @else
            {{ session('success') }}
        @endif
    </div>
@endif
@if (session('warning'))
    <div class="alert alert-warning alert-dismissable mx-4">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        {{ session('warning') }}
    </div>
@endif
@if (session('error') or session('error_raw'))
    <div class="alert alert-danger alert-dismissable mx-4">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        @if (session('error_raw'))
            {!! session('error_raw') !!}
        @else
            {{ session('error') }}
        @endif
    </div>
@endif
