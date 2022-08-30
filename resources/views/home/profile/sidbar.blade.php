<div class="col-md-4 mt-4 pt-2">
    <div class="d-flex align-items-center">
        <div class="ms-3">
            <h6 class="text-muted mb-0">خوش آمدی ، </h6>
            <h5 class="mb-0">{{ auth()->user()->name }}</h5>
        </div>
    </div>

    <ul class="nav nav-pills nav-justified flex-column bg-white rounded mt-4 shadow p-3 mb-0" id="pills-tab"
        role="tablist">
        <li class="nav-item">
            <a class="nav-link rounded active" id="dashboard" data-bs-toggle="pill" href="#dash" role="tab"
                aria-controls="dash" aria-selected="false">
                <div class="text-start py-1 px-3">
                    <h6 class="mb-0"><i class="uil uil-dashboard h5 align-middle me-2 mb-0"></i>
                        داشبورد </h6>
                </div>
            </a>
            <!--end nav link-->
        </li>
        <!--end nav item-->

        <li class="nav-item mt-2">
            <a class="nav-link rounded" id="order-history" data-bs-toggle="pill" href="#orders" role="tab"
                aria-controls="orders" aria-selected="false">
                <div class="text-start py-1 px-3">
                    <h6 class="mb-0"><i class="uil uil-list-ul h5 align-middle me-2 mb-0"></i> سفارشات
                    </h6>
                </div>
            </a>
            <!--end nav link-->
        </li>
        <!--end nav item-->

        <li class="nav-item mt-2">
            <a class="nav-link rounded" id="download" data-bs-toggle="pill" href="#down" role="tab"
                aria-controls="down" aria-selected="false">
                <div class="text-start py-1 px-3">
                    <h6 class="mb-0"><i class="uil uil-arrow-circle-down h5 align-middle me-2 mb-0"></i> دانلود ها
                    </h6>
                </div>
            </a>
            <!--end nav link-->
        </li>
        <!--end nav item-->

        <li class="nav-item mt-2">
            <a class="nav-link rounded" id="addresses" data-bs-toggle="pill" href="#address" role="tab"
                aria-controls="address" aria-selected="false">
                <div class="text-start py-1 px-3">
                    <h6 class="mb-0"><i class="uil uil-map-marker h5 align-middle me-2 mb-0"></i> آدرس
                        ها</h6>
                </div>
            </a>
            <!--end nav link-->
        </li>
        <!--end nav item-->

        <li class="nav-item mt-2">
            <a class="nav-link rounded" id="account-details" data-bs-toggle="pill" href="#account" role="tab"
                aria-controls="account" aria-selected="false">
                <div class="text-start py-1 px-3">
                    <h6 class="mb-0"><i class="uil uil-user h5 align-middle me-2 mb-0"></i> جزئیات
                        حساب</h6>
                </div>
            </a>
            <!--end nav link-->
        </li>
        <!--end nav item-->

        <li class="nav-item mt-2">
            <a class="nav-link rounded" href="auth-login.html" aria-selected="false">
                <div class="text-start py-1 px-3">
                    <h6 class="mb-0"><i class="uil uil-sign-out-alt h5 align-middle me-2 mb-0"></i>
                        خروج </h6>
                </div>
            </a>
            <!--end nav link-->
        </li>
        <!--end nav item-->
    </ul>
    <!--end nav pills-->
</div>
<!--end col-->
