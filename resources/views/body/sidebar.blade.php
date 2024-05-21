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
                <a href="{{ route('dashboard') }}" class="nav-link">
                    <i class="link-icon" data-feather="home"></i>
                    <span class="link-title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('sale') }}" class="nav-link" id="pos">
                    <i class="link-icon" data-feather="shopping-cart"></i>
                    <span class="link-title">POS</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('sale.view') }}" class="nav-link" id="sale">
                    <i class="link-icon" data-feather="shopping-bag"></i>
                    <span class="link-title">POS Manage</span>
                </a>
            </li>
            <li class="nav-item nav-category">Products</li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#emails" role="button" aria-expanded="false"
                    aria-controls="emails">
                    <i class="link-icon" data-feather="package"></i>
                    <span class="link-title">Products</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="emails">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('product') }}" class="nav-link">Add Product</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('product.view') }}" class="nav-link">Manage Products</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a href="{{ route('category') }}" class="nav-link">
                    <i class="link-icon" data-feather="grid"></i>
                    <span class="link-title">Category</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('subcategory') }}" class="nav-link">
                    <i class="link-icon" data-feather="layers"></i>
                    <span class="link-title">Sub Category</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('brand') }}" class="nav-link">
                    <i class="link-icon" data-feather="hash"></i>
                    <span class="link-title">Brand</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('unit') }}" role="button" aria-controls="general-pages">
                    <i class="link-icon" data-feather="trello"></i>
                    <span class="link-title">Unit</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('product.size.view') }}" class="nav-link">
                    <i class="link-icon" data-feather="maximize"></i>
                    <span class="link-title">Product Size</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('tax.add') }}" class="nav-link">
                    <i class="fa-regular fa-money-bill-1 link-icon"></i>
                    <span class="link-title">Taxes</span>
                </a>
            </li>
            <li class="nav-item nav-category">Inventory</li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('supplier') }}" role="button" aria-controls="general-pages">
                    <i class="fa-solid fa-handshake link-icon"></i>
                    <span class="link-title">Supplier</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#emails" role="button" aria-expanded="false"
                    aria-controls="emails">
                    <i class="fa-solid fa-cart-plus link-icon"></i>
                    <span class="link-title">Purchase</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="emails">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('purchase') }}" class="nav-link">Add Purchase</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('purchase.view') }}" class="nav-link">Manage Purchase</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a href="{{ route('promotion.view') }}" class="nav-link">
                    <i class="fa-solid fa-tag link-icon"></i>
                    <span class="link-title">Promotion</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('promotion.details.view') }}" class="nav-link">
                    <i class="fa-solid fa-tags link-icon"></i>
                    <span class="link-title">Promotion Details</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('damage') }}" role="button" aria-controls="general-pages">
                    <i class="link-icon" data-feather="book"></i>
                    <span class="link-title">Damage</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('bank') }}" class="nav-link">
                    <i class="fa-solid fa-building-columns link-icon"></i>
                    <span class="link-title">Bank</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('expense.view') }}" class="nav-link">
                    <i class="fa-solid fa-money-bill-transfer link-icon"></i>
                    <span class="link-title">Expense</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('payment.method.add') }}" class="nav-link">
                    <i class="fa-solid fa-cash-register link-icon"></i>
                    <span class="link-title">Payment Method</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('transaction.add') }}" class="nav-link">
                    <i class="fa-solid fa-receipt link-icon"></i>
                    <span class="link-title">Transaction</span>
                </a>
            </li>
            <li class="nav-item nav-category">PEOPLES</li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('customer.view') }}" role="button"
                    aria-controls="general-pages">
                    <i class="link-icon" data-feather="users"></i>
                    <span class="link-title">Customer</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('employee.view') }}" role="button"
                    aria-controls="general-pages">
                    <i class="link-icon" data-feather="user-check"></i>
                    <span class="link-title">Employee</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('employee.salary.add') }}" role="button"
                    aria-controls="general-pages">
                    <i class="link-icon" data-feather="user-check"></i>
                    <span class="link-title">Employee Salary</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('advanced.employee.salary.add') }}" role="button"
                    aria-controls="general-pages">
                    <i class="link-icon" data-feather="user-check"></i>
                    <span class="link-title">Advanced Employee Salary</span>
                </a>
            </li>
            <li class="nav-item nav-category">Customer Info. Management</li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#crm" role="button" aria-expanded="false"
                    aria-controls="emails">
                    <i class="fa-solid fa-users-gear link-icon"></i>
                    <span class="link-title">CRM</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="crm">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('customer.list.view') }}" class="nav-link">Customize Customer</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('email.To.Customer.Page') }}" class="nav-link">Email Marketing</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('sms.To.Customer.Page') }}" class="nav-link">SMS Marketing</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item nav-category">All Reports</li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#report" role="button" aria-expanded="false"
                    aria-controls="emails">
                    <i class="fa-solid fa-file-waveform link-icon"></i>
                    <span class="link-title">Reports</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
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
                        {{-- <li class="nav-item">
                            <a class="nav-link" href="{{ route('branch.view') }}" role="button"
                                aria-controls="general-pages">
                                Daily Report
                            </a>
                        </li> --}}
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
            <li class="nav-item nav-category">SETTING & CUSTOMIZE</li>
            <li class="nav-item">
                <a href="{{ route('pos.settings.add') }}" class="nav-link">
                    <i class="link-icon" data-feather="settings"></i>
                    <span class="link-title">Settings</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('branch.view') }}" role="button" aria-controls="general-pages">
                    <i class="link-icon" data-feather="sliders"></i>
                    <span class="link-title">Branches</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
