<!-- Knitting & Dyeing -->
@if(hasModulePermission('Knitting & Dyeing', $active_modules) && hasAnyPermission([
        'transfer.yarns.create', 'transfer.yarns.index',
        'programs.index', 'programs.create',
        'issues.index', 'issues.create','g.fabric.issues.index'
    ], $slugs))

    @php
        $is_dyeing_open =   request()->segment(3) == ('dyeing');

        $is_knitting_open = request()->is('garments/knitting-dyeings/transfer*')    ||
                            request()->is('garments/knitting-dyeings/issue*')       ||
                            request()->segment(3) == 'g-fabric-receives'            ||
                            request()->is('garments/knitting-dyeings/return*');

    @endphp


    <!-- K & D -->
    <li class="{{ request()->segment(2) == "knitting-dyeings" ? 'open' : '' }}">
        <a href="#" class="dropdown-toggle" title="Knitting & Dyeing">
            <i class="menu-icon fa fa-external-link-square"></i>
            K & D
            <b class="arrow fa fa-angle-down"></b>
        </a>
        <b class="arrow"></b>



        <ul class="submenu">

            <!-- Program -->
            @if(hasAnyPermission(['programs.index'], $slugs))
                <li  class="{{ request()->is('garments/knitting-dyeings/program*') ? 'open' : '' }}">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Program
                        <b class="arrow fa fa-angle-down"></b>
                    </a>
                    <b class="arrow"></b>

                    <ul class="submenu">
                        @if(hasPermission('programs.create', $slugs))
                            <li class="{{ request()->is('garments/knitting-dyeings/programs/create') ? 'active' : '' }}" title="Knitting Dyeing Program Create">
                                <a href="{{ route('knitting.dyeing.programs.create') }}">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Create
                                </a>
                                <b class="arrow"></b>
                            </li>
                        @endif

                        @if(hasPermission('programs.index', $slugs))
                            <li class="{{ request()->is('garments/knitting-dyeings/programs/index') ? 'active' : '' }}" title="Knitting Dyeing Program List">
                                <a href="{{ route('knitting.dyeing.programs.index') }}">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    List
                                </a>
                                <b class="arrow"></b>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif






            <!-- Knitting -->
            @if(hasAnyPermission(['transfer.yarns.index', 'issues.index', 'issue.returns.index', 'receives.index'], $slugs))
                <li  class="{{ $is_knitting_open ? 'open' : '' }}">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Knitting
                        <b class="arrow fa fa-angle-down"></b>
                    </a>
                    <b class="arrow"></b>


                    <ul class="submenu">
                        
                        <!-- Transfer Yarn -->
                        @if(hasAnyPermission(['transfer.yarns.create', 'transfer.yarns.index'], $slugs))
                            <li class="{{ request()->is('garments/knitting-dyeings/transfer*') ? 'open' : '' }}">
                                <a href="#" class="dropdown-toggle">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Transfer Yarn
                                    <b class="arrow fa fa-angle-down"></b>
                                </a>
                                <b class="arrow"></b>

                                <ul class="submenu">
                                    @if(hasAnyPermission(['transfer.yarns.create'], $slugs))
                                        <li class="{{ request()->routeIs('knit-yarn-transfer.create') ? 'active' : '' }}">
                                            <a href="{{ route('knit-yarn-transfer.create') }}" title="Item Ledger">
                                                <i class="menu-icon fa fa-caret-right"></i>
                                                Create
                                            </a>
                                            <b class="arrow"></b>
                                        </li>
                                    @endif

                                    @if(hasAnyPermission(['transfer.yarns.index'], $slugs))
                                        <li class="{{ request()->is('garments/knitting-dyeings/transfer*') && !request()->routeIs('knit-yarn-transfer.create') ? 'active' : '' }}">
                                            <a href="{{ route('knit-yarn-transfer.index') }}" title="Item Stock">
                                                <i class="menu-icon fa fa-caret-right"></i>
                                                List
                                            </a>
                                            <b class="arrow"></b>
                                        </li>
                                    @endif
                                </ul>
                            </li>
                        @endif


                        
                        <!-- Knit Yarn Issues -->
                        @if(hasAnyPermission(['issues.index', 'issues.create'], $slugs))
                            <li  class="{{ request()->is('garments/knitting-dyeings/issue*') ? 'open' : '' }}">
                                <a href="#" class="dropdown-toggle" title="Knit Yarn Issue">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Issues
                                    <b class="arrow fa fa-angle-down"></b>
                                </a>
                                <b class="arrow"></b>

                                <ul class="submenu">
                                    @if(hasPermission('issues.create', $slugs))
                                        <li class="{{ request()->is('garments/knitting-dyeings/issues/create') ? 'active' : '' }}" title="Knitting Dyeing Issue Create">
                                            <a href="{{ route('knitting.dyeing.issues.create') }}?filter_work_order_type=4&filter_payment_mode=Cash">
                                                <i class="menu-icon fa fa-caret-right"></i>
                                                Create
                                            </a>
                                            <b class="arrow"></b>
                                        </li>
                                    @endif

                                    @if(hasPermission('issues.index', $slugs))
                                        <li class="{{ request()->is('garments/knitting-dyeings/issues') ? 'active' : '' }}" title="Knitting Dyeing Issue List">
                                            <a href="{{ route('knitting.dyeing.issues.index') }}">
                                                <i class="menu-icon fa fa-caret-right"></i>
                                                List
                                            </a>
                                            <b class="arrow"></b>
                                        </li>
                                    @endif
                                </ul>
                            </li>
                        @endif



                        <!-- Knit Yarn Issue Return -->
                        @if(hasAnyPermission(['issue.returns.index'], $slugs))
                            <li  class="{{ request()->is('garments/knitting-dyeings/return*') ? 'open' : '' }}">
                                <a href="#" class="dropdown-toggle">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Return
                                    <b class="arrow fa fa-angle-down"></b>
                                </a>
                                <b class="arrow"></b>

                                <ul class="submenu">
                                    @if(hasPermission('issue.returns.index', $slugs))
                                        <li class="{{ request()->is('garments/knitting-dyeings/returns') ? 'active' : '' }}" title="Knitting Dyeing Return List">
                                            <a href="{{ route('knitting.dyeing.returns.index') }}">
                                                <i class="menu-icon fa fa-caret-right"></i>
                                                List
                                            </a>
                                            <b class="arrow"></b>
                                        </li>
                                    @endif
                                </ul>
                            </li>
                        @endif



                        <!-- Gray Fabric Receive -->
                        @if(hasAnyPermission(['receives.index', 'g.fabric.stock.reports.index'], $slugs))
                            <li  class="{{ request()->segment(3) == 'g-fabric-receives' || request()->segment(3) == 'g-fabric-reports' ? 'open' : '' }}">
                                <a href="#" class="dropdown-toggle">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    G. Fabric Rcv
                                    <b class="arrow fa fa-angle-down"></b>
                                </a>
                                <b class="arrow"></b>

                                <ul class="submenu">
                                    @if(hasPermission('receives.create', $slugs))
                                        <li class="{{ request()->is('garments/knitting-dyeings/g-fabric-receives/create') ? 'active' : '' }}" title="Knitting Dyeing Receive">
                                            <a href="{{ route('knitting.dyeing.g-fabric.receives.create') }}">
                                                <i class="menu-icon fa fa-caret-right"></i>
                                                Receive
                                            </a>
                                            <b class="arrow"></b>
                                        </li>
                                    @endif

                                    @if(hasPermission('receives.index', $slugs))
                                        <li class="{{ request()->is('garments/knitting-dyeings/g-fabric-receives') ? 'active' : '' }}" title="Knitting Dyeing Receive List">
                                            <a href="{{ route('knitting.dyeing.g-fabric.receives.index') }}">
                                                <i class="menu-icon fa fa-caret-right"></i>
                                                List
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






            <!-- Dyeing -->
            @if(hasAnyPermission(['g.fabric.issues.index', 'g.fabric.returns.index', 'dyed.fabric.receives.index', 'cutting.fabric.issues.index'], $slugs))
                <li class="{{ $is_dyeing_open ? 'open' : '' }}">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Dyeing
                        <b class="arrow fa fa-angle-down"></b>
                    </a>
                    <b class="arrow"></b>


                    <ul class="submenu">




                        <!-- Gray Fabric Issue -->
                        @if(hasAnyPermission(['g.fabric.issues.index'], $slugs))
                            <li class="{{ request()->segment(4) == 'g-fabric-issues' ? 'active' : '' }}" title="Gray Fabric Issue">
                                <a href="#" class="dropdown-toggle">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    G. Fab. Issue
                                    <b class="arrow fa fa-angle-down"></b>
                                </a>
                                <b class="arrow"></b>

                                <ul class="submenu">
                                    @if(hasPermission('g.fabric.issues.create', $slugs))
                                        <li class="{{ request()->routeIs('g-fabric-issues.create') ? 'active' : '' }}" title="Gray Fabric Issue Create">
                                            <a style="margin-left: 35px" href="{{ route('g-fabric-issues.create') }}">
                                                <i class="menu-icon fa fa-caret-right"></i>
                                                Create
                                            </a>
                                        </li>
                                    @endif

                                    <li class="{{ request()->routeIs('g-fabric-issues.index') ? 'active' : '' }}" title="Gray Fabric Issue List">
                                        <a style="margin-left: 35px" href="{{ route('g-fabric-issues.index') }}">
                                            <i class="menu-icon fa fa-caret-right"></i>
                                            List
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endif


                        <!-- Gray Fabric Return -->
                        @if(hasAnyPermission(['g.fabric.returns.index'], $slugs))
                            <li class="{{ request()->segment(4) == 'g-fabric-returns' ? 'active' : '' }}" title="Gray Fabric Return">
                                <a href="#" class="dropdown-toggle">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    G. Fab. Return
                                    <b class="arrow fa fa-angle-down"></b>
                                </a>
                                <b class="arrow"></b>

                                <ul class="submenu">

                                    <li class="{{ request()->routeIs('g-fabric-returns.index') ? 'active' : '' }}" title="Gray Fabric Return List">
                                        <a style="margin-left: 35px" href="{{ route('g-fabric-returns.index') }}">
                                            <i class="menu-icon fa fa-caret-right"></i>
                                            List
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endif


                        <!-- Dyed Fabric Receive -->
                        @if(hasAnyPermission(['dyed.fabric.receives.index'], $slugs))
                            <li class="{{ request()->segment(4) == 'dyed-fabric-receives' ? 'active' : '' }}" title="Gray Fabric Issue">
                                <a href="#" class="dropdown-toggle">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Dyed Fab. Rcv
                                    <b class="arrow fa fa-angle-down"></b>
                                </a>
                                <b class="arrow"></b>

                                <ul class="submenu">
                                    @if(hasPermission('dyed.fabric.receives.create', $slugs))
                                        <li class="{{ request()->routeIs('dyed-fabric-receives.create') ? 'active' : '' }}" title="Gray Fabric Issue Create">
                                            <a style="margin-left: 35px" href="{{ route('dyed-fabric-receives.create') }}">
                                                <i class="menu-icon fa fa-caret-right"></i>
                                                Create
                                            </a>
                                        </li>
                                    @endif

                                    <li class="{{ request()->routeIs('dyed-fabric-receives.index') ? 'active' : '' }}" title="Gray Fabric Issue List">
                                        <a style="margin-left: 35px" href="{{ route('dyed-fabric-receives.index') }}">
                                            <i class="menu-icon fa fa-caret-right"></i>
                                            List
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endif


                        <!-- Cutting Fabric Issue -->
                        @if(hasAnyPermission(['cutting.fabric.issues.index'], $slugs))
                            <li class="{{ request()->segment(4) == 'cutting-fabric-issues' ? 'active' : '' }}" title="Gray Fabric Issue">
                                <a href="#" class="dropdown-toggle">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Cutting Issue
                                    <b class="arrow fa fa-angle-down"></b>
                                </a>
                                <b class="arrow"></b>

                                <ul class="submenu">
                                    @if(hasPermission('cutting.fabric.issues.create', $slugs))
                                        <li class="{{ request()->routeIs('cutting-fabric-issues.create') ? 'active' : '' }}" title="Gray Fabric Issue Create">
                                            <a style="margin-left: 35px" href="{{ route('cutting-fabric-issues.create') }}">
                                                <i class="menu-icon fa fa-caret-right"></i>
                                                Create
                                            </a>
                                        </li>
                                    @endif

                                    <li class="{{ request()->routeIs('cutting-fabric-issues.index') ? 'active' : '' }}" title="Gray Fabric Issue List">
                                        <a style="margin-left: 35px" href="{{ route('cutting-fabric-issues.index') }}">
                                            <i class="menu-icon fa fa-caret-right"></i>
                                            List
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif





            <!-- Stocklot -->
            @if(hasAnyPermission(['loose.yarn.issues.index', 'loose.fabric.issues.index'], $slugs))
                <li class="{{ request()->segment(3) == 'stocklot' ? 'open' : '' }}">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Stocklot
                        <b class="arrow fa fa-angle-down"></b>
                    </a>
                    <b class="arrow"></b>


                    <ul class="submenu">

                        <!-- Loose Yarn Issue -->
                        @if(hasPermission('loose.yarn.issues.index', $slugs))
                            <li class="{{ request()->segment(4) == 'loose-yarn-issues' ? 'active' : '' }}" title="Loose Yarn Issue Reports">
                                <a href="#" class="dropdown-toggle">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    L. Yarn Issue
                                    <b class="arrow fa fa-angle-down"></b>
                                </a>
                                <b class="arrow"></b>

                                <ul class="submenu">
                                    @if(hasPermission('loose.yarn.issues.create', $slugs))
                                        <li class="{{ request()->routeIs('loose-yarn-issues.create') ? 'active' : '' }}" title="Loose Yarn Issue Create">
                                            <a style="margin-left: 35px" href="{{ route('loose-yarn-issues.create') }}">
                                                <i class="menu-icon fa fa-caret-right"></i>
                                                Create
                                            </a>
                                        </li>
                                    @endif

                                    <li class="{{ request()->routeIs('loose-yarn-issues.index') ? 'active' : '' }}" title="Loose Yarn Issue List">
                                        <a style="margin-left: 35px" href="{{ route('loose-yarn-issues.index') }}">
                                            <i class="menu-icon fa fa-caret-right"></i>
                                            List
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endif




                        <!-- Loose Fabric Issue -->
                        @if(hasPermission('loose.fabric.issues.index', $slugs))
                            <li class="{{ request()->segment(4) == 'loose-fabric-issues' ? 'active' : '' }}" title="Loose Fabric Issue Reports">
                                <a href="#" class="dropdown-toggle">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    L. Fabric Issue
                                    <b class="arrow fa fa-angle-down"></b>
                                </a>
                                <b class="arrow"></b>

                                <ul class="submenu">
                                    @if(hasPermission('loose.fabric.issues.create', $slugs))
                                        <li class="{{ request()->routeIs('loose-fabric-issues.create') ? 'active' : '' }}" title="Loose Fabric Issue Create">
                                            <a style="margin-left: 35px" href="{{ route('loose-fabric-issues.create') }}">
                                                <i class="menu-icon fa fa-caret-right"></i>
                                                Create
                                            </a>
                                        </li>
                                    @endif

                                    <li class="{{ request()->routeIs('loose-fabric-issues.index') ? 'active' : '' }}" title="Loose Fabric Issue List">
                                        <a style="margin-left: 35px" href="{{ route('loose-fabric-issues.index') }}">
                                            <i class="menu-icon fa fa-caret-right"></i>
                                            List
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif





            <!-- Report -->
            @if(hasAnyPermission(['g.fabric.stock.reports.index', 'dyed.fabric.stock.reports.index', 'loose.yarn.stock.reports.index', 'loose.fabric.stock.reports.index'], $slugs))
                <li class="{{ request()->segment(3) == 'report' ? 'open' : '' }}">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Report
                        <b class="arrow fa fa-angle-down"></b>
                    </a>
                    <b class="arrow"></b>


                    <ul class="submenu">


                        <!-- Gray Fabric Stock Report -->
                        @if(hasAnyPermission(['g.fabric.stock.reports.index'], $slugs))
                            <li class="{{ request()->segment(4) == 'g-fabrics' ? 'open' : '' }}" title="Gray Fabric Stock Reports">
                                <a href="#" class="dropdown-toggle">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Gray Fabric
                                    <b class="arrow fa fa-angle-down"></b>
                                </a>
                                <b class="arrow"></b>

                                <ul class="submenu">
                                    @if(hasPermission('g.fabric.stock.reports.ledger', $slugs))
                                        <li class="{{ request()->routeIs('g-fabrics.item.ledger') ? 'active' : '' }}" title="Gray Fabric Ledger Report">
                                            <a href="{{ route('g-fabrics.item.ledger') }}">
                                                <i class="menu-icon fa fa-caret-right"></i>
                                                Item Ledger
                                            </a>
                                            <b class="arrow"></b>
                                        </li>
                                    @endif

                                    @if(hasPermission('g.fabric.stock.reports.stock-in-hand', $slugs))
                                        <li class="{{ request()->is('garments/knitting-dyeings/report/g-fabrics/stock-in-hand') ? 'active' : '' }}" title="Gray Fabric Stock In Hand Report">
                                            <a href="{{ route('g-fabrics.stock-in-hand') }}">
                                                <i class="menu-icon fa fa-caret-right"></i>
                                                Stock In Hand
                                            </a>
                                            <b class="arrow"></b>
                                        </li>
                                    @endif
                                </ul>
                            </li>
                        @endif



                        <!-- Dyed Fabric Stock Report -->
                        @if(hasAnyPermission(['dyed.fabric.stock.reports.index'], $slugs))
                            <li class="{{ request()->segment(4) == 'dyed-fabrics' ? 'open' : '' }}" title="Dyed Fabric Stock Reports">
                                <a href="#" class="dropdown-toggle">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Dyed Fabric
                                    <b class="arrow fa fa-angle-down"></b>
                                </a>
                                <b class="arrow"></b>

                                <ul class="submenu">
                                    @if(hasPermission('dyed.fabric.stock.reports.ledger', $slugs))
                                        <li class="{{ request()->routeIs('dyed-fabrics.item.ledger') ? 'active' : '' }}" title="Dyed Fabric Ledger Report">
                                            <a href="{{ route('dyed-fabrics.item.ledger') }}">
                                                <i class="menu-icon fa fa-caret-right"></i>
                                                Item Ledger
                                            </a>
                                            <b class="arrow"></b>
                                        </li>
                                    @endif

                                    @if(hasPermission('dyed.fabric.stock.reports.stock-in-hand', $slugs))
                                        <li class="{{ request()->routeIs('dyed-fabrics.stock-in-hand') ? 'active' : '' }}" title="Dyed Fabric Stock In Hand Report">
                                            <a href="{{ route('dyed-fabrics.stock-in-hand') }}">
                                                <i class="menu-icon fa fa-caret-right"></i>
                                                Stock In Hand
                                            </a>
                                            <b class="arrow"></b>
                                        </li>
                                    @endif
                                </ul>
                            </li>
                        @endif



                        <!-- Loose Yarn Stock Report -->
                        @if(hasAnyPermission(['loose.yarn.stock.reports.index'], $slugs))
                            <li class="{{ request()->segment(4) == 'loose-yarns' ? 'active' : '' }}" title="Loose Yarn Stock Reports">
                                <a href="#" class="dropdown-toggle">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Loose Yarn
                                    <b class="arrow fa fa-angle-down"></b>
                                </a>
                                <b class="arrow"></b>

                                <ul class="submenu">
                                    @if(hasPermission('loose.yarn.stock.reports.ledger', $slugs))
                                        <li class="{{ request()->routeIs('loose-yarns.ledger') ? 'active' : '' }}" title="Loose Yarn Ledger Report">
                                            <a href="{{ route('loose-yarns.ledger') }}">
                                                <i class="menu-icon fa fa-caret-right"></i>
                                                Item Ledger
                                            </a>
                                        </li>
                                    @endif

                                    @if(hasPermission('loose.yarn.stock.reports.stock-in-hand', $slugs))
                                        <li class="{{ request()->routeIs('loose-yarns.stock-in-hand') ? 'active' : '' }}" title="Loose Yarn In Hand Report">
                                            <a href="{{ route('loose-yarns.stock-in-hand') }}">
                                                <i class="menu-icon fa fa-caret-right"></i>
                                                Stock In Hand
                                            </a>
                                        </li>
                                    @endif
                                </ul>
                            </li>
                        @endif



                        <!-- Loose Fabric Stock Report -->
                        @if(hasAnyPermission(['loose.fabric.stock.reports.index'], $slugs))
                            <li class="{{ request()->segment(4) == 'loose-fabrics' ? 'active' : '' }}" title="Loose Fabric Stock Reports">
                                <a href="#" class="dropdown-toggle">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Loose Fabric
                                    <b class="arrow fa fa-angle-down"></b>
                                </a>
                                <b class="arrow"></b>

                                <ul class="submenu">
                                    @if(hasPermission('loose.fabric.stock.reports.ledger', $slugs))
                                        <li class="{{ request()->routeIs('loose-fabrics.ledger') ? 'active' : '' }}" title="Loose Fabric Ledger Report">
                                            <a style="margin-left: 35px" href="{{ route('loose-fabrics.ledger') }}">
                                                <i class="menu-icon fa fa-caret-right"></i>
                                                Item Ledger
                                            </a>
                                        </li>
                                    @endif

                                    @if(hasPermission('loose.fabric.stock.reports.stock-in-hand', $slugs))
                                        <li class="{{ request()->routeIs('loose-fabrics.stock-in-hand') ? 'active' : '' }}" title="Loose Fabric In Hand Report">
                                            <a style="margin-left: 35px" href="{{ route('loose-fabrics.stock-in-hand') }}">
                                                <i class="menu-icon fa fa-caret-right"></i>
                                                Stock In Hand
                                            </a>
                                        </li>
                                    @endif
                                </ul>
                            </li>
                        @endif



                        @if(hasPermission('g.fabric.stock.reports.stock-in-hand', $slugs))
                        <li class="{{ request()->is('garments/knitting-dyeings/report/knitting-dyeing-report') ? 'active' : '' }}" title="Knitting & Dyeing Programm Details Report">
                            <a href="{{ route('knitting-dyeing.report') }}">
                                <i class="menu-icon fa fa-caret-right"></i>
                                K & D Report
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
