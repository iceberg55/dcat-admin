@if($user)
{{--<li class="dropdown dropdown-user nav-item">--}}
{{--    <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">--}}
{{--        <span>--}}
{{--            <img class="round mr-1" src="{{ $user->getAvatar() }}" alt="avatar" height="40" width="40" />--}}
{{--        </span>--}}
{{--        <div class="user-nav d-sm-flex d-none mr-2">--}}
{{--            <span class="user-name text-bold-600">{{ $user->name }}</span>--}}
{{--            <span class="user-status"><i class="fa fa-circle text-success"></i> {{ trans('admin.online') }}</span>--}}
{{--        </div>--}}
{{--    </a>--}}
{{--    <div class="dropdown-menu dropdown-menu-right">--}}
{{--        <a href="{{ admin_url('auth/setting') }}" class="dropdown-item">--}}
{{--            <i class="feather icon-user"></i> {{ trans('admin.setting') }}--}}
{{--        </a>--}}

{{--        <div class="dropdown-divider"></div>--}}

{{--        <a class="dropdown-item" href="{{ admin_url('auth/logout') }}">--}}
{{--            <i class="feather icon-power"></i> {{ trans('admin.logout') }}--}}
{{--        </a>--}}
{{--    </div>--}}
{{--</li>--}}


<div class="dropdown profile-dropdown">
    <a href="#" class="avatar avatar-sm avatar-circle ms-4 ms-xxl-5" data-bs-toggle="dropdown" aria-expanded="false" id="dropdownMenuButton">
        <img class="round mr-1" src="{{ $user->getAvatar() }}" alt="avatar" height="40" width="40" />
        <span class="avatar-status avatar-sm-status avatar-success">&nbsp;</span>
    </a>
    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
        <a href="{{ admin_url('auth/setting') }}" class="dropdown-item">
            <i class="feather icon-user"></i> {{ trans('admin.setting') }}
        </a>

        <div class="dropdown-divider"></div>

        <a class="dropdown-item" href="{{ admin_url('auth/logout') }}">
            <i class="feather icon-power"></i> {{ trans('admin.logout') }}
        </a>
    </ul>
</div>

@endif
