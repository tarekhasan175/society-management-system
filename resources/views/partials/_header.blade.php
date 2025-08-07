@php
    $notificationService = new App\Services\AppNotificationService();
    $systemSettings = App\Models\SystemSetting::whereIn('key', ['topbar_background_color', 'topbar_text_color'])->get();

    $bg_color = $systemSettings->where('key', 'topbar_background_color')->first()->value ?? '#dfe2cd' ;
    $text_color = ($systemSettings->where('key', 'topbar_text_color')->first()->value ?? '#478FCA') . ' !important';
    $totalNotification = $notificationService->totalNotificationCount;
    $company = \App\Models\Company::first();

@endphp

<style>
    .navbar {
        background: {{ $bg_color }};
    }

    .topbar-text-color {
        color: {{ $text_color }};
    }
</style>
<div id="navbar" class="navbar navbar-default ace-save-state navbar-fixed-top">
    <div class="navbar-container ace-save-state" id="navbar-container">
        <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
            <span class="sr-only">Toggle sidebar</span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>
        </button>

        <div class="navbar-header pull-left">
            <a href="{{ url('dashboard') }}" class="navbar-brand">
                <small class="text-primary font-weight-bold" style="font-weight: 600">

{{--                    @if(file_exists('uploads/group/'. optional(optional(optional(auth()->user())->company)->group)->logo))--}}
{{--                        <img class="logo" src="{{ asset('uploads/group/'. optional(optional(optional(auth()->user())->company)->group)->logo) }}" alt="">--}}
{{--                    @else--}}
                        <span class="blue topbar-text-color">
{{--                            <i class="fa fa-flag"></i>--}}
{{--                            {{ optional(optional(optional(auth()->user())->company)->group)->name }}--}}
                            {{ optional(optional(auth()->user())->company)->name }}

                            @if(auth()->user()->type == 'user')
                            {{$company->name}}
                            @endif
                        </span>
{{--                    @endif--}}
                </small>
            </a>
        </div>

        <div class="navbar-buttons navbar-header pull-right" role="navigation">
            <ul class="nav ace-nav">

                <li class="light-10 dropdown-modal" title="Recommend Notifications">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <i class="fa fa-2x fa-bell dark" style="margin-top: 10px;"></i>
                        @if ($totalNotification > 0)
                            <sup style="color: white;font-size: 12px;margin-left: -16px;background-color: red;padding: 2px;border-radius: 50%;">
                                <b>0</b>
                            </sup>
                        @endif

                    </a>

                    <ul class="dropdown-menu-right dropdown-navbar navbar-default dropdown-menu dropdown-caret dropdown-close">
                        <li class="dropdown-header">
                            <i class="ace-icon fa fa-bell-o"></i>
                            0
                            Total Notifications
                        </li>

                        <li class="dropdown-content">
                            <ul class="dropdown-menu dropdown-navbar navbar-default">



                                <li class="bg-info">
                                    <a href="#">
                                        <div class="clearfix">
                                            <span class="pull-left dark">Notification Name</span>
                                            <span class="pull-right">
                                                <span class="badge badge-danger" style="border-radius: 50%;">0</span>
                                            </span>
                                        </div>
                                    </a>
                                </li>

                            </ul>
                        </li>

                    </ul>
                </li>
                <!--  Leave Application Notification End  -->

                <li class="light-10" title="Change Language">
                    @if(app()->getLocale() === 'en')
                        <a href="{{ route('lang.switch', 'bn') }}"  style="background-color: #00BE67 !important; color: #ffffff !important; font-size: 15px; font-weight: bolder !important;">বাংলা</a>
                    @else
                        <a href="{{ route('lang.switch', 'en') }}" style="background-color: #00BE67 !important; color: #ffffff !important; font-size: 15px; font-weight: bolder !important;">English</a>
                    @endif
                </li>





                <li class="light-10 dropdown-modal">
                    <a data-toggle="dropdown" href="#" class="dropdown-toggle dark">
                        {{-- @if (optional(auth()->user())->employee)
                            @if (auth()->user()->employee->image != 'default.png')
                                <img class="nav-user-photo" style="height:40px; width:40px" src="{{ asset(auth()->user()->employee->image) }}" alt="User Photo" />
                            @else
                                <img class="nav-user-photo" src="{{ asset('default-user.png') }}" alt="User Photo" />
                            @endif
                        @else --}}
                            <img class="nav-user-photo" src="{{ asset('default-user.png') }}" alt="User Photo" />
                        {{-- @endif --}}

                        <span class="user-info">
                            <small>{{ __('language.Welcome') }},</small>
                            {{ optional(auth()->user())->name }}
                        </span>

                        <i class="ace-icon dark fa fa-caret-down"></i>
                    </a>

                    <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">

                        <li>
                            <a href="{{ route('user.password.edit') }}">
                                <i class="ace-icon fa fa-user"></i>
                                {{ __('language.Change-Password') }}
                            </a>
                        </li>

                        <li class="divider"></li>

                        <li>
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();  document.getElementById('logout-form').submit();">
                                <i class="ace-icon fa fa-power-off"></i>
                                {{ __('language.Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>

    </div>
</div>
