{{-- biodata module --}}
<li class="{{ request()->url('/') ? 'open active' : '' }} custom-item-color" style="font-family:Varela;">
    <a href="{{ url('home') }}">
        <i class="menu-icon fa fa-gears red"></i>
    <span class="menu-text bolder">{{ __('language.Civil-Service-Admin') }}</span>
    </a>
    <b class="arrow"></b>

    <ul class="submenu">
        <li class="">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-area-chart bigger-130"></i>
                <span class="menu-text">   {{ __('language.business_step') }}</span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                {{-- 'Add Person' submenu of "Person" --}}
                <li class="">
                    <a href="{{route('financial-years.index')}}">
                        <i class=" fa fa-plus purple"></i>
                        {{ __('language.Financial_year') }}
                    </a>
                    <b class="arrow"></b>
                </li>

                {{-- 'Persons List' submenu of "Person" --}}
                <li class="">
                    <a href="{{route('business-type.index')}}">
                        <i class=" fa fa-plus purple"></i>
                        {{ __('language.business_step') }}
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="">
                    <a href="{{route('licence-fee.index')}}">
                        <i class=" fa fa-list red"></i>
                          {{ __('language.licence_fee') }}
                    </a>
                    <b class="arrow"></b>
                </li>
            </ul>
        </li>
    </ul>


    <ul class="submenu">
        <li class="">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-list bigger-130"></i>
                <span class="menu-text">   {{ __('language.Attachment_description') }}</span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                {{-- 'Add Person' submenu of "Person" --}}
                <li class="">
                    <a href="{{route('add-additional.create')}}">
                        <i class=" fa fa-plus purple"></i>
                          {{ __('language.new_add') }}
                    </a>
                    <b class="arrow"></b>
                </li>

{{--                 'Persons List' submenu of "Person" --}}
                <li class="">
                    <a href="{{route('add-instituteType.create')}}">
                        <i class=" fa fa-plus purple"></i>
                         {{ __('language.business_type') }}
                    </a>
                    <b class="arrow"></b>
                </li>
            </ul>
        </li>
    </ul>

    <ul class="submenu">
        <li class="">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-list bigger-130"></i>
                <span class="menu-text">    {{ __('language.holding_tex_settings') }} </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                {{-- 'Add Person' submenu of "Person" --}}
                <li class="">
                    <a href="{{route('holding-land-type.index')}}">
                        <i class=" fa fa-plus purple"></i>
                     {{ __('language.land_type') }}
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="">
                    <a href="{{route('holding-rates.index')}}">
                        <i class=" fa fa-plus purple"></i>
                       {{ __('language.holding_tex_rate') }}
                    </a>
                    <b class="arrow"></b>
                </li>



            </ul>
        </li>
    </ul>



    <ul class="submenu">
        <li class="">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-area-chart bigger-130"></i>
                <span class="menu-text">   {{ __('language.address_city') }} </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                {{-- 'Add Person' submenu of "Person" --}}
                <li class="">
                    <a href="{{ route('region.create') }}">
                        <i class=" fa fa-plus purple"></i>
                          {{ __('language.area') }}
                    </a>
                    <b class="arrow"></b>
                </li>

                {{-- 'Persons List' submenu of "Person" --}}

                <li class="">
                    <a href="{{route('region-words.create')}}">
{{--                        <i class=" fa fa-list red"></i>--}}
                        <i class=" fa fa-plus purple"></i>
                          {{ __('language.word') }}
                    </a>
                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="{{route('region-sector.create')}}">
                        <i class=" fa fa-plus purple"></i>
                           {{ __('language.sector') }}
                    </a>
                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="{{route('region-area.create')}}">
                        <i class=" fa fa-plus purple"></i>
                          {{ __('language.block') }}
                    </a>
                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="{{route('region-road.create')}}">
                        <i class=" fa fa-plus purple"></i>
                          {{ __('language.road') }}
                    </a>
                    <b class="arrow"></b>
                </li>


            </ul>
        </li>
    </ul>
    <ul class="submenu" style="display: none">
        <li class="">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-road bigger-130"></i>
                <span class="menu-text">ঠিকানা নির্ধারণ(ইউনিয়ন)</span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                {{-- 'Add Person' submenu of "Person" --}}
                <li class="">
                    <a href="">
                        <i class=" fa fa-plus purple"></i>
                        নতুন সংযোজন
                    </a>
                    <b class="arrow"></b>
                </li>

                {{-- 'Persons List' submenu of "Person" --}}
                <li class="">
                    <a href="">
                        <i class=" fa fa-list red"></i>
                        তালিকা
                    </a>
                    <b class="arrow"></b>
                </li>
            </ul>
        </li>
    </ul>
    <ul class="submenu" style="display: none">
        <li class="">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-area-chart bigger-130"></i>
                <span class="menu-text">এলাকা/ব্লক নির্ধারণ</span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                {{-- 'Add Person' submenu of "Person" --}}
                <li class="">
                    <a href="">
                        <i class=" fa fa-plus purple"></i>
                        নতুন সংযোজন
                    </a>
                    <b class="arrow"></b>
                </li>

                {{-- 'Persons List' submenu of "Person" --}}
                <li class="">
                    <a href="">
                        <i class=" fa fa-list red"></i>
                        তালিকা
                    </a>
                    <b class="arrow"></b>
                </li>
            </ul>
        </li>
    </ul>
    <ul class="submenu" style="display: none">
        <li class="">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-road bigger-130"></i>
                <span class="menu-text"> রাস্তা নির্ধারণ</span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                {{-- 'Add Person' submenu of "Person" --}}
                <li class="">
                    <a href="">
                        <i class=" fa fa-plus purple"></i>
                        নতুন সংযোজন
                    </a>
                    <b class="arrow"></b>
                </li>

                {{-- 'Persons List' submenu of "Person" --}}
                <li class="">
                    <a href="">
                        <i class=" fa fa-list red"></i>
                        তালিকা
                    </a>
                    <b class="arrow"></b>
                </li>
            </ul>
        </li>
    </ul>


    <ul class="submenu">
        <li class="">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-certificate bigger-130"></i>
                <span class="menu-text">    {{ __('language.tl') }}</span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                <li class="">
                    <a href="{{ route('trade-license-approval.index') }}">
                        <i class=" fa fa-list red"></i>
                        {{ __('language.new_apply') }}
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="">
                    <a href="{{ route('old-trade-license-approval.index') }}">
                        <i class=" fa fa-list red"></i>
                            {{ __('language.old_apply') }}
                    </a>
                    <b class="arrow"></b>
                </li>
            </ul>
        </li>
    </ul>
    <ul class="submenu">
        <li class="">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-certificate bigger-130"></i>
                <span class="menu-text">       {{ __('language.Holding_tex') }}  </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                <li class="">
                    <a href="{{ route('admin-receive-holding-tex-apply.index') }}">
                        <i class=" fa fa-list red"></i>
                        {{ __('language.holding_tex_receive') }}
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="">
                    <a href="{{ route('admin-receive-holding-tex-apply.create') }}">
                        <i class=" fa fa-list red"></i>
                        {{ __('language.approve_holding_tex') }}
                    </a>
                    <b class="arrow"></b>
                </li>
            </ul>
        </li>
    </ul>

    <ul class="submenu">
        <li class="">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-money bigger-130"></i>
                <span class="menu-text">  {{ __('language.payment') }}</span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                <li class="">
                    <a href="{{ route('trade-license-payment.create') }}">
                        <i class=" fa fa-plus purple"></i>
                         {{ __('language.trade_payment') }}
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="">
                    <a href="{{route('holding-tex-payment.create')}}">
                        <i class=" fa fa-plus purple"></i>
                          {{ __('language.holding_payment') }}
                    </a>
                    <b class="arrow"></b>
                </li>
            </ul>
        </li>
    </ul>

</li>



