<!DOCTYPE html>
@php
    $datetime = DB::table('election_time')->first();
    $startingdate = $datetime->start;
    $endingdate = $datetime->end;
@endphp
<!-- beautify ignore:start -->
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="/assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> @yield('title') </title>
 
    <!-- Favicon -->
    <link
      rel="icon"
      type="image/x-icon"
      href="#"
    />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/" />
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;display=swap"
      rel="stylesheet"
    />
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Icons -->
    <link rel="stylesheet" href="/assets/vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="/assets/vendor/fonts/fontawesome.css" />
    <link rel="stylesheet" href="/assets/vendor/fonts/flag-icons.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
    <!-- Core CSS -->
    <link
      rel="stylesheet"
      href="/assets/vendor/css/rtl/core.css"
      class="template-customizer-core-css"
    />
    <link
      rel="stylesheet"
      href="/assets/vendor/css/rtl/theme-default.css"
      class="template-customizer-theme-css"
    />
    <link rel="stylesheet" href="/assets/css/demo.css" />

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Vendors CSS -->
    <link
      rel="stylesheet"
      href="/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css"
    />
    <link rel="stylesheet" href="/assets/css/AddedStyle.css"/>
  
    <!-- Vendor -->
    <link
      rel="stylesheet" href="/assets/vendor/libs/formvalidation/dist/css/formValidation.min.css"
    />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="/assets/vendor/css/pages/page-auth.css" />
    <!-- Helpers -->
    <script src="/assets/vendor/js/helpers.js"></script>


    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="/assets/js/config.js"></script>

    <!-- beautify ignore:end -->
</head>


@yield('content')


<!-- Core JS -->
<!-- build:js /assets/vendor/js/core.js -->
<script src="/assets/vendor/libs/jquery/jquery.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="/assets/vendor/libs/popper/popper.js"></script>
<script src="/assets/vendor/js/bootstrap.js"></script>
<script src="/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
<script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>


<script src="/assets/vendor/js/menu.js"></script>
<!-- endbuild -->

<!-- Vendors JS -->
<script src="/assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js"></script>
<script src="/assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js"></script>
<script src="/assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js"></script>

<!-- Main JS -->
<script src="/assets/js/main.js"></script>
<script src="/assets/js/user.js"></script>

<!-- Page JS -->
<script src="/assets/js/pages-auth.js"></script>


<script>
    $(document).ready(function() {
        // Initialize Notyf
        var notyf = new Notyf();


        


        const passwordInput = document.getElementById('admin_password');
        const togglePasswordButton = document.getElementById('togglePassword');

        togglePasswordButton.addEventListener('click', function() {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);

            // Change the eye icon based on the password visibility
            togglePasswordButton.classList.toggle('fa-eye', type === 'password');
            togglePasswordButton.classList.toggle('fa-eye-slash', type === 'text');
        });



    });

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