<nav class="navbar navbar-vertical navbar-expand-lg navbar-light">
    <a class="navbar-brand mx-auto d-none d-lg-block my-0 my-lg-4" href="#">
        <img src="../assets/svg/brand/logo.svg" alt="Muze">
        <img src="../assets/svg/brand/logo-white.svg" alt="Muze" class="white-logo2">
        <img src="../assets/svg/brand/muze-icon.svg" class="muze-icon" alt="Muze">
        <img src="../assets/svg/brand/muze-icon-white.svg" class="muze-icon-white" alt="Muze">
    </a>
    <div class="navbar-collapse">
        <ul class="navbar-nav mb-2" id="accordionExample" data-simplebar>
            {!! admin_section(Dcat\Admin\Admin::SECTION['LEFT_SIDEBAR_MENU_TOP']) !!}

            {!! admin_section(Dcat\Admin\Admin::SECTION['LEFT_SIDEBAR_MENU']) !!}

            {!! admin_section(Dcat\Admin\Admin::SECTION['LEFT_SIDEBAR_MENU_BOTTOM']) !!}
        </ul>
        <div class="navbar-vertical-footer border-top border-gray-50">
            <ul class="navbar-vertical-footer-list">
                <li>
                    <a href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" width="18.047" height="18.047" viewBox="0 0 18.047 18.047">
                            <g data-name="Icons/Tabler/Paperclip Copy" transform="translate(0.047 0.047)">
                                <rect data-name="Icons/Tabler/Adjustments background" width="18" height="18" fill="none"/>
                                <path d="M14.4,17.3l0-.074V6.579a2.829,2.829,0,0,1,0-5.443V.772A.772.772,0,0,1,15.94.7l0,.074v.364a2.829,2.829,0,0,1,0,5.443v10.65A.771.771,0,0,1,14.4,17.3ZM13.885,3.858a1.285,1.285,0,1,0,1.286-1.286A1.287,1.287,0,0,0,13.885,3.858ZM8.232,17.3l0-.074V15.836a2.829,2.829,0,0,1,0-5.443V.772A.771.771,0,0,1,9.768.7l0,.074v9.621a2.829,2.829,0,0,1,0,5.443v1.393a.772.772,0,0,1-1.54.074Zm-.517-4.188A1.285,1.285,0,1,0,9,11.829,1.287,1.287,0,0,0,7.714,13.115ZM2.06,17.3l0-.074V9.664a2.829,2.829,0,0,1,0-5.443V.772A.771.771,0,0,1,3.6.7l0,.074V4.221a2.829,2.829,0,0,1,0,5.443v7.565a.772.772,0,0,1-1.54.074ZM1.543,6.943A1.285,1.285,0,1,0,2.829,5.657,1.287,1.287,0,0,0,1.543,6.943Z" transform="translate(-0.047 -0.047)" fill="#6c757d"/>
                            </g>
                        </svg></a>
                </li>
                <li>
                    <a href="javascript:void(0);"><svg data-name="Icons/Tabler/Paperclip Copy 2" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                            <rect data-name="Icons/Tabler/Bolt background" width="18" height="18" fill="none"/>
                            <path d="M6.377,18a.7.7,0,0,1-.709-.6l-.006-.1V11.537H.709A.7.7,0,0,1,.1,11.193a.673.673,0,0,1-.014-.672l.054-.083L7.693.274,7.755.2,7.828.141,7.913.087,7.981.055l.087-.03L8.16.006,8.256,0h.037l.059.005.04.007.052.011.045.014.043.016.052.023.089.055.016.011A.765.765,0,0,1,8.756.2L8.82.273l.055.083.033.067.03.085L8.957.6l.007.094V6.461h4.952a.7.7,0,0,1,.613.345.672.672,0,0,1,.013.672l-.053.082L6.942,17.714A.691.691,0,0,1,6.377,18ZM7.548,2.821,2.1,10.153H6.369a.7.7,0,0,1,.7.6l.006.093v4.331l5.449-7.331H8.256a.7.7,0,0,1-.7-.6l-.007-.094Z" transform="translate(2.25 0)" fill="#6c757d"/>
                        </svg></a>
                </li>
                <li class="dropup">
                    <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false"><img src="../assets/svg/icons/united-states.svg" alt="United States" class="avatar avatar-xss avatar-circle"></a>
                    <ul class="dropdown-menu dropdown-menu-end" id="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <li class="dropdown-sub-title">
                            <span>Language</span>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">
                                <img class="avatar avatar-xss avatar-circle me-2" src="../assets/svg/icons/united-states.svg" alt="Flag">
                                <span class="text-truncate" title="English">English</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">
                                <img class="avatar avatar-xss avatar-circle me-2" src="../assets/svg/icons/dutch.svg" alt="Flag">
                                <span class="text-truncate" title="English">Dutch</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">
                                <img class="avatar avatar-xss avatar-circle me-2" src="../assets/svg/icons/latin.svg" alt="Flag">
                                <span class="text-truncate" title="Latin">Latin</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>

</nav>