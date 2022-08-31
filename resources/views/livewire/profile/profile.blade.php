<div>
    @include('home.profile.hero')
    <!-- Start -->
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mt-4 pt-2">
                    <div class="d-flex align-items-center">
                        <div class="ms-3">
                            <h6 class="text-muted mb-0">خوش آمدی ، </h6>
                            <h5 class="mb-0">{{ auth()->user()->name }}</h5>
                        </div>
                    </div>

                    @include('home.profile.sidbar')
                    <!--end nav pills-->
                </div>
                <!--end col-->

                <div class="col-md-8 col-12 mt-4 pt-2">
                    <div class="tab-content" id="pills-tabContent">
                        @include('home.profile.dashboard')

                        <div class="tab-pane fade bg-white shadow rounded p-4 {{ activeClassProfile('order') }}"
                            id="orders" role="tabpanel" aria-labelledby="order-history">
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

                        <livewire:profile.profile-address />

                        <livewire:profile.profile-info />
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
