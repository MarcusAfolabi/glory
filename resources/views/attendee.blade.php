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
                    <div class="order-1 mb-5 col-xl-12 ps-xl-5 order-lg-2 mb-lg-0">
                        <div class="aai-form-wrapper">
                            <div>
                                <div
                                    class="text-center aai-form-header d-flex justify-content-center flex-column align-items-center">
                                    <h2 class="aai-form-title">Attendance Lists</h2>
                                    <p class="aai-form-desc">RCCG Glory 2 Glory member attendance database</p>
                                </div>
                                <div
                                    class="d-flex flex-column flex-md-row aai-option-bar justify-content-center align-items-center">
                                    <span class="aai-auth-line"></span>
                                </div>
                            </div>
                            @livewire('attendee')
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
