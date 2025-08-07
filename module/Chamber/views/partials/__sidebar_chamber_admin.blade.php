{{-- bangla font  --}}
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Serif+Bengali&display=swap" rel="stylesheet">

<style>
    .font {
        font-family: 'Noto Serif Bengali', serif;
    }
</style>


{{-- membership_information  --}}
<li>
    <a href="#" class="dropdown-toggle font">
        <i class="menu-icon fa fa-users"></i>
        {{ __('language.membership_information') }}
        <b class="arrow fa fa-angle-down"></b>
    </a>
    <b class="arrow"></b>

    <ul class="submenu">
        <li>
            <a href="{{ route('membership.member_create_1') }}" class="font">
                <i class="menu-icon fa fa-user-plus"></i>
                {{ __('language.addmember') }}
            </a>
            <b class="arrow"></b>
        </li>
        <li>
            <a href="{{ route('membership.memberlist') }}" class="font">
                <i class="menu-icon fa fa-user"></i>
                {{ __('language.member_list') }}
            </a>
            <b class="arrow"></b>
        </li>
        <li>
            <a href="" class="font">
                <i class="menu-icon fa fa-file-alt"></i>
                {{ __('language.member_report') }}
            </a>
            <b class="arrow"></b>
        </li>
    </ul>
</li>

{{-- settings  --}}
<li>
    <a href="#" class="dropdown-toggle font">
        <i class="menu-icon fa fa-tools"></i>
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
                    <a href="{{ route('districts.create') }}" class="font">
                        <i class="menu-icon fa fa-directions"></i>
                        {{ __('language.district') }}
                    </a>
                    <b class="arrow"></b>
                </li>
                <li>
                    <a href="{{ route('upazillas.create') }}" class="font">
                        <i class="menu-icon fa fa-directions"></i>
                        {{ __('language.upazilla') }}
                    </a>
                    <b class="arrow"></b>
                </li>
            </ul>
        </li>
    </ul>

    {{-- member category  --}}
    <ul class="submenu">
        <li>
            <a href="#" class="dropdown-toggle font">
                <i class="menu-icon fa fa-user-tag"></i>
                {{ __('language.membercategory') }}
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>

            <ul class="submenu">
                <li>
                    <a href="{{ route('memberCategory.create') }}" class="font">
                        <i class="menu-icon fa fa-user-plus"></i>
                        {{ __('language.addmembercategory') }}
                    </a>
                    <b class="arrow"></b>
                </li>
            </ul>
        </li>
    </ul>

    {{-- firm Status  --}}
    <ul class="submenu">
        <li>
            <a href="#" class="dropdown-toggle font">
                <i class="menu-icon fa fa-info-circle"></i>
                {{ __('language.firmStatus') }}
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>

            <ul class="submenu">
                <li>
                    <a href="{{ route('firmStatus.create') }}" class="font">
                        <i class="menu-icon fa fa-info"></i>
                        {{ __('language.addFirmStatus') }}
                    </a>
                    <b class="arrow"></b>
                </li>
            </ul>
        </li>
    </ul>

    {{-- nature of business  --}}
    <ul class="submenu">
        <li>
            <a href="#" class="dropdown-toggle font">
                <i class="menu-icon fa fa-briefcase"></i>
                {{ __('language.businessNature') }}
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>

            <ul class="submenu">
                <li>
                    <a href="{{ route('businessNature.create') }}" class="font">
                        <i class="menu-icon fa fa-briefcase-medical"></i>
                        {{ __('language.addBusinessNature') }}
                    </a>
                    <b class="arrow"></b>
                </li>
            </ul>
        </li>
    </ul>

     {{-- account year  --}}
     <ul class="submenu">
        <li>
            <a href="#" class="dropdown-toggle font">
                <i class="menu-icon fa fa-calendar-alt"></i>
                {{ __('language.accountYear') }}
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>

            <ul class="submenu">
                <li>
                    <a href="{{ route('accountYear.create') }}" class="font">
                        <i class="menu-icon fa fa-calendar-plus "></i>
                        {{ __('language.accountYearInfo') }}
                    </a>
                    <b class="arrow"></b>
                </li>
            </ul>
        </li>
    </ul>

     {{--Company settings  --}}
     <ul class="submenu">
        <li>
            <a href="#" class="dropdown-toggle font">
                <i class="menu-icon fa fa-gear"></i>
                {{ __('language.companySetting') }}
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>

            <ul class="submenu">
                <li>
                    <a href="{{ route('companySetting.create') }}" class="font">
                        <i class="menu-icon fa fa-plus "></i>
                        {{ __('language.addCompanySetting') }}
                    </a>
                    <b class="arrow"></b>
                </li>
                <li>
                    <a href="{{ route('companySetting.list') }}" class="font">
                        <i class="menu-icon fa fa-plus "></i>
                        {{ __('language.listCompanySetting') }}
                    </a>
                    <b class="arrow"></b>
                </li>
            </ul>
        </li>
    </ul>
    {{-- payment Head Information   --}}
    <ul class="submenu">
        <li>
            <a href="#" class="dropdown-toggle font">
                <i class="menu-icon fa fa-briefcase"></i>
                {{ __('language.paymentHead') }}
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>

            <ul class="submenu">
                <li>
                    <a href="{{ route('paymentheads.create') }}" class="font">
                        <i class="menu-icon fa fa-briefcase-medical"></i>
                        {{ __('language.addPaymentHead') }}
                    </a>
                    <b class="arrow"></b>
                </li>
                <li>
                    <a href="{{ route('paymentheads.index') }}" class="font">
                        <i class="menu-icon fa fa-briefcase-medical"></i>
                        {{ __('language.managePaymentHead') }}
                    </a>
                    <b class="arrow"></b>
                </li>
            </ul>
        </li>
    </ul>


     {{-- Assign Fee Information  --}}
     <ul class="submenu">
        <li>
            <a href="#" class="dropdown-toggle font">
                <i class="menu-icon fa fa-briefcase"></i>
                {{ __('language.assignFee') }}
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>

            <ul class="submenu">
                <li>
                    <a href="{{ route('assignfees.index') }}" class="font">
                        <i class="menu-icon fa fa-briefcase-medical"></i>
                        {{ __('language.assignFeeInfo') }}
                    </a>
                    <b class="arrow"></b>
                </li>
            </ul>
        </li>
    </ul
    


</li>



