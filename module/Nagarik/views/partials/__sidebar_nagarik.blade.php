<li class="{{ request()->segment(1) == 'nagarik' ? 'open' : '' }}">


    <a href="{{route('nagorik-dashboard')}}">
{{--    <a href="" class="dropdown-toggle">--}}

        <i class="menu-icon fa fa-list-alt"></i>
        <span class="menu-text bolder">{{ __('language.Civil-Service') }}</span>
{{--        <b class="arrow fa fa-angle-down"></b>--}}
    </a>
{{--    </a>--}}
    <b class="arrow"></b>

{{--    <ul class="submenu">--}}
    <li class="submenu">




        <a href="{{route('nagorik-user-profile')}}">

            <i class="menu-icon fa fa-user"></i>
            <span class="menu-text "> {{ __('language.My-Profile') }} </span>
        </a>


        <li class="{{ request()->segment(2) == 'factories' ? 'open' : '' }}">
    <a href="#" class="dropdown-toggle">
        <i class="menu-icon fa fa-caret-right" style=" transform: rotate(45deg); color:gold; font-weight:bolder"></i>
        <span class="menu-text">{{ __('language.Trade-License') }}</span>
        <b class="arrow fa fa-angle-down"></b>
    </a>
    <b class="arrow"></b>

    <ul class="submenu">

        <li >
            <a href="{{route('new-trade-license.create')}}">
                <i class="menu-icon fa fa-caret-right"></i>
                {{ __('language.New-trade-license-application') }}
            </a>
            <b class="arrow"></b>
        </li>

        <li >
            <a href="{{route('new-licence-search')}}">
                <i class="menu-icon fa fa-caret-right"></i>
                {{ __('language.Old-trade-license-application') }}
            </a>
            <b class="arrow"></b>
        </li>

{{--        <li >--}}
{{--            <a href="{{route('add-trade-number')}}">--}}
{{--                <i class="menu-icon fa fa-caret-right"></i>--}}
{{--                ট্রেড লাইসেন্স নাম্বার সংযুক্ত করুন--}}
{{--            </a>--}}
{{--            <b class="arrow"></b>--}}
{{--        </li>--}}

{{--        <li >--}}
{{--            <a href="{{route('new-trade-search')}}">--}}
{{--                <i class="menu-icon fa fa-caret-right"></i>--}}
{{--                নতুন ট্রেড লাইসেন্সের আবেদন অনুসন্ধান--}}
{{--            </a>--}}
{{--            <b class="arrow"></b>--}}
{{--        </li>--}}

{{--        <li >--}}
{{--            <a href="{{route('trade-fee')}}">--}}
{{--                <i class="menu-icon fa fa-caret-right"></i>--}}
{{--                ট্রেড লাইসেন্সের আবেদন ফি সংগ্রহ--}}
{{--            </a>--}}
{{--            <b class="arrow"></b>--}}
{{--        </li>--}}

{{--        <li >--}}
{{--            <a href="{{route('trade-re-rege')}}">--}}
{{--                <i class="menu-icon fa fa-caret-right"></i>--}}
{{--                ট্রেড লাইসেন্সের পুনঃ নবায়নের ফি সংগ্রহ--}}
{{--            </a>--}}
{{--            <b class="arrow"></b>--}}
{{--        </li>--}}

{{--        <li >--}}
{{--            <a href="{{route('owner-change')}}">--}}
{{--                <i class="menu-icon fa fa-caret-right"></i>--}}
{{--                মালিকানা পরিবর্তন--}}
{{--            </a>--}}
{{--            <b class="arrow"></b>--}}
{{--        </li>--}}

{{--        <li >--}}
{{--            <a href="{{route('change-business-type')}}">--}}
{{--                <i class="menu-icon fa fa-caret-right"></i>--}}
{{--                ব্যবসায়ের ধরণ পরিবর্তনের আবেদন--}}
{{--            </a>--}}
{{--            <b class="arrow"></b>--}}
{{--        </li>--}}
{{--        <li >--}}
{{--            <a href="{{route('trade-licence-print')}}">--}}
{{--                <i class="menu-icon fa fa-caret-right"></i>--}}
{{--                ট্রেড লাইসেন্স প্রিন্ট--}}
{{--            </a>--}}
{{--            <b class="arrow"></b>--}}
{{--        </li>--}}



    </ul>

</li>



        <li class="{{ request()->segment(2) == 'users' ? 'open' : '' }}">
    <a href="#" class="dropdown-toggle">
        <i class="menu-icon fa fa-caret-right" style=" transform: rotate(45deg); color:gold; font-weight:bolder"></i>
        <span class="menu-text">{{ __('language.Holding-Tax') }}</span>
        <b class="arrow fa fa-angle-down"></b>
    </a>
    <b class="arrow"></b>



            <ul class="submenu">
        {{--                <li class="{{ request()->is('setting/users/create') ? 'active' : '' }}">--}}


        <li >
            <a href="{{route('holding-taxApply.index')}}">
                <i class="menu-icon fa fa-caret-right"></i>


                {{ __('language.new_holding_apply') }}
            </a>
            <b class="arrow"></b>
        </li>


        <li >
            <a href="{{route('add-holding-number')}}">
                <i class="menu-icon fa fa-caret-right"></i>
                {{ __('language.Add_E_Holding_Number') }}
            </a>
            <b class="arrow"></b>
        </li>
        <li >
            <a href="{{route('add-general-request')}}">
                <i class="menu-icon fa fa-caret-right"></i>

                {{ __('language.general_request') }}
            </a>
            <b class="arrow"></b>
        </li>
        <li >
            <a href="{{route('e-holding-dashboard')}}">
                <i class="menu-icon fa fa-caret-right"></i>

                {{ __('language.e_holding_dashboard') }}

            </a>
            <b class="arrow"></b>
        </li>
        <li >
            <a href="{{route('e-holding-notice')}}">
                <i class="menu-icon fa fa-caret-right"></i>
               {{__('language.e_notice')}}
            </a>
            <b class="arrow"></b>
        </li>
        <li >
            <a href="{{route('e-holding-details')}}">
                <i class="menu-icon fa fa-caret-right"></i>
               {{__('language.e_holding_details')}}
            </a>
            <b class="arrow"></b>
        </li>
        <li >
            <a href="{{route('name-given')}}">
                <i class="menu-icon fa fa-caret-right"></i>
                {{ __('language.Nomination_Application_Form') }}
            </a>
            <b class="arrow"></b>
        </li>
        <li >
            <a href="{{route('due-report')}}">
                <i class="menu-icon fa fa-caret-right"></i>
                 {{ __('language.due_details') }}
            </a>
            <b class="arrow"></b>
        </li>
        <li >
            <a href="{{route('quick-pay')}}">
                <i class="menu-icon fa fa-caret-right"></i>
                  {{ __('language.quick_pay') }}
            </a>
            <b class="arrow"></b>
        </li>
        <li >
            <a href="{{route('others-payment')}}">
                <i class="menu-icon fa fa-caret-right"></i>
                {{ __('language.others_pay') }}
            </a>
            <b class="arrow"></b>
        </li>
        <li >
            <a href="{{route('tax-details')}}">
                <i class="menu-icon fa fa-caret-right"></i>
             {{ __('language.online_tex_pay_history') }}
            </a>
            <b class="arrow"></b>
        </li>



        {{--                <li class="{{ request()->is('setting/users') ? 'active' : '' }}">--}}
        {{--                    <a href="">--}}
        {{--                        <i class="menu-icon fa fa-caret-right"></i>--}}
        {{--                        Create--}}
        {{--                    </a>--}}
        {{--                    <b class="arrow"></b>--}}
        {{--                </li>--}}


    </ul>
</li>



        <li class="{{ request()->segment(2) == 'materials-assign' ? 'open' : '' }}">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-caret-right" style=" transform: rotate(45deg); color:gold; font-weight:bolder"></i>
                <span class="menu-text">{{ __('language.Hotel-Tax') }}</span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>

            <ul class="submenu">
                <li  >
                    <a href="{{route('hotel-tax.index')}}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        ই-হোটেল  নম্বর নিবন্ধীকরণ
                    </a>
                    <b class="arrow"></b>
                </li>
                <li >
                    <a href="{{route('hotel-dashboard')}}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        ই-হোটেল ড্যাশবোর্ড
                    </a>
                    <b class="arrow"></b>
                </li>

{{--                <li class="{{ request()->is('production/materials-assign/create') ? 'active' : '' }}">--}}
{{--                    <a href="">--}}
{{--                        <i class="menu-icon fa fa-caret-right"></i>--}}
{{--                        Create--}}
{{--                    </a>--}}
{{--                    <b class="arrow"></b>--}}
{{--                </li>--}}
            </ul>
        </li>



        <li class="{{ request()->segment(2) == 'factories' ? 'open' : '' }}">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-caret-right" style=" transform: rotate(45deg); color:gold; font-weight:bolder"></i>
                        <span class="menu-text">{{ __('language.Market-Salami-And-Rent') }}</span>
                        <b class="arrow fa fa-angle-down"></b>
                    </a>
                    <b class="arrow"></b>

                    <ul class="submenu">
                        <li >
                            <a href="{{route('shop-booking')}}">
                                <i class="menu-icon fa fa-caret-right"></i>
                                দোকান বরাদ্দের আবেদনপত্র
                            </a>
                            <b class="arrow"></b>
                        </li>
                    </ul>
                </li>


{{--        <li class="{{ request()->segment(2) == 'factories' ? 'open' : '' }}">--}}
{{--            <a href="#" class="dropdown-toggle">--}}
{{--                <i class="menu-icon fa fa-caret-right" style=" transform: rotate(45deg); color:gold; font-weight:bolder"></i>--}}
{{--                <span class="menu-text">হুইল  ট্যাক্স</span>--}}
{{--                <b class="arrow fa fa-angle-down"></b>--}}
{{--            </a>--}}
{{--            <b class="arrow"></b>--}}

{{--            <ul class="submenu">--}}
{{--                <li >--}}
{{--                    <a href="{{route('new-hol-tax')}}">--}}
{{--                        <i class="menu-icon fa fa-caret-right"></i>--}}
{{--                        নতুন হুইল ট্যাক্সের আবেদন--}}
{{--                    </a>--}}
{{--                    <b class="arrow"></b>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </li>--}}









{{--        <li class="{{ request()->segment(2) == 'factories' ? 'open' : '' }}">--}}
{{--            <a href="#" class="dropdown-toggle">--}}
{{--                <i class="menu-icon fa fa-caret-right" style=" transform: rotate(45deg); color:gold; font-weight:bolder"></i>--}}
{{--                <span class="menu-text">Settings</span>--}}
{{--                <b class="arrow fa fa-angle-down"></b>--}}
{{--            </a>--}}
{{--            <b class="arrow"></b>--}}

{{--            <ul class="submenu">--}}
{{--                <li class="{{ request()->is('production/factories') ? 'active' : '' }}">--}}
{{--                    <a href="">--}}
{{--                        <i class="menu-icon fa fa-caret-right"></i>--}}

{{--                    </a>--}}
{{--                    <b class="arrow"></b>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </li>--}}

    </li>
</li>

