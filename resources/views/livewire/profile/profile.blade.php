<div>
    @include('home.profile.hero')

    <!-- Start -->
    <section class="section">
        <div class="container">
            <div class="row">
                @include('home.profile.sidbar')

                <div class="col-md-8 col-12 mt-4 pt-2">
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade bg-white show active shadow rounded p-4" id="dash" role="tabpanel"
                            aria-labelledby="dashboard">
                            <h6 class="text-muted d-flex">سلام <span class="text-dark px-1"> {{ auth()->user()->name }}
                                </span>
                                نیستید ?
                                ( <form class="d-flex" action="{{ route('filament.auth.logout') }}" method="POST">
                                    @csrf
                                    <button style="display:flex; background: none;border: none" class="text-danger"
                                        type="submit">
                                        خروج
                                    </button>
                                </form> )
                            </h6>

                            <h6 class="text-muted mb-0">از داشبورد حساب خود می توانید خود را مشاهده کنید <a
                                    href="javascript:void(0)" class="text-danger">سفارشات اخیر</a>, با مدیریت شما <a
                                    href="javascript:void(0)" class="text-danger">آدرس حمل و نقل و صورتحساب</a>, و <a
                                    href="javascript:void(0)" class="text-danger">رمز ورود و جزئیات حساب خود را ویرایش
                                    کنید</a>.</h6>
                        </div>
                        <!--end teb pane-->

                        <div class="tab-pane fade bg-white shadow rounded p-4" id="orders" role="tabpanel"
                            aria-labelledby="order-history">
                            <div class="table-responsive bg-white shadow rounded">
                                <table class="table mb-0 table-center table-nowrap">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="border-bottom">شماره سفارش </th>
                                            <th scope="col" class="border-bottom">تاریخ </th>
                                            <th scope="col" class="border-bottom">وضعیت</th>
                                            <th scope="col" class="border-bottom">مجموع</th>
                                            <th scope="col" class="border-bottom">اقدام</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">7107</th>
                                            <td>اردیبهشت 1400</td>
                                            <td class="text-success">تحویل داده شده </td>
                                            <td>320 هزار تومان <span class="text-muted">برای 2 موارد</span></td>
                                            <td><a href="javascript:void(0)" class="text-primary">نمایش <i
                                                        class="uil uil-arrow-right"></i></a></td>
                                        </tr>

                                        <tr>
                                            <th scope="row">8007</th>
                                            <td>اردیبهشت 1400</td>
                                            <td class="text-muted">در حال پردازش </td>
                                            <td>800 هزار تومان <span class="text-muted">برای 1موارد</span></td>
                                            <td><a href="javascript:void(0)" class="text-primary">نمایش <i
                                                        class="uil uil-arrow-right"></i></a></td>
                                        </tr>

                                        <tr>
                                            <th scope="row">8008</th>
                                            <td>اردیبهشت 1400</td>
                                            <td class="text-danger">لغو شده </td>
                                            <td>800 هزار تومان <span class="text-muted">برای 1موارد</span></td>
                                            <td><a href="javascript:void(0)" class="text-primary">نمایش <i
                                                        class="uil uil-arrow-right"></i></a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!--end teb pane-->

                        <div class="tab-pane fade bg-white shadow rounded p-4" id="down" role="tabpanel"
                            aria-labelledby="download">
                            <div class="table-responsive bg-white shadow rounded">
                                <table class="table mb-0 table-center table-nowrap">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="border-bottom">نام محصول </th>
                                            <th scope="col" class="border-bottom">توضیحات</th>
                                            <th scope="col" class="border-bottom">وضعیت</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">سریع التیام یابد</th>
                                            <td class="text-muted">گفته می شود آهنگسازان آهنگ گذشته <br> هنگام نوشتن از
                                                متن ساختگی به عنوان شعر استفاده می کرد <br> ملودی به منظور داشتن "آماده"
                                                است' <br> متن برای خواندن با ملودی.</td>
                                            <td class="text-success">دانلود </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!--end teb pane-->

                        <div class="tab-pane fade bg-white shadow rounded p-4" id="address" role="tabpanel"
                            aria-labelledby="addresses">
                            <h6 class="text-muted mb-0">به طور پیش فرض آدرس های زیر در صفحه پرداخت استفاده می شود.</h6>

                            <div class="row">
                                <div class="col-lg-6 mt-4 pt-2">
                                    <div class="d-flex align-items-center mb-4 justify-content-between">
                                        <h5 class="mb-0">ساخت آدرس:</h5>
                                        <a href="javascript:void(0)" class="text-primary h5 mb-0"
                                            data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                            data-original-title="Edit"><i class="uil uil-edit align-middle"></i></a>
                                    </div>
                                    <div class="pt-4 border-top">
                                        <p class="h6"> {{ auth()->user()->name }} </p>
                                        <p class="h6 text-muted">ارومیه، شاهین دژ، قزلناو, </p>
                                        <p class="h6 text-muted">خیابان دانش,</p>
                                        <p class="h6 text-muted">ایران</p>
                                        <p class="h6 text-muted mb-0">+123 897 5468</p>
                                    </div>
                                </div>

                                <div class="col-lg-6 mt-4 pt-2">
                                    <div class="d-flex align-items-center mb-4 justify-content-between">
                                        <h5 class="mb-0">آدرس فروشگاه:</h5>
                                        <a href="javascript:void(0)" class="text-primary h5 mb-0"
                                            data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                            data-original-title="Edit"><i class="uil uil-edit align-middle"></i></a>
                                    </div>
                                    <div class="pt-4 border-top">
                                        <p class="h6">جعفر عباسی</p>
                                        <p class="h6 text-muted">ارومیه، شاهین دژ، قزلناو, </p>
                                        <p class="h6 text-muted">خیابان دانش,</p>
                                        <p class="h6 text-muted">ایران</p>
                                        <p class="h6 text-muted mb-0">+123 897 5468</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end teb pane-->

                        <div class="tab-pane fade bg-white shadow rounded p-4" id="account" role="tabpanel"
                            aria-labelledby="account-details">
                            <livewire:profile.profile-info>
                        </div>
                        <!--end teb pane-->
                    </div>
                </div>
                <!--end col-->
            </div>
            <!--end row-->
        </div>
        <!--end container-->
    </section>
    <!--end section-->
    <!-- End -->

</div>
