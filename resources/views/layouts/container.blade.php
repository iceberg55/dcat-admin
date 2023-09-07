<body class="bg-gray-100 {{ $configData['body_class']}} {{ $configData['sidebar_class'] }} {{ $configData['navbar_class'] === 'fixed-top' ? 'navbar-fixed-top' : '' }} " >

<script>
    var Dcat = CreateDcat({!! Dcat\Admin\Admin::jsVariables() !!});
</script>

{!! admin_section(Dcat\Admin\Admin::SECTION['BODY_INNER_BEFORE']) !!}

@include('admin::partials.sidebar')

<div class="app-content main-content">
    @include('admin::partials.navbar')

    <div class="app-content" id="{{ $pjaxContainerId }}">
        @yield('app')
    </div>
</div>

{!! admin_section(Dcat\Admin\Admin::SECTION['BODY_INNER_AFTER']) !!}

{!! Dcat\Admin\Admin::asset()->jsToHtml() !!}

<script>Dcat.boot();</script>

</body>

</html>
