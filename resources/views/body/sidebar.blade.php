<nav class="sidebar">
    <div class="sidebar-header">
        <a href="{{ route('dashboard') }}" class="sidebar-brand">
            EIL<span>POS</span>
        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <ul class="nav">
            <li class="nav-item nav-category">Main</li>
            <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Dashboard</span>
                </a>
            </li>
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
                    <i class="link-icon" data-feather="calendar"></i>
                    <span class="link-title">Category</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('subcategory') }}" class="nav-link">
                    <i class="link-icon" data-feather="book"></i>
                    <span class="link-title">Sub Category</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('brand') }}" class="nav-link">
                    <i class="link-icon" data-feather="book"></i>
                    <span class="link-title">Brand</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('unit') }}" role="button" aria-controls="general-pages">
                    <i class="link-icon" data-feather="book"></i>
                    <span class="link-title">Unit</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('product.size.view') }}" class="nav-link">
                    <i class="link-icon" data-feather="book"></i>
                    <span class="link-title">Product Size</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('tax.add') }}" class="nav-link">
                    <i class="link-icon" data-feather="book"></i>
                    <span class="link-title">Taxes</span>
                </a>
            </li>
            <li class="nav-item nav-category">INFORMATION</li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('branch.view') }}" role="button" aria-controls="general-pages">
                    <i class="link-icon" data-feather="book"></i>
                    <span class="link-title">Branches</span>
                </a>

            </li>
            <li class="nav-item nav-category">PEOPLES</li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('customer.view') }}" role="button" aria-controls="general-pages">
                    <i class="link-icon" data-feather="book"></i>
                    <span class="link-title">Customer</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('employee.view') }}" role="button" aria-controls="general-pages">
                    <i class="link-icon" data-feather="book"></i>
                    <span class="link-title">Employee</span>
                </a>
            </li>
            <li class="nav-item nav-category">Inventory</li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('supplier') }}" role="button" aria-controls="general-pages">
                    <i class="link-icon" data-feather="book"></i>
                    <span class="link-title">Supplier</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('purchase') }}" role="button" aria-controls="general-pages">
                    <i class="link-icon" data-feather="book"></i>
                    <span class="link-title">Purchase</span>
                </a>
            </li>
            <li class="nav-item nav-category">Bank</li>
            <li class="nav-item">
                <a href="{{ route('bank') }}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Bank</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('expense.view') }}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Expense</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('payment.method.add') }}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Payemnet Method</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('transaction.add') }}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Transaction</span>
                </a>
            </li>
            <li class="nav-item nav-category">PROMOTIONS</li>
            <li class="nav-item">
                <a href="{{ route('promotion.view') }}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Promotion</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('promotion.details.view') }}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Promotion Details</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
