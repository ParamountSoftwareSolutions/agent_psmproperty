<div class="main-sidebar sidebar-style-2">
    @php
        if(!Helpers::isSuperAdmin()){
            $panel = \App\Helpers\Helpers::user_login_route()['panel'];
        }
    @endphp
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            @if(Helpers::isSuperAdmin())
            <a href="{{ route('admin.dashboard') }}">
                <img alt="image" src="{{ asset('public/panel/assets/img/logo.png') }}" class="header-logo" style="height:150px !important;margin-top: -20px !important;"/>
            </a>
            @else
                <a href="{{ route('property.dashboard', ['panel' => $panel]) }}">
                    <img alt="image" src="{{ asset('public/panel/assets/img/logo.png') }}" class="header-logo" style="height:150px !important;margin-top: -20px !important;"/>
                </a>
            @endif
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            @if(Helpers::isSuperAdmin())
                <li class="dropdown @if (request()->routeIs('admin.dashboard')) active @endif">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link"><i class="fa-solid fa-tv"></i><span>Dashboard</span></a>
                </li>
                <li class="menu-header">User Management</li>
                <li class="dropdown @if (request()->routeIs('admin.society_admin*')) active @endif">
                    <a href="#" class="menu-toggle nav-link has-dropdown">
                        <i class="fa-solid fa-users"></i><span>Society Data</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link " href="{{ route('admin.society_admin.index') }}">Society Admin</a></li>
                    </ul>
                </li>
                <li class="dropdown @if (request()->routeIs('admin.property_admin.*')) active @endif">
                    <a href="#" class="menu-toggle nav-link has-dropdown">
                        <i class="fa-sharp fa-solid fa-house-chimney"></i><span>Property Data</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link " href="{{ route('admin.property_admin.index') }}">Property Admin</a></li>
                    </ul>
                </li>
            @elseif(Helpers::isPropertyAdmin())
                <li class="dropdown @if (request()->routeIs('property.dashboard')) active @endif">
                    <a href="{{ route('property.dashboard', ['panel' => $panel]) }}" class="nav-link"><i class="fa-solid fa-tv"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="menu-header">Project Management</li>
                <li class="dropdown @if (request()->routeIs('property.building.*'))
                    active @endif">
                    <a href="#" class="menu-toggle nav-link has-dropdown">
                        <i class="fa-sharp fa-solid fa-building-columns"></i><span>Project</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ route('property.building.create') }}">Add New Project</a></li>
                        <li><a class="nav-link" href="{{ route('property.building.index') }}">Project List</a></li>
                        {{--<li><a class="nav-link" href="{{ route('property.building.detail_form') }}">Add Project Details</a></li>--}}
                    </ul>
                </li>
                <li class="dropdown @if (request()->routeIs('property.inventory.*')) active @endif">
                    <a href="#" class="menu-toggle nav-link has-dropdown">
                        <i class="fa-sharp fa-solid fa-building-columns"></i><span>Inventory</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ route('property.inventory.create', ['panel' => $panel]) }}">Add New Inventory</a></li>
                        <li><a class="nav-link" href="{{ route('property.inventory.index', ['panel' => $panel]) }}">Inventory List</a></li>
                        {{--<li><a class="nav-link" href="{{ route('property_manager.building.detail_form') }}">Add Project Details</a></li>--}}
                    </ul>
                </li>
                <li class="dropdown @if (request()->routeIs('property.investor.*')) active @endif">
                    <a href="#" class="menu-toggle nav-link has-dropdown">
                        <i class="fa-sharp fa-solid fa-building-columns"></i><span>Investors</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ route('property.investor.create', ['panel' => $panel]) }}">Add New Investor</a></li>
                        <li><a class="nav-link" href="{{ route('property.investor.index', ['panel' => $panel]) }}">Investors List</a></li>
                    </ul>
                </li>
                <li class="dropdown @if (request()->routeIs('property.size.*', 'property.category.*', 'property.block.*')) active @endif">
                    <a href="#" class="menu-toggle nav-link has-dropdown">
                        <i class="fa-sharp fa-solid fa-building-columns"></i><span>Extra Data</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ route('property.block.index') }}">Block</a></li>
                        <li><a class="nav-link" href="{{ route('property.size.index') }}">Size</a></li>
                        <li><a class="nav-link" href="{{ route('property.category.index') }}">Category</a></li>
                    </ul>
                </li>
                <li class="dropdown @if (request()->routeIs('property.manager.*')) active @endif">
                    <a href="#" class="menu-toggle nav-link has-dropdown">
                        <i class="fa-solid fa-user"></i><span>Manager</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ route('property.manager.index', ['panel' => $panel]) }}">Manager List</a></li>
                        <li><a class="nav-link" href="{{ route('property.sale_manager.index', ['panel' => $panel]) }}">Sale Manager List</a></li>
                        {{--<li><a class="nav-link" href="{{ route('property.building.detail_form') }}">Add Project Details</a></li>--}}
                    </ul>
                </li>
                <li class="dropdown @if (request()->routeIs('property.setting.*')) active @endif">
                    <a href="#" class="menu-toggle nav-link has-dropdown">
                        <i class="fa-solid fa-gear"></i><span>Settings</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ route('property.setting.push_notification', ['panel' => $panel]) }}">Push Notification</a></li>
                    </ul>
                </li>
                <li class="dropdown @if (request()->routeIs('property.expense.*', 'property.office_expense.*', 'property.office_expense.category.*')) active @endif">
                    <a href="#" class="menu-toggle nav-link has-dropdown">
                        <i class="fa-sharp fa-solid fa-sack-dollar"></i>
                        <span>Expense</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ route('property.office_expense_category.index') }}">Expense Category</a></li>
                        <li><a class="nav-link" href="{{ route('property.office_expense.index',$panel) }}">Office Expense</a></li>
                        <li><a class="nav-link" href="{{ route('property.expense.index') }}">Construction Expense</a></li>
                    </ul>
                </li>
                <li class="dropdown @if (request()->routeIs('property.employee.*', 'property_manager.employee_payroll.*')) active @endif">
                    <a href="#" class="menu-toggle nav-link has-dropdown">
                        <i class="fa-solid fa-users"></i>
                        <span>HRM</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ route('property.employee.index') }}">Employee</a></li>
                        <li><a class="nav-link" href="{{ route('property.employee_payroll.index') }}">Payroll</a></li>
                    </ul>
                </li>
                <li class="dropdown @if (request()->routeIs('property.report.sale', 'property.report.edit','property.income.report','property.task_reports')) active @endif">
                    <a href="#" class="menu-toggle nav-link has-dropdown">
                        <i class="fa-solid fa-user"></i>
                        <span>Reports</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="">Sales Report</a></li>
                        <li><a class="nav-link" href="{{ route('property.report.expense_report',$panel) }}">Expenses Report</a></li>
                        <li><a class="nav-link" href="">Employee</a></li>
                        <li><a class="nav-link" href="{{ route('property.income.report',Helpers::user_login_route()['panel']) }}">Income Report</a></li>
                        <li><a class="nav-link" href="{{ route('property.task_reports', Helpers::user_login_route()) }}">Task Reports </a></li>
                    </ul>
                </li>
            @elseif(Helpers::isPropertyManager())
                <li class="dropdown @if (request()->routeIs('property_manager.dashboard')) active @endif">
                    <a href="{{ route('property_manager.dashboard') }}" class="nav-link"><i class="fa-solid fa-tv"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                @if(App\Helpers\Helpers::building_detail()->count() > 1)
                    <li class="dropdown @if (request()->routeIs('property_manager.custom_building.dashboard')) active @endif">
                        <a href="#" class="menu-toggle nav-link has-dropdown">
                            <i class="fa-sharp fa-solid fa-building-columns"></i><span>Project Dashboard</span></a>
                        <ul class="dropdown-menu">
                            @foreach(App\Helpers\Helpers::building_detail() as $data)
                                <li><a class="nav-link" href="{{ route('property_manager.custom_building.dashboard', $data->id) }}">{{ $data->name }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                @endif
                <li class="dropdown @if (request()->routeIs('property_manager.property.index', 'property_manager.property.create', 'property_manager.property.edit')) active @endif">
                    <a href="#" class="menu-toggle nav-link has-dropdown">
                        <i class="fa-sharp fa-solid fa-house-chimney"></i>
                        <span>Property</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ route('property_manager.property.index') }}">Property</a></li>
                    </ul>
                </li>
                {{--<li class="dropdown @if (request()->routeIs('property_manager.membership.index', 'property_manager.membership.create', 'property_manager.membership
                .edit'))
                active
                @endif">
                    <a href="#" class="menu-toggle nav-link has-dropdown">
                        <i class="fa-solid fa-file-lines"></i>
                        <span>Forms</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ route('property_manager.membership.index') }}">Membership Form</a></li>
                    </ul>
                </li>
                <li class="dropdown @if (request()->routeIs('property_manager.payment_plan.index', 'property_manager.payment_plan.create', 'property_manager.payment_plan
                .edit'))
                active
                @endif">
                    <a href="#" class="menu-toggle nav-link has-dropdown">
                        <i class="fa-solid fa-credit-card"></i>
                        <span>Payment Plan</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ route('property_manager.payment_plan.index') }}">Payment Plan</a></li>
                    </ul>
                </li>
                <li class="dropdown @if (request()->routeIs('property_manager.banner.index', 'property_manager.banner.update')) active @endif">
                    <a href="#" class="menu-toggle nav-link has-dropdown">
                        <i class="fa-solid fa-image"></i>
                        <span>Banner</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ route('property_manager.banner.index') }}">Banner List</a></li>
                    </ul>
                </li>--}}
                <li class="dropdown @if (request()->routeIs('property_manager.expense.index', 'property_manager.expense.edit', 'property_manager.expense.create',
                'property_manager
                .office_expense
                .index', 'property_manager.office_expense.create', 'property_manager.office_expense.edit')) active @endif">
                    <a href="#" class="menu-toggle nav-link has-dropdown">
                        <i class="fa-sharp fa-solid fa-sack-dollar"></i>
                        <span>Expense</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ route('property.office_expense.index',$panel) }}">Office Expense</a></li>
                        <li><a class="nav-link" href="{{ route('property_manager.expense.index',$panel) }}">Construction Expense</a></li>
                    </ul>
                </li>
                <li class="dropdown @if (request()->routeIs('property_manager.employee.index', 'property_manager.employee.create', 'property_manager.employee.edit',
                'property_manager
                .employee_payroll.index', 'property_manager.employee_payroll.create', 'property_manager.employee_payroll.edit')) active @endif">
                    <a href="#" class="menu-toggle nav-link has-dropdown">
                        <i class="fa-solid fa-users"></i>
                        <span>HRM</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ route('property_manager.employee.index') }}">Employee</a></li>
                        <li><a class="nav-link" href="{{ route('property_manager.employee_payroll.index') }}">Payroll</a></li>
                    </ul>
                </li>
                {{--<li class="dropdown @if (request()->routeIs('property_manager.request.index', 'property_manager.request.edit')) active @endif">
                    <a href="#" class="menu-toggle nav-link has-dropdown">
                        <i class="fa-regular fa-envelope"></i><span>Request</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ route('property_manager.request.index', ['type' => 'possession']) }}">Possession</a></li>
                        <li><a class="nav-link" href="{{ route('property_manager.request.index', ['type' => 'transfer']) }}">Transfer</a></li>
                        <li><a class="nav-link" href="{{ route('property_manager.request.index', ['type' => 'file']) }}">File</a></li>
                    </ul>
                </li>
                <li class="dropdown @if (request()->routeIs('property_manager.custom_notification.index', 'property_manager.custom_notification.create', 'property_manager
                .custom_notification
                .edit')) active @endif">
                    <a href="#" class="menu-toggle nav-link has-dropdown">
                        <i class="fa-regular fa-bell"></i>
                        <span>Custom Notification</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link " href="{{ route('property_manager.custom_notification.index') }}">Notification List</a></li>
                    </ul>
                </li>--}}
                <li class="dropdown @if (request()->routeIs('property_manager.report.sale', 'property_manager.report.edit')) active @endif">
                    <a href="#" class="menu-toggle nav-link has-dropdown">
                        <i class="fa-solid fa-user"></i>
                        <span>Accounts</span></a>
                    <ul class="dropdown-menu">
                         <li><a class="nav-link" href="">Sales Report</a></li>
                        <li><a class="nav-link" href="{{ route('property_manager.report.expense_report') }}">Expenses Report</a></li>
                        <li><a class="nav-link" href="">Employee</a></li>
                    </ul>
                </li>
                {{--<li class="dropdown @if (request()->routeIs('property_manager.update.index', 'property_manager.update.create', 'property_manager.update.edit'))
                active
                @endif">
                    <a href="#" class="menu-toggle nav-link has-dropdown">
                        <i class="fa-solid fa-newspaper"></i>
                        <span>News</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ route('property_manager.update.index') }}">Project Update</a></li>
                    </ul>
                </li>--}}
            @elseif(Helpers::isEmployee())
                <li class="dropdown @if (request()->routeIs('sale_person.dashboard')) active @endif">
                    <a href="{{ route('sale_person.dashboard') }}" class="nav-link"><i class="fa-solid fa-tv"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
            @elseif(Helpers::isSaleManager())
                <li class="dropdown @if (request()->routeIs('sale_manager.dashboard')) active @endif">
                    <a href="{{ route('sale_manager.dashboard') }}" class="nav-link"><i class="fa-solid fa-tv"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="dropdown @if (request()->routeIs('sale_manager.employee.index', 'sale_manager.employee.create', 'sale_manager.employee.edit')) active @endif">
                    <a href="#" class="menu-toggle nav-link has-dropdown">
                        <i class="fa-solid fa-user"></i><span>Sales Person</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ route('sale_manager.employee.index') }}">Employee</a></li>
                    </ul>
                </li>
            @endif


            @if(Helpers::isPropertyManager() || Helpers::isSaleManager() || Helpers::isEmployee())
                <li class="menu-header">Project Management</li>
                <li class="dropdown @if (request()->routeIs('property_manager.building.*', 'property_manager.building_details.*')) active @endif">
                    <a href="#" class="menu-toggle nav-link has-dropdown">
                        <i class="fa-sharp fa-solid fa-building-columns"></i>
                        <span>Project</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ route('property_manager.building.index',['panel' => \App\Helpers\Helpers::user_login_route()['panel']]) }}">All
                                Projects</a></li>
                        <li><a class="nav-link"
                               href="{{ route('property_manager.building_details.index',['panel' => \App\Helpers\Helpers::user_login_route()['panel']]) }}">All Project
                                Extra Detail</a></li>
                    </ul>
                </li>
            @endif

            {{--            @if(Helpers::isPropertyManager())--}}
            {{--                <li class="dropdown @if (request()->routeIs('property.email.compose')) active @endif">--}}
            {{--                    <a href="#" class="menu-toggle nav-link has-dropdown">--}}
            {{--                        <i class="fa-sharp fa-solid fa-house-chimney"></i>--}}
            {{--                        <span>Email</span></a>--}}
            {{--                    <ul class="dropdown-menu">--}}
            {{--                        <li><a class="nav-link" href="{{ route('property.email.compose') }}">Compose</a></li>--}}
            {{--                    </ul>--}}
            {{--                </li>--}}
            {{--            @endif--}}

            @if(Helpers::isPropertyManager() || Helpers::isPropertyAdmin() || Helpers::isSaleManager() || Helpers::isEmployee())
                <li class="dropdown @if (request()->routeIs('property_manager.sale.lead.*',
                'property_manager.sale.online_booking.*', 'property_manager.sale.client.*')) active @endif">
                    <a href="#" class="menu-toggle nav-link has-dropdown">
                        <i class="far fa-handshake"></i>
                        <span>Sales</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link " href="{{ route('property_manager.sale.lead.index', App\Helpers\Helpers::user_login_route()) }}">Leads</a></li>
                        <li><a class="nav-link " href="{{ route('property_manager.sale.client.index', App\Helpers\Helpers::user_login_route()) }}">Client</a></li>
                        <li><a class="nav-link " href="{{ route('property_manager.sale.client.history', App\Helpers\Helpers::user_login_route()) }}">Sale
                                History</a></li>

                        <li><a class="nav-link " href="{{ route('property_manager.sale.import.view', App\Helpers\Helpers::user_login_route()) }}">Bulk Import</a>
                        </li>
                        <?php if (!\Illuminate\Support\Facades\Auth::user()->hasRole('sale_person')) { ?>
                        <li><a class="nav-link " href="{{ route('property_manager.sale.bulk.export', App\Helpers\Helpers::user_login_route()) }}">Bulk Export</a>
                        </li>
                        <?php } ?>
                    </ul>
                </li>
                <li class="dropdown @if (request()->routeIs('property.my_targets','property.staff_targets','property.task_reports')) active @endif">
                    <a href="#" class="menu-toggle nav-link has-dropdown">
                        <i class="fa-solid fa-user"></i><span>Task Manager</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ route('property.my_targets', Helpers::user_login_route()) }}">My Targets </a></li>
                        <li><a class="nav-link" href="{{ route('property.staff_targets', Helpers::user_login_route()) }}">Staff Targets </a></li>
                    </ul>
                </li>
                <li class="dropdown @if (request()->routeIs('property_manager.email.compose')) active @endif">
                    <a href="#" class="menu-toggle nav-link has-dropdown">
                        <i class="fa-sharp fa-solid fa-house-chimney"></i>
                        <span>Email</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ route('property_manager.email.compose',Helpers::user_login_route()['panel']) }}">Compose</a></li>
                        <li><a class="nav-link" href="{{ route('property_manager.email.send_email',Helpers::user_login_route()['panel']) }}">Sent</a></li>
                    </ul>
                </li>
                <li class="dropdown @if (request()->routeIs('property.income.index', 'property.income.edit', 'property.income.create','property.income.report')) active @endif">
                    <a href="#" class="menu-toggle nav-link has-dropdown">
                        <i class="fa-sharp fa-solid fa-sack-dollar"></i>
                        <span>Income</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ route('property.income.index',Helpers::user_login_route()['panel']) }}">Income</a></li>
                        <li><a class="nav-link" href="{{ route('property.income.create',Helpers::user_login_route()['panel']) }}">Add New</a></li>
                        @if(Helpers::isPropertyAdmin())
                            <li><a class="nav-link" href="{{ route('property.income_category.index') }}">Add Category</a></li>
                        @endif
                    </ul>
                </li>
                <li class="dropdown @if (request()->routeIs('property.whatsappwebhook.index')) active @endif">
                    <a href="#" class="menu-toggle nav-link has-dropdown">
                        <i class="fa-sharp fa-solid fa-sack-dollar"></i>
                        <span>Whatsapp</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ route('property.whatsappwebhook.index',Helpers::user_login_route()['panel']) }}">Whatsapp</a></li>
                    </ul>
                </li>
            @endif
            @if(Helpers::isPropertyManager() || Helpers::isPropertyAdmin() || Helpers::isSaleManager())
                <li class="dropdown @if (request()->routeIs('property_manager.webhook.index')) active @endif">
                    <a href="{{ route('property_manager.webhook.index', \App\Helpers\Helpers::user_login_route()['panel']) }}">
                        <i data-feather="facebook"></i><span>Facebook Leads</span>
                    </a>
                </li>
            @endif


            @if(\Illuminate\Support\Facades\Auth::user()->hasRole('accountant'))
                <li class="dropdown @if (request()->routeIs('accountant.dashboard')) active @endif">
                    <a href="{{ route('accountant.dashboard') }}" class="nav-link"><i class="fa-solid fa-tv"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="dropdown @if (request()->routeIs('accountant.employee.index', 'accountant.employee.create', 'accountant.employee.edit', 'accountant.employee_payroll.index', 'accountant.employee_payroll.create', 'accountant.employee_payroll.edit')) active @endif">
                    <a href="#" class="menu-toggle nav-link has-dropdown">
                        <i class="fa-solid fa-users"></i>
                        <span>HRM</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ route('accountant.employee.index') }}">Employee</a></li>
                        <li><a class="nav-link" href="{{ route('accountant.employee_payroll.index') }}">Payroll</a></li>
                    </ul>
                </li>
                <li class="dropdown @if (request()->routeIs('accountant.expense.index', 'accountant.expense.edit', 'accountant.expense.create', 'accountant.office_expense
                .index', 'accountant.office_expense.create', 'accountant.office_expense.edit')) active @endif">
                    <a href="#" class="menu-toggle nav-link has-dropdown">
                        <i class="fa-sharp fa-solid fa-sack-dollar"></i>
                        <span>Expense</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ route('accountant.office_expense.index') }}">Office Expense</a></li>
                        <li><a class="nav-link" href="{{ route('accountant.expense.index') }}">Construction Expense</a></li>
                    </ul>
                </li>
                <li class="dropdown @if (request()->routeIs('accountant.report.sale', 'accountant.report.edit')) active @endif">
                    <a href="#" class="menu-toggle nav-link has-dropdown">
                        <i class="fa-solid fa-user"></i>
                        <span>Accounts</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="">Sales Report</a></li>
                        <li><a class="nav-link" href="{{ route('accountant.report.expense_report') }}">Expenses Report</a></li>
                        <li><a class="nav-link" href="">Employee</a></li>
                    </ul>
                </li>
            @endif

        </ul>
    </aside>
</div>
