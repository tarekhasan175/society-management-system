
@if (hasModulePermission('Merchandising', $active_modules) && hasAnyPermission([
    'item.units.index', 'seasons.index', 'buyers.index', 'yarns.index',
    'ggs.index', 'gsms.index', 'fabric.compositions.index', 'fabric.constructions.index',
    'document.types.index', 'trim.types.index', 'trim.details.index', 'fright.modes.index', 'sample.types.index', 'couriers.index',

    'orders.create', 'orders.view', 'costings.view',

    'order.details.index', 'monthly.summaries.index', 'order.summaries.index', 'sid.remaining.balances.index',

    'sales.ids.create', 'sales.ids.index',

    'pis.index', 'payments.index', 'remarks.index',

    'sample.dispatches.index'
    ], $slugs))


    <li class="{{ request()->is('garments/merchandising*') ? 'open' : '' }}">
        <a href="#" class="dropdown-toggle">
            <i class="menu-icon fa fa-laptop"></i>
            <span class="menu-text"> Merchandising </span>
            <b class="arrow fa fa-angle-down"></b>
        </a>
        <b class="arrow"></b>

        <ul class="submenu">

            @if(hasAnyPermission(['item.units.index', 'seasons.index', 'buyers.index', 'yarns.index',
            'ggs.index', 'gsms.index', 'fabric.compositions.index', 'fabric.constructions.index',
            'document.types.index', 'trim.types.index', 'trim.details.index', 'fright.modes.index', 'sample.types.index', 'couriers.index'
            ], $slugs))

                <li class="{{ request()->segment(3) == 'm-setups' ? 'open' : '' }}">



                    <a href="#" class="dropdown-toggle" title="Merchandising Setup">
                        <i class="menu-icon fa fa-caret-right"></i>
                        M. Setup
                        <b class="arrow fa fa-angle-down"></b>
                    </a>
                    <b class="arrow"></b>
                    <ul class="submenu">


                        <!-- item unit -->
                        @if (hasPermission("item.units.index", $slugs))
                            <li class="{{ request()->segment(4) == 'garments-item-units' ? 'active' : '' }}">
                                <a href="{{ route('garments-item-units.index') }}">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Item Unit
                                </a>
                            </li>
                        @endif


                        <!-- Season -->
                        @if (hasPermission("seasons.index", $slugs))
                            <li class="{{ request()->segment(4) == 'seasons' ? 'active' : '' }}">
                                <a href="{{ route('seasons.index') }}">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Season
                                </a>
                                <b class="arrow"></b>
                            </li>
                        @endif



                        <!-- buyer -->
                        @if (hasPermission("buyers.index", $slugs))
                            <li class="{{ request()->segment(4) == 'buyers' || request()->segment(4) == 'teams' || request()->segment(4) == 'sizes' ? 'open' : '' }}">
                                <a href="#" class="dropdown-toggle">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Buyers
                                    <b class="arrow fa fa-angle-down"></b>
                                </a>
                                <b class="arrow"></b>

                                <ul class="submenu">
                                    @if (hasPermission("buyers.create", $slugs))
                                        <li class="{{ request()->is('garments/merchandisings/m-setups/buyers/create') ? 'active' : '' }}">
                                            <a href="{{ route('buyers.create') }}">
                                                <i class="menu-icon fa fa-caret-right"></i>
                                                Create Buyer
                                            </a>
                                            <b class="arrow"></b>
                                        </li>
                                    @endif
                                    
                                    <li class="{{ request()->is('garments/merchandisings/m-setups/buyers') ? 'active' : '' }}">
                                        <a href="{{ route('buyers.index') }}">
                                            <i class="menu-icon fa fa-caret-right"></i>
                                            Buyer List
                                        </a>
                                        <b class="arrow"></b>
                                    </li>

                                    <!-- Team -->
                                    @if (hasPermission("teams.index", $slugs))
                                    <li class="{{ request()->is('garments/merchandisings/m-setups/teams') ? 'active' : '' }}">
                                            <a href="{{ route('teams.index') }}">
                                                <i class="menu-icon fa fa-caret-right"></i>
                                                Teams
                                            </a>
                                            <b class="arrow"></b>
                                        </li>
                                    @endif

                                    <!-- sizes -->
                                    @if (hasPermission("sizes.index", $slugs))
                                        <li class="{{ request()->is('garments/merchandisings/m-setups/sizes') ? 'active' : '' }}">
                                            <a href="{{ route('sizes.index') }}">
                                                <i class="menu-icon fa fa-caret-right"></i>
                                                Sizes
                                            </a>
                                            <b class="arrow"></b>
                                        </li>
                                    @endif

                                </ul>
                            </li>
                        @endif



                        <!-- yarns -->
                        @if (hasPermission("yarns.index", $slugs))
                            <li class="{{ request()->segment(4) == 'yarns' ? 'active' : '' }}">
                                <a href="#" class="dropdown-toggle">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Yarns
                                    <b class="arrow fa fa-angle-down"></b>
                                </a>
                                <b class="arrow"></b>

                                <ul class="submenu">
                                    @if (in_array("yarns.create", $slugs) || auth()->id() == 1)
                                        <li class="{{ request()->is('garments/merchandisings/m-setups/yarns/create') ? 'active' : '' }}">
                                            <a href="{{ route('yarns.create') }}">
                                                <i class="menu-icon fa fa-caret-right"></i>
                                                Yarn
                                            </a>
                                            <b class="arrow"></b>
                                        </li>
                                    @endif

                                    <li class="{{ request()->is('garments/merchandisings/m-setups/yarns') ? 'active' : '' }}">
                                        <a href="{{ route('yarns.index') }}">
                                            <i class="menu-icon fa fa-caret-right"></i>
                                            Yarn List
                                        </a>
                                        <b class="arrow"></b>
                                    </li>
                                </ul>
                            </li>
                        @endif




                        <!-- Job Type -->
                        @if (hasPermission('job.types.index', $slugs))
                            <li class="{{ request()->is('garments/merchandisings/m-setups/job-type*') ? 'active' : '' }}">
                                <a href="{{ route('job-types.index') }}">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Job Type
                                </a>
                                <b class="arrow"></b>
                            </li>
                        @endif


                        <!-- GG -->
                        @if (hasPermission('ggs.index', $slugs))
                            <li class="{{ request()->is('garments/merchandisings/m-setups/gg') ? 'active' : '' }}">
                                <a href="{{ route('gg.index') }}">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    GG
                                </a>
                                <b class="arrow"></b>
                            </li>
                        @endif


                        <!-- GSM -->
                        @if (hasPermission('gsms.index', $slugs))
                            <li class="{{ request()->is('garments/merchandisings/m-setups/gsm') ? 'active' : '' }}">
                                <a href="{{ route('gsm.index') }}">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    GSM
                                </a>
                                <b class="arrow"></b>
                            </li>
                        @endif


                        <!-- Fab.Composition -->
                        @if (hasPermission('fabric.compositions.index', $slugs))
                            <li class="{{ request()->is('garments/merchandisings/m-setups/fabric-composition') ? 'active' : '' }}">
                                <a href="{{ route('fabric-composition.index') }}" title="Fabric Composition">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Fab.Composition
                                </a>
                                <b class="arrow"></b>
                            </li>
                        @endif


                        <!-- Fab.Construction -->
                        @if (hasPermission('fabric.constructions.index', $slugs))
                            <li class="{{ request()->is('garments/merchandisings/m-setups/fabric-construction') ? 'active' : '' }}">
                                <a href="{{ route('fabric-construction.index') }}" title="Fabric Construction">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Fab.Construction
                                </a>
                                <b class="arrow"></b>
                            </li>
                        @endif


                        <!-- Document Type -->
                        @if (hasPermission('document.types.index', $slugs))
                            <li class="{{ request()->is('garments/merchandisings/m-setups/document-type') ? 'active' : '' }}">
                                <a href="{{ route('document-type.index') }}" title="Document Type">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Document Type
                                </a>
                                <b class="arrow"></b>
                            </li>
                        @endif


                        <!-- Trim -->
                        @if (hasPermission('trim.types.index', $slugs))
                        <li class="{{ request()->is('garments/merchandisings/m-setups/trim-type') ? 'active' : '' }}">
                                <a href="{{ route('trim-type.index') }}">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Trim Type
                                </a>
                                <b class="arrow"></b>
                            </li>
                        @endif

                        @if(hasAnyPermission(['trim.details.index'], $slugs))
                            <li class="{{ request()->is('garments/merchandisings/m-setups/trim-details') ? 'active' : '' }}">
                                <a href="{{ route('trim-details.index') }}">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Trim Details
                                </a>
                                <b class="arrow"></b>
                            </li>
                        @endif


                        <!-- Fright Mode -->
                        @if(hasAnyPermission(['fright.modes.index'], $slugs))
                            <li class="{{ request()->is('garments/merchandisings/m-setups/fright-mode') ? 'active' : '' }}">
                                <a href="{{ route('fright-mode.index') }}">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Fright Mode
                                </a>
                                <b class="arrow"></b>
                            </li>
                        @endif


                        <!-- Sample Type -->
                        @if(hasAnyPermission(['sample.types.index'], $slugs))
                            <li class="{{ request()->is('garments/merchandisings/m-setups/sample-type') ? 'active' : '' }}">
                                <a href="{{ route('sample-type.index') }}" title="Document Type">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Sample Type
                                </a>
                                <b class="arrow"></b>
                            </li>
                        @endif

                        <!-- Courier -->
                        @if (hasPermission('couriers.index', $slugs))
                            <li class="{{ request()->is('garments/merchandisings/m-setups/couriers') ? 'active' : '' }}">
                                <a href="{{ route('sample.dispatch.courier.index') }}">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Courier
                                </a>
                                <b class="arrow"></b>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif



            @if(hasAnyPermission(['orders.create', 'orders.view', 'costings.view'], $slugs))
                <li class="{{ request()->is('garments/merchandisings/orde*') ? 'open' : '' }}">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Order Details
                        <b class="arrow fa fa-angle-down"></b>
                    </a>
                    <b class="arrow"></b>


                    <ul class="submenu">

                        @if (hasPermission('orders.create', $slugs))

                            <li class="{{ request()->is('garments/merchandisings/order/create') ? 'active' : '' }}">
                                <a href="{{ route('order.create') }}">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Order Entry
                                </a>
                                <b class="arrow"></b>
                            </li>

                        @endif

                        @if (hasPermission('orders.view', $slugs))
                            <li class="{{ request()->is('garments/merchandisings/order') ? 'active' : '' }}">
                                <a href="{{ route('order.index') }}">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Order List
                                </a>
                                <b class="arrow"></b>
                            </li>

                        @endif

                        @if (hasPermission('orders.view', $slugs))
                            <li class="{{ request()->is('garments/merchandisings/order-ship-list') ? 'active' : '' }}">
                                <a href="{{ route('order.ship-list') }}">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Ship List
                                </a>
                                <b class="arrow"></b>
                            </li>

                        @endif

                        @if (hasPermission('orders.view', $slugs))
                            <li class="{{ request()->is('garments/merchandisings/order-cancel-list') ? 'active' : '' }}">
                                <a href="{{ route('order.cancel-list') }}">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Cancel List
                                </a>
                                <b class="arrow"></b>
                            </li>

                        @endif



                        @if (hasPermission('costings.view', $slugs))
                            <li class="{{ request()->is('garments/merchandisings/order-costing') ? 'active' : '' }}">
                                <a href="{{ route('order-costing.index') }}?order_type={{ \Module\Garments\Models\Merchandising\Order\OrderType::userOrderTypesId()->first() }}">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Costing List
                                </a>
                                <b class="arrow"></b>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif

            @if (hasPermission('shipment.budgets.index', $slugs))
                <li class="{{ request()->is('garments/merchandisings/monthly-order-budget*') ? 'open' : '' }}">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Monthly Budget
                        <b class="arrow fa fa-angle-down"></b>
                    </a>
                    <b class="arrow"></b>
                    <ul class="submenu">

                        @if (hasPermission('shipment.budgets.create', $slugs))
                            <li class="{{ request()->is('garments/merchandisings/monthly-order-budgets/create') ? 'active' : '' }}">
                                <a href="{{ route('monthly-order-budgets.create') }}" title="Monthly Budget Create">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Budget Create
                                </a>
                                <b class="arrow"></b>
                            </li>
                        @endif

                        @if (hasPermission('shipment.budgets.index', $slugs))
                            <li class="{{ request()->is('garments/merchandisings/monthly-order-budgets') ? 'active' : '' }}">
                                <a href="{{ route('monthly-order-budgets.index') }}" title="Monthly Budget List">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Budget List
                                </a>
                                <b class="arrow"></b>
                            </li>
                        @endif

                        @if (hasPermission('shipment.budgets.alert.setting', $slugs))
                            <li class="{{ request()->is('garments/merchandisings/monthly-order-budget-alerts') ? 'active' : '' }}">
                                <a href="{{ route('monthly-order-budget-alerts.index') }}" title="Monthly Budget Alert">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Alert Setting
                                </a>
                                <b class="arrow"></b>
                            </li>
                        @endif
                       

                    </ul>
                </li>
            @endif


            @if(hasAnyPermission(['order.details.index', 'monthly.summaries.index', 'order.summaries.index', 'sid.remaining.balances.index'], $slugs))
                <li class="{{ request()->segment(3) == 'm-reports' ? 'open' : '' }}">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-caret-right"></i>
                        M.Report
                        <b class="arrow fa fa-angle-down"></b>
                    </a>
                    <b class="arrow"></b>
                    <ul class="submenu">

                        @if (hasPermission('order.details.index', $slugs))

                            <li class="{{ request()->is('garments/merchandisings/m-reports/order-details-report') ? 'active' : '' }}">
                                <a href="{{ route('order-details-report') }}" title="Generate Sales Id">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Order Details
                                </a>
                                <b class="arrow"></b>
                            </li>

                        @endif

                        @if (hasPermission('monthly.summaries.index', $slugs))
                            <li class="{{ request()->is('garments/merchandisings/m-reports/monthly-order-summary') ? 'active' : '' }}">
                                <a href="{{ route('monthly-order-summary') }}" title="Monthly Order Summary">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Monthly Summary
                                </a>
                                <b class="arrow"></b>
                            </li>
                        @endif

                        @if (hasPermission('order.summaries.index', $slugs))
                            <li class="{{ request()->is('garments/merchandisings/m-reports/order-summary') ? 'active' : '' }}">
                                <a href="{{ route('order-summary') }}" title="Order Summary">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Order Summary
                                </a>
                                <b class="arrow"></b>
                            </li>
                        @endif

                        @if (hasPermission('sid.remaining.balances.index', $slugs))
                            <li class="{{ request()->is('garments/merchandisings/m-reports/sid-remaining-balance') ? 'active' : '' }}">
                                <a href="{{ route('sid-remaining-balance') }}" title="Order Summary">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    SID Remaining
                                    <div style="padding-left: 16px">
                                        Balance
                                    </div>
                                </a>
                                <b class="arrow"></b>
                            </li>
                        @endif

                    </ul>
                </li>
            @endif


            @if (hasAnyPermission(["sales.ids.create", "sales.ids.index"], $slugs))
                <li class="{{ request()->segment(3) == 'sales-id-generate' ? 'open' : '' }}">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Sales Id
                        <b class="arrow fa fa-angle-down"></b>
                    </a>
                    <b class="arrow"></b>
                    <ul class="submenu">
                        @if (hasPermission('sales.ids.create', $slugs))
                            <li class="{{ request()->is('garments/merchandisings/sales-id-generate/create') ? 'active' : '' }}">
                                <a href="{{ route('sales-id-generate.create') }}" title="Generate Sales Id">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Gen. Sales Id
                                </a>
                                <b class="arrow"></b>
                            </li>

                        @endif

                        @if (hasPermission('sales.ids.index', $slugs))
                            <li class="{{ request()->is('garments/merchandisings/sales-id-generate') ? 'active' : '' }}">
                                <a href="{{ route('sales-id-generate.index') }}">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Sales Id List
                                </a>
                                <b class="arrow"></b>
                            </li>
                        @endif

                    </ul>
                </li>
            @endif


            @if(hasAnyPermission(['pis.index', 'payments.index', 'remarks.index'],$slugs))
                <li class="{{ request()->is('garments/merchandisings/payments') || request()->is('garments/merchandisings/remarks') || request()->is('garments/merchandisings/pi') ||  request()->is('garments/merchandisings/pi/create') ||  request()->is('garments/merchandisings/pi-view/*') || request()->is('garments/merchandisings/pi/create/setup-2') ? 'open' : '' }}">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Export P.I
                        <b class="arrow fa fa-angle-down"></b>
                    </a>
                    <b class="arrow"></b>

                    <ul class="submenu">
                        @if(hasPermission('payments.index',$slugs))
                            <li class="{{ request()->is('garments/merchandisings/payments') ? 'active' : '' }}">
                                <a href="{{ route('payments.index') }}">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Payments
                                </a>
                                <b class="arrow"></b>
                            </li>
                        @endif
                        @if(hasPermission('remarks.index',$slugs))
                            <li class="{{ request()->is('garments/merchandisings/remarks') ? 'active' : '' }}">
                                <a href="{{ route('remarks.index') }}">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Remarks
                                </a>
                                <b class="arrow"></b>
                            </li>
                        @endif

                        @if(hasPermission('pis.create',$slugs))
                            <li class="{{ request()->is('garments/merchandisings/pi/create') || request()->is('comm/pi/create/setup-2') ? 'active' : '' }}">
                                <a href="{{ route('pi.create') }}">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Create P.I
                                </a>
                                <b class="arrow"></b>
                            </li>
                        @endif
                        @if(hasPermission('pis.index',$slugs))
                            <li class="{{ request()->is('garments/merchandisings/pi') || request()->is('garments/merchandisings/pi-view/*') ? 'active' : '' }}">
                                <a href="{{ route('pi.index') }}">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    P.I List
                                </a>
                                <b class="arrow"></b>
                            </li>
                        @endif

                    </ul>
                </li>
            @endif


            @if(hasPermission('sample.dispatches.index',$slugs))
                <li class="{{ request()->segment(3) == "sample-dispatch" || request()->is('garments/merchandisings/sample-dispatch') ? 'open' : '' }}">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Sample Dispatch
                        <b class="arrow fa fa-angle-down"></b>
                    </a>
                    <b class="arrow"></b>
                    <ul class="submenu">
                        @if(hasPermission('sample.dispatches.create',$slugs))
                            <li class="{{ request()->is('garments/merchandisings/sample-dispatch/create') ? 'active' : '' }}">
                                <a href="{{ route('sample.dispatch.create') }}">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Create Dispatch
                                </a>
                                <b class="arrow"></b>
                            </li>
                        @endif
                        @if(hasPermission('sample.dispatches.view',$slugs))
                            <li class="{{ request()->is('garments/merchandisings/sample-dispatch') ? 'active' : '' }}">
                                <a href="{{ route('sample.dispatch.index') }}">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Dispatch List
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
