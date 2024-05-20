@extends('admin.app')
@section('title')
Administrator Login | NSUK e-Voting System    
@endsection

@section('content')
<body>
    <style>
        body {
            font-family: 'Poppins', sans-serif !important;
            font-weight: 400 !important;
        }
    </style>
    <!-- Content -->
    <div class="authentication-wrapper authentication-cover">
        <div class="authentication-inner row m-0">
            <!-- /Left Text -->
            <div class="d-none d-lg-flex col-md-8 col-lg-6 col-xl-6 align-items-center position-relative" style="background-image: url(/assets/img/backgrounds/person_vote.jpg); background-size: cover; z-index:-40;">
                <div class="position-absolute top-0 start-0 end-0 bottom-0 " style="background-color: rgba(0, 0, 0, 0.7); z-index:-20;">
                    <div class="p-5" style="margin-top:110px;">
                        <center>
                            <img src="/assets/img/logo.avif" height="130" width="130" alt="" class="mt-0 text-center my-3">
                            <h2 style="font-family:'Trajax'; line-height:35px; text-transform:uppercase; font-weight:800; color:#fff;">Welcome to NSUK e-Voting System, A Platform where your vote count...</h2>
                        </center>
                    </div>
                </div>
                <div class="position-absolute top-0 start-0 end-0 bottom-0 "></div>
                <div class="flex-row text-center mx-auto">
                </div>
            </div>

            <!-- /Left Text -->

            <!-- Login -->
            <div class="d-flex col-12 col-lg-6 col-md-6 col-xl-6 align-items-center authentication-bg p-sm-5 p-4" style="background-color:#F5F7F8 !important;">
                <div class="w-px-400 mx-auto">
                    <!-- Logo -->
                    <center>
                        <div class="app-brand mb-3 d-flex justify-content-center">
                            <a href="#" class="app-brand-link gap-2">
                                <span class="app-brand-logo ">

                                    <img src="/assets/img/logo.avif" height="80" width="80" alt="" class="mt-0 text-center">

                                </span>
                            </a>

                        </div>
                    </center>


                    <!-- /Logo -->
                    <form id="LoginForm" class="mb-3" action="" method="POST">
                        @csrf
                        <h5 class="mt-2  text-center" style="color:#128C7E; font-family: 'Trajax', sans-serif; font-weight:700;">Welcome Back, Administrator</h5>
                        <center>
                            <span class="text-center mt-0" style="color:#128C7E; font-family: 'Poppins', sans-serif; font-weight:500;">Enter Your Email and your Password</span>
                        </center>
                        <div class="mb-3 mt-2">

                            <div class="input-group mb-3">
                                <span class="input-group-text border-0 ">
                                    <i class="fas fa-user"></i>
                                </span>
                                <input type="text" id="admin_email" name="email" required class="form-control py-3 border-0 " placeholder="Enter Your Email" autofocus />
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="input-group mb-3">
                                <span class="input-group-text border-0">
                                    <i class="fa-solid fa-key"></i>
                                </span>
                                <input type="password" name="password" id="admin_password" required class="form-control py-3 border-0 " placeholder="Ex: Abraham12@" autofocus />

                                
                                <span class="input-group-text border-0 ">
                                    <i class="fa-solid fa-eye" id="togglePassword"></i>
                                </span>
                            </div>

                        </div>


                        <button class="btn btn-primary d-grid w-100 py-3" type="button" id="loginAdminButton" style="background: linear-gradient(175.31deg,#128C7E -8.91%,#128C7E 99.52%) #cc8b0e; color: #fff; border: none; min-width: 150px;">Login</button>


                    </form>
                </div>
            </div>
            <!-- /Login -->
        </div>
    </div>


@endsection