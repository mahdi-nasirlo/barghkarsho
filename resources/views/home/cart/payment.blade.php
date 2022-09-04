@extends('layouts.template-master')

@section('script')
@endsection

@section('content')
    <div>
        @include('home.cart.hero', ['title' => 'صندوق'])

        <!-- Start -->
        <section class="section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-md-6">
                        <div class="rounded shadow-lg p-4">
                            <h5 class="mb-0">جزئیات صورتحساب :</h5>

                            <livewire:cart.cart-address />

                        </div>

                        <div class="rounded mt-5 shadow-lg p-4">
                            <div>
                                <label class="form-label">نظرات </label>
                                <textarea name="comments" id="comments" rows="4" class="form-control"
                                    placeholder="یادداشت هایی در مورد سفارش شما :"></textarea>
                            </div>
                        </div>
                    </div>
                    <!--end col-->

                    <livewire:cart.discount :order='$order'>
                </div>
            </div>
            <!--end row-->
        </section>
    </div>
@endsection
