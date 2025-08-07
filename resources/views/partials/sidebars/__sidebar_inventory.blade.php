
@if(hasModulePermission('Inventory', $active_modules) && hasAnyPermission([
    'arp.index', 'dyeing.orders.index', 'subcontract.work.orders.index', 'knit.yarn.orders.index', 'woven.fabric.orders.index',

    'arp.good.receives.index', 'arp.reports.index',
    'yarn.good.receives.index', 'yarn.reports.ledger', 'yarn.reports.stock-in-hand',
    'subcontract.good.receives.index',
    'knit.yarn.good.receives.index', 'knit.yarn.reports.ledger', 'knit.yarn.reports.stock-in-hand',
    'woven.fabric.good.receives.index', 'woven.fabric.good.receives.ledger'
    ], $slugs))

    <li class="{{ request()->segment(2) == "inventories" ? 'open' : '' }}">
        <a href="#" class="dropdown-toggle">
            <i class="menu-icon fa fa-tags"></i>
            <span class="menu-text"> Inventory </span>
            <b class="arrow fa fa-angle-down"></b>
        </a>
        <b class="arrow"></b>
        <ul class="submenu">

            <!-- Supplier PI Sub Module -->
            @if(hasAnyPermission(['supplier.pis.index'], $slugs))
                <li class="{{ request()->is("garments/inventories/supplier-pi-list") || request()->is('garments/inventories/work-orders/create') ? 'open' : '' }}">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Supplier PI
                        <b class="arrow fa fa-angle-down"></b>
                    </a>
                    <b class="arrow"></b>
                    <ul class="submenu">
                        @if(hasAnyPermission(['supplier.pis.create'], $slugs))
                            <li class="{{ request()->is('garments/inventories/work-orders/create') ? 'active' : '' }}">
                                <a href="{{ route('work-orders.create') }}?create_mode=Create_PI">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Create PI
                                </a>
                                <b class="arrow"></b>
                            </li>
                        @endif

                        @if(hasAnyPermission(['supplier.pis.index'], $slugs))
                            <li class="{{ request()->is('garments/inventories/supplier-pi-list') ? 'active' : '' }}">
                                <a href="{{ route('supplier.pi.list') }}">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    PI List
                                </a>
                                <b class="arrow"></b>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif




            <!-- WORK ORDER Sub Module -->
            @if(hasAnyPermission(['arp.index', 'dyeing.orders.index', 'subcontract.work.orders.index', 'knit.yarn.orders.index', 'woven.fabric.orders.index'], $slugs))
            <li class="{{ in_array(request()->segment(3), ['arps', 'sweater-yarn-work-order', 'subcontract-work-orders', 'knit-yarn-work-orders', 'woven-fabric-work-orders']) ? 'open' : '' }}">

                <a href="#" class="dropdown-toggle">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Work Order
                    <b class="arrow fa fa-angle-down"></b>
                </a>
                <b class="arrow"></b>
                <ul class="submenu">

                    <!-- ARP (Accessories) -->
                    @if(hasAnyPermission(['arp.index'], $slugs))

                        <li  class="{{ request()->segment(3) == 'arps' ? 'open' : '' }}">
                            <a href="#" class="dropdown-toggle">
                                <i class="menu-icon fa fa-caret-right"></i>
                                ARP
                                <b class="arrow fa fa-angle-down"></b>
                            </a>
                            <b class="arrow"></b>

                            <ul class="submenu">
                                @if(hasAnyPermission(['arp.create'], $slugs))
                                    <li class="{{ request()->is('garments/inventories/arps/create') ? 'active' : '' }}">
                                        <a href="{{ route('arps.create') }}">
                                            <i class="menu-icon fa fa-caret-right"></i>
                                            Create ARP
                                        </a>
                                        <b class="arrow"></b>
                                    </li>
                                @endif
                                @if(hasAnyPermission(['arp.index'], $slugs))
                                    <li class="{{ request()->is('garments/inventories/arps') ? 'active' : '' }}">
                                        <a href="{{ route('arps.index') }}">
                                            <i class="menu-icon fa fa-caret-right"></i>
                                            ARP List
                                        </a>
                                        <b class="arrow"></b>
                                    </li>
                                @endif

                            </ul>
                        </li>

                    @endif


                    <!-- Sweater Yarn -->
                    @if(hasAnyPermission(['dyeing.orders.index'], $slugs))

                        <li  class="{{ request()->is('garments/inventories/sweater-yarn-work-order*') ? 'open' : '' }}">
                            <a href="#" class="dropdown-toggle">
                                <i class="menu-icon fa fa-caret-right"></i>
                                D.O
                                <b class="arrow fa fa-angle-down"></b>
                            </a>
                            <b class="arrow"></b>

                            <ul class="submenu">
                                @if(hasAnyPermission(['dyeing.orders.create'], $slugs))
                                    <li class="{{ request()->is('garments/inventories/sweater-yarn-work-order/create') ? 'active' : '' }}" title="Create Sweater Yarn Work Order">
                                        <a href="{{ route('sweater-yarn-work-order.create') }}">
                                            <i class="menu-icon fa fa-caret-right"></i>
                                            Create D.O
                                        </a>
                                        <b class="arrow"></b>
                                    </li>
                                @endif

                                @if(hasAnyPermission(['dyeing.orders.index'], $slugs))
                                    <li class="{{ request()->is('garments/inventories/sweater-yarn-work-order') ? 'active' : '' }}">
                                        <a href="{{ route('sweater-yarn-work-order.index') }}">
                                            <i class="menu-icon fa fa-caret-right"></i>
                                            D.O List
                                        </a>
                                        <b class="arrow"></b>
                                    </li>
                                @endif
                            </ul>
                        </li>
                    @endif



                    <!-- Subcontract Work Order -->
                    @if(hasAnyPermission(['subcontract.work.orders.index'], $slugs))

                        <li  class="{{ request()->is('garments/inventories/subcontract-work-order*') ? 'open' : '' }}">
                            <a href="#" class="dropdown-toggle">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Subcontract
                                <b class="arrow fa fa-angle-down"></b>
                            </a>
                            <b class="arrow"></b>

                            <ul class="submenu">
                                @if(hasAnyPermission(['subcontract.work.orders.create'], $slugs))
                                    <li class="{{ request()->is('garments/inventories/subcontract-work-orders/create') ? 'active' : '' }}" title="Subcontract Create">
                                        <a href="{{ route('subcontract-work-orders.create') }}">
                                            <i class="menu-icon fa fa-caret-right"></i>
                                            S. Create
                                        </a>
                                        <b class="arrow"></b>
                                    </li>
                                @endif

                                @if(hasAnyPermission(['subcontract.work.orders.index'], $slugs))
                                    <li class="{{ request()->is('garments/inventories/subcontract-work-orders') ? 'active' : '' }}" title="Subcontract List">
                                        <a href="{{ route('subcontract-work-orders.index') }}">
                                            <i class="menu-icon fa fa-caret-right"></i>
                                            S. List
                                        </a>
                                        <b class="arrow"></b>
                                    </li>
                                @endif
                            </ul>
                        </li>
                    @endif

                    <!-- Knit Yarn Work Order -->
                    @if(hasAnyPermission(['knit.yarn.orders.index', 'knit.yarn.orders.create'], $slugs))

                        <li  class="{{ request()->is('garments/inventories/knit-yarn-work-order*') ? 'open' : '' }}">
                            <a href="#" class="dropdown-toggle">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Knit Yarn
                                <b class="arrow fa fa-angle-down"></b>
                            </a>
                            <b class="arrow"></b>

                            <ul class="submenu">
                                @if(hasPermission('knit.yarn.orders.create', $slugs))
                                    <li class="{{ request()->is('garments/inventories/knit-yarn-work-orders/create') ? 'active' : '' }}" title="Knit Yarn Create">
                                        <a href="{{ route('knit-yarn-work-orders.create') }}">
                                            <i class="menu-icon fa fa-caret-right"></i>
                                            K.Y Create
                                        </a>
                                        <b class="arrow"></b>
                                    </li>
                                @endif

                                @if(hasPermission('knit.yarn.orders.index', $slugs))
                                    <li class="{{ request()->is('garments/inventories/knit-yarn-work-orders') ? 'active' : '' }}" title="Knit Yarn List">
                                        <a href="{{ route('knit-yarn-work-orders.index') }}">
                                            <i class="menu-icon fa fa-caret-right"></i>
                                            K.Y List
                                        </a>
                                        <b class="arrow"></b>
                                    </li>
                                @endif
                            </ul>
                        </li>
                    @endif

                    <!-- Woven Fabric Work Order -->
                    @if(hasAnyPermission(['woven.fabric.orders.index', 'woven.fabric.orders.create'], $slugs))

                        <li  class="{{ request()->is('garments/inventories/woven-fabric-work-order*') ? 'open' : '' }}">
                            <a href="#" class="dropdown-toggle">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Woven Fabric
                                <b class="arrow fa fa-angle-down"></b>
                            </a>
                            <b class="arrow"></b>

                            <ul class="submenu">
                                @if(hasPermission('woven.fabric.orders.create', $slugs))
                                    <li class="{{ request()->is('garments/inventories/woven-fabric-work-orders/create', 'inventory/woven-fabric-work-order-do-creat*') ? 'active' : '' }}" title="Woven Fabric W/O Create">
                                        <a href="{{ route('woven-fabric-work-orders.create') }}">
                                            <i class="menu-icon fa fa-caret-right"></i>
                                            W/O Create
                                        </a>
                                        <b class="arrow"></b>
                                    </li>
                                @endif

                                @if(hasPermission('woven.fabric.orders.index', $slugs))
                                    <li class="{{ request()->is('garments/inventories/woven-fabric-work-order*') && !request()->is('garments/inventories/woven-fabric-work-orders/create', 'inventory/woven-fabric-work-order-do-creat*') ? 'active' : '' }}" title="Woven Fabric W/O List">
                                        <a href="{{ route('woven-fabric-work-orders.index') }}">
                                            <i class="menu-icon fa fa-caret-right"></i>
                                            W/O List
                                        </a>
                                        <b class="arrow"></b>
                                    </li>
                                @endif
                            </ul>
                        </li>
                    @endif
                </ul>
            </li>
            @endif




            <!-- GRN -->
            @if(hasAnyPermission([
                    'arp.good.receives.index', 'arp.reports.index',
                    'yarn.good.receives.index', 'yarn.reports.ledger', 'yarn.reports.stock-in-hand',
                    'subcontract.good.receives.index',
                    'knit.yarn.good.receives.index', 'knit.yarn.reports.ledger', 'knit.yarn.reports.stock-in-hand',
                    'woven.fabric.good.receives.index'
                ], $slugs))

                <li class="{{ request()->segment(3) == "grn" ? 'open' : '' }}">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-caret-right"></i>
                        GRN
                        <b class="arrow fa fa-angle-down"></b>
                    </a>
                    <b class="arrow"></b>
                    <ul class="submenu">

                        <!-- ARP -->
                        @if(hasAnyPermission(['arp.good.receives.index', 'arp.reports.index'], $slugs))
                            <li class="{{ request()->is('garments/inventories/grn/goods-receive/create') || request()->is('garments/inventories/grn/goods-receive')
                                        || request()->is('garments/inventories/grn/goods-issue/create') || request()->is('garments/inventories/grn/goods-issue')
                                        || request()->is('garments/inventories/grn/item-ledger') || request()->is('garments/inventories/grn/item-stock-in-hand') ? 'open' : '' }}">

                                <a href="#" class="dropdown-toggle">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    ARP
                                    <b class="arrow fa fa-angle-down"></b>
                                </a>
                                <b class="arrow"></b>
                                <ul class="submenu">
                                    @if(hasAnyPermission(['arp.good.receives.create'], $slugs))
                                        <li class="{{ request()->is('garments/inventories/grn/goods-receive/create') ? 'active' : '' }}">
                                            <a href="{{ route('goods-receive.create') }}" title="Add ARP GRN">
                                                <i class="menu-icon fa fa-caret-right"></i>
                                                Add ARP GRN
                                            </a>
                                            <b class="arrow"></b>
                                        </li>
                                    @endif

                                    @if(hasAnyPermission(['arp.good.receives.index'], $slugs))
                                        <li class="{{ request()->is('garments/inventories/grn/goods-receive') ? 'active' : '' }}">
                                            <a href="{{ route('goods-receive.index') }}" title="ARP GRN List">
                                                <i class="menu-icon fa fa-caret-right"></i>
                                                ARP GRN List
                                            </a>
                                            <b class="arrow"></b>
                                        </li>
                                    @endif

                                    @if(hasAnyPermission(['arp.good.issues.create'], $slugs))
                                        <li class="{{ request()->is('garments/inventories/grn/goods-issue/create') ? 'active' : '' }}">
                                            <a href="{{ route('goods-issue.create') }}" title="ARP GRN Issue">
                                                <i class="menu-icon fa fa-caret-right"></i>
                                                ARP Requisition
                                            </a>
                                            <b class="arrow"></b>
                                        </li>
                                    @endif

                                    @if(hasAnyPermission(['arp.good.issues.index'], $slugs))
                                        <li class="{{ request()->is('garments/inventories/grn/goods-issue') ? 'active' : '' }}">
                                            <a href="{{ route('goods-issue.index') }}" title="ARP GRN Issue List">
                                                <i class="menu-icon fa fa-caret-right"></i>
                                                ARP Issue List
                                            </a>
                                            <b class="arrow"></b>
                                        </li>
                                    @endif

                                    @if(hasAnyPermission(['arp.reports.index'], $slugs))
                                        <li class="{{ request()->is('garments/inventories/grn/item-ledger') || request()->is('garments/inventories/grn/item-stock-in-hand') ? 'open' : '' }}">
                                            <a href="#" class="dropdown-toggle">
                                                <i class="menu-icon fa fa-caret-right"></i>
                                                Reports
                                                <b class="arrow fa fa-angle-down"></b>
                                            </a>
                                            <b class="arrow"></b>

                                            <ul class="submenu">
                                                @if(hasAnyPermission(['arp.reports.item.ledger'], $slugs))
                                                    <li class="{{ request()->is('garments/inventories/grn/item-ledger') ? 'active' : '' }}">
                                                        <a href="{{ route('grn.item-ledger') }}" title="Item Ledger">
                                                            <i class="menu-icon fa fa-caret-right"></i>
                                                            Item Ledger
                                                        </a>
                                                        <b class="arrow"></b>
                                                    </li>
                                                @endif

                                                @if(hasAnyPermission(['arp.reports.item.stock'], $slugs))
                                                    <li class="{{ request()->is('garments/inventories/grn/item-stock-in-hand') ? 'active' : '' }}">
                                                        <a href="{{ route('grn.item-stock') }}" title="Item Ledger">
                                                            <i class="menu-icon fa fa-caret-right"></i>
                                                            Item Stock
                                                        </a>
                                                        <b class="arrow"></b>
                                                    </li>
                                                @endif
                                            </ul>
                                        </li>
                                    @endif
                                </ul>
                            </li>
                        @endif


                        <!-- SWEATER YARN -->
                        @if(hasAnyPermission(['yarn.good.receives.index', 'yarn.reports.ledger', 'yarn.reports.stock-in-hand',], $slugs))
                            <li class="{{ request()->segment(4) == "sweater-yarn" ? 'open' : '' }}">
                                <a href="#" class="dropdown-toggle">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Sweater Yarn
                                    <b class="arrow fa fa-angle-down"></b>
                                </a>
                                <b class="arrow"></b>

                                <ul class="submenu">
                                    @if(hasAnyPermission(['yarn.good.receives.create'], $slugs))
                                        <li class="{{ request()->is('garments/inventories/grn/sweater-yarn/goods-receive/create') ? 'active' : '' }}">
                                            <a href="{{ route('sweater-yarn-goods-receive.create') }}" title="Add Sweater Yarn GRN">
                                                <i class="menu-icon fa fa-caret-right"></i>
                                                GRN Create
                                            </a>
                                            <b class="arrow"></b>
                                        </li>
                                    @endif

                                    @if(hasAnyPermission(['yarn.good.receives.index'], $slugs))
                                        <li class="{{ request()->is('garments/inventories/grn/sweater-yarn/goods-receive') ? 'active' : '' }}">
                                            <a href="{{ route('sweater-yarn-goods-receive.index') }}" title="Sweater Yarn GRN List">
                                                <i class="menu-icon fa fa-caret-right"></i>
                                                GRN List
                                            </a>
                                            <b class="arrow"></b>
                                        </li>
                                    @endif

                                    @if(hasAnyPermission(['yarn.good.issues.create'], $slugs))
                                        <li class="{{ request()->is('garments/inventories/grn/sweater-yarn/goods-requisiti*') ? 'active' : '' }}">
                                            <a href="{{ route('sweater-yarn-goods-requisitions.create') }}" title="Sweater Yarn Requisition">
                                                <i class="menu-icon fa fa-caret-right"></i>
                                                Requisition
                                            </a>
                                            <b class="arrow"></b>
                                        </li>
                                    @endif

                                    @if(hasAnyPermission(['yarn.good.issues.index'], $slugs))
                                        <li class="{{ request()->is('garments/inventories/grn/sweater-yarn/goods-issue*') ? 'active' : '' }}">
                                            <a href="{{ route('sweater-yarn-goods-issues.index') }}" title="sweater Yarn Goods Issue List">
                                                <i class="menu-icon fa fa-caret-right"></i>
                                                Issue List
                                            </a>
                                            <b class="arrow"></b>
                                        </li>
                                    @endif

                                    @if(hasAnyPermission(['yarn.reports.ledger', 'yarn.reports.stock-in-hand'], $slugs))
                                        <li class="{{ request()->is('garments/inventories/grn/sweater-yarn/item-stock-in-hand') || request()->is('garments/inventories/grn/sweater-yarn/item-ledger') ? 'open' : '' }}">
                                            <a href="#" class="dropdown-toggle">
                                                <i class="menu-icon fa fa-caret-right"></i>
                                                Reports
                                                <b class="arrow fa fa-angle-down"></b>
                                            </a>
                                            <b class="arrow"></b>

                                            <ul class="submenu">
                                                @if(hasAnyPermission(['yarn.reports.ledger'], $slugs))
                                                    <li class="{{ request()->is('garments/inventories/grn/sweater-yarn/item-ledger') ? 'active' : '' }}">
                                                        <a href="{{ route('sweater-yarn-item-ledger') }}" title="Item Ledger">
                                                            <i class="menu-icon fa fa-caret-right"></i>
                                                            Item Ledger
                                                        </a>
                                                        <b class="arrow"></b>
                                                    </li>
                                                @endif

                                                @if(hasAnyPermission(['yarn.reports.stock-in-hand'], $slugs))
                                                    <li class="{{ request()->is('garments/inventories/grn/sweater-yarn/item-stock-in-hand') ? 'active' : '' }}">
                                                        <a href="{{ route('sweater-yarn-item-stock') }}" title="Item Stock">
                                                            <i class="menu-icon fa fa-caret-right"></i>
                                                            Item Stock
                                                        </a>
                                                        <b class="arrow"></b>
                                                    </li>
                                                @endif
                                            </ul>
                                        </li>
                                    @endif
                                </ul>
                            </li>
                        @endif

                        <!-- SUBCONTRACT -->
                        @if(hasAnyPermission(['subcontract.good.receives.index'], $slugs))
                            <li class="{{ request()->segment(4) == "subcontract" ? 'open' : '' }}">
                                <a href="#" class="dropdown-toggle">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Subcontract
                                    <b class="arrow fa fa-angle-down"></b>
                                </a>
                                <b class="arrow"></b>

                                <ul class="submenu">
                                    @if(hasAnyPermission(['subcontract.good.receives.create'], $slugs))
                                        <li class="{{ request()->is('garments/inventories/grn/subcontract/goods-receive/create') ? 'active' : '' }}">
                                            <a href="{{ route('subcontract-goods-receive.create') }}" title="Add Subcontract GRN">
                                                <i class="menu-icon fa fa-caret-right"></i>
                                                GRN Create
                                            </a>
                                            <b class="arrow"></b>
                                        </li>
                                    @endif

                                    @if(hasAnyPermission(['subcontract.good.receives.index'], $slugs))
                                        <li class="{{ request()->is('garments/inventories/grn/subcontract/goods-receive') ? 'active' : '' }}">
                                            <a href="{{ route('subcontract-goods-receive.index') }}" title="Subcontract GRN List">
                                                <i class="menu-icon fa fa-caret-right"></i>
                                                GRN List
                                            </a>
                                            <b class="arrow"></b>
                                        </li>
                                    @endif

                                </ul>
                            </li>
                        @endif

                        <!-- KNIT YARN -->
                        @if(hasAnyPermission(['knit.yarn.good.receives.index', 'knit.yarn.good.receives.create', 'knit.yarn.reports.ledger', 'knit.yarn.reports.stock-in-hand', 'knit.yarn.transfers.create', 'knit.yarn.transfers.index'], $slugs))
                            <li class="{{ request()->segment(4) == "knit-yarn" ? 'open' : '' }}">
                                <a href="#" class="dropdown-toggle">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Knit Yarn
                                    <b class="arrow fa fa-angle-down"></b>
                                </a>
                                <b class="arrow"></b>

                                <ul class="submenu">
                                    @if(hasAnyPermission(['knit.yarn.good.receives.create'], $slugs))
                                        <li class="{{ request()->is('garments/inventories/grn/knit-yarn/goods-receive/create') ? 'active' : '' }}">
                                            <a href="{{ route('knit-yarn-goods-receive.create') }}" title="Add Knit Yarn GRN">
                                                <i class="menu-icon fa fa-caret-right"></i>
                                                GRN Create
                                            </a>
                                            <b class="arrow"></b>
                                        </li>
                                    @endif

                                    @if(hasAnyPermission(['knit.yarn.good.receives.index'], $slugs))
                                        <li class="{{ request()->is('garments/inventories/grn/knit-yarn/goods-receive') ? 'active' : '' }}">
                                            <a href="{{ route('knit-yarn-goods-receive.index') }}" title="Knit Yarn GRN List">
                                                <i class="menu-icon fa fa-caret-right"></i>
                                                GRN List
                                            </a>
                                            <b class="arrow"></b>
                                        </li>
                                    @endif

                                    @if(hasAnyPermission(['knit.yarn.reports.ledger', 'knit.yarn.reports.stock-in-hand'], $slugs))
                                        <li class="{{ request()->is('garments/inventories/grn/knit-yarn/item-ledger') || request()->is('garments/inventories/grn/knit-yarn/item-stock-in-hand') ? 'open' : '' }}">
                                            <a href="#" class="dropdown-toggle">
                                                <i class="menu-icon fa fa-caret-right"></i>
                                                Reports
                                                <b class="arrow fa fa-angle-down"></b>
                                            </a>
                                            <b class="arrow"></b>

                                            <ul class="submenu">
                                                @if(hasAnyPermission(['knit.yarn.reports.ledger'], $slugs))
                                                    <li class="{{ request()->is('garments/inventories/grn/knit-yarn/item-ledger') ? 'active' : '' }}">
                                                        <a href="{{ route('knit-yarn-item-ledger') }}" title="Item Ledger">
                                                            <i class="menu-icon fa fa-caret-right"></i>
                                                            Item Ledger
                                                        </a>
                                                        <b class="arrow"></b>
                                                    </li>
                                                @endif

                                                @if(hasAnyPermission(['knit.yarn.reports.stock-in-hand'], $slugs))
                                                    <li class="{{ request()->is('garments/inventories/grn/knit-yarn/item-stock-in-hand') ? 'active' : '' }}">
                                                        <a href="{{ route('knit-yarn-item-stock') }}" title="Item Stock">
                                                            <i class="menu-icon fa fa-caret-right"></i>
                                                            Item Stock
                                                        </a>
                                                        <b class="arrow"></b>
                                                    </li>
                                                @endif
                                            </ul>
                                        </li>
                                    @endif
                                </ul>
                            </li>
                        @endif

                        <!-- WOVEN FABRIC -->
                        @if(hasAnyPermission(['woven.fabric.good.receives.index', 'woven.fabric.reports.index'], $slugs))
                            <li class="{{ request()->segment(4) == "woven-fabric" ? 'open' : '' }}">
                                <a href="#" class="dropdown-toggle">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Woven Fabric
                                    <b class="arrow fa fa-angle-down"></b>
                                </a>
                                <b class="arrow"></b>

                                <ul class="submenu">
                                    @if(hasAnyPermission(['woven.fabric.good.receives.create'], $slugs))
                                        <li class="{{ request()->is('garments/inventories/grn/woven-fabric/goods-receives/create') ? 'active' : '' }}">
                                            <a href="{{ route('woven-fabric.goods-receives.create') }}" title="Add Woven Fabric GRN">
                                                <i class="menu-icon fa fa-caret-right"></i>
                                                GRN Create
                                            </a>
                                            <b class="arrow"></b>
                                        </li>
                                    @endif

                                    @if(hasAnyPermission(['woven.fabric.good.receives.index'], $slugs))
                                        <li class="{{ !request()->is('garments/inventories/grn/woven-fabric/goods-receives/create') && request()->is('garments/inventories/grn/woven-fabric/goods-receive*') ? 'active' : '' }}">
                                            <a href="{{ route('woven-fabric.goods-receives.index') }}" title="Woven Fabric GRN List">
                                                <i class="menu-icon fa fa-caret-right"></i>
                                                GRN List
                                            </a>
                                            <b class="arrow"></b>
                                        </li>
                                    @endif

                                    @if(hasAnyPermission(['woven.fabric.good.issues.create'], $slugs))
                                        <li class="{{ request()->is('garments/inventories/grn/woven-fabric/goods-issues/create') ? 'active' : '' }}">
                                            <a href="{{ route('woven-fabric.goods-issues.create') }}" title="Woven Fabric Requisition">
                                                <i class="menu-icon fa fa-caret-right"></i>
                                                Requisition
                                            </a>
                                            <b class="arrow"></b>
                                        </li>
                                    @endif

                                    @if(hasAnyPermission(['woven.fabric.good.issues.index'], $slugs))
                                        <li class="{{ !request()->is('garments/inventories/grn/woven-fabric/goods-issues/create') && request()->is('garments/inventories/grn/woven-fabric/goods-issue*') ? 'active' : '' }}">
                                            <a href="{{ route('woven-fabric.goods-issues.index') }}" title="Woven Fabric Goods Issue List">
                                                <i class="menu-icon fa fa-caret-right"></i>
                                                Issue List
                                            </a>
                                            <b class="arrow"></b>
                                        </li>
                                    @endif

                                    @if(hasAnyPermission(['woven.fabric.reports.ledger', 'woven.fabric.reports.stock-in-hand'], $slugs))
                                        <li class="{{ request()->is('garments/inventories/grn/woven-fabric/item-ledger','inventory/grn/woven-fabric/item-stock-in-hand') ? 'open' : '' }}">
                                            <a href="#" class="dropdown-toggle">
                                                <i class="menu-icon fa fa-caret-right"></i>
                                                Reports
                                                <b class="arrow fa fa-angle-down"></b>
                                            </a>
                                            <b class="arrow"></b>

                                            <ul class="submenu">
                                                @if(hasAnyPermission(['woven.fabric.reports.ledger'], $slugs))
                                                    <li class="{{ request()->is('garments/inventories/grn/woven-fabric/item-ledger') ? 'active' : '' }}">
                                                        <a href="{{ route('woven-fabric.item-ledger') }}" title="Item Ledger">
                                                            <i class="menu-icon fa fa-caret-right"></i>
                                                            Item Ledger
                                                        </a>
                                                        <b class="arrow"></b>
                                                    </li>
                                                @endif

                                                @if(hasAnyPermission(['woven.fabric.reports.stock-in-hand'], $slugs))
                                                    <li class="{{ request()->is('garments/inventories/grn/woven-fabric/item-stock-in-hand') ? 'active' : '' }}">
                                                        <a href="{{ route('woven-fabric.item-stock') }}" title="Item Stock">
                                                            <i class="menu-icon fa fa-caret-right"></i>
                                                            Item Stock
                                                        </a>
                                                        <b class="arrow"></b>
                                                    </li>
                                                @endif
                                            </ul>
                                        </li>
                                    @endif
                                </ul>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif
        </ul>
    </li>
@endif
