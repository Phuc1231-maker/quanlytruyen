<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/dashboard">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">ADMIN QUẢN lÝ TRUYỆN</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="/">
            <i class="fas fa-fw fa-house-user"></i>
            <span>Home</span></a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="/dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Manager Tools
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProduct"
        aria-expanded="true" aria-controls="collapseProduct">
        <i class="fas fa-toolbox"></i>
        <span>Product</span>
    </a>
    <div id="collapseProduct" class="collapse" aria-labelledby="headingProduct" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Product list:</h6>
            <a class="collapse-item" href="/sanpham-admin">View Product</a>
            <a class="collapse-item" href="/addproducts">Add Product</a>
        </div>
    </div>
</li>

<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAccount"
        aria-expanded="true" aria-controls="collapseAccount">
        <i class="fa fa-user" aria-hidden="true"></i>
        <span>Account</span>
    </a>
    <div id="collapseAccount" class="collapse" aria-labelledby="headingAccount" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Account:</h6>
            <a class="collapse-item" href="/adminaccounts">View Account</a>
            <a class="collapse-item" href="/createadminaccount">Add Account</a>
        </div>
    </div>
</li>

<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCategory"
        aria-expanded="true" aria-controls="collapseCategory">
        <i class="fa fa-list" aria-hidden="true"></i>
        <span>Category</span>
    </a>
    <div id="collapseCategory" class="collapse" aria-labelledby="headingCategory" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
<h6 class="collapse-header">Category:</h6>
            <a class="collapse-item" href="/danhsach">View Category</a>
            {{-- <a class="collapse-item" href="#">Add More Category</a> --}}
        </div>
    </div>
</li>

<!-- Bills Section -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBills"
        aria-expanded="true" aria-controls="collapseBills">
        <i class="fas fa-money-bill fa-xs fa-fw"></i>
        <span>Bill</span>
    </a>
    <div id="collapseBills" class="collapse" aria-labelledby="headingBills" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Hóa đơn:</h6>
            <a class="collapse-item" href="{{route('admin.getBillList')}}">Xem hóa đơn</a>
            {{-- <a class="collapse-item" href="#">Add More Category</a> --}}
        </div>
    </div>
</li>

<!-- Contacts Section -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseContacts"
        aria-expanded="true" aria-controls="collapseContacts">
        <i class="fas fa-money-bill fa-xs fa-fw"></i>
        <span>Contacts</span>
    </a>
    <div id="collapseContacts" class="collapse" aria-labelledby="headingContacts" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Liên hệ:</h6>
            <a class="collapse-item" href="{{route('admin.getContactMail')}}">Liên hệ</a>
            {{-- <a class="collapse-item" href="#">Add More Category</a> --}}
        </div>
    </div>
</li>


    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Addons
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Pages</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Login Screens:</h6>
                <a class="collapse-item" href="/admin/dangnhap">Login</a>
                <a class="collapse-item" href="/admin/dangky">Register</a>
                {{-- <a class="collapse-item" href="forgot-password.html">Forgot Password</a> --}}
                {{-- <div class="collapse-divider"></div>
                <h6 class="collapse-header">Other Pages:</h6>
                <a class="collapse-item" href="404.html">404 Page</a>
                <a class="collapse-item" href="blank.html">Blank Page</a> --}}
            </div>
        </div>
    </li>

    {{-- <!-- Nav Item - Charts -->
<li class="nav-item">
        <a class="nav-link" href="charts.html">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Charts</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="tables.html">
            <i class="fas fa-fw fa-table"></i>
            <span>Tables</span></a>
    </li> --}}

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    {{-- <!-- Sidebar Message -->
    <div class="sidebar-card d-none d-lg-flex">
        <img class="sidebar-card-illustration mb-2" src="admin/img/undraw_rocket.svg" alt="...">
        <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!</p>
        <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>
    </div> --}}

</ul>
<!-- End of Sidebar -->