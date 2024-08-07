<nav class="navbar navbar-vertical navbar-expand-lg navbar-light" id="sidebar">
    <div class="navbar-collapse">
        <ul class="navbar-nav mb-2" id="accordionExample" data-simplebar>
            <a href="{{ admin_url('/') }}" class="p-3 navbar-brand waves-effect waves-light">
                <img src="{!! \Dcat\Admin\Admin::domain()->logo ?? config('admin.logo-image') !!}">
                <img src="{!! \Dcat\Admin\Admin::domain()->dark_logo ?? \Dcat\Admin\Admin::domain()->logo ?? config('admin.logo-dark-image') !!}" class="white-logo2">
            </a>
            {!! admin_section(Dcat\Admin\Admin::SECTION['LEFT_SIDEBAR_MENU_TOP']) !!}

            {!! admin_section(Dcat\Admin\Admin::SECTION['LEFT_SIDEBAR_MENU']) !!}

            {!! admin_section(Dcat\Admin\Admin::SECTION['LEFT_SIDEBAR_MENU_BOTTOM']) !!}

            {!! admin_section(Dcat\Admin\Admin::SECTION['LEFT_SIDEBAR_USER_PANEL']) !!}
        </ul>
    </div>

</nav>
