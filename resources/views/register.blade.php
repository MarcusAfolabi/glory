@extends('layouts.app')
@section('content')
    <main class="wrapper">
        <section class="aai-signup-in"
            style="
          background: url('assets/img/bg/sign-in-up.jpg') no-repeat center
            center/cover;
        ">
            <div class="container">
                <div class="row align-items-center">
                    <div class="order-2 col-xl-5 col-lg-4 d-none d-xl-block order-lg-1">
                        <div class="position-relative">
                            <img src="assets/img/others/ai-ills.svg" class="img-fluid aai-signup-in-img" alt />
                        </div>
                    </div>
                    <div class="order-1 mb-5 col-xl-7 ps-xl-5 order-lg-2 mb-lg-0">
                        <div class="aai-form-wrapper">
                            <div
                                class="text-center aai-form-header d-flex justify-content-center flex-column align-items-center">
                                <h2 class="aai-form-title">Protocol/Admin Account</h2>
                            </div>

                            <div
                                class="d-flex flex-column flex-md-row aai-option-bar justify-content-center align-items-center">

                                <span class="aai-auth-line"></span>
                            </div>
                            @livewire('register')
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
