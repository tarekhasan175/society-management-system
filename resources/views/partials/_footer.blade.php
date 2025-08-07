@php
    $company = \App\Models\Company::first();
@endphp

<div class="footer hidden-print">
    <div class="footer-inner">
        <div class="footer-content">
            <span class="bigger-120" style="float: left; padding-left: 12%;">
                {{ __('language.Copyright') }} &copy;{{ date('Y') }} <span class="blue bolder">
                    {{ optional(optional(auth()->user())->company)->name }}

                    @if(auth()->user()->type == 'user')
                        {{$company->name}}
                    @endif
                </span>
            </span>
            <strong class="pull-right" style="padding-right:100px">{{ __('language.Developed-By') }}: <a href="https://www.smartsoftware.com.bd/" target="__blank"> {{ __('language.Smart-Software-Ltd') }}</a></strong>
        </div>
    </div>
</div>

<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
    <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
</a>
