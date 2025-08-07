


@if(hasAnyPermission(["groups.index","company.infos.index","buyers.index","suppliers.index","yarns.index","item.units.index",'currency-conversions.index', 'id.card.settings.index'], $slugs) && hasModulePermission('Global Setting', $active_modules))

    <li class="{{ request()->segment(1) == 'group' || request()->segment(1) == 'company' || request()->is('gs-setup/suppliers','global-setting/*','currency-conversion*') || request()->is('id-card-setting*') ? 'open' : '' }}">

        <a href="#" class="dropdown-toggle">
            <i class="menu-icon fa fa-gear"></i>
            <span class="menu-text">Global Setting</span>
            <b class="arrow fa fa-angle-down"></b>
        </a>
        <b class="arrow"></b>

        <ul class="submenu">
            <!-- group info -->
            @if(hasAnyPermission(["groups.index", "company.infos.index", "id.card.settings.index"], $slugs))
                <li class="{{ request()->segment(1) == 'group' || request()->segment(1) == 'company' || request()->is('id-card-setting*') ? 'open' : '' }}">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Organization  Info
                        <b class="arrow fa fa-angle-down"></b>
                    </a>
                    <b class="arrow"></b>

                    <ul class="submenu">
                        @if (hasPermission("groups.index", $slugs))
                            <li class="{{ request()->is('group') ? 'active' : '' }}">
{{--                                <a href="{{ route('group.index') }}">--}}
                                <a href="{{ route('company.edit',  1) }}">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Organization Settings
                                </a>
                                <b class="arrow"></b>
                            </li>
                        @endif

                        <!-- company -->
{{--                        @if (hasPermission("company.infos.index", $slugs))--}}
{{--                            <li class="{{ request()->segment(1) == 'company' ? 'open' : '' }}">--}}
{{--                                <a href="#" class="dropdown-toggle">--}}
{{--                                    <i class="menu-icon fa fa-caret-right"></i>--}}
{{--                                    Company Info--}}
{{--                                    <b class="arrow fa fa-angle-down"></b>--}}
{{--                                </a>--}}
{{--                                <b class="arrow"></b>--}}

{{--                                <ul class="submenu">--}}
{{--                                    @if (hasPermission('company.infos.create', $slugs))--}}
{{--                                        <li class="{{ request()->is('company/create') ? 'active' : '' }}">--}}
{{--                                            <a href="{{ route('company.create') }}">--}}
{{--                                                <i class="menu-icon fa fa-caret-right"></i>--}}
{{--                                                Add Company--}}
{{--                                            </a>--}}
{{--                                            <b class="arrow"></b>--}}
{{--                                        </li>--}}
{{--                                    @endif--}}

{{--                                    @if (hasPermission("company.infos.view", $slugs))--}}
{{--                                        <li class="{{ request()->is('company') ? 'active' : '' }}">--}}
{{--                                            <a href="{{ route('company.index') }}">--}}
{{--                                                <i class="menu-icon fa fa-caret-right"></i>--}}
{{--                                                Company List--}}
{{--                                            </a>--}}
{{--                                            <b class="arrow"></b>--}}
{{--                                        </li>--}}
{{--                                    @endif--}}
{{--                                </ul>--}}
{{--                            </li>--}}
{{--                        @endif--}}
                    </ul>
                </li>
            @endif


            <!-- supplier -->
{{--            @if (hasPermission("suppliers.index", $slugs))--}}

{{--                <li class="{{ request()->is('global-setting/supplie*') ? 'open' : '' }}">--}}
{{--                    <a href="#" class="dropdown-toggle">--}}
{{--                        <i class="menu-icon fa fa-caret-right"></i>--}}
{{--                        Suppliers--}}
{{--                        <b class="arrow fa fa-angle-down"></b>--}}
{{--                    </a>--}}
{{--                    <b class="arrow"></b>--}}

{{--                    <ul class="submenu">--}}
{{--                        @if(hasPermission('supplier.types.index', $slugs))--}}
{{--                            <li class="{{ request()->segment(2) == 'supplier-types' ? 'active' : '' }}">--}}
{{--                                <a href="{{ route('supplier-types.index') }}">--}}
{{--                                    <i class="menu-icon fa fa-caret-right"></i>--}}
{{--                                    Supplier Type--}}
{{--                                </a>--}}
{{--                                <b class="arrow"></b>--}}
{{--                            </li>--}}
{{--                        @endif--}}

{{--                        <li class="{{ request()->is('global-setting/suppliers/create') ? 'active' : '' }}">--}}
{{--                            <a href="{{ route('suppliers.create') }}">--}}
{{--                                <i class="menu-icon fa fa-caret-right"></i>--}}
{{--                                Add New--}}
{{--                            </a>--}}
{{--                            <b class="arrow"></b>--}}
{{--                        </li>--}}

{{--                        <li class="{{ request()->segment(2) == 'suppliers' && request()->segment(3) != 'create' ? 'active' : '' }}">--}}
{{--                            <a href="{{ route('suppliers.index') }}">--}}
{{--                                <i class="menu-icon fa fa-caret-right"></i>--}}
{{--                                Supplier List--}}
{{--                            </a>--}}
{{--                            <b class="arrow"></b>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </li>--}}
{{--            @endif--}}
        </ul>
    </li>
@endif
