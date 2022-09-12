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

                        @include('home.profile.order')

                        <livewire:profile.profile-address />

                        <div class="tab-pane fade bg-white shadow rounded p-4 {{ activeClassProfile('info') }}"
                            id="account" role="tabpanel" aria-labelledby="account-details">

                            <livewire:profile.profile-info />
                        </div>
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
