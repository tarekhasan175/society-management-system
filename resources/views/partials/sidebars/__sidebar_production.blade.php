<li class="{{ request()->segment(1) == 'production' ? 'open' : '' }}">
    <a href="#" class="dropdown-toggle">
        <i class="menu-icon fa fa-list-alt"></i>
        <span class="menu-text">Production</span>
        <b class="arrow fa fa-angle-down"></b>
    </a>
    <b class="arrow"></b>

    <ul class="submenu">

        <li class="{{ request()->segment(2) == 'materials-assign' ? 'open' : '' }}">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-caret-right" style=" transform: rotate(45deg); color:gold; font-weight:bolder"></i>
                <span class="menu-text">Materials Assign</span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>

            <ul class="submenu">
                <li class="{{ request()->is('production/materials-assign') ? 'active' : '' }}">
                    <a href="{{ route('materials-assign.index') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        List
                    </a>
                    <b class="arrow"></b>
                </li>

                <li class="{{ request()->is('production/materials-assign/create') ? 'active' : '' }}">
                    <a href="{{ route('materials-assign.create') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Create
                    </a>
                    <b class="arrow"></b>
                </li>
            </ul>
        </li>
        <li class="{{ request()->segment(2) == 'users' ? 'open' : '' }}">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-caret-right" style=" transform: rotate(45deg); color:gold; font-weight:bolder"></i>
                <span class="menu-text">Materials Finish</span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>

            <ul class="submenu">
                <li class="{{ request()->is('setting/users/create') ? 'active' : '' }}">
                    <a href="">
                        <i class="menu-icon fa fa-caret-right"></i>
                        List
                    </a>
                    <b class="arrow"></b>
                </li>

                <li class="{{ request()->is('setting/users') ? 'active' : '' }}">
                    <a href="">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Create
                    </a>
                    <b class="arrow"></b>
                </li>
            </ul>
        </li>
        <li class="{{ request()->segment(2) == 'factories' ? 'open' : '' }}">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-caret-right" style=" transform: rotate(45deg); color:gold; font-weight:bolder"></i>
                <span class="menu-text">Settings</span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>

            <ul class="submenu">
                <li class="{{ request()->is('production/factories') ? 'active' : '' }}">
                    <a href="{{ route('factories.index') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Factory List
                    </a>
                    <b class="arrow"></b>
                </li>
            </ul>
        </li>
        
    </ul>
</li>

