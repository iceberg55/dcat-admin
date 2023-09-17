<nav class="navbar navbar-vertical navbar-expand-lg navbar-light" id="sidebar">
    <a href="{{ admin_url('/') }}" class="navbar-brand waves-effect waves-light d-none d-lg-block">
        @if( config('admin.logo-image') )
            <img src="/storage/{!! config('admin.logo-image') !!}">
        @endif
        @if( config('admin.logo-dark-image') )
            <img src="/storage/{!! config('admin.logo-dark-image') !!}" class="white-logo2">
        @endif
    </a>
    <div class="navbar-collapse">
        <ul class="navbar-nav mb-2" id="accordionExample" data-simplebar>
            {!! admin_section(Dcat\Admin\Admin::SECTION['LEFT_SIDEBAR_MENU_TOP']) !!}

            {!! admin_section(Dcat\Admin\Admin::SECTION['LEFT_SIDEBAR_MENU']) !!}

            {!! admin_section(Dcat\Admin\Admin::SECTION['LEFT_SIDEBAR_MENU_BOTTOM']) !!}
        </ul>
    </div>

</nav>
