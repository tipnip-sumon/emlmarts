@extends('frontend.layout')
@section('page_title','Reset Password')

@section('container')

<body>
    <!--End header-->
    <main class="main pages">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                    <span></span> Pages <span></span> Reset Password
                </div>
            </div>
        </div>
        <div class="page-content pt-150 pb-150">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-10 col-md-12 m-auto">
                        <div class="row">
                            <div class="col-lg-6 pr-30 d-none d-lg-block">
                                <img class="border-radius-15" src="{{asset('frontend/assets/imgs/page/login-1.png')}}" alt="" />
                            </div>
                            <div class="col-lg-6 col-md-8">
                                <div class="login_wrap widget-taber-content background-white">
                                    <div class="padding_eight_all bg-white" id="popup_login">
                                        <div class="heading_s1">
                                            <h1 class="mb-5">Reset Password</h1>
                                        </div>
                                        <form action="" id="frmResetPass">
                                            @csrf
                                            <input type="hidden" name="user_id" value="{{$user_id}}">
                                            <div class="form-group">
                                                <input type="password" required="" name="password" placeholder="Password" />
                                            </div>
                                            <div class="mb-4 atert alert-danger field_error" id="password_error"></div>
                                            <div class="form-group">
                                                <input type="password" required="" type="confirmation_password" name="confirmation_password" placeholder="Re-type password" />
                                            </div>
                                            <div class="mb-4 atert alert-danger field_error" id="confirmation_password_error"></div>
                                            <div class="mb-4 atert alert-success" id="reset_success_msg"></div>
                                            <div class="mb-4 atert alert-danger" id="reset_error_msg"></div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-heading btn-block hover-up" id="btnResetPass">Reset Password</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    @endsection

    @push('script')
    <script src="{{asset('frontend/assets/js/custom.js')}}"></script>
    @endpush