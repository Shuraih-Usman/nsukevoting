
@php
    $datetime = DB::table('election_time')->first();
    $startingdate = $datetime->start;
    $endingdate = $datetime->end;
@endphp


<!DOCTYPE html>
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="/assets/" data-template="vertical-menu-template">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>


    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="#" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/" />
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;display=swap" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
    <!-- Icons -->
    <link rel="stylesheet" href="/assets/vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="/assets/vendor/fonts/fontawesome.css" />
    <link rel="stylesheet" href="/assets/vendor/fonts/flag-icons.css" />


    <!-- Core CSS -->
    <link rel="stylesheet" href="/assets/vendor/css/rtl/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="/assets/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="/assets/css/demo.css" />


    <!-- Vendors CSS -->
    <link rel="stylesheet" href="/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="/assets/vendor/libs/select2/select2.css" />
    <link rel="stylesheet" href="/assets/vendor/libs/bootstrap-select/bootstrap-select.css" />
    <link rel="stylesheet" href="/assets/vendor/libs/typeahead-js/typeahead.css" />
    <link rel="stylesheet" href="/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css">
    <link rel="stylesheet" href="/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css">

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="/assets/vendor/js/helpers.js"></script>



    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="/assets/js/config.js"></script>


</head>

<body>
    <style>
        /* Countdown Styles */
        .countdown {
            display: flex;
            justify-content: center;
            font-family: 'Trajax', sans-serif;
            font-size: 34px;
            font-weight: bold;
            color: #128C7E;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
        }

        .colon {
            margin: 0 10px;
            color: #C62828;
        }

        .countdown-text {
            font-family: 'Poppins', sans-serif;
            font-size: 15px;
            font-weight: 500;
            color: #128C7E;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
            margin-top: 10px;
        }
    </style>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme" style="background-color:#F5F7F8;">
                <div class="app-brand demo">
                    <a href="" class="app-brand-link">
                        <span class="app-brand-logo demo ">
                            <img src="/assets/img/logo.avif" alt="" width="98" height="30">
                        </span><span class=" mx-4 text-white" style="font-family:'Trajax'; font-weight:900; font-size:18px;">NSUKEVS</span>

                    </a>
                    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
                        <i class="bx menu-toggle-icon d-none d-xl-block fs-4 text-white align-middle"></i>
                        <i class="bx bx-x d-block d-xl-none bx-sm align-middle text-white"></i>
                    </a>
                </div>

                <div class="menu-divider mt-0"></div>

                <div class="menu-inner-shadow"></div>

                <ul class="menu-inner py-1">
                    <!-- Dashboards -->

                    <!-- Layouts -->
                    <li class="menu-item">
                        <a href="{{route('dashboard')}}" class="menu-link {{$active5}}">
                            <i class="menu-icon tf-icons bx bx-home-alt"></i>
                            <div class="mt-1" data-i18n="Dashboard">Dashboard</div>
                        </a>
                    </li>


                    <li class="menu-item">
                        <a href="{{route('demographic')}}" class="menu-link {{$active6}}">
                            <i class="menu-icon tf-icons bx bx-bar-chart-square"></i>
                            <div class="mt-1" data-i18n="Demographic">Demographic</div>
                        </a>
                    </li>

                    <li class="menu-item ">
                        <a href="{{route('candidate')}}" class="menu-link {{$active1}}">
                            <i class="menu-icon tf-icons bx bx-user"></i>
                            <div class="mt-1" data-i18n="Candidate">Candidate</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{route('elections')}}" class="menu-link {{$active2}}">
                            <i class="menu-icon tf-icons bx bxs-select-multiple"></i>
                            <div class="mt-1" data-i18n="Elections">Elections</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{route('students')}}" class="menu-link {{$active3}}">
                            <i class="menu-icon tf-icons bx bx-user-circle"></i>
                            <div class="mt-1" data-i18n="Students">Students</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{route('votes')}}" class="menu-link {{$active4}}">
                            <i class="menu-icon tf-icons bx bx-bar-chart"></i>
                            <div class="mt-1" data-i18n="Votes">Votes</div>
                        </a>
                    </li>






                </ul>
            </aside>
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->

                <nav class="layout-navbar navbar navbar-expand-xl align-items-center bg-navbar-theme" id="layout-navbar">
                    <div class="container-fluid">
                        <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                            <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                                <i class="bx bx-menu bx-sm"></i>
                            </a>
                        </div>

                        <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                            <!-- Search -->
                            <div class="navbar-nav align-items-center">
                                <div class="nav-item navbar-search-wrapper mb-0">
                                    <h5 class="mt-3">@yield('subtitle')</h5>

                                    </a>
                                </div>
                            </div>
                            <!-- /Search -->

                            <ul class="navbar-nav flex-row align-items-center ms-auto">



                                <!-- User -->
                                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                    <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                                        <div class="avatar avatar-online">

                                            <img src="/assets/img/userprofile.png" alt class="rounded-circle" />

                                        </div>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li>
                                            <a class="dropdown-item" href="#">
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 me-3">
                                                        <div class="avatar avatar-online">

                                                            <img src="/assets/img/userprofile.png" alt class="rounded-circle" />

                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <span class="fw-semibold d-block lh-1">{{ Auth::guard('admin')->user()->fullname }}</span>
                                                        <small>Admin</small>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <div class="dropdown-divider"></div>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="{{route('logout')}}">
                                                <i class="bx bx-power-off me-2"></i>
                                                <span class="align-middle">Log Out</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <!--/ User -->
                            </ul>
                        </div>

                        <!-- Search Small Screens -->
                        <div class="navbar-search-wrapper search-input-wrapper d-none">
                            <input type="text" class="form-control search-input container-fluid border-0" placeholder="Search..." aria-label="Search..." />
                            <i class="bx bx-x bx-sm search-toggler cursor-pointer"></i>
                        </div>
                    </div>
                </nav>

                <!-- / Navbar -->

@yield('content')



 <!-- Footer -->
 <footer class="content-footer footer bg-footer-theme">
    <div class="container-fluid d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
        <div class="mb-2 mb-md-0">
            ©
            <script>
                document.write(new Date().getFullYear());
            </script>
            , made with ❤️ by
            <a href="#" target="_blank" class="footer-link fw-semibold">My Life Solutions</a>
        </div>

    </div>
</footer>
<!-- / Footer -->

<div class="content-backdrop fade"></div>
</div>
<!-- Content wrapper -->
</div>
<!-- / Layout page -->
</div>

<!-- Overlay -->
<div class="layout-overlay layout-menu-toggle"></div>

<!-- Drag Target Area To SlideIn Menu On Small Screens -->
<div class="drag-target"></div>
</div>
<!-- / Layout wrapper -->

<!-- Core JS -->


<!-- build:js /assets/vendor/js/core.js -->
<script src="/assets/vendor/libs/jquery/jquery.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="/assets/vendor/libs/popper/popper.js"></script>
<script src="/assets/vendor/js/bootstrap.js"></script>
<script src="/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
<script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
<script src="/assets/vendor/libs/hammer/hammer.js"></script>

<script src="/assets/vendor/libs/i18n/i18n.js"></script>
<script src="/assets/vendor/libs/typeahead-js/typeahead.js"></script>

<script src="/assets/vendor/js/menu.js"></script>
<!-- endbuild -->
<!--- Custom Scripts -->
<script src="/assets/vendor/DataTables/datatables.min.js"></script>

<script async defer src="https://buttons.github.io/buttons.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>

<script>
    $(document).ready(function() {
        // Initialize Notyf
        var notyf = new Notyf();

        $('#addLocationButton').click(function() {
            var formData = $('#addLocationForm').serialize();

            $.ajax({
                type: 'POST',
                url: 'AddLocationNow',
                data: formData,
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        // Display success notification with Notyf
                        notyf.success({
                            message: 'Location added successfully: ' + response.message,
                            duration: 4000,
                            position: {
                                x: 'right',
                                y: 'top',
                            },
                        });
                        setTimeout(() => {
                            window.location.href = "Dashboard";
                        }, 3000);
                    } else {
                        // Display error notification with Notyf
                        notyf.error({
                            message: 'Failed to add location: ' + response.message,
                            position: {
                                x: 'right',
                                y: 'top'
                            }
                        });
                    }
                },
                error: function() {
                    // Display error notification with Notyf for AJAX failure
                    notyf.error('Something Went Wrong.');
                }
            });
        });
    });
</script>


<script>
    // Add an event listener to the password input
    document.getElementById('newpassword').addEventListener('input', function() {
        validatePassword();
    });

    // Add an event listener to the confirmation password input
    document.getElementById('conpassword').addEventListener('input', function() {
        validatePassword();
    });

    function validatePassword() {
        // Get the password value
        const password = document.getElementById('newpassword').value;

        // Get the confirmation password value
        const password2 = document.getElementById('conpassword').value;

        // Check password length
        const lengthRequirement = password.length >= 8;
        document.getElementById('length').innerHTML = getRequirementText('At least 8 characters', lengthRequirement);

        // Check for uppercase letter
        const uppercaseRequirement = /[A-Z]/.test(password);
        document.getElementById('uppercase').innerHTML = getRequirementText('At least one uppercase letter', uppercaseRequirement);

        // Check for lowercase letter
        const lowercaseRequirement = /[a-z]/.test(password);
        document.getElementById('lowercase').innerHTML = getRequirementText('At least one lowercase letter', lowercaseRequirement);

        // Check for number
        const numberRequirement = /\d/.test(password);
        document.getElementById('number').innerHTML = getRequirementText('At least one number', numberRequirement);

        // Check for special character
        const specialRequirement = /[!@#$%^&*(),.?":{}|<>]/.test(password);
        document.getElementById('special').innerHTML = getRequirementText('At least one special character', specialRequirement);

        // Check if the confirmation password matches
        const confirmRequirement = password === password2 && password2.length > 0;
        document.getElementById('confirmpassword').innerHTML = getRequirementText('Confirm Password Match', confirmRequirement);
    }

    function getRequirementText(text, conditionMet) {
        const icon = conditionMet ? '<i class="fas fa-check-circle" style="color: #128C7E;"></i>' : '<i class="fas fa-times-circle"></i>';
        return `${icon} ${text}`;
    }
    const passwordInput = document.getElementById('oldpassword');
    const togglePasswordButton = document.getElementById('togglePassword3');

    togglePasswordButton.addEventListener('click', function() {
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);

        // Change the eye icon based on the password visibility
        togglePasswordButton.classList.toggle('fa-eye', type === 'newpassword');
        togglePasswordButton.classList.toggle('fa-eye-slash', type === 'text');
    });

    const passwordInput2 = document.getElementById('newpassword');
    const togglePasswordButton2 = document.getElementById('togglePassword4');

    togglePasswordButton2.addEventListener('click', function() {
        const type = passwordInput2.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput2.setAttribute('type', type);

        // Change the eye icon based on the password visibility
        togglePasswordButton2.classList.toggle('fa-eye', type === 'password');
        togglePasswordButton2.classList.toggle('fa-eye-slash', type === 'text');
    });

    const passwordInput3 = document.getElementById('conpassword');
    const togglePasswordButton3 = document.getElementById('togglePassword5');

    togglePasswordButton3.addEventListener('click', function() {
        const type = passwordInput3.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput3.setAttribute('type', type);

        // Change the eye icon based on the password visibility
        togglePasswordButton3.classList.toggle('fa-eye', type === 'password');
        togglePasswordButton3.classList.toggle('fa-eye-slash', type === 'text');
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize Notyf
        var notyf = new Notyf();

        // Add a click event listener to the "Copy" button
        document.getElementById('copyButton').addEventListener('click', function() {
            // Get the RRR number
            var rrrNumber = document.getElementById('rrrNumber').innerText;

            // Trigger the Notyf success notification with the RRR number
            notyf.success({
                message: 'Copied RRR Number: ' + rrrNumber,
                duration: 3000,
                position: {
                    x: 'right',
                    y: 'top',
                },
            });
        });
    });
</script>

<!--- End Custom Scripts -->
<!-- Vendors JS -->
<script src="/assets/vendor/libs/select2/select2.js"></script>
<script src="/assets/vendor/libs/bootstrap-select/bootstrap-select.js"></script>
<script src="/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.js"></script>

<!-- Main JS -->
<script src="/assets/js/main.js"></script>

<!-- Row Group JS -->
<script src="/assets/vendor/libs/datatables-rowgroup-bs5/rowgroup.bootstrap5.js"></script>

<!-- Page JS -->
<script src="/assets/js/dashboards-analytics.js"></script>
<script src="/assets/js/my.js"></script>
<script src="/assets/js/forms-selects.js"></script>


<script>
    function updateCountdown() {
        var now = new Date();
        var targetDate = new Date('{{$endingdate}}');
        var timeRemaining = targetDate - now;

        var hours = Math.floor((timeRemaining % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((timeRemaining % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((timeRemaining % (1000 * 60)) / 1000);

        // Add leading zero for single-digit values
        hours = hours.toString().padStart(2, '0');
        minutes = minutes.toString().padStart(2, '0');
        seconds = seconds.toString().padStart(2, '0');

        document.getElementById("hours").textContent = hours;
        document.getElementById("minutes").textContent = minutes;
        document.getElementById("seconds").textContent = seconds;
    }

    setInterval(updateCountdown, 1000);
</script>
</body>
</html>