

@if(hasAnyPermission(['compliances.index'], $slugs))
    <li class="{{ request()->segment(2) == 'complaince' || request('report_type') == 'complaince' ?  'open' : '' }}">
        <a href="#" class="dropdown-toggle" title="Complaince Attendance Report">
            <i class="menu-icon fa fa-caret-right"></i>
            Complaince
            <b class="arrow fa fa-angle-down"></b>
        </a>
        <b class="arrow"></b>
        <ul class="submenu">
            @if (hasPermission("compliances.shift", $slugs))
                <li class="{{ request()->is('hrm/complaince/complaince-shifts') ? 'active' : '' }}">
                    <a href="{{ route('complaince-shifts.index') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Shifts
                    </a>
                    <b class="arrow"></b>
                </li>
            @endif

            @if (hasPermission("compliances.today.attendance", $slugs))
                <li class="{{ request()->is('hrm/attendance/today') && request('report_type') == 'complaince' ? 'active' : '' }}">
                    <a href="{{ route('hrm.attendance.today') }}?report_type=complaince" title="Today Attendance Report">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Today Attd
                    </a>
                    <b class="arrow"></b>
                </li>
            @endif


            @if (hasPermission("compliances.monthly.attendance", $slugs))
                <li class="{{ request()->is('hrm/attendance/monthly') && request('report_type') == 'complaince' ? 'active' : '' }}">
                    <a href="{{ route('hrm.attendance.monthly') }}?report_type=complaince" title="Monthly Attendance Report">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Monthly Attd
                    </a>
                    <b class="arrow"></b>
                </li>
            @endif

            @if (hasPermission("compliances.monthly.summary", $slugs))
                <li class="{{ request()->is('hrm/attendance/monthly-summary') && request('report_type') == 'complaince' ? 'active' : '' }}">
                    <a href="{{ route('hrm.attendance.monthly.summary') }}?report_type=complaince" title="Monthly Attendance Summury">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Monthly Sum
                    </a>
                    <b class="arrow"></b>
                </li>
            @endif

            @if (hasPermission("compliances.job.card", $slugs))
                <li class="{{ request()->is('hrm/attendance/employee-monthly-attendance') ? 'active' : '' }}">
                    <a href="{{ route('employee-monthly-attendance') }}?report_type=complaince" title="Employee Monthly Attendance">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Job Card
                    </a>
                    <b class="arrow"></b>
                </li>
            @endif


            @if (in_array("compliances.salary.list", $slugs) || auth()->id() == 1)
                <li class="{{ request()->is('hrm/payroll/salary-generate') ? 'active' : '' }}" title="Generated Salary List">
                    <a href="{{ route('salary-generate.index') }}?report_type=complaince">
                        <i class="menu-icon fa fa-caret-right"></i>
                        G. Salary List
                    </a>
                    <b class="arrow"></b>
                </li>
            @endif
        </ul>
    </li>
@endif

