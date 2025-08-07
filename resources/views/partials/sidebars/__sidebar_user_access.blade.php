@php
$hasModulePermission = hasModulePermission('User Access', $active_modules)
&& hasAnyPermission(['permission.accesses.create', 'permission.permitted.users', 'database.backup', 'device.api'], $slugs);
@endphp


@if ($hasModulePermission)

<li class="{{ request()->segment(1) == 'setting' || request()->segment(1) == 'system-setting' || request()->segment(2) == 'machine-integration' || request()->segment(2) == 'devices' ? 'open' : '' }}">
    <a href="#" class="dropdown-toggle">
        <i class="menu-icon fa fa-key" style=" transform: rotate(45deg); color:gold; font-weight:bolder"></i>
        <span class="menu-text">User & Access</span>
        <b class="arrow fa fa-angle-down"></b>
    </a>
    <b class="arrow"></b>

    <ul class="submenu">

        <li class="{{ request()->segment(2) == 'users' ? 'open' : '' }}">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-key" style=" transform: rotate(45deg); color:gold; font-weight:bolder"></i>
                <span class="menu-text">User</span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>

            <ul class="submenu">

                @if (Auth::user()->id == 1)
                <li class="{{ request()->is('setting/users/create') ? 'active' : '' }}">
                    <a href="{{ route('users.create') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Create
                    </a>
                    <b class="arrow"></b>
                </li>
                @endif

                <li class="{{ request()->is('setting/users') ? 'active' : '' }}">
                    <a href="{{ route('users.index') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        List
                    </a>
                    <b class="arrow"></b>
                </li>

            </ul>
        </li>

        @if (hasPermission("permission.accesses.create", $slugs))
        <li class="{{ request()->is('setting/permission-access/create') ? 'active' : '' }}">
            <a href="{{ route('permission-access.create') }}">
                <i class="menu-icon fa fa-caret-right"></i>
                Permission Access
            </a>
            <b class="arrow"></b>
        </li>
        @endif

        @if (hasPermission("permission.permitted.users", $slugs))
        <li class="{{ request()->is('setting/permitted-user-list') ? 'active' : '' }}">
            <a href="{{ route('permitted.users') }}">
                <i class="menu-icon fa fa-caret-right"></i>
                Permitted Users
            </a>
            <b class="arrow"></b>
        </li>
        @endif

        @if (hasPermission("database.backup", $slugs))
        <li class="">
            <a href="{{ route('db-backup') }}">
                <i class="menu-icon fa fa-caret-right"></i>
                Backup Database
            </a>
            <b class="arrow"></b>
        </li>
        @endif

        @if (auth()->id() == 1)
        <li class="{{ request()->is('system-setting') ? 'active' : '' }}">
            <a href="/system-setting">
                <i class="menu-icon fa fa-caret-right"></i>
                System Setting
            </a>
            <b class="arrow"></b>
        </li>
        @endif
    </ul>
</li>
@endif
