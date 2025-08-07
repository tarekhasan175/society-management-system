
@if (hasAnyPermission(["remarks.index", "mids.index", 'bb.lcs.index'], $slugs) && hasModulePermission('Commercial', $active_modules))
    <li class="{{ request()->segment('2') == 'commercials'  ? 'open' : '' }}">
        <a href="#" class="dropdown-toggle">
            <i class="menu-icon fa fa-briefcase"></i>
            <span class="menu-text"> Commercial </span>
            <b class="arrow fa fa-angle-down"></b>
        </a>
        <b class="arrow"></b>
        <ul class="submenu">

            @if(hasPermission('remarks.index',$slugs))
                <li class="{{ request()->is('garments/commercials/payments') || request()->is('garments/commercials/remarks') || request()->is('garments/commercials/payment-type') || request()->is('garments/commercials/port-of-loading') || request()->is('garments/commercials/port-of-discharge') || request()->is('garments/commercials/lc-periods') || request()->is('garments/commercials/document-presentation-time') ? 'open' : '' }}">
                    <a href="#" class="dropdown-toggle" title="Commercial Setup">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Comm. Setup
                        <b class="arrow fa fa-angle-down"></b>
                    </a>
                    <b class="arrow"></b>


                    <ul class="submenu">

                        @if(hasPermission('remarks.index',$slugs))
                            <li class="{{ request()->is('garments/commercials/payment-type') ? 'active' : '' }}">
                                <a href="{{ route('payment-type.index') }}">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Payment-type
                                </a>
                                <b class="arrow"></b>
                            </li>

                            <li class="{{ request()->is('garments/commercials/port-of-loading') ? 'active' : '' }}">
                                <a href="{{ route('port-of-loading.index') }}">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Port Of Loading
                                </a>
                                <b class="arrow"></b>
                            </li>

                            <li class="{{ request()->is('garments/commercials/port-of-discharge') ? 'active' : '' }}">
                                <a href="{{ route('port-of-discharge.index') }}" title="Port Of Discharge">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Port Of Disc.
                                </a>
                                <b class="arrow"></b>
                            </li>

                            <li class="{{ request()->is('garments/commercials/lc-periods') ? 'active' : '' }}">
                                <a href="{{ route('lc-periods.index') }}" title="Port Of Discharge">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Lc Periods
                                </a>
                                <b class="arrow"></b>
                            </li>

                            <li class="{{ request()->is('garments/commercials/document-presentation-time') ? 'active' : '' }}">
                                <a href="{{ route('document-presentation-time.index') }}" title="Document Presentation Time">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Doc.Presentation
                                </a>
                                <b class="arrow"></b>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif


            @if (hasPermission('mids.index', $slugs))
                <li class="{{ request()->segment(3) == "mid-generate" ? 'open' : '' }}">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Master Id
                        <b class="arrow fa fa-angle-down"></b>
                    </a>
                    <b class="arrow"></b>
                    <ul class="submenu">
                        @if (hasPermission('mids.create', $slugs))
                            <li class="{{ request()->is('garments/commercials/mid-generate/create') ? 'active' : '' }}">
                                <a href="{{ route('mid-generate.create') }}" title="Generate Sales Id">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Gen. Master Id
                                </a>
                                <b class="arrow"></b>
                            </li>
                        @endif

                        @if (hasPermission('mids.index', $slugs))
                            <li class="{{ request()->is('garments/commercials/mid-generate') ? 'active' : '' }}">
                                <a href="{{ route('mid-generate.index') }}">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Master Id List
                                </a>
                                <b class="arrow"></b>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif


            @if (hasAnyPermission(['mid.transfers.index', 'mid.transfers.create'], $slugs))
                <li class="{{ request()->segment(3) == "mid-transfer" ? 'open' : '' }}">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-caret-right"></i>
                        MID Transfer
                        <b class="arrow fa fa-angle-down"></b>
                    </a>
                    <b class="arrow"></b>
                    <ul class="submenu">
                        @if (hasPermission('mid.transfers.create', $slugs))
                            <li class="{{ request()->is('garments/commercials/mid-transfer/create') ? 'active' : '' }}">
                                <a href="{{ route('mid-transfer.create') }}" title="Generate Sales Id">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Create
                                </a>
                                <b class="arrow"></b>
                            </li>
                        @endif

                        @if (hasPermission('mid.transfers.index', $slugs))
                            <li class="{{ request()->is('garments/commercials/mid-transfer') ? 'active' : '' }}">
                                <a href="{{ route('mid-transfer.index') }}">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Transfer List
                                </a>
                                <b class="arrow"></b>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif


            @if (hasAnyPermission(['bb.lcs.index', 'bb.lcs.irregular.index'], $slugs))
                <li class="{{ request()->segment(3) == "bblc" ? 'open' : '' }}">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-caret-right"></i>
                        BB LC
                        <b class="arrow fa fa-angle-down"></b>
                    </a>
                    <b class="arrow"></b>

                    @if (hasPermission('bb.lcs.index', $slugs))
                        <ul class="submenu">
                            <li class="{{ request()->segment(4) == "regular" ? 'open' : '' }}">
                                <a href="#" class="dropdown-toggle" title="Generate BBLC">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Regular
                                    <b class="arrow fa fa-angle-down"></b>
                                </a>
                                <b class="arrow"></b>

                                <ul class="submenu">
                                    @if (hasPermission('bb.lcs.create', $slugs))
                                        <li class="{{ request()->is('garments/commercials/bblc/regular/create') ? 'active' : '' }}">
                                            <a href="{{ route('bblc.regular.create') }}" title="Generate BBLC">
                                                <i class="menu-icon fa fa-caret-right"></i>
                                                Create
                                            </a>
                                            <b class="arrow"></b>
                                        </li>
                                    @endif

                                    @if (hasPermission('bb.lcs.index', $slugs))
                                        <li class="{{ request()->is('garments/commercials/bblc/regular') ? 'active' : '' }}">
                                            <a href="{{ route('bblc.regular.index') }}">
                                                <i class="menu-icon fa fa-caret-right"></i>
                                                List
                                            </a>
                                            <b class="arrow"></b>
                                        </li>
                                    @endif
                                </ul>
                            </li>
                        </ul>
                    @endif

                    @if (hasPermission('bb.lcs.irregular.index', $slugs))
                        <ul class="submenu">
                            <li class="{{ request()->segment(4) == "irregular" ? 'open' : '' }}">
                                <a href="#" class="dropdown-toggle" title="Generate BBLC">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Irregular
                                    <b class="arrow fa fa-angle-down"></b>
                                </a>
                                <b class="arrow"></b>

                                <ul class="submenu">
                                    @if (hasPermission('bb.lcs.irregular.create', $slugs))
                                        <li class="{{ request()->is('garments/commercials/bblc/irregular/create') ? 'active' : '' }}">
                                            <a href="{{ route('bblc.irregular.create') }}" title="Generate BBLC">
                                                <i class="menu-icon fa fa-caret-right"></i>
                                                Create
                                            </a>
                                            <b class="arrow"></b>
                                        </li>
                                    @endif

                                    @if (hasPermission('bb.lcs.irregular.index', $slugs))
                                        <li class="{{ request()->is('garments/commercials/bblc/irregular') ? 'active' : '' }}">
                                            <a href="{{ route('bblc.irregular.index') }}">
                                                <i class="menu-icon fa fa-caret-right"></i>
                                                List
                                            </a>
                                            <b class="arrow"></b>
                                        </li>
                                    @endif
                                </ul>
                            </li>
                        </ul>
                    @endif
                </li>
            @endif


            @if (hasPermission('commercial.invoices.index', $slugs))
                <li class="{{ request()->segment(3) == "invoice" ? 'open' : '' }}">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Invoice
                        <b class="arrow fa fa-angle-down"></b>
                    </a>
                    <b class="arrow"></b>
                    <ul class="submenu">
                        @if (hasPermission('commercial.invoices.create', $slugs))
                            <li class="{{ request()->is('garments/commercials/invoice/create') ? 'active' : '' }}">
                                <a href="{{ route('invoice.create') }}" title="Create Invoice">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Create
                                </a>
                                <b class="arrow"></b>
                            </li>
                        @endif

                        @if (hasPermission('commercial.invoices.index', $slugs))
                            <li class="{{ request()->is('garments/commercials/invoice') ? 'active' : '' }}">
                                <a href="{{ route('invoice.index') }}">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Invoice List
                                </a>
                                <b class="arrow"></b>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif


            @if (hasPermission('mid.value.adjuststs.index', $slugs))
                <li class="{{ request()->segment(3) == "invoice" ? 'open' : '' }}">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Report
                        <b class="arrow fa fa-angle-down"></b>
                    </a>
                    <b class="arrow"></b>
                    <ul class="submenu">
                        @if (hasPermission('mid.value.adjuststs.index', $slugs))
                            <li class="{{ request()->is('garments/commercials/invoice/create') ? 'active' : '' }}">
                                <a href="{{ route('mid-value-adjustment.report') }}" title="Mid Value Adjustment Report">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Mid Value Adj.
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
