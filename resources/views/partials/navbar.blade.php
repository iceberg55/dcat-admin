{!! admin_section(Dcat\Admin\Admin::SECTION['NAVBAR_BEFORE']) !!}

<div class="header border-bottom border-gray-200 header-fixed">
    <div class="container-fluid px-0">
        <div class="header-body px-3 px-xxl-5 py-3 py-lg-4">
            <div class="row align-items-center">
                <a href="javascript:void(0);" class="muze-hamburger d-block d-lg-none col-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 16 16">
                        <g data-name="icons/tabler/chevrons-left" transform="translate(0)">
                            <rect data-name="Icons/Tabler/Chevrons Left background" width="16" height="16"
                                  fill="none"/>
                            <path d="M14.468,14.531l-.107-.093-6.4-6.4a.961.961,0,0,1-.094-1.25l.094-.107,6.4-6.4a.96.96,0,0,1,1.451,1.25l-.094.108L10,7.36l5.72,5.721a.961.961,0,0,1,.094,1.25l-.094.107a.96.96,0,0,1-1.25.093Zm-7.68,0-.107-.093-6.4-6.4a.961.961,0,0,1-.093-1.25l.093-.107,6.4-6.4a.96.96,0,0,1,1.45,1.25l-.093.108L2.318,7.36l5.72,5.721a.96.96,0,0,1,.093,1.25l-.093.107a.96.96,0,0,1-1.25.093Z"
                                  transform="translate(0 1)" fill="#6C757D"/>
                        </g>
                    </svg>
                </a>
                <a href="{{ admin_url('/') }}" class="navbar-brand mx-auto d-lg-none col-auto px-0">
                    <img src="/storage/{!! config('admin.logo-image') !!}">
                    <img src="/storage/{!! config('admin.logo-dark-image') !!}" class="white-logo">
                </a>
                <div class="col d-flex align-items-center">
                    <a href="javascript:void(0);"
                       class="back-arrow bg-white circle circle-sm shadow border border-gray-200 rounded mb-0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 16 16">
                            <g data-name="icons/tabler/chevrons-left" transform="translate(0)">
                                <rect data-name="Icons/Tabler/Chevrons Left background" width="16" height="16"
                                      fill="none"/>
                                <path d="M14.468,14.531l-.107-.093-6.4-6.4a.961.961,0,0,1-.094-1.25l.094-.107,6.4-6.4a.96.96,0,0,1,1.451,1.25l-.094.108L10,7.36l5.72,5.721a.961.961,0,0,1,.094,1.25l-.094.107a.96.96,0,0,1-1.25.093Zm-7.68,0-.107-.093-6.4-6.4a.961.961,0,0,1-.093-1.25l.093-.107,6.4-6.4a.96.96,0,0,1,1.45,1.25l-.093.108L2.318,7.36l5.72,5.721a.96.96,0,0,1,.093,1.25l-.093.107a.96.96,0,0,1-1.25.093Z"
                                      transform="translate(0 1)" fill="#6C757D"/>
                            </g>
                        </svg>
                    </a>
                </div>
                @if(!$configData['horizontal-menu'])
                    <div class="col-auto d-flex flex-wrap align-items-center icon-blue-hover ps-0">
                        <div class="navbar-left d-flex align-items-center">
                            {!! Dcat\Admin\Admin::navbar()->render('left') !!}
                        </div>
                    </div>
                @endif
                <div class="col-auto d-flex flex-wrap align-items-center icon-blue-hover ps-0">
                    {!! Dcat\Admin\Admin::navbar()->render() !!}
                    {{--User Account Menu--}}
                    {{--                    {!! admin_section(Dcat\Admin\Admin::SECTION['NAVBAR_USER_PANEL']) !!}--}}

                </div>
            </div>
        </div>
    </div>
</div>


{!! admin_section(Dcat\Admin\Admin::SECTION['NAVBAR_AFTER']) !!}
