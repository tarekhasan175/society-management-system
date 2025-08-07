
@if(hasAnyPermission(["off.days.view","holiday.calendars.index","provision.periods.index","provision.periods.index",
    "departments.index","designations.index","grades.index","gazette.cals.index", "shifts.index","bonus.types.index",
    "employees.index","salary.setups.index","leaves.index","leave.types.index","leave.applications.index",
    "leave.application.authorizes.index","l.approval.settings.index","leave.application.cancel.lists.index",
    "l.yearly.reports.index","l.applications.index","short.leave.setups.index","short.leave.applications.index",
    "short.leave.authorities.index","attendance.bonus.entries.index","out.works.create","attendance.reports.today.attendance",
    "attendance.reports.monthly","attendance.reports.monthly.sum","late.deductions.index","late.configs.index",
    "disbursements.index","hr.loans.index","salary.increments.index","increment.eligible.periods.index",
    "attendance.bonus.settings.index","attendance.bonus.entries.index","attendance.bonus.entries.view","f.bonuses.index",
    "f.b.eligible.periods.index","generate.salaries.index","promotion.letters.index","appointment.letters.index",
    "termination.letters.index", "daily.work.reports.index", 'compliance.attendances', 'compliance.reports', 'lines.index',
    'hrm.attendance.employees.tracking', "attendance.manual.entries.edit", "attendance.manual.entries.view", "out.works.index",
    'compliance.shifts', 'overtime.holiday.allowances.index', 'processes.index', 'basic.rate.setups.index',
    'production.bonus.rate.setups.index', 'sample.rate.setups', 'production.rate.setups.index',
    'employees.production.rate.entries.index', 'production.salary.generates.index', 'sample.rate.setups.index',
    'provident.fund.policies.index', 'provident.fund.enrolments.index', 'provident.fund.opening.balances.index',
    'provident.fund.balances.index', 'schedule.managements.index', 'compliances.index'], $slugs)
    && hasModulePermission('HRM', $active_modules))

    <li class="{{ request()->segment(1) == 'hrm' && (!(request()->segment(2) == 'machine-integration' || request()->segment(2) == 'devices' || request()->segment(2) == 'attendance-logs')) ? 'open' : '' }}">
        <a href="#" class="dropdown-toggle">
            <i class="menu-icon fa fa-users"></i>
            <span class="menu-text"> HRM </span>
            <b class="arrow fa fa-angle-down"></b>
        </a>
        <b class="arrow"></b>
        <ul class="submenu">

            <!-- hr setup -->
            @if(hasAnyPermission(["off.days.view", "holiday.calendars.index","provision.periods.index","provision.periods.index","departments.index","designations.index","grades.index","gazette.cals.index","shifts.index","bonus.types.index",'lines.index'], $slugs))
                <li class="{{ request()->segment(2) == 'hr-setup' || request()->is('hrm/holiday-create') || request()->is('hrm/holiday') || request()->is('hrm/holiday-list') ? 'open' : '' }}">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-caret-right"></i>
                        HR Setup
                        <b class="arrow fa fa-angle-down"></b>
                    </a>
                    <b class="arrow"></b>

                    <ul class="submenu">
                        @if (hasPermission("off.days.view", $slugs))
                            <li class="{{ request()->is('hrm/holiday-create') || request()->is('hrm/holiday-list') ? 'active' : '' }}">
                                <a href="{{ route('hrm.holiday.create') }}">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Off Day
                                </a>
                                <b class="arrow"></b>
                            </li>
                        @endif

                        @if (hasPermission("holiday.calendars.index", $slugs))
                            <li class="{{ request()->segment(2) == 'holiday' ? 'active' : '' }}">
                                <a href="{{ route('hrm.holiday') }}">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Holiday Calender
                                </a>
                            </li>
                        @endif

                        @if (hasPermission("provision.periods.index", $slugs))
                            <li class="{{ request()->is('hrm/hr-setup/provision-period') ? 'active' : '' }}">
                                <a href="{{ route('provision-period.index') }}">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Probation Period
                                </a>
                                <b class="arrow"></b>
                            </li>
                        @endif

                        @if (hasPermission("departments.index", $slugs))
                            <li class="{{ request()->is('hrm/hr-setup/department') ? 'active' : '' }}">
                                <a href="{{ route('department.index') }}">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Department
                                </a>
                                <b class="arrow"></b>
                            </li>
                        @endif

                        @if (hasPermission("designations.index", $slugs))
                            <li class="{{ request()->is('hrm/hr-setup/designation') ? 'active' : '' }}">
                                <a href="{{ route('designation.index') }}">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Designation
                                </a>
                            </li>
                        @endif

                        @if (hasPermission("grades.index", $slugs))
                            <li class="{{ request()->is('hrm/hr-setup/grade') ? 'active' : '' }}">
                                <a href="{{ route('grade.index') }}">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Grade
                                </a>
                            </li>
                        @endif

                        @if (hasPermission("lines.index", $slugs))
                            <li class="{{ request()->is('hrm/hr-setup/line') ? 'active' : '' }}">
                                <a href="{{ route('line.index') }}">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Line
                                </a>
                            </li>
                        @endif

                        @if (hasPermission("gazette.cals.index", $slugs))
                            <li class="{{ request()->is('hrm/hr-setup/gross-setting') ? 'active' : '' }}">
                                <a href="{{ route('gross-setting.index') }}">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Gazette Cal
                                </a>
                            </li>
                        @endif

                        @if (hasPermission("shifts.index", $slugs))
                            <li class="{{ request()->is('hrm/hr-setup/shifts') ? 'active' : '' }}">
                                <a href="{{ route('shifts.index') }}">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Shifts
                                </a>
                                <b class="arrow"></b>
                            </li>
                        @endif

                        @if (hasPermission("bonus.types.index", $slugs))
                            <li class="{{ request()->is('hrm/hr-setup/bonus-types') ? 'active' : '' }}">
                                <a href="{{ route('bonus-types.index') }}" title="Bonus Type Setup">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Bonus Type
                                </a>
                                <b class="arrow"></b>
                            </li>
                        @endif

                    </ul>
                </li>
            @endif

            <!-- employee info -->
            @if(hasAnyPermission(["employees.index", "salary.setups.index"], $slugs))
                <li class="{{ request()->segment(2) == 'employee' || request()->segment(2) == "employee-upload" || request()->segment(2) == "salary" || request()->segment(2) == 'salary-setup' || request()->segment(2) == 'upload-employee-salary' || request()->segment(2) == 'upload-list'  || request()->segment(2) == 'employee-summary' ? 'open' : '' }}">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Employee Info
                        <b class="arrow fa fa-angle-down"></b>
                    </a>
                    <b class="arrow"></b>

                    <ul class="submenu">
                        @if (hasPermission("employees.create", $slugs))
                            <li class="{{ request()->is('hrm/employee/create') || request()->is('hrm/employee-upload') ? 'active' : '' }}">
                                <a href="{{ route('employee.create') }}">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Add Employee
                                </a>
                                <b class="arrow"></b>
                            </li>
                        @endif

                        @if (hasPermission("employees.view", $slugs))
                            <li class="{{ request()->is('hrm/employee') || request()->is('hrm/employee/*/edit') ? 'active' : '' }}">
                                <a href="{{ route('employee.index') }}">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Employee List
                                </a>
                                <b class="arrow"></b>
                            </li>
                        @endif

                        @if (hasPermission("employees.view", $slugs))
                            <li class="{{ request()->is('hrm/employee/birthdays') ? 'active' : '' }}">
                                <a href="{{ route('employee.birthdays') }}">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Emp. Birthdays
                                </a>
                                <b class="arrow"></b>
                            </li>
                        @endif

                        @if (hasPermission("employees.view", $slugs))
                            <li class="{{ request()->is('hrm/employee/probation-completed-list') ? 'active' : '' }}">
                                <a href="{{ route('employee.probation-completed.list') }}">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Probation List
                                </a>
                                <b class="arrow"></b>
                            </li>
                        @endif

                        @if (hasPermission("employees.view", $slugs))
                            <li class="{{ request()->is('hrm/employee-summary') ? 'active' : '' }}">
                                <a href="{{ route('employee-summary') }}">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Employee Summary
                                </a>
                                <b class="arrow"></b>
                            </li>
                        @endif

                        @if (hasPermission('employee.deactive.lists.index', $slugs))
                            <li class="{{ request()->is('hrm/employee/deactive/list') ? 'active' : '' }}">
                                <a href="{{ route('employee.deactive.list') }}">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Deactive List
                                </a>
                                <b class="arrow"></b>
                            </li>
                        @endif

                        @if (hasPermission("salary.setups.index", $slugs))
                            <li class="{{ request()->is('hrm/salary') || request()->is('hrm/salary-setup/*') || request()->is('hrm/upload-list') ? 'active' : '' }}">
                                <a href="{{ route('salary.index') }}">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Salary
                                </a>
                                <b class="arrow"></b>
                            </li>
                        @endif

                        @if (hasPermission('id.card.prints.index', $slugs))
                            <li class="{{ request()->is('hrm/employee/id-card-print') ? 'active' : '' }}">
                                <a href="{{ route('employee.id-card-print') }}">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Id Card Print
                                </a>
                                <b class="arrow"></b>
                            </li>
                        @endif

                    </ul>
                </li>
            @endif



            @if(hasAnyPermission(["promotion.letters.index", "appointment.letters.index", "termination.letters.index"], $slugs))
                <li class="{{ request()->segment(2) == 'letter' ? 'open' : '' }}">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Letter
                        <b class="arrow fa fa-angle-down"></b>
                    </a>
                    <b class="arrow"></b>

                    <ul class="submenu">


                        @if (hasPermission("appointment.letters.create", $slugs))
                            <li class="{{ request()->is('hrm/letter/appointment-letters/create') ? 'active' : '' }}" title="Appointment Letter">
                                <a href="{{ route('appointment-letters.create') }}">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    App. Letter
                                </a>
                                <b class="arrow"></b>
                            </li>
                        @endif

                        @if (hasPermission("show.case.letters.create", $slugs))
                            <li class="{{ request()->is('hrm/letter/show-cause-letters/create') ? 'active' : '' }}" title="Show Cause Letter">
                                <a href="{{ route('show-cause-letters.create') }}">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Show Cause Ltr.
                                </a>
                                <b class="arrow"></b>
                            </li>
                        @endif

                        @if (hasPermission("termination.letters.create", $slugs))
                            <li class="{{ request()->is('hrm/letter/termination-letters/create') ? 'active' : '' }}" title="Termination Letter">
                                <a href="{{ route('termination-letters.create') }}">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Ter. Letter
                                </a>
                                <b class="arrow"></b>
                            </li>
                        @endif

                    </ul>
                </li>
            @endif


            <!-- Promotion-Migration -->
            @if(hasAnyPermission(["promotion.letters.index"], $slugs))
                <li class="{{ request()->segment(2) == 'employment-infos' ? 'active' : '' }}">
                    <a href="{{ route('employment.infos') }}">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Employment Report
                    </a>
                </li>
            @endif

            <!-- Promotion-Migration -->
            @if(hasAnyPermission(["promotion.letters.index", "migration.letters.index"], $slugs))
                <li class="{{ request()->segment(2) == 'promotion-migration' ? 'open' : '' }}">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Promotion-Migration
                        <b class="arrow fa fa-angle-down"></b>
                    </a>
                    <b class="arrow"></b>

                    <ul class="submenu">

                        @if (hasPermission("promotion.letters.create", $slugs))
                            <li class="{{ request()->is('hrm/promotion-migration/promotion-letters/create') ? 'active' : '' }}" title="Promotion Letter Create">
                                <a href="{{ route('promotion-letters.create') }}">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Promotion L.
                                </a>
                                <b class="arrow"></b>
                            </li>
                        @endif

                        @if (hasPermission("promotion.letters.create", $slugs))
                            <li class="{{ request()->is('hrm/promotion-migration/promotion-letters') ? 'active' : '' }}" title="Promotion Letter List">
                                <a href="{{ route('promotion-letters.index') }}">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Promotion List
                                </a>
                                <b class="arrow"></b>
                            </li>
                        @endif


                        @if (hasPermission("migration.letters.create", $slugs))
                            <li class="{{ request()->is('hrm/promotion-migration/migration-letters/create') ? 'active' : '' }}" title="Promotion Letter">
                                <a href="{{ route('migration-letters.create') }}">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Migration
                                </a>
                                <b class="arrow"></b>
                            </li>
                        @endif

                        @if (hasPermission("migration.letters.create", $slugs))
                            <li class="{{ request()->is('hrm/promotion-migration/migration-letters') ? 'active' : '' }}" title="Migration Letter List">
                                <a href="{{ route('migration-letters.index') }}">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Migration List
                                </a>
                                <b class="arrow"></b>
                            </li>
                        @endif


                    </ul>
                </li>
            @endif



            <!-- leave -->
            @if(hasAnyPermission(["leaves.index","leave.types.index","leave.applications.index","leave.application.authorizes.index","l.approval.settings.index","leave.application.cancel.lists.index","l.yearly.reports.index","l.applications.index"], $slugs))
                <li class="{{ request()->segment('2') == 'leave' ? 'active' : '' }}">
                    <a href="" class="dropdown-toggle">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Leave
                        <b class="arrow fa fa-angle-down"></b>
                    </a>
                    <b class="arrow"></b>

                    <ul class="submenu">
                        @if (hasPermission("leave.types.index", $slugs))
                            <li class="{{ request()->is('hrm/leave/leave-type') ? 'active' : '' }}">
                                <a href="{{ route('hrm.leave.leave-type') }}" title="Leave Type">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Type
                                </a>
                                <b class="arrow"></b>
                            </li>
                        @endif

                        @if (hasPermission("l.approval.settings.index", $slugs))
                            <li class="{{ request()->is('hrm/leave/leave-approval-author') ? 'active' : '' }}">
                                <a href="{{ route('hrm.leave.approval.author') }}" title="Leave approval Author Setting">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Approval Sett.
                                </a>
                                <b class="arrow"></b>
                            </li>
                        @endif

                        @if(hasAnyPermission(["l.applications.index","l.applications.create", "l.applications.view","leave.application.cancel.lists.index"], $slugs))
                            <li class="{{ request()->segment(3) == "application" || request()->is('hrm/leave/recommend-pending-list') || request()->is('hrm/leave/approved-pending-list') || request()->is('hrm/leave/cancel-list') == "application"? 'open' : '' }}">
                                <a href="#" class="dropdown-toggle">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Application
                                    <b class="arrow fa fa-angle-down"></b>
                                </a>
                                <b class="arrow"></b>

                                <ul class="submenu">
                                    @if (hasPermission("l.applications.create", $slugs))
                                        <li class="{{ request()->is('hrm/leave/application/create') ? 'active' : '' }}">
                                            <a href="{{ route('application.create') }}" title="Create Leave Application">
                                                <i class="menu-icon fa fa-caret-right"></i>
                                                Create App.
                                            </a>
                                            <b class="arrow"></b>
                                        </li>
                                    @endif

                                    @if (hasPermission("l.applications.view", $slugs))
                                        <li class="{{ request()->is('hrm/leave/application') ? 'active' : '' }}">
                                            <a href="{{ route('application.index') }}" title="Leave Application List">
                                                <i class="menu-icon fa fa-caret-right"></i>
                                                App. List
                                            </a>
                                            <b class="arrow"></b>
                                        </li>
                                    @endif

                                    @if (hasPermission("l.applications.recommend", $slugs))
                                        <li class="{{ request()->is('hrm/leave/recommend-pending-list') ? 'active' : '' }}">
                                            <a href="{{ route('hrm.pending.recommend') }}" title="Pending Recommend Leave Application List">
                                                <i class="menu-icon fa fa-caret-right"></i>
                                                Pending Reco.
                                            </a>
                                            <b class="arrow"></b>
                                        </li>
                                    @endif

                                    @if (hasPermission("l.applications.approve", $slugs))
                                        <li class="{{ request()->is('hrm/leave/approved-pending-list') ? 'active' : '' }}">
                                            <a href="{{ route('hrm.pending.approved') }}" title="Pending Approval Leave Application List">
                                                <i class="menu-icon fa fa-caret-right"></i>
                                                Pending Appr.
                                            </a>
                                            <b class="arrow"></b>
                                        </li>
                                    @endif

                                    @if (hasPermission("leave.application.cancel.lists.index", $slugs))
                                        <li class="{{ request()->is('hrm/leave/cancel-list') ? 'active' : '' }}">
                                            <a href="{{ route('cancel-list') }}" title="Leave Application Cancel List">
                                                <i class="menu-icon fa fa-caret-right"></i>
                                                Cancel List
                                            </a>
                                            <b class="arrow"></b>
                                        </li>
                                    @endif

                                </ul>
                            </li>
                        @endif

                        @if (hasPermission("l.yearly.reports.index", $slugs))
                            <li class="{{ request()->segment(3) == "report" ? 'open' : '' }}">
                                <a href="#" class="dropdown-toggle">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Report
                                    <b class="arrow fa fa-angle-down"></b>
                                </a>
                                <b class="arrow"></b>

                                <ul class="submenu">
                                    @if (hasPermission("l.yearly.reports.index", $slugs))
                                        <li class="{{ request()->is('hrm/leave/report/yearly') ? 'active' : '' }}">
                                            <a href="{{ route('hrm.leave.yearly.report') }}" title="Yearly Register">
                                                <i class="menu-icon fa fa-caret-right"></i>
                                                Yearly R.
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

            <!-- short leave -->
            @if(count(array_intersect($slugs, ["short.leave.setups.index","short.leave.applications.index","short.leave.authorities.index"])) !== 0 || auth()->id() == 1)
                <li class="{{ request()->segment('2') == 'short-leave' ? 'active' : '' }}">
                    <a href="" class="dropdown-toggle">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Short-Leave
                        <b class="arrow fa fa-angle-down"></b>
                    </a>
                    <b class="arrow"></b>
                    <ul class="submenu">
                        @if (in_array("short.leave.setups.index", $slugs) || auth()->id() == 1)
                            <li class="{{ request()->is('hrm/short-leave/setup') ? 'active' : '' }}">
                                <a href="{{ route('setup') }}" title="Short Leave Setup">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    S.Setup
                                </a>
                                <b class="arrow"></b>
                            </li>
                        @endif
                        @if (in_array("short.leave.authorities.index", $slugs) || auth()->id() == 1)
                            <li class="{{ request()->is('hrm/short-leave/authority') ? 'active' : '' }}">
                                <a href="{{ route('authority') }}" title="Short Leave Authority">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    S.Authority
                                </a>
                                <b class="arrow"></b>
                            </li>
                        @endif

                        @if (in_array("short.leave.applications.create", $slugs) || auth()->id() == 1)
                            <li class="{{ request()->is('hrm/short-leave/short-leave-application/create') ? 'active' : '' }}">
                                <a href="{{ route('short-leave-application.create') }}" title="Short Leave Application">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    S.Application
                                </a>
                                <b class="arrow"></b>
                            </li>
                            <li class="{{ request()->is('hrm/short-leave/short-leave-application') ? 'active' : '' }}">
                                <a href="{{ route('short-leave-application.index') }}" title="Short Leave Application">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Application List
                                </a>
                                <b class="arrow"></b>
                            </li>
                        @endif

                        @if (in_array("short.leave.applications.view", $slugs) || auth()->id() == 1)
                            <li class="{{ request()->is('hrm/short-leave/short-leave-application') ? 'active' : '' }}">
                                <a href="{{ route('short-leave-application.index') }}" title="Short Leave List & Adjust">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    S.List/Adjust
                                </a>
                                <b class="arrow"></b>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif





            <!--  Schedule Management -->
            @if(hasAnyPermission(['schedule.managements.index', 'holiday-assigns.index'], $slugs))
                <li class="{{ in_array(request()->segment(2), [ 'schedule-management', 'schedule-attendance', 'holiday-assigns']) ?  'open' : '' }}">
                    <a href="#" class="dropdown-toggle" title="Schedule Management">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Schedule M.
                        <b class="arrow fa fa-angle-down"></b>
                    </a>
                    <b class="arrow"></b>
                    <ul class="submenu">

                        @if(hasAnyPermission(['schedule.managements.create'], $slugs))


                            <li class="{{ request()->is('hrm/schedule-processings/create') ? 'active' : '' }}">
                                <a href="{{ route('schedule-processings.create') }}" title="Set Employee Schedule">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Shift Planing Ui
                                </a>
                                <b class="arrow"></b>
                            </li>

                            
                            <li class="{{ request()->is('hrm/general-shift-assigns/create') ? 'active' : '' }}">
                                <a href="{{ route('general-shift-assigns.create') }}" title="Employee General Shift Assign">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    General Shift
                                </a>
                                <b class="arrow"></b>
                            </li>


                            <li class="{{ request()->is('hrm/schedule-management/create') ? 'active' : '' }}">
                                <a href="{{ route('schedule-management.create') }}" title="Shift Planing">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Shift Planing
                                </a>
                                <b class="arrow"></b>
                            </li>


                        @endif

                        @if(hasAnyPermission(['schedule.managements.view'], $slugs))
                            <li class="{{ request()->is('hrm/schedule-management') ? 'active' : '' }}">
                                <a href="{{ route('schedule-management.index') }}" title="Shift Planing List">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Shift.Plan.L
                                </a>
                                <b class="arrow"></b>
                            </li>
                        @endif

                        @if(hasAnyPermission(['schedule.managements.create'], $slugs))
                            <li class="{{ request()->is('hrm/schedule-attendance/create') ? 'active' : '' }}">
                                <a href="{{ route('schedule-attendance.create') }}" title="Set Schedule Attendance">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Set.Attendance
                                </a>
                                <b class="arrow"></b>
                            </li>
                        @endif

                        @if (hasPermission('holiday.assigns.index', $slugs))
                            <li class="{{ request()->segment(2) == "holiday-assigns" ?  'open' : '' }}">
                                <a href="#" class="dropdown-toggle" title="Holiday Rostaring">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    H. Rostaring
                                    <b class="arrow fa fa-angle-down"></b>
                                </a>
                                <b class="arrow"></b>

                                <ul class="submenu">
                                    @if (hasPermission('holiday.assigns.index', $slugs))
                                        <li class="{{ request()->is('hrm/holiday-assigns') ? 'active' : '' }}">
                                            <a href="{{ route('holiday-assigns.index') }}">
                                                <i class="menu-icon fa fa-caret-right"></i>
                                                Rostar List
                                            </a>
                                        </li>
                                    @endif

                                    @if (hasPermission('holiday.assigns.index', $slugs))
                                        <li class="{{ request()->is('hrm/holiday-assigns/create')  ? 'active' : '' }}">
                                            <a href="{{ route('holiday-assigns.create') }}">
                                                <i class="menu-icon fa fa-caret-right"></i>
                                                Rostar create
                                            </a>
                                        </li>
                                    @endif
                                </ul>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif



            <!--  Attendance -->
            @if(hasAnyPermission(["out.works.create","attendance.reports.today.attendance","attendance.reports.monthly","attendance.reports.monthly.sum","attendance.manual.entries.edit","attendance.manual.entries.view", 'compliance.attendances', 'compliance.reports', 'hrm.attendance.employees.tracking', 'out.works.index', 'compliance.shifts'], $slugs) || auth()->id() == 1)
                <li class="{{ request()->segment(2) == "attendance" && request('report_type') != 'complaince' ? 'open' : '' }}">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Attendance
                        <b class="arrow fa fa-angle-down"></b>
                    </a>
                    <b class="arrow"></b>
                    <ul class="submenu">


                        @if (hasAnyPermission(["attendance.manual.entries.create","attendance.manual.entries.edit","attendance.manual.entries.view"], $slugs) || auth()->id() == 1)
                            <li class="{{ request()->is('hrm/attendance/manual-all/create') || request()->is('hrm/attendance/manual/create')  || request()->is('hrm/attendance/manual') || request()->is('hrm/attendance/day-wise/create') || request()->is('hrm/attendance/holiday-adjustment/create') ?  'open' : '' }}">
                                <a href="#" class="dropdown-toggle">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Entry
                                    <b class="arrow fa fa-angle-down"></b>
                                </a>
                                <b class="arrow"></b>
                                <ul class="submenu">

                                    @if (in_array("attendance.manual.entries.view", $slugs) || auth()->id() == 1)
                                        <li class="{{ request()->is('hrm/attendance/manual-all/create') ? 'active' : '' }}">
                                            <a href="{{ route('manual-all.create') }}">
                                                <i class="menu-icon fa fa-caret-right"></i>
                                                Manual All
                                            </a>
                                            <b class="arrow"></b>
                                        </li>
                                    @endif

                                    @if (in_array("attendance.manual.entries.create", $slugs) || auth()->id() == 1)
                                        <li class="{{ request()->is('hrm/attendance/manual/create') ? 'active' : '' }}">
                                            <a href="{{ route('manual.create') }}">
                                                <i class="menu-icon fa fa-caret-right"></i>
                                                Manual
                                            </a>
                                            <b class="arrow"></b>
                                        </li>
                                    @endif

                                    @if (in_array("attendance.manual.entries.create", $slugs) || auth()->id() == 1)
                                        <li class="{{ request()->is('hrm/attendance/day-wise/create') ? 'active' : '' }}">
                                            <a href="{{ route('day-wise.create') }}">
                                                <i class="menu-icon fa fa-caret-right"></i>
                                                Day Wise
                                            </a>
                                            <b class="arrow"></b>
                                        </li>
                                    @endif

                                    @if (in_array("attendance.manual.entries.create", $slugs) || auth()->id() == 1)
                                        <li class="{{ request()->is('hrm/attendance/holiday-adjustment/create') ? 'active' : '' }}">
                                            <a href="{{ route('holiday-adjustment.create') }}">
                                                <i class="menu-icon fa fa-caret-right"></i>
                                                Holiday Adjust
                                            </a>
                                            <b class="arrow"></b>
                                        </li>
                                    @endif

                                    @if (in_array("attendance.manual.entries.edit", $slugs) || auth()->id() == 1)
                                        <li class="{{ request()->is('hrm/attendance/manual') ? 'active' : '' }}">
                                            <a href="{{ route('manual.index') }}" title="Manual Attendance List">
                                                <i class="menu-icon fa fa-caret-right"></i>
                                                Attendance List
                                            </a>
                                            <b class="arrow"></b>
                                        </li>
                                    @endif
                                </ul>
                            </li>
                        @endif



                        @if (hasAnyPermission(["out.works.index"], $slugs) || auth()->id() == 1)
                            <li class="{{ request()->is('hrm/attendance/out-work/create') || request()->is('hrm/attendance/out-work') ?  'open' : '' }}">
                                <a href="#" class="dropdown-toggle">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Out Work
                                    <b class="arrow fa fa-angle-down"></b>
                                </a>
                                <b class="arrow"></b>
                                <ul class="submenu">
                                    @if (in_array("out.works.create", $slugs) || auth()->id() == 1)
                                        <li class="{{ request()->is('hrm/attendance/out-work/create') ? 'active' : '' }}">
                                            <a href="{{ route('out-work.create') }}" title="Out Work Memo">
                                                <i class="menu-icon fa fa-caret-right"></i>
                                                Out Work Memo
                                            </a>
                                            <b class="arrow"></b>
                                        </li>
                                    @endif

                                    @if (in_array("out.works.index", $slugs) || auth()->id() == 1)
                                        <li class="{{ request()->is('hrm/attendance/out-work') ? 'active' : '' }}">
                                            <a href="{{ route('out-work.index') }}" title="Out Work List">
                                                <i class="menu-icon fa fa-caret-right"></i>
                                                Out Work List
                                            </a>
                                            <b class="arrow"></b>
                                        </li>
                                    @endif
                                </ul>
                            </li>
                        @endif

                        @if(count(array_intersect($slugs, ["attendance.reports.today.attendance","attendance.reports.monthly","attendance.reports.monthly.sum"])) !== 0 || auth()->id() == 1)
                            <li class="{{ request('report_type') != 'complaince' && (request()->is('hrm/attendance/today') || request()->is('hrm/attendance/monthly')  || request()->is('hrm/attendance/monthly-summary') || request()->is('hrm/attendance/employee-monthly-attendance') || request()->is('hrm/attendance/day-wise-attendance-report') || request()->is('hrm/attendance/employee-monthly-attendance-day-wise')) ?  'open' : '' }}">
                                <a href="#" class="dropdown-toggle" title="Attendance Report">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Attd Report
                                    <b class="arrow fa fa-angle-down"></b>
                                </a>
                                <b class="arrow"></b>
                                <ul class="submenu">
                                    @if (in_array("attendance.reports.today.attendance", $slugs) || auth()->id() == 1)
                                        <li class="{{ request()->is('hrm/attendance/today') ? 'active' : '' }}">
                                            <a href="{{ route('hrm.attendance.today') }}" title="Today Attendance Report">
                                                <i class="menu-icon fa fa-caret-right"></i>
                                                Today Attd
                                            </a>
                                            <b class="arrow"></b>
                                        </li>
                                    @endif

                                    @if (in_array("attendance.reports.monthly", $slugs) || auth()->id() == 1)
                                        <li class="{{ request()->is('hrm/attendance/monthly') ? 'active' : '' }}">
                                            <a href="{{ route('hrm.attendance.monthly') }}" title="Monthly Attendance Report">
                                                <i class="menu-icon fa fa-caret-right"></i>
                                                Monthly Attd
                                            </a>
                                            <b class="arrow"></b>
                                        </li>

                                        <li class="{{ request()->is('hrm/attendance/day-wise-attendance-report') ? 'active' : '' }}">
                                            <a href="{{ route('hrm.attendance.day-wise-attendance-report') }}" title="Day Wise Attendance Report">
                                                <i class="menu-icon fa fa-caret-right"></i>
                                                Day Wise Attd
                                            </a>
                                            <b class="arrow"></b>
                                        </li>
                                    @endif

                                    @if (hasPermission("attendance.reports.monthly.sum", $slugs))
                                        <li class="{{ request()->is('hrm/attendance/monthly-summary') ? 'active' : '' }}">
                                            <a href="{{ route('hrm.attendance.monthly.summary') }}" title="Monthly Attendance Summury">
                                                <i class="menu-icon fa fa-caret-right"></i>
                                                Monthly Sum
                                            </a>
                                            <b class="arrow"></b>
                                        </li>
                                    @endif

                                    @if (hasPermission("attendance.reports.monthly.sum", $slugs))
                                        <li class="{{ request()->is('hrm/attendance/employee-monthly-attendance') ? 'active' : '' }}">
                                            <a href="{{ route('employee-monthly-attendance') }}" title="Employee Monthly Attendance">
                                                <i class="menu-icon fa fa-caret-right"></i>
                                                Job Card
                                            </a>
                                            <b class="arrow"></b>
                                        </li>

                                        <li class="{{ request()->is('hrm/attendance/employee-monthly-attendance-day-wise') ? 'active' : '' }}">
                                            <a href="{{ route('employee-monthly-attendance-day-wise') }}" title="Employee Monthly Attendance">
                                                <i class="menu-icon fa fa-caret-right"></i>
                                                Job Card By Day
                                            </a>
                                            <b class="arrow"></b>
                                        </li>
                                    @endif
                                </ul>
                            </li>
                        @endif

                        @if(hasPermission('hrm.attendance.employees.tracking', $slugs))
                            <li class="{{ request()->is('hrm/attendance/employees-tracking') ? 'active' : '' }}">
                                <a href="{{ route('hrm.attendance.employees.tracking') }}">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Emp. Tracking
                                </a>
                                <b class="arrow"></b>
                            </li>
                        @endif


                    </ul>
                </li>

            @endif




            @include('partials.sidebars.__complaince_attendance')



            <!--  Daily Work Report [Akash] -->
            @if(hasPermission('daily.work.reports.index', $slugs))
                <li class="{{ request()->segment(2) == "daily-works" ? 'open' : '' }}">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Daily Work
                        <b class="arrow fa fa-angle-down"></b>
                    </a>
                    <b class="arrow"></b>
                    <ul class="submenu">
                        @if(hasPermission('daily.work.reports.create', $slugs))
                            <li class="{{ request()->is('hrm/daily-works/create') ? 'active' : '' }}" title="Daily Work Report Create">
                                <a href="{{ route('daily-works.create') }}">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    D.W Create
                                </a>
                                <b class="arrow"></b>
                            </li>
                        @endif

                        @if(hasPermission('daily.work.reports.view', $slugs))
                            <li class="{{ request()->is('hrm/daily-works') ? 'active' : '' }}" title="Daily Work Report List">
                                <a href="{{ route('daily-works.index') }}">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    D.W List
                                </a>
                                <b class="arrow"></b>
                            </li>
                        @endif

                        @if(hasPermission('daily.work.reports.individual.report', $slugs))
                            <li class="{{ request()->is('hrm/daily-works/individual-reports') ? 'active' : '' }}" title="Individual work report">
                                <a href="{{ route('daily-works.individual.report') }}">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Ind. Report
                                </a>
                                <b class="arrow"></b>
                            </li>
                        @endif
                        @if(hasPermission('daily.work.reports.date.wise.report', $slugs))
                            <li class="{{ request()->is('hrm/daily-works/date-wise-reports') ? 'active' : '' }}" title="Datewise Work Report">
                                <a href="{{ route('daily-works.date.wise.report') }}">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Date wise Report
                                </a>
                                <b class="arrow"></b>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif


            <!-- Late Management [Akash] -->
            @if(count(array_intersect($slugs, ["late.deductions.index","late.configs.index"])) !== 0 || auth()->id() == 1)
                <li class="{{ request()->segment(2) == 'late-management' ? 'open' : '' }}">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Late Management
                        <b class="arrow fa fa-angle-down"></b>
                    </a>
                    <b class="arrow"></b>
                    <ul class="submenu">

                        @if (in_array("late.configs.index", $slugs) || auth()->id() == 1)
                            <li class="{{ request()->is('hrm/late-management/late-configs') ? 'active' : '' }}">
                                <a href="{{ route('late-configs.index') }}">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Late Config
                                </a>
                                <b class="arrow"></b>
                            </li>
                        @endif

                        @if (in_array("late.deductions.create", $slugs) || auth()->id() == 1)
                            <li class="{{ request()->is('hrm/late-management/late-adjustments/create') ? 'active' : '' }}">
                                <a href="{{ route('late-adjustments.create') }}">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Late Deduction
                                </a>
                                <b class="arrow"></b>
                            </li>
                        @endif

                        @if (in_array("late.deductions.view", $slugs) || auth()->id() == 1)
                            <li class="{{ request()->is('hrm/late-management/late-adjustments') ? 'active' : '' }}">
                                <a href="{{ route('late-adjustments.index') }}">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    L.D List
                                </a>
                                <b class="arrow"></b>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif

            @if (hasAnyPermission(['overtime.holiday.allowances.index'], $slugs) || auth()->id() == 1)
                <li class="{{ request()->is('hrm/ot-holiday-allowance/create') || request()->is('hrm/ot-holiday-allowance') || request()->is('hrm/ot-config') ? 'open' : '' }}">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-caret-right"></i>
                        OT & Holiday A.
                        <b class="arrow fa fa-angle-down"></b>
                    </a>
                    <b class="arrow"></b>
                    <ul class="submenu">

                        @if (hasPermission("overtime.holiday.allowances.config", $slugs) || auth()->id() == 1)
                            <li class="{{ request()->is('hrm/ot-config') ? 'active' : '' }}">
                                <a href="{{ route('ot-config') }}" title="OT & Holiday Allowance">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    OT Config
                                </a>
                                <b class="arrow"></b>
                            </li>
                        @endif

                        @if (hasPermission("overtime.holiday.allowances.create", $slugs) || auth()->id() == 1)
                            <li class="{{ request()->is('hrm/ot-holiday-allowance/create') ? 'active' : '' }}">
                                <a href="{{ route('ot-holiday-allowance.create') }}" title="OT & Holiday Allowance">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    OT & H.Day Allowance
                                </a>
                                <b class="arrow"></b>
                            </li>
                        @endif

                        @if (hasPermission("overtime.holiday.allowances.index", $slugs) || auth()->id() == 1)
                            <li class="{{ request()->is('hrm/ot-holiday-allowance') ? 'active' : '' }}">
                                <a href="{{ route('ot-holiday-allowance.index') }}" title="OT & Holiday Allowance List">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    OT & H.Day Allowance List
                                </a>
                                <b class="arrow"></b>
                            </li>
                        @endif

                    </ul>
                </li>
            @endif

            <!-- disbursement [Akash] -->
            @if (in_array("disbursements.index", $slugs) || auth()->id() == 1)
                <li class="{{ request()->is('hrm/disbursemen*') ? 'open' : '' }}">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Disbursements
                        <b class="arrow fa fa-angle-down"></b>
                    </a>
                    <b class="arrow"></b>
                    <ul class="submenu">

                        @if (in_array("disbursements.create", $slugs) || auth()->id() == 1)
                            <li  class="{{ request()->is('hrm/disbursement-type') ? 'active' : '' }}">
                                <a href="{{ route('disbursement-type.index') }}" title="Disbursement Type Setyp">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    D.Type
                                </a>
                                <b class="arrow"></b>
                            </li>
                        @endif

                        @if (in_array("disbursements.create", $slugs) || auth()->id() == 1)
                            <li  class="{{ request()->is('hrm/disbursements/create') ? 'active' : '' }}">
                                <a href="{{ route('disbursements.create') }}" title="Disbursement Create">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    D.Create
                                </a>
                                <b class="arrow"></b>
                            </li>
                        @endif

                        @if (in_array("disbursements.view", $slugs) || auth()->id() == 1)
                            <li class="{{ request()->is('hrm/disbursements') ? 'active' : '' }}">
                                <a href="{{ route('disbursements.index') }}" title="Disbursement List">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    D.LIst
                                </a>
                                <b class="arrow"></b>
                            </li>
                        @endif

                    </ul>
                </li>
            @endif


            <!-- hr loan [Akash] -->
            @if (in_array("hr.loans.index", $slugs) || auth()->id() == 1)
                <li class="{{ request()->segment(2) == 'hr-loans' ? 'open' : '' }}">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-caret-right"></i>
                        HR Loans
                        <b class="arrow fa fa-angle-down"></b>
                    </a>
                    <b class="arrow"></b>
                    <ul class="submenu">
                        @if (in_array("hr.loans.create", $slugs) || auth()->id() == 1)
                            <li class="{{ request()->is('hrm/hr-loans/create') ? 'active' : '' }}">
                                <a href="{{ route('hr-loans.create') }}">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Create Loan
                                </a>
                                <b class="arrow"></b>
                            </li>
                        @endif

                        @if (in_array("hr.loans.index", $slugs) || auth()->id() == 1)
                            <li class="{{ request()->is('hrm/hr-loans') ? 'active' : '' }}">
                                <a href="{{ route('hr-loans.index') }}">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Loan List
                                </a>
                                <b class="arrow"></b>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif

            <!-- increment [akash] -->
            @if(hasAnyPermission(["salary.increments.index","increment.eligible.periods.index"], $slugs))

                <li class="{{ request()->is('hrm/incremen*') ? 'open' : '' }}">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Increment
                        <b class="arrow fa fa-angle-down"></b>
                    </a>
                    <b class="arrow"></b>

                    <ul class="submenu">
                        @if (hasPermission(["increment.eligible.periods.index"], $slugs))
                            <li class="{{ request()->is('hrm/increments/eligible-settin*') ? 'active' : '' }}">
                                <a href="{{ route('eligible-settings.index') }}">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Eligible Period
                                </a>
                                <b class="arrow"></b>
                            </li>
                        @endif

                        @if (in_array("salary.increments.create", $slugs) || auth()->id() == 1)
                            <li class="{{ request()->is('hrm/increments/create') ? 'active' : '' }}">
                                <a href="{{ route('increments.create') }}">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Create Increment
                                </a>
                                <b class="arrow"></b>
                            </li>
                        @endif


                        @if (in_array("salary.increments.disbursement", $slugs) || auth()->id() == 1)
                            <li class="{{ request()->is('hrm/increments/disbursed/create') ? 'active' : '' }}">
                                <a href="{{ route('increment.disbursed.create') }}">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Disbursement
                                </a>
                                <b class="arrow"></b>
                            </li>
                        @endif

                        @if (in_array("salary.increments.view", $slugs) || auth()->id() == 1)
                            <li class="{{ request()->is('hrm/increments') ? 'active' : '' }}">
                                <a href="{{ route('increments.index') }}">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Inc List
                                </a>
                                <b class="arrow"></b>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif

            <!-- bonus -->
            @if(count(array_intersect($slugs, ["attendance.bonus.settings.index","attendance.bonus.entries.index","attendance.bonus.entries.view","f.bonuses.index","f.b.eligible.periods.index"])) !== 0 || auth()->id() == 1)
                <li class="{{ request()->segment('2') == 'bonus' ? 'active' : '' }}">
                    <a href="" class="dropdown-toggle">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Bonus
                        <b class="arrow fa fa-angle-down"></b>
                    </a>
                    <b class="arrow"></b>
                    <ul class="submenu">
                        @if(count(array_intersect($slugs, ["attendance.bonus.settings.index","attendance.bonus.entries.index", "attendance.bonus.entries.view"])) !== 0 || auth()->id() == 1)
                            <li class="{{ request()->is('hrm/bonus/attendance-bonus-setting') || request()->is('hrm/bonus/attendance-bonus/*') || request()->is('hrm/bonus/attendance-bonus') ? 'open' : '' }}">
                                <a href="#" class="dropdown-toggle" title="Attendance Bonus">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    A.Bonus
                                    <b class="arrow fa fa-angle-down"></b>
                                </a>
                                <b class="arrow"></b>
                                <ul class="submenu">
                                    @if (in_array("attendance.bonus.settings.index", $slugs) || auth()->id() == 1)
                                        <li class="{{ request()->is('hrm/bonus/attendance-bonus-setting') ? 'active' : '' }}">
                                            <a href="{{ route('hrm.bonus.attendance-bonus.setting') }}" title="Attendance Bonus Setting">
                                                <i class="menu-icon fa fa-caret-right"></i>
                                                A.Bonus Setting
                                            </a>
                                            <b class="arrow"></b>
                                        </li>
                                    @endif

                                    @if (in_array("attendance.bonus.entries.create", $slugs) || auth()->id() == 1)
                                        <li class="{{ request()->is('hrm/bonus/attendance-bonus/create') ? 'active' : '' }}">
                                            <a href="{{ route('attendance-bonus.create') }}" title="Attendance Bonus Setting">
                                                <i class="menu-icon fa fa-caret-right"></i>
                                                A.Bonus Entry
                                            </a>
                                            <b class="arrow"></b>
                                        </li>
                                    @endif

                                    @if (in_array("attendance.bonus.entries.view", $slugs) || auth()->id() == 1)
                                        <li class="{{ request()->is('hrm/bonus/attendance-bonus') ? 'active' : '' }}">
                                            <a href="{{ route('attendance-bonus.index') }}" title="Attendance Bonus List">
                                                <i class="menu-icon fa fa-caret-right"></i>
                                                A.Bonus List
                                            </a>
                                            <b class="arrow"></b>
                                        </li>
                                    @endif
                                </ul>
                            </li>
                        @endif

                        @if(count(array_intersect($slugs, ["f.bonuses.index","f.b.eligible.periods.index"])) !== 0 || auth()->id() == 1)
                            <li class="{{ request()->is('hrm/bonus/fixed/*') | request()->is('hrm/bonus/eligible_periods/*') | request()->is('hrm/bonus/eligible_periods')  ? 'open' : '' }}">
                                <a href="#" class="dropdown-toggle" title="Fixed Bonus">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    F.Bonus
                                    <b class="arrow fa fa-angle-down"></b>
                                </a>
                                <b class="arrow"></b>
                                <ul class="submenu">

                                    @if (in_array("f.b.eligible.periods.index", $slugs) || auth()->id() == 1)
                                        <li class="{{ request()->is('hrm/bonus/eligible_periods') ? 'active' : '' }}">
                                            <a href="{{ route('eligible_periods.index') }}" title="Bonus Eligible Period">
                                                <i class="menu-icon fa fa-caret-right"></i>
                                                Eligible Period
                                            </a>
                                            <b class="arrow"></b>
                                        </li>
                                    @endif

                                    @if (in_array("f.bonuses.create", $slugs) || auth()->id() == 1)
                                        <li class="{{ request()->is('hrm/bonus/fixed/fixed-bonus-create') ? 'active' : '' }}">
                                            <a href="{{ route('hrm.fixed.bonus.create') }}" >
                                                <i class="menu-icon fa fa-caret-right"></i>
                                                Bonus Create
                                            </a>
                                            <b class="arrow"></b>
                                        </li>
                                    @endif

                                    @if (in_array("f.bonuses.approve", $slugs) || auth()->id() == 1)
                                        <li class="{{ request()->is('hrm/bonus/fixed/fixed-bonus-approval-list') ? 'active' : '' }}">
                                            <a href="{{ route('fixed.bonus.approval.list') }}" title="Bonus Disbursement">
                                                <i class="menu-icon fa fa-caret-right"></i>
                                                Disbursement
                                            </a>
                                            <b class="arrow"></b>
                                        </li>
                                    @endif

                                    @if (in_array("f.bonuses.view", $slugs) || auth()->id() == 1)
                                        <li class="{{ request()->is('hrm/bonus/fixed/fixed-bonus-generated-list') ? 'active' : '' }}">
                                            <a href="{{ route('fixed.bonus.generated.list') }}" >
                                                <i class="menu-icon fa fa-caret-right"></i>
                                                Bonus List
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


            <!-- profident fund -->
            @if(hasAnyPermission(['provident.fund.policies.index', 'provident.fund.enrolments.index', 'provident.fund.opening.balances.index', 'provident.fund.balances.index'], $slugs))

                <li class="{{ request()->is('hrm/provident-fund-policy') || request()->is('hrm/provident-fund-enrol/create') || request()->is('hrm/provident-fund-enrol') || request()->is('hrm/provident-fund-opening-balance/create') || request()->is('hrm/provident-fund-opening-balance') || request()->is('hrm/provident-fund-balance') ?  'open' : '' }}">
                    <a href="#" class="dropdown-toggle" title="Provident Fund Management">
                        <i class="menu-icon fa fa-caret-right"></i>
                        P.F Management
                        <b class="arrow fa fa-angle-down"></b>
                    </a>
                    <b class="arrow"></b>

                    <ul class="submenu">
                        @if(hasPermission('provident.fund.policies.index', $slugs))
                            <li class="{{ request()->is('hrm/provident-fund-policy') ? 'active' : '' }}">
                                <a href="{{ route('provident-fund-policy.index') }}" title="Provident Fund Policy">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    P.F Policy
                                </a>
                                <b class="arrow"></b>
                            </li>
                        @endif

                        @if(hasPermission('provident.fund.enrolments.create', $slugs))
                            <li class="{{ request()->is('hrm/provident-fund-enrol/create') ? 'active' : '' }}">
                                <a href="{{ route('provident-fund-enrol.create') }}" title="Provident Fund Enrolment">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    P.F Enrolment
                                </a>
                                <b class="arrow"></b>
                            </li>
                        @endif

                        @if(hasPermission('provident.fund.enrolments.index', $slugs))
                            <li class="{{ request()->is('hrm/provident-fund-enrol') ? 'active' : '' }}">
                                <a href="{{ route('provident-fund-enrol.index') }}" title="Provident Fund Enrolment">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    P.F Enrol List
                                </a>
                                <b class="arrow"></b>
                            </li>
                        @endif

                        @if(hasPermission('provident.fund.opening.balances.create', $slugs))
                            <li class="{{ request()->is('hrm/provident-fund-opening-balance/create') ? 'active' : '' }}">
                                <a href="{{ route('provident-fund-opening-balance.create') }}" title="Opening balance">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Opening Balance
                                </a>
                                <b class="arrow"></b>
                            </li>
                        @endif

                        @if(hasPermission('provident.fund.opening.balances.index', $slugs))
                            <li class="{{ request()->is('hrm/provident-fund-opening-balance') ? 'active' : '' }}">
                                <a href="{{ route('provident-fund-opening-balance.index') }}" title="Opening balance">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    O.Balance List
                                </a>
                                <b class="arrow"></b>
                            </li>
                        @endif

                        @if(hasPermission('provident.fund.balances.index', $slugs))
                            <li class="{{ request()->is('hrm/provident-fund-balance') ? 'active' : '' }}">
                                <a href="{{ route('provident-fund-balance') }}" title="Opening balance">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    P.F Balance
                                </a>
                                <b class="arrow"></b>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif

            <!-- payroll [akash] -->
            @if (in_array("generate.salaries.index", $slugs) || auth()->id() == 1)
                <li class="{{ request()->segment(2) == 'payroll' && request('report_type') != 'complaince' ? 'open' : '' }}">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Payroll
                        <b class="arrow fa fa-angle-down"></b>
                    </a>
                    <b class="arrow"></b>
                    <ul class="submenu">

                        @if (in_array("generate.salaries.create", $slugs) || auth()->id() == 1)
                            <li class="{{ request()->is('hrm/payroll/salary-generate/create') ? 'active' : '' }}">
                                <a href="{{ route('salary-generate.create') }}">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Generate Salary
                                </a>
                                <b class="arrow"></b>
                            </li>
                        @endif

                        @if (in_array("generate.salaries.view", $slugs) || auth()->id() == 1)
                            <li class="{{ request()->is('hrm/payroll/salary-generate') ? 'active' : '' }}" title="Generated Salary List">
                                <a href="{{ route('salary-generate.index') }}">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    G. Salary List
                                </a>
                                <b class="arrow"></b>
                            </li>
                        @endif

                        @if (in_array("generate.salaries.view", $slugs) || auth()->id() == 1)
                            <li class="{{ request()->is('hrm/payroll/top-list-salary') ? 'active' : '' }}" title="Generated Salary List">
                                <a href="{{ route('top.list.salary') }}">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Top Sheet
                                </a>
                                <b class="arrow"></b>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif

            <!-- Production Salary [Akash] -->
            @if(hasAnyPermission(['processes.index', 'basic.rate.setups.index', 'production.bonus.rate.setups.index', 'sample.rate.setups.index', 'production.rate.setups.index', 'employees.production.rate.entries.index', 'production.salary.generates.index'], $slugs))
                <li class="{{ request()->segment(2) == "production-salary" ? 'open' : '' }}">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Production Salary
                        <b class="arrow fa fa-angle-down"></b>
                    </a>
                    <b class="arrow"></b>



                    <ul class="submenu">

                        <!-- Process -->
                        @if(hasPermission('processes.index', $slugs))
                            <li class="{{ request()->is('hrm/production-salary/proces*') ? 'active' : '' }}">
                                <a href="{{ route('process.index') }}">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Process
                                </a>
                                <b class="arrow"></b>
                            </li>
                        @endif


                        <!-- Basic Rate -->
                        @if(hasPermission('basic.rate.setups.index', $slugs))
                            <li class="{{ request()->is('hrm/production-salary/basic-rate-*') ? 'open' : '' }}">
                                <a href="#" class="dropdown-toggle" title=" Basic Rate Setup">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Basic Rate
                                    <b class="arrow fa fa-angle-down"></b>
                                </a>
                                <b class="arrow"></b>
                                <ul class="submenu">
                                    @if(hasPermission('basic.rate.setups.create', $slugs))
                                        <li class="{{ request()->is('hrm/production-salary/basic-rate-setups/create') ? 'active' : '' }}">
                                            <a href="{{ route('basic-rate-setups.create') }}">
                                                <i class="menu-icon fa fa-caret-right"></i>
                                                B. Rate Create
                                            </a>
                                            <b class="arrow"></b>
                                        </li>
                                    @endif

                                    @if(hasPermission('basic.rate.setups.view', $slugs))
                                        <li class="{{ request()->is('hrm/production-salary/basic-rate-setups') ? 'active' : '' }}">
                                            <a href="{{ route('basic-rate-setups.index') }}">
                                                <i class="menu-icon fa fa-caret-right"></i>
                                                B. Rate List
                                            </a>
                                            <b class="arrow"></b>
                                        </li>
                                    @endif
                                </ul>
                            </li>
                        @endif


                        <!-- Production Bonus Rate -->
                        @if(hasPermission('production.bonus.rate.setups.index', $slugs))
                            <li class="{{ request()->is('hrm/production-salary/production-bonus-rate-*') ? 'open' : '' }}">
                                <a href="#" class="dropdown-toggle" title=" Basic Rate Setup">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Production Bonus
                                    <b class="arrow fa fa-angle-down"></b>
                                </a>
                                <b class="arrow"></b>
                                <ul class="submenu">
                                    @if(hasPermission('production.bonus.rate.setups.create', $slugs))
                                        <li class="{{ request()->is('hrm/production-salary/production-bonus-rate-setups/create') ? 'active' : '' }}" title="Production Bonus Rate Create">
                                            <a href="{{ route('production-bonus-rate-setups.create') }}">
                                                <i class="menu-icon fa fa-caret-right"></i>
                                                Rate Create
                                            </a>
                                            <b class="arrow"></b>
                                        </li>
                                    @endif

                                    @if(hasPermission('production.bonus.rate.setups.view', $slugs))
                                        <li class="{{ request()->is('hrm/production-salary/production-bonus-rate-setups') ? 'active' : '' }}" title="Production Bonus Rate List">
                                            <a href="{{ route('production-bonus-rate-setups.index') }}">
                                                <i class="menu-icon fa fa-caret-right"></i>
                                                Rate List
                                            </a>
                                            <b class="arrow"></b>
                                        </li>
                                    @endif
                                </ul>
                            </li>
                        @endif


                        <!-- Sample Rate -->
                        @if(hasPermission('sample.rate.setups.index', $slugs))
                            <li class="{{ request()->is('hrm/production-salary/sample-rate-*') ? 'open' : '' }}">
                                <a href="#" class="dropdown-toggle" title=" Sample Rate Setup">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Sample Rate
                                    <b class="arrow fa fa-angle-down"></b>
                                </a>
                                <b class="arrow"></b>
                                <ul class="submenu">
                                    @if(hasPermission('sample.rate.setups.create', $slugs))
                                        <li class="{{ request()->is('hrm/production-salary/sample-rate-setups/create') ? 'active' : '' }}">
                                            <a href="{{ route('sample-rate-setups.create') }}">
                                                <i class="menu-icon fa fa-caret-right"></i>
                                                S. Rate Create
                                            </a>
                                            <b class="arrow"></b>
                                        </li>
                                    @endif

                                    @if(hasPermission('sample.rate.setups.view', $slugs))
                                        <li class="{{ request()->is('hrm/production-salary/sample-rate-setups') ? 'active' : '' }}">
                                            <a href="{{ route('sample-rate-setups.index') }}">
                                                <i class="menu-icon fa fa-caret-right"></i>
                                                S. Rate List
                                            </a>
                                            <b class="arrow"></b>
                                        </li>
                                    @endif
                                </ul>
                            </li>
                        @endif


                        <!-- Production Rate -->
                        @if(hasPermission('production.rate.setups.index', $slugs))
                            <li class="{{ request()->is('hrm/production-salary/production-rate-setup*') ? 'open' : '' }}">
                                <a href="#" class="dropdown-toggle" title="Production Rate Setup">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    P. Rate Setup
                                    <b class="arrow fa fa-angle-down"></b>
                                </a>
                                <b class="arrow"></b>
                                <ul class="submenu">
                                    @if(hasPermission('production.rate.setups.create', $slugs))
                                        <li class="{{ request()->is('hrm/production-salary/production-rate-setups/create') ? 'active' : '' }}">
                                            <a href="{{ route('production-rate-setups.create') }}">
                                                <i class="menu-icon fa fa-caret-right"></i>
                                                Rate Create
                                            </a>
                                            <b class="arrow"></b>
                                        </li>
                                    @endif

                                    @if(hasPermission('production.rate.setups.view', $slugs))
                                        <li class="{{ request()->is('hrm/production-salary/production-rate-setups') ? 'active' : '' }}">
                                            <a href="{{ route('production-rate-setups.index') }}">
                                                <i class="menu-icon fa fa-caret-right"></i>
                                                Rate List
                                            </a>
                                            <b class="arrow"></b>
                                        </li>
                                    @endif
                                </ul>
                            </li>
                        @endif


                        <!-- Employees Production Rate Entry -->
                        @if(hasPermission('employees.production.rate.entries.index', $slugs))

                            <li class="{{ request()->is('hrm/production-salary/employees-*') || request()->is('hrm/production-salary/production-employee-salary-*') ? 'open' : '' }}">
                                <a href="#" class="dropdown-toggle" title="Employee Production Rate Entry">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Production Entry
                                    <b class="arrow fa fa-angle-down"></b>
                                </a>
                                <b class="arrow"></b>

                                <ul class="submenu">


                                    <!-- Production Employee Salary Report -->
                                    @if(hasPermission('p.e.salary.checks.index', $slugs))
                                        <li class="{{ request()->is('hrm/production-salary/production-employee-salary-check') ? 'active' : '' }}" title="Production Employee Salary Report">
                                            <a href="{{ route('production.employee.salary.check') }}">
                                                <i class="menu-icon fa fa-caret-right"></i>
                                                P.E.S Check
                                            </a>
                                            <b class="arrow"></b>
                                        </li>
                                    @endif

                                    @if(hasPermission('employees.production.rate.entries.create', $slugs))
                                        <li class="{{ request()->is('hrm/production-salary/employees-production-rates/create') ? 'active' : '' }}" title="Employees Production Create">
                                            <a href="{{ route('employees-production-rates.create') }}">
                                                <i class="menu-icon fa fa-caret-right"></i>
                                                P. Create
                                            </a>
                                            <b class="arrow"></b>
                                        </li>
                                    @endif

                                    @if(hasPermission('employees.production.rate.entries.view', $slugs))
                                        <li class="{{ request()->is('hrm/production-salary/employees-basic-rates') ? 'active' : '' }}" title="Employees Basic Production List">
                                            <a href="{{ route('employees-basic-rates.index') }}">
                                                <i class="menu-icon fa fa-caret-right"></i>
                                                B. List
                                            </a>
                                            <b class="arrow"></b>
                                        </li>
                                    @endif

                                    @if(hasPermission('employees.production.rate.entries.view', $slugs))
                                        <li class="{{ request()->is('hrm/production-salary/employees-sample-rates') ? 'active' : '' }}" title="Employees Sample Production List">
                                            <a href="{{ route('employees-sample-rates.index') }}">
                                                <i class="menu-icon fa fa-caret-right"></i>
                                                S. List
                                            </a>
                                            <b class="arrow"></b>
                                        </li>
                                    @endif

                                    @if(hasPermission('employees.production.rate.entries.view', $slugs))
                                        <li class="{{ request()->is('hrm/production-salary/employees-production-rates') ? 'active' : '' }}" title="Employees Production List">
                                            <a href="{{ route('employees-production-rates.index') }}">
                                                <i class="menu-icon fa fa-caret-right"></i>
                                                P. List
                                            </a>
                                            <b class="arrow"></b>
                                        </li>
                                    @endif
                                </ul>
                            </li>
                        @endif


                        <!-- Production Salary generate -->
                        @if(hasPermission('production.salary.generates.index', $slugs))
                            <li class="{{ request()->segment(3) == 'salary' ? 'open' : '' }}">
                                <a href="#" class="dropdown-toggle" title="Employee Production Rate Entry">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Salary Generate
                                    <b class="arrow fa fa-angle-down"></b>
                                </a>
                                <b class="arrow"></b>

                                <ul class="submenu">
                                    @if(hasPermission('production.salary.generates.create', $slugs))
                                        <li class="{{ request()->is('hrm/production-salary/employees-production-rates/create') ? 'active' : '' }}" title="Employees Production Salary Generate">
                                            <a href="{{ route('production.salary.generate') }}">
                                                <i class="menu-icon fa fa-caret-right"></i>
                                                Generate
                                            </a>
                                            <b class="arrow"></b>
                                        </li>
                                    @endif

                                    @if(hasPermission('production.salary.generates.view', $slugs))
                                        <li class="{{ request()->is('hrm/production-salary/production-salary-generated-list') ? 'active' : '' }}" title="Production Salary List">
                                            <a href="{{ route('production.salary.list') }}">
                                                <i class="menu-icon fa fa-caret-right"></i>
                                                Salary List
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



            <!-- Other Expense [Akash] -->
            @if(hasAnyPermission(['other.expenses.index'], $slugs))
                <li class="{{ request()->segment(2) == "other-expenses" ? 'open' : '' }}">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Other Expense
                        <b class="arrow fa fa-angle-down"></b>
                    </a>
                    <b class="arrow"></b>



                    <ul class="submenu">

                        <!-- create -->
                        @if(hasPermission('other.expenses.create', $slugs))
                            <li class="{{ request()->is('hrm/other-expenses/create') ? 'active' : '' }}">
                                <a href="{{ route('other-expenses.create') }}">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Create
                                </a>
                                <b class="arrow"></b>
                            </li>
                        @endif

                        <!-- index -->
                        <li class="{{ request()->is('hrm/other-expenses') ? 'active' : '' }}">
                            <a href="{{ route('other-expenses.index') }}">
                                <i class="menu-icon fa fa-caret-right"></i>
                                List
                            </a>
                            <b class="arrow"></b>
                        </li>
                    </ul>
                </li>
            @endif
        </ul>
    </li>
@endif
