{{-- bangla font  --}}
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Serif+Bengali&display=swap" rel="stylesheet">

<style>
    .font {
        font-family: 'Noto Serif Bengali', serif;
    }
</style>
<li>
    <a style="color:rgb(5, 5, 39);" href="{{ route('dashboard') }}">
        <i class="menu-icon fa fa-tools"></i>
        {{ __('language.societyManagement') }}
    </a>
</li>
{{-- Society Info --}}
<li>
    <a href="#" class="dropdown-toggle font">
        <i class="menu-icon fa fa-gear"></i>
        {{ __('language.settings') }}
        <b class="arrow fa fa-angle-down"></b>
    </a>
    <b class="arrow"></b>

    {{-- place  --}}
    <ul class="submenu">
        <li>
            <a href="#" class="dropdown-toggle font">
                <i class="menu-icon fa fa-map-marker-alt"></i>
                {{ __('language.add_place') }}
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>

            <ul class="submenu">
                <li>
                    <a href="{{ route('block.create') }}" class="font">
                        <i class="menu-icon fa fa-directions"></i>
                        {{ __('language.block') }}
                    </a>
                    <b class="arrow"></b>
                </li>
            </ul>
        </li>

        {{-- money collector  --}}
        <li>
            <a href="#" class="dropdown-toggle font">
                <i class="menu-icon fa fa-users"></i>
                {{ __('language.moneyCollector') }}
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>

            <ul class="submenu">
                <li>
                    <a href="{{ route('moneyCollector.create') }}" class="font">
                        <i class="menu-icon fa fa-user-plus"></i>
                        {{ __('language.add') }}
                    </a>
                    <b class="arrow"></b>
                </li>
            </ul>
        </li>

        {{-- road  --}}
        <li>
            <a href="#" class="dropdown-toggle font">
                <i class="menu-icon fa fa-road"></i>
                {{ __('language.road') }}
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>

            <ul class="submenu">
                <li>
                    <a href="{{ route('road.create') }}" class="font">
                        <i class="menu-icon fa fa-plus"></i>
                        {{ __('language.addRoad') }}
                    </a>
                    <b class="arrow"></b>
                </li>
            </ul>
        </li>

        {{-- usage Type  --}}
        <li>
            <a href="#" class="dropdown-toggle font">
                <i class="menu-icon fa fa-list"></i>
                {{ __('language.usageType') }}
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>

            <ul class="submenu">
                <li>
                    <a href="{{ route('usageType.create') }}" class="font">
                        <i class="menu-icon fa fa-plus"></i>
                        {{ __('language.addUsageType') }}
                    </a>
                    <b class="arrow"></b>
                </li>
            </ul>
        </li>

        {{-- Plot  --}}
        <li>
            <a href="#" class="dropdown-toggle font">
                <i class="menu-icon fa fa-list"></i>
                {{ __('language.plot') }}
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>

            <ul class="submenu">
                <li>
                    <a href="{{ route('plot.create') }}" class="font">
                        <i class="menu-icon fa fa-plus"></i>
                        {{ __('language.addPlot') }}
                    </a>
                    <b class="arrow"></b>
                </li>
            </ul>
        </li>



        {{-- Building  --}}
        <li>
            <a href="#" class="dropdown-toggle font">
                <i class="menu-icon fa fa-list"></i>
                {{ __('language.building') }}
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>

            <ul class="submenu">
                <li>
                    <a href="{{ route('building.create') }}" class="font">
                        <i class="menu-icon fa fa-plus"></i>
                        {{ __('language.addBuilding') }}
                    </a>
                    <b class="arrow"></b>
                </li>
            </ul>
        </li>




        {{-- Flat  --}}
        <li>
            <a href="#" class="dropdown-toggle font">
                <i class="menu-icon fa fa-list"></i>
                {{ __('language.flat') }}
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>

            <ul class="submenu">
                <li>
                    <a href="{{ route('flat.create') }}" class="font">
                        <i class="menu-icon fa fa-plus"></i>
                        {{ __('language.addFlat') }}
                    </a>
                    <b class="arrow"></b>
                </li>
                <li>
                    <a href="{{ route('flat.list') }}" class="font">
                        <i class="menu-icon fa fa-list"></i>
                        {{ __('language.flatList') }}
                    </a>
                    <b class="arrow"></b>
                </li>
            </ul>
        </li>
    </ul>
</li>
{{-- Billing Info --}}
<li>
    <a href="#" class="dropdown-toggle font">
        <i class="menu-icon fa fa-money-bill-wave"></i>
        {{ __('language.billing') }}
        <b class="arrow fa fa-angle-down"></b>
    </a>
    <b class="arrow"></b>

    {{-- year  --}}
    <ul class="submenu">
        <li>
            <a href="#" class="dropdown-toggle font">
                <i class="menu-icon fa fa-map-marker-alt"></i>
                {{ __('language.year') }}
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>

            <ul class="submenu">
                <li>
                    <a href="{{ route('year.create') }}" class="font">
                        <i class="menu-icon fa fa-directions"></i>
                        {{ __('language.addYear') }}
                    </a>
                    <b class="arrow"></b>
                </li>
            </ul>
        </li>

        {{-- bill  --}}
        <li>
            <a href="#" class="dropdown-toggle font">
                <i class="menu-icon fa fa-money-bill-wave"></i>
                {{ __('language.generateBill') }}
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>

            <ul class="submenu">
                <li>
                    <a href="{{ route('generateBill.create') }}" class="font">
                        <i class="menu-icon fa fa-money-bill-wave"></i>
                        {{ __('language.generateMonthlyBill') }}
                    </a>
                    <b class="arrow"></b>
                </li>
                <li>
                    <a href="{{ route('generateBill.yearlyBillCreate') }}" class="font">
                        <i class="menu-icon fa fa-money-bill-wave"></i>
                        {{ __('language.generateYearlyBill') }}
                    </a>
                    <b class="arrow"></b>
                </li>
                <li>
                    <a href="{{ route('generateBill.singleBillCreate') }}" class="font">
                        <i class="menu-icon fa fa-money-bill-wave"></i>
                        {{ __('language.generateSingleBill') }}
                    </a>
                    <b class="arrow"></b>
                </li>
                <li>
                    <a href="{{ route('payments.create') }}" class="font">
                        <i class="menu-icon fa fa-money-bill-wave"></i>
                        {{ __('language.billPayment') }}
                    </a>
                    <b class="arrow"></b>
                </li>
                <li>
                    <a href="{{ route('paidUnpaid.list') }}" class="font">
                        <i class="menu-icon fa fa-money-bill-wave"></i>
                        {{ __('language.paidUnpaid') }}
                    </a>
                    <b class="arrow"></b>
                </li>
                <li>
                    <a href="{{ route('advanceBill.list') }}" class="font">
                        <i class="menu-icon fa fa-money-bill-wave"></i>
                        {{ __('language.advanceBill') }}
                    </a>
                    <b class="arrow"></b>
                </li>
                <li>
                    <a href="{{ route('report') }}" class="font">
                        <i class="menu-icon fa fa-money-bill-wave"></i>
                        {{ __('language.report') }}
                    </a>
                    <b class="arrow"></b>
                </li>
            </ul>
        </li>
    </ul>
</li>
