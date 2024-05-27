<nav class="sidebar">
    <div class="sidebar-header">
        <a href="{{ route('dashboard') }}" class="sidebar-brand">
            @if (!empty($logo))
                <img src="{{ asset('/') . $logo }}" alt="" height="40">
            @else
                EIL<span>POS</span>
            @endif
        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <ul class="nav">
            <li class="nav-item nav-category">theme</li>
            <li class="nav-item">
                <div class="form-valid-groups">
                    @php
                        $mode = App\models\PosSetting::all()->first();
                    @endphp
                    <form action="{{ route('switch_mode') }}" method="POST" id="darkModeForm">
                        @csrf
                        <div class="form-check form-switch">
                            <input class="form-check-input flexSwitchCheckDefault" type="checkbox"
                                {{ $mode->dark_mode == 2 ? 'checked' : '' }} name="dark_mode" role="switch"
                                id="flexSwitchCheckDefault">
                            <label class="form-check-label" for="flexSwitchCheckDefault">Dark Mode</label>
                        </div>
                    </form>
                </div>
            </li>
            <li class="nav-item nav-category">Main</li>

            <li class="nav-item">
                <a href="{{ route('dashboard') }}"
                    class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <i class="ms-2 ms-2 link-icon" data-feather="home"></i>
                    <span class=" link-title">Dashboard</span>
                </a>
            </li>

            @if (Auth::user()->can('pos.menu'))
                <li class="nav-item">
                    <a href="{{ route('sale') }}" class="nav-link {{ request()->routeIs('sale') ? 'active' : '' }}">
                        <i class="ms-2 ms-2 link-icon" data-feather="shopping-cart"></i>
                        <span class="link-title">POS</span>
                    </a>
                </li>
            @endif
            @if (Auth::user()->can('pos-manage.menu'))
                <li class="nav-item">
                    <a href="{{ route('sale.view') }}"
                        class="nav-link {{ request()->routeIs('sale.view') ? 'active' : '' }}">
                        <i class="ms-2 ms-2 link-icon" data-feather="shopping-bag"></i>
                        <span class="link-title">POS Manage</span>
                    </a>
                </li>
            @endif
            @if (Auth::user()->can('products.menu'))
                <li class="nav-item nav-category">Products</li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#emails" role="button" aria-expanded="false"
                        aria-controls="emails">
                        <i class="link-icon" data-feather="mail"></i>
                        <span class="link-title">Products</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>

                    <div class="collapse" id="emails">
                        <ul class="nav sub-menu">
                            @if (Auth::user()->can('products.add'))
                                <li class="nav-item">
                                    <a href="{{ route('product') }}" class="nav-link">Add Product</a>
                                </li>
                            @endif
                            @if (Auth::user()->can('products.list'))
                                <li class="nav-item">
                                    <a href="{{ route('product.view') }}" class="nav-link">Manage Products</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </li>
            @endif
            {{-- @if (Auth::user()->can('products.menu'))
                <li class="nav-item nav-category">Products</li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#emails" role="button" aria-expanded="false"
                        aria-controls="emails">
                        <i class="ms-2 ms-2 link-icon" data-feather="package"></i>
                        <span class="link-title">Products</span>
                        <i class="ms-2 link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse" id="emails">
                        <ul class="nav sub-menu">

                            @if (Auth::user()->can('products.add'))
                                <li class="nav-item">
                                    <a href="{{ route('product') }}" class="nav-link">Add Product</a>
                                </li>
                            @endif
                            @if (Auth::user()->can('products.list'))
                                <li class="nav-item">
                                    <a href="{{ route('product.view') }}" class="nav-link">Manage Products</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </li>
            @endif --}}
            @if (Auth::user()->can('category.menu'))
                <li class="nav-item">
                    <a href="{{ route('category') }}" class="nav-link">
                        <i class="ms-2 ms-2 link-icon" data-feather="grid"></i>
                        <span class="link-title">Category</span>
                    </a>
                </li>
            @endif
            @if (Auth::user()->can('subcategory.menu'))
                <li class="nav-item">
                    <a href="{{ route('subcategory') }}" class="nav-link">
                        <i class="ms-2 ms-2 link-icon" data-feather="layers"></i>
                        <span class="link-title">Sub Category</span>
                    </a>
                </li>
            @endif
            @if (Auth::user()->can('brand.menu'))
                <li class="nav-item">
                    <a href="{{ route('brand') }}" class="nav-link">
                        <i class="ms-2 ms-2 link-icon" data-feather="hash"></i>
                        <span class="link-title">Brand</span>
                    </a>
                </li>
            @endif
            @if (Auth::user()->can('unit.menu'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('unit') }}" role="button" aria-controls="general-pages">
                        <i class="ms-2 ms-2 link-icon" data-feather="trello"></i>
                        <span class="link-title">Unit</span>
                    </a>
                </li>
            @endif
            @if (Auth::user()->can('products-size.menu'))
                <li class="nav-item">
                    <a href="{{ route('product.size.view') }}" class="nav-link">
                        <i class="ms-2 ms-2 link-icon" data-feather="maximize"></i>
                        <span class="link-title">Product Size</span>
                    </a>
                </li>
            @endif
            @if (Auth::user()->can('tax.menu'))
                <li class="nav-item">
                    <a href="{{ route('tax.add') }}" class="nav-link">
                        <i class="ms-2 fa-regular fa-money-bill-1 link-icon"></i>
                        <span class="link-title">Taxes</span>
                    </a>
                </li>
            @endif
            <li class="nav-item nav-category">Inventory</li>

            @if (Auth::user()->can('supplier.menu'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('supplier') }}" role="button"
                        aria-controls="general-pages">
                        <i class="ms-2 fa-solid fa-handshake link-icon"></i>
                        <span class="link-title">Supplier</span>
                    </a>
                </li>
            @endif
            @if (Auth::user()->can('purchase.menu'))
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#uiComponents" role="button"
                        aria-expanded="false" aria-controls="uiComponents">
                        <i class="link-icon" data-feather="feather"></i>
                        <span class="link-title">Purchase</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse" id="uiComponents">
                        <ul class="nav sub-menu">
                            @if (Auth::user()->can('purchase.add'))
                                <li class="nav-item">
                                    <a href="{{ route('purchase') }}" class="nav-link">Add Purchase</a>
                                </li>
                            @endif
                            @if (Auth::user()->can('purchase.list'))
                                <li class="nav-item">
                                    <a href="{{ route('purchase.view') }}" class="nav-link">Manage Purchase</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </li>
            @endif
            {{-- @if (Auth::user()->can('purchase.menu'))
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#emails" role="button"
                        aria-expanded="false" aria-controls="emails">
                        <i class="ms-2 fa-solid fa-cart-plus link-icon"></i>
                        <span class="link-title">Purchase</span>
                        <i class="ms-2 link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse" id="emails">
                        <ul class="nav sub-menu">
                            @if (Auth::user()->can('purchase.add'))
                                <li class="nav-item">
                                    <a href="{{ route('purchase') }}" class="nav-link">Add Purchase</a>
                                </li>
                            @endif
                            @if (Auth::user()->can('purchase.list'))
                                <li class="nav-item">
                                    <a href="{{ route('purchase.view') }}" class="nav-link">Manage Purchase</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </li>
            @endif --}}
            @if (Auth::user()->can('promotion.menu'))
                <li class="nav-item">
                    <a href="{{ route('promotion.view') }}" class="nav-link">
                        <i class="ms-2 fa-solid fa-tag link-icon"></i>
                        <span class="link-title">Promotion</span>
                    </a>
                </li>
            @endif
            @if (Auth::user()->can('promotion-details.menu'))
                <li class="nav-item">
                    <a href="{{ route('promotion.details.view') }}" class="nav-link">
                        <i class="ms-2 fa-solid fa-tags link-icon"></i>
                        <span class="link-title">Promotion Details</span>
                    </a>
                </li>
            @endif
            @if (Auth::user()->can('damage.menu'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('damage') }}" role="button" aria-controls="general-pages">
                        <i class="ms-2 ms-2 link-icon" data-feather="book"></i>
                        <span class="link-title">Damage</span>
                    </a>
                </li>
            @endif
            @if (Auth::user()->can('bank.menu'))
                <li class="nav-item">
                    <a href="{{ route('bank') }}" class="nav-link">
                        <i class="ms-2 fa-solid fa-building-columns link-icon"></i>
                        <span class="link-title">Bank</span>
                    </a>
                </li>
            @endif
            @if (Auth::user()->can('expense.menu'))
                <li class="nav-item">
                    <a href="{{ route('expense.view') }}" class="nav-link">
                        <i class="ms-2 fa-solid fa-money-bill-transfer link-icon"></i>
                        <span class="link-title">Expense</span>
                    </a>
                </li>
            @endif
            {{-- <li class="nav-item">
                <a href="{{ route('payment.method.add') }}" class="nav-link">
                    <i class="ms-2 fa-solid fa-cash-register link-icon"></i>
                    <span class="link-title">Payment Method</span>
                </a>
            </li> --}}
            @if (Auth::user()->can('transaction.menu'))
                <li class="nav-item">
                    <a href="{{ route('transaction.add') }}" class="nav-link">
                        <i class="ms-2 fa-solid fa-receipt link-icon"></i>
                        <span class="link-title">Transaction</span>
                    </a>
                </li>
            @endif
            <li class="nav-item nav-category">PEOPLES</li>
            @if (Auth::user()->can('customer.menu'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('customer.view') }}" role="button"
                        aria-controls="general-pages">
                        <i class="ms-2 ms-2 link-icon" data-feather="users"></i>
                        <span class="link-title">Customer</span>
                    </a>
                </li>
            @endif
            @if (Auth::user()->can('employee.menu'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('employee.view') }}" role="button"
                        aria-controls="general-pages">
                        <i class="ms-2 ms-2 link-icon" data-feather="user-check"></i>
                        <span class="link-title">Employee</span>
                    </a>
                </li>
            @endif
            @if (Auth::user()->can('employee-salary.menu'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('employee.salary.add') }}" role="button"
                        aria-controls="general-pages">
                        <i class="ms-2 ms-2 link-icon" data-feather="user-check"></i>
                        <span class="link-title">Employee Salary</span>
                    </a>
                </li>
            @endif
            @if (Auth::user()->can('advanced-employee-salary.menu'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('advanced.employee.salary.add') }}" role="button"
                        aria-controls="general-pages">
                        <i class="ms-2 ms-2 link-icon" data-feather="user-check"></i>
                        <span class="link-title">Advanced Employee Salary</span>
                    </a>
                </li>
            @endif
            @if (Auth::user()->can('crm.menu'))
                <li class="nav-item nav-category">Customer Info. Management</li>
                @if (Auth::user()->can('advanced-employee-salary.menu'))
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#advancedUI" role="button"
                            aria-expanded="false" aria-controls="advancedUI">
                            <i class="link-icon" data-feather="anchor"></i>
                            <span class="link-title">CRM</span>
                            <i class="link-arrow" data-feather="chevron-down"></i>
                        </a>
                        <div class="collapse" id="advancedUI">
                            <ul class="nav sub-menu">
                                @if (Auth::user()->can('crm.customize-customer'))
                                    <li class="nav-item">
                                        <a href="{{ route('customer.list.view') }}" class="nav-link">Customize
                                            Customer</a>
                                    </li>
                                @endif
                                @if (Auth::user()->can('crm.email-marketing'))
                                    <li class="nav-item">
                                        <a href="{{ route('email.To.Customer.Page') }}" class="nav-link">Email
                                            Marketing</a>
                                    </li>
                                @endif
                                @if (Auth::user()->can('crm.sms-marketing'))
                                    <li class="nav-item">
                                        <a href="{{ route('sms.To.Customer.Page') }}" class="nav-link">SMS
                                            Marketing</a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </li>
                @endif
            @endif
            {{-- @if (Auth::user()->can('advanced-employee-salary.menu'))
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#crm" role="button"
                        aria-expanded="false" aria-controls="emails">
                        <i class="ms-2 fa-solid fa-users-gear link-icon"></i>
                        <span class="link-title">CRM</span>
                        <i class="ms-2 link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse" id="crm">
                        <ul class="nav sub-menu">
                            @if (Auth::user()->can('crm.customize-customer'))
                                <li class="nav-item">
                                    <a href="{{ route('customer.list.view') }}" class="nav-link">Customize
                                        Customer</a>
                                </li>
                            @endif
                            @if (Auth::user()->can('crm.email-marketing'))
                                <li class="nav-item">
                                    <a href="{{ route('email.To.Customer.Page') }}" class="nav-link">Email
                                        Marketing</a>
                                </li>
                            @endif
                            @if (Auth::user()->can('crm.sms-marketing'))
                                <li class="nav-item">
                                    <a href="{{ route('sms.To.Customer.Page') }}" class="nav-link">SMS Marketing</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </li>
            @endif --}}
            <li class="nav-item nav-category">All Reports</li>
            @if (Auth::user()->can('report.menu'))
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#majid" role="button"
                        aria-expanded="false" aria-controls="forms">
                        <i class="link-icon" data-feather="inbox"></i>
                        <span class="link-title">Reports</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse" id="majid">
                        <ul class="nav sub-menu">
                            <li class="nav-item">
                                <a id="report" href="{{ route('today.report') }}" class="nav-link">Today Report</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('product.info.report') }}" class="nav-link">Product Info
                                    Report</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('summary.report') }}" class="nav-link">Summary Report</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('customer.due.report') }}" class="nav-link">Customer Due
                                    Report</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('supplier.due.report') }}" class="nav-link">Supplier Due
                                    Report</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('low.stock.report') }}" class="nav-link">Low Stock Report</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('top.products.report') }}" class="nav-link">Top Products</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('purchase.report') }}" class="nav-link">Purchase Report</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('customer.ledger.report') }}" class="nav-link">Customer
                                    Ledger</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('suppliers.ledger.report') }}" class="nav-link">Supplier
                                    Ledger</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('account.transaction.view') }}" class="nav-link">Account
                                    Transaction</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('account.transaction.view') }}" class="nav-link">Expense
                                    Report</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('employee.salary.report.view') }}" class="nav-link">Employee
                                    Salary
                                    Report</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('stock.report') }}" class="nav-link">Stock Report</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('damage.report') }}" class="nav-link">Damage Report</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('sms.report') }}" class="nav-link">Sms Report</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('monthly.report') }}" class="nav-link">Monthly Report</a>
                            </li>
                        </ul>
                    </div>
                </li>
            @endif
            {{-- @if (Auth::user()->can('report.menu'))
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#report" role="button"
                        aria-expanded="false" aria-controls="emails">
                        <i class="ms-2 fa-solid fa-file-waveform link-icon"></i>
                        <span class="link-title">Reports</span>
                        <i class="ms-2 link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse" id="report">
                        <ul class="nav sub-menu">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('today.report') }}" role="button"
                                    aria-controls="general-pages">
                                    Today Report
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('product.info.report') }}" role="button"
                                    aria-controls="general-pages">
                                    Product Info Report
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('summary.report') }}" role="button"
                                    aria-controls="general-pages">
                                    Summary Report
                                </a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" href="{{ route('branch.view') }}" role="button"
                                aria-controls="general-pages">
                                Daily Report
                            </a>
                        </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('customer.due.report') }}" role="button"
                                    aria-controls="general-pages">
                                    Customer Due Report
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('supplier.due.report') }}" role="button"
                                    aria-controls="general-pages">
                                    Supplier Due Report
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('low.stock.report') }}" role="button"
                                    aria-controls="general-pages">
                                    Low Stock Report
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('top.products.report') }}" role="button"
                                    aria-controls="general-pages">
                                    Top Products
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('purchase.report') }}" role="button"
                                    aria-controls="general-pages">
                                    Purchase Report
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('customer.ledger.report') }}" role="button"
                                    aria-controls="general-pages">
                                    Customer Ledger
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('suppliers.ledger.report') }}" role="button"
                                    aria-controls="general-pages">
                                    Supplier Ledger
                                </a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" href="{{ route('bank.report') }}" role="button"
                                aria-controls="general-pages">
                                Bank Report
                            </a>
                        </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('account.transaction.view') }}" role="button"
                                    aria-controls="general-pages">
                                    Account Transaction
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('expense.report.view') }}" role="button"
                                    aria-controls="general-pages">
                                    Expense Report
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('employee.salary.report.view') }}" role="button"
                                    aria-controls="general-pages">
                                    Employee Salary Report
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('stock.report') }}" role="button"
                                    aria-controls="general-pages">
                                    Stock Report
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('damage.report') }}" role="button"
                                    aria-controls="general-pages">
                                    Damage Report
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('sms.report') }}" role="button"
                                    aria-controls="general-pages">
                                    Sms Report
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('monthly.report') }}" role="button"
                                    aria-controls="general-pages">
                                    Monthly Report
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>
            @endif --}}
            <!---Role & Permission--->
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#role" role="button" aria-expanded="false"
                    aria-controls="emails">
                    <i class="fa-solid fa-users-gear link-icon"></i>
                    <span class="link-title">Role & Permission</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="role">
                    <ul class="nav sub-menu">
                        @if (Auth::user()->can('role-and-permission.all-permission'))
                            <li class="nav-item">
                                <a href="{{ route('all.permission') }}" class="nav-link">All Permisiion</a>
                            </li>
                        @endif
                        @if (Auth::user()->can('role-and-permission.all-role'))
                            <li class="nav-item">
                                <a href="{{ route('all.role') }}" class="nav-link">All Role</a>
                            </li>
                        @endif
                        @if (Auth::user()->can('role-and-permission.role-in-permission'))
                            <li class="nav-item">
                                <a href="{{ route('add.role.permission') }}" class="nav-link">Role In
                                    Permission</a>
                            </li>
                        @endif
                        @if (Auth::user()->can('role-and-permission-check-role-permission'))
                            <li class="nav-item">
                                <a href="{{ route('all.role.permission') }}" class="nav-link">Check All Role
                                    Permission</a>
                            </li>
                        @endif
                    </ul>
                </div>
            </li>
            <!---Admin Manage--->
            @if (Auth::user()->can('admin-manage.menu'))
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#admin-manage" role="button"
                        aria-expanded="false" aria-controls="emails">
                        <i class="fa-solid fa-users-gear link-icon"></i>
                        <span class="link-title">Admin Manage</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse" id="admin-manage">
                        <ul class="nav sub-menu">
                            @if (Auth::user()->can('admin-manage.list'))
                                <li class="nav-item">
                                    <a href="{{ route('all.admin') }}" class="nav-link">All Admin</a>
                                </li>
                            @endif
                            @if (Auth::user()->can('admin-manage.add'))
                                <li class="nav-item">
                                    <a href="{{ route('add.admin') }}" class="nav-link">Add Admin</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </li>
            @endif
            <li class="nav-item nav-category">SETTING & CUSTOMIZE</li>
            @if (Auth::user()->can('settings.menu'))
                <li class="nav-item">
                    <a href="{{ route('pos.settings.add') }}" class="nav-link">
                        <i class="ms-2 ms-2 link-icon" data-feather="settings"></i>
                        <span class="link-title">Settings</span>
                    </a>
                </li>
            @endif
            @if (Auth::user()->can('branch.menu'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('branch.view') }}" role="button"
                        aria-controls="general-pages">
                        <i class="ms-2 ms-2 link-icon" data-feather="sliders"></i>
                        <span class="link-title">Branches</span>
                    </a>
                </li>
            @endif
        </ul>
    </div>
</nav>



{{-- <script>
    document.addEventListener('DOMContentLoaded', function() {
        const navLinks = document.querySelectorAll('.nav-item .nav-link');

        // Function to remove the active class from all nav links
        function clearActiveStates() {
            navLinks.forEach(link => {
                link.classList.remove('active');
            });
        }

        // Function to set the active class on the current nav link
        function setActiveState(link) {
            clearActiveStates();
            link.classList.add('active');
        }

        // Event listener for each nav link
        navLinks.forEach(link => {
            link.addEventListener('click', function(event) {
                // Prevent default action if the link has a href attribute
                if (link.href) {
                    event.preventDefault();
                    setActiveState(link);
                    // Navigate to the new URL after setting the active state
                    window.location.href = link.href;
                }
            });
        });

        // Set active state based on the current URL
        function setActiveLinkByURL() {
            const currentURL = window.location.href;
            navLinks.forEach(link => {
                if (link.href === currentURL) {
                    setActiveState(link);
                }
            });
        }

        setActiveLinkByURL();
    });
</script> --}}
