@if($user)
<!-- Sidebar user panel (optional) -->
<div class="user-panel">
    <div class="float-start image">
        <img style="max-height:45px" src="{{ $user->getAvatar() }}" class="img-circle">
    </div>
    <div class="float-start info">
        <p>{{ $user->name }}</p>
        <!-- Status -->
        <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('admin.online') }}</a>
    </div>
</div>
@endif