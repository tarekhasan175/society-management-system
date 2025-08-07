@php
    $modules = Module\Permission\Models\Module::active()->get();
@endphp


<div id="sidebar" class="sidebar responsive ace-save-state sidebar-fixed sidebar-scroll">
    <script type="text/javascript">
        try {
            ace.settings.loadState('sidebar')
        } catch (e) {}
    </script>


    <ul class="nav nav-list">

        {{-- nagorik admin sidebar --}}
        {{-- @if (auth()->user()->type == 'admin')

            @if ($modules->where('name', 'Nagarik')->first())
                @include('partials.__sidebar_nagarik_admin')
            @endif

        @endif --}}


        {{-- chamber admin sidebar  --}}
        {{-- @if (auth()->user()->type == 'admin')

            @if ($modules->where('name', 'Chamber')->first())
                @include('partials.__sidebar_chamber_admin')
            @endif

        @endif --}}

        @if (auth()->user()->type == 'admin')

            @if ($modules->where('name', 'Society')->first())
                @include('partials.__sidebar_society_admin')
            @endif

        @endif



        @if (auth()->user()->type == 'admin')
            {{-- <li class="{{ request()->is('home') ? 'active' : '' }}"> --}}
            {{-- <a href="{{ url('home') }}"> --}}
            {{-- <i class="menu-icon fa fa-tachometer"></i> --}}
            {{-- <span class="menu-text"> Dashboard </span> --}}
            {{-- </a> --}}

            {{-- <b class="arrow"></b> --}}
            {{-- </li> --}}


            <!--  HRM MODULE  [if CRM MODULE ACTIVE THEN THESE ROUTE WILL SHOW]  -->
            @if ($modules->where('name', 'CRM')->first())
                @include('partials.sidebars.__sidebar_crm')
            @endif


            <!-- Production MOdule -->
            @if ($modules->where('name', 'Production')->first())
                @include('partials.__sidebar_production')
            @endif
            <!-- Nagarik MOdule -->
        @endif


        {{-- @if (auth()->user()->type == 'user')

            @if ($modules->where('name', 'Nagarik')->first())
                @include('partials.__sidebar_nagarik')
            @endif

        @endif


        @if (auth()->user()->type == 'user')
            @if ($modules->where('name', 'Chamber')->first())
                @include('partials.__sidebar_chamber')
            @endif
        @endif --}}


        @if (auth()->user()->type == 'user')
            @if ($modules->where('name', 'Society')->first())
                @include('partials.__sidebar_society')
            @endif
        @endif

        


        @if (auth()->user()->type == 'admin')

            <!--  GLOBAL SETTING MODULE  -->
            @include('partials.sidebars.__sidebar_global_setting')



            <!--  USER ACCESS MODULE  -->
            @include('partials.sidebars.__sidebar_user_access')



            <!--  ACCOUNT MODULE  [if CRM MODULE ACTIVE THEN THESE ROUTE WILL SHOW]  -->
            {{-- @if (hasModulePermission('Account & Finance', $active_modules)) --}}


            @if (
                $modules->where('name', 'Account & Finance')->first() &&
                    file_exists(base_path() . '/module/Account/routes/web_account.php') &&
                    hasModulePermission('Account & Finance', $active_modules))
                @include('partials.sidebars.__sidebar_account_finance')
            @endif



        @endif







        <!--  HRM MODULE  -->
        {{-- @include('partials.sidebars.__sidebar_hrm') --}}



        <!--  GENERAL STORE MODULE  -->
        {{-- @include('partials.sidebars.__sidebar_general_store') --}}



        <!--  MERCHANDISING MODULE  -->
        {{-- @include('partials.sidebars.__sidebar_merchandising') --}}



        <!--  COMMERCIAL MODULE  -->
        {{-- @include('partials.sidebars.__sidebar_commercial') --}}



        <!--  INVENTORY MODULE  -->
        {{-- @include('partials.sidebars.__sidebar_inventory') --}}



        <!--  KNITTING & DYEING MODULE  -->
        {{-- @include('partials.sidebars.__sidebar_knitting_dyeing') --}}



        <!--  PAYMENT MODULE  -->
        {{-- @include('partials.sidebars.__sidebar_payment') --}}



        <!--  NEWS AND NOTIFICATION MODULE  -->
        {{-- @include('partials.sidebars.__sidebar_news_notification') --}}


    </ul><!-- /.nav-list -->

    <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
        <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state"
            data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
    </div>
</div>
