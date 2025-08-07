
@if(hasModulePermission('Payment', $active_modules) && hasAnyPermission(['arp.cashs.index', 'sweater.cashs.index', 'subcontract.cashs.index', 'woven.cashs.index', 'knitting.dyeing.payments.index'], $slugs))
    <li class="{{ request()->segment(2) == "payments" ? 'open' : '' }}">
        <a href="#" class="dropdown-toggle">
            <i class="menu-icon fa fa-paypal"></i>
            <span class="menu-text"> Cash Payment </span>
            <b class="arrow fa fa-angle-down"></b>
        </a>
        <b class="arrow"></b>


        <ul class="submenu">

            <!-- ARP Cash -->
            @if(hasAnyPermission(['arp.cashs.index', 'arp.cashs.ledger'], $slugs))

                <li  class="{{ request()->is('garments/payments/arp-cas*') ? 'open' : '' }}">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-caret-right"></i>
                        ARP
                        <b class="arrow fa fa-angle-down"></b>
                    </a>
                    <b class="arrow"></b>

                    <ul class="submenu">
                        @if(hasAnyPermission(['arp.cashs.create'], $slugs))
                            <li class="{{ request()->is('garments/payments/arp-cash/create') ? 'active' : '' }}" title="ARP (Cash) Payment Create">
                                <a href="{{ route('arp-cash.create') }}">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Create
                                </a>
                                <b class="arrow"></b>
                            </li>
                        @endif

                        @if(hasAnyPermission(['arp.cashs.index'], $slugs))
                            <li class="{{ request()->is('garments/payments/arp-cas*') && !request()->is('garments/payments/arp-cash/create', 'payment/arp-cash/ledger') ? 'active' : '' }}" title="ARP (Cash) Payment List">
                                <a href="{{ route('arp-cash.index') }}">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    List
                                </a>
                                <b class="arrow"></b>
                            </li>
                        @endif

                        @if(hasAnyPermission(['arp.cashs.ledger'], $slugs))
                            <li class="{{ request()->is('garments/payments/arp-cash/ledger') ? 'active' : '' }}" title="ARP (Cash) Payment Ledger">
                                <a href="{{ route('arp-cash.ledger') }}">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Ledger
                                </a>
                                <b class="arrow"></b>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif





            <!-- Sweater Cash -->
            @if(hasAnyPermission(['sweater.cashs.index', 'sweater.cashs.ledger'], $slugs))

                <li  class="{{ request()->is('garments/payments/sweater-cas*') ? 'open' : '' }}">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Sweater Yarn
                        <b class="arrow fa fa-angle-down"></b>
                    </a>
                    <b class="arrow"></b>

                    <ul class="submenu">
                        @if(hasAnyPermission(['sweater.cashs.create'], $slugs))
                            <li class="{{ request()->is('garments/payments/sweater-cash/create') ? 'active' : '' }}" title="Sweater Yarn (Cash) Payment Create">
                                <a href="{{ route('sweater-cash.create') }}">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Create
                                </a>
                                <b class="arrow"></b>
                            </li>
                        @endif

                        @if(hasAnyPermission(['sweater.cashs.index'], $slugs))
                            <li class="{{ request()->is('garments/payments/sweater-cas*') && !request()->is('garments/payments/sweater-cash/create', 'payment/sweater-cash/ledger') ? 'active' : '' }}" title="Sweater Yarn (Cash) Payment List">
                                <a href="{{ route('sweater-cash.index') }}">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    List
                                </a>
                                <b class="arrow"></b>
                            </li>
                        @endif

                        @if(hasAnyPermission(['sweater.cashs.ledger'], $slugs))
                            <li class="{{ request()->is('garments/payments/sweater-cash/ledger') ? 'active' : '' }}" title="Sweater Yarn (Cash) Payment Ledger">
                                <a href="{{ route('sweater-cash.ledger') }}">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Ledger
                                </a>
                                <b class="arrow"></b>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif





            <!-- Subcontract Cash -->
            @if(hasAnyPermission(['subcontract.cashs.index', 'subcontract.cashs.ledger'], $slugs))

                <li  class="{{ request()->is('garments/payments/subcontract-cas*') ? 'open' : '' }}">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Subcontract
                        <b class="arrow fa fa-angle-down"></b>
                    </a>
                    <b class="arrow"></b>

                    <ul class="submenu">
                        @if(hasAnyPermission(['subcontract.cashs.create'], $slugs))
                            <li class="{{ request()->is('garments/payments/subcontract-cash/create') ? 'active' : '' }}" title="Subcontract (Cash) Payment Create">
                                <a href="{{ route('subcontract-cash.create') }}">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Create
                                </a>
                                <b class="arrow"></b>
                            </li>
                        @endif

                        @if(hasAnyPermission(['subcontract.cashs.index'], $slugs))
                            <li class="{{ request()->is('garments/payments/subcontract-cas*') && !request()->is('garments/payments/subcontract-cash/create', 'payment/subcontract-cash/ledger') ? 'active' : '' }}" title="Subcontract (Cash) Payment List">
                                <a href="{{ route('subcontract-cash.index') }}">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    List
                                </a>
                                <b class="arrow"></b>
                            </li>
                        @endif

                        @if(hasAnyPermission(['subcontract.cashs.ledger'], $slugs))
                            <li class="{{ request()->is('garments/payments/subcontract-cash/ledger') ? 'active' : '' }}" title="Subcontract (Cash) Payment Ledger">
                                <a href="{{ route('subcontract-cash.ledger') }}">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Ledger
                                </a>
                                <b class="arrow"></b>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif





            <!-- Knit Yarn Cash -->
            @if(hasAnyPermission(['knit-yarn.cashs.index', 'knit-yarn.cashs.ledger'], $slugs))

                <li  class="{{ request()->is('garments/payments/knit-yarn-cas*') ? 'open' : '' }}">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Knit Yarn
                        <b class="arrow fa fa-angle-down"></b>
                    </a>
                    <b class="arrow"></b>

                    <ul class="submenu">
                        @if(hasAnyPermission(['knit-yarn.cashs.create'], $slugs))
                            <li class="{{ request()->is('garments/payments/knit-yarn-cash/create') ? 'active' : '' }}" title="Knit Yarn (Cash) Payment Create">
                                <a href="{{ route('knit-yarn-cash.create') }}">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Create
                                </a>
                                <b class="arrow"></b>
                            </li>
                        @endif

                        @if(hasAnyPermission(['knit-yarn.cashs.index'], $slugs))
                            <li class="{{ request()->is('garments/payments/knit-yarn-cas*') && !request()->is('garments/payments/knit-yarn-cash/create', 'payment/knit-yarn-cash/ledger') ? 'active' : '' }}" title="Knit Yarn (Cash) Payment List">
                                <a href="{{ route('knit-yarn-cash.index') }}">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    List
                                </a>
                                <b class="arrow"></b>
                            </li>
                        @endif

                        @if(hasAnyPermission(['knit-yarn.cashs.ledger'], $slugs))
                            <li class="{{ request()->is('garments/payments/knit-yarn-cash/ledger') ? 'active' : '' }}" title="Knit Yarn (Cash) Payment Ledger">
                                <a href="{{ route('knit-yarn-cash.ledger') }}">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Ledger
                                </a>
                                <b class="arrow"></b>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif





            <!-- Woven Fabric Cash -->
            @if(hasAnyPermission(['woven.cashs.index', 'woven.cashs.ledger'], $slugs))

                <li  class="{{ request()->is('garments/payments/woven-cas*') ? 'open' : '' }}">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Woven Fabric
                        <b class="arrow fa fa-angle-down"></b>
                    </a>
                    <b class="arrow"></b>

                    <ul class="submenu">
                        @if(hasAnyPermission(['woven.cashs.create'], $slugs))
                            <li class="{{ request()->is('garments/payments/woven-cash/create') ? 'active' : '' }}" title="Woven Fabric (Cash) Payment Create">
                                <a href="{{ route('woven-cash.create') }}">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Create
                                </a>
                                <b class="arrow"></b>
                            </li>
                        @endif

                        @if(hasAnyPermission(['woven.cashs.index'], $slugs))
                            <li class="{{ request()->is('garments/payments/woven-cas*') && !request()->is('garments/payments/woven-cash/create', 'payment/woven-cash/ledger') ? 'active' : '' }}" title="Woven Fabric (Cash) Payment List">
                                <a href="{{ route('woven-cash.index') }}">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    List
                                </a>
                                <b class="arrow"></b>
                            </li>
                        @endif

                        @if(hasAnyPermission(['woven.cashs.ledger'], $slugs))
                            <li class="{{ request()->is('garments/payments/woven-cash/ledger') ? 'active' : '' }}" title="Woven Fabric (Cash) Payment Ledger">
                                <a href="{{ route('woven-cash.ledger') }}">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Ledger
                                </a>
                                <b class="arrow"></b>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif




            <!-- Knitting Cash -->
            @if(hasAnyPermission(['knitting.dyeing.payments.index'], $slugs))

                <li  class="{{ request()->is('garments/payments/knitting-payment*') ? 'open' : '' }}">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Knitting
                        <b class="arrow fa fa-angle-down"></b>
                    </a>
                    <b class="arrow"></b>

                    <ul class="submenu">
                        @if(hasAnyPermission(['knitting.dyeing.payments.create'], $slugs))
                            <li class="{{ request()->is('garments/payments/knitting-payments/create') ? 'active' : '' }}" title="Knitting (Cash) Payment Create">
                                <a href="{{ route('knitting-payments.create') }}">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Create
                                </a>
                                <b class="arrow"></b>
                            </li>
                        @endif

                        <li class="{{ request()->is('garments/payments/knitting-payments') ? 'active' : '' }}" title="Knitting (Cash) Payment List">
                            <a href="{{ route('knitting-payments.index') }}">
                                <i class="menu-icon fa fa-caret-right"></i>
                                List
                            </a>
                            <b class="arrow"></b>
                        </li>

                        @if(hasAnyPermission(['knitting.dyeing.payments.ledger'], $slugs))
                            <li class="{{ request()->is('garments/payments/knitting-payments/ledger') ? 'active' : '' }}" title="Knitting (Cash) Payment Ledger">
                                <a href="{{ route('knitting-payments.ledger') }}">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Ledger
                                </a>
                                <b class="arrow"></b>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif



            <!-- Dyeing Cash -->
            @if(hasAnyPermission(['dyeing.payments.index'], $slugs))

                <li  class="{{ request()->segment(3) == 'dyeing-payments' ? 'open' : '' }}">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Dyeing
                        <b class="arrow fa fa-angle-down"></b>
                    </a>
                    <b class="arrow"></b>

                    <ul class="submenu">
                        @if(hasAnyPermission(['dyeing.payments.create'], $slugs))
                            <li class="{{ request()->is('garments/payments/dyeing-payments/create') ? 'active' : '' }}" title="Dyeing (Cash) Payment Create">
                                <a href="{{ route('dyeing-payments.create') }}">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Create
                                </a>
                                <b class="arrow"></b>
                            </li>
                        @endif

                        <li class="{{ request()->is('garments/payments/dyeing-payments') ? 'active' : '' }}" title="Dyeing (Cash) Payment List">
                            <a href="{{ route('dyeing-payments.index') }}">
                                <i class="menu-icon fa fa-caret-right"></i>
                                List
                            </a>
                            <b class="arrow"></b>
                        </li>

                        @if(hasAnyPermission(['dyeing.payments.ledger'], $slugs))
                            <li class="{{ request()->is('garments/payments/dyeing-payments/ledger') ? 'active' : '' }}" title="Dyeing (Cash) Payment Ledger">
                                <a href="{{ route('dyeing-payments.ledger') }}">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Ledger
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
