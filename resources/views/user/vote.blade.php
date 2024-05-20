@php
    function maskEmail($email) {
    list($username, $domain) = explode('@', $email);

    $maskLength = max(3, ceil(strlen($username) / 2));
    $visibleLength = strlen($username) - $maskLength;

    $maskedUsername = substr($username, 0, $visibleLength) . str_repeat('*', $maskLength);

    return $maskedUsername . '@' . $domain;
}
@endphp



<!DOCTYPE html>
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="/assets/" data-template="vertical-menu-template">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"/>
    <title> Voting Page | NSUK E-VOTING </title>

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
    <link rel="stylesheet" href="/assets/vendor/fonts/boxicons.css"/>
    <link rel="stylesheet" href="/assets/vendor/fonts/fontawesome.css"/>
    <link rel="stylesheet" href="/assets/vendor/fonts/flag-icons.css"/>

    <!-- Core CSS -->
    <link rel="stylesheet" href="/assets/vendor/css/rtl/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="/assets/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="/assets/css/demo.css" />
    <link rel="stylesheet" href="/assets/css/AddedStyle.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="/assets/vendor/libs/bootstrap-select/bootstrap-select.css" />


    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="/assets/vendor/js/helpers.js"></script>

    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="/assets/js/config.js"></script>
    <style>
        .selected .custom-option-content {
            margin-left: 20px;
            transition: margin-left 0.3s ease;
        }

        .selected .selected-pulse {
            display: block;
            width: 10px;
            height: 10px;
            background-color: #4CAF50;
            border-radius: 50%;
            animation: pulse 1.5s infinite;
        }

        @keyframes pulse {
            0% {
                box-shadow: 0 0 0 0 rgba(76, 175, 80, 0.7);
            }

            70% {
                box-shadow: 0 0 0 10px rgba(76, 175, 80, 0);
            }

            100% {
                box-shadow: 0 0 0 0 rgba(76, 175, 80, 0);
            }
        }

        .form-check.custom-option {
            padding: 1rem;
        }

        .modal-backdrop.show {
            opacity: 0.9;
            backdrop-filter: blur(100px);
        }



        .otp-input-container {
            display: flex;
            justify-content: center;
            gap: 10px;
        }

        .otp-input {
            width: 45px;
            height: 50px;
            text-align: center;
            font-size: 18px;
            border: 1px solid #128C7E;
            border-radius: 4px;
        }

        /* Success Modal Styles */
        .choice-card {
            background-color: #f8f9fa;
            border-radius: 8px;
            padding: 16px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            margin-bottom: 16px;
        }

        .choice-card:last-child {
            margin-bottom: 0;
        }

        .choice-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .choice-card .circle-icon {
            width: 48px;
            height: 48px;
            background-color: #07A081;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
            font-size: 24px;
            margin-right: 16px;
        }

        .choice-card .choice-details {
            text-align: left;
            display: flex;
            flex-direction: column;
        }

        .choice-card .choice-details h6 {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 4px;
        }

        .choice-card .choice-details p {
            margin-bottom: 0;
            color: #6c757d;
        }

        .choice-card hr {
            border-top: 1px dashed #dee2e6;
            margin: 16px 0;
        }
    </style>

</head>

<body style="background-color:#F0F4F9 !important;">
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row mb-3">
                <h5 class="card-header mb-3">Candidate List</h5>
                <form id="voteForm" class="row">
                    @csrf
                    @foreach ($candidate as $candate)
                        <input type="hidden" class="election_count" name="election_id" value="{{ $candate->id }}">
                        <div class="col-md-6 col-sm-6 mb-4">
                            <h6>{{ $candate->name }}</h6>
                            <div class="row">
                                @foreach ($candate->candidates as $item)
                                    <div class="col-md-12 mb-md-0 mb-2">
                                        <div class="form-check custom-option bg-white mt-1 border-0 shadow-md custom-option-basic">
                                            <input name="election_{{ $candate->id }}" class="form-check-input d-none" type="radio" value="{{ $item->id }}" id="radio-{{ $item->id }}" data-id="{{ $item->id }}" />
                                            <label class="form-check-label custom-option-content" for="radio-{{ $item->id }}">
                                                <div class="d-flex align-items-center position-relative">
                                                    <img src="/images/candidates/{{ $item->image }}" alt="" class="profile-picture me-3 rounded" width="50">
                                                    <div>
                                                        <span class="custom-option-header">
                                                            <span class="h6 mb-0">{{ $item->fullname }}</span>
                                                        </span>
                                                        <span class="custom-option-body">
                                                            <span>{{ $item->level }} Level</span>
                                                        </span>
                                                    </div>
                                                    <div class="vertical-line"></div>
                                                    <div class="ms-3">
                                                        <small>
                                                            <b>{{ $candate->name }}</b>
                                                        </small><br>
                                                        <small><b>TEAM ALIAS:</b> {{ $item->nickname }}</small>
                                                    </div>
                                                    <div class="selected-pulse position-absolute top-50 end-0 translate-middle-y me-3"></div>
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                    <button type="button" id="voteButton" class="btn btn-primary">Vote</button>
                </form>
            </div>
            

            
            

             


            </div>
        </div>
    </div>
    </div>
    <!-- / Content -->

    <div class="content-backdrop fade"></div>
    </div>
    <!-- Content wrapper -->

    <!-- OTEP Modal -->
    <div class="modal fade" id="otepModal" tabindex="-1" aria-labelledby="otepModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <h5 class="modal-title" id="otepModalLabel">Dear {{ Auth::user()->fullname }}</h5>
                    <p>Your <b>One Time Election Password (OTEP)</b> has been sent to your Email {{maskEmail(Auth::user()->email)}} </p>
                    <div class="d-flex justify-content-center">
                        <div class="otp-input-container">
                            <input type="text" name="f1" id="f1" class="otp-input" maxlength="1">
                            <input type="text" name="f2" id="f2" class="otp-input" maxlength="1">
                            <input type="text" name="f3" id="f3" class="otp-input" maxlength="1">
                            <input type="text" name="f4" id="f4" class="otp-input" maxlength="1">
                            <input type="text" name="f5" id="f5" class="otp-input" maxlength="1">
                            <input type="text" name="f6" id="f6" class="otp-input" maxlength="1">
                        </div>
                    </div>
                    <div class="mt-2 mb-2">
                        <p id="" style="color:red;"> <div id="otperror"></div></p>
                        <a href="#" id="resendOtepLink">Resend OTEP</a>
                    </div>
                    <div class="mt-3">
                        <button class="btn btn-secondary bg-opacity-75 me-2" id="cancelButton">Cancel</button>
                        <button class="btn btn-success" id="confirmButton">Confirm</button>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <!-- Success Modal -->

    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <h5 class="modal-title" id="successModalLabel">Your Choices</h5>
                    <div id="choicesList" class="mt-4"></div>
                    <div class="mt-4">
                        <button class="btn btn-success btn-lg" id="okButton">Cast vote</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="/assets/vendor/libs/popper/popper.js"></script>
    <script src="/assets/vendor/js/bootstrap.js"></script>
    <script src="/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>
    <script src="/assets/js/user.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>

    <!-- Page JS -->

    <script>
        $(document).ready(function() {
            $('input[name^="senator"]').click(function() {
                var radioGroup = $(this).attr('name');
                $('input[name="' + radioGroup + '"]').closest('.custom-option').removeClass('selected');
                $(this).closest('.custom-option').addClass('selected');
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('input[name="presidentRadio"], input[name="secretaryRadio"]').click(function() {
                var radioGroup = $(this).attr('name');
                $('input[name="' + radioGroup + '"]').closest('.custom-option').removeClass('selected');
                $(this).closest('.custom-option').addClass('selected');
            });
        });
    </script>



<script>
    $(document).ready(function() {

        var notyf = new Notyf();

        $('#voteButton').click(function(e) {
            e.preventDefault();

            
            var elections = {};
            $('#voteForm').find('input[type="radio"]:checked').each(function() {
                var electionId = $(this).attr('name').split('_')[1];
                var candidateId = $(this).val();
                elections[electionId] = candidateId;
            });
            

            
                
                     $('#otepModal').modal('show');

                     $.ajax({
                        url: '/otep',
                        type: 'POST',
                        data: {
                            action: 'sendotep',
                            _token: "{{ csrf_token() }}",
                        },
                        
                        success: (data) => {
                            console.log(data);
                        },
                        error: (xhr) => {
                            console.error(xhr.responseText);
                        }
                     });

                        // Handle confirm button click
                    $('#confirmButton').click(function() {

                        var otep = $("#f1").val() + $("#f2").val() + $("#f3").val() + $("#f4").val() + $("#f5").val() + $("#f6").val();
                        var otperror = $("#otperror");
                        $.ajax({
                        url: '/otep',
                        type: 'POST',
                        data: {
                            action: 'validateotep',
                            otep: otep,
                            _token: "{{ csrf_token() }}",
                        },
                        
                        success: (data) => {
                            if(data.s == 1) {
                                otperror.html(data.m);
                             // Close the modal
                             $('#otepModal').modal('hide');

                             $.ajax({
                                url: '/otep',
                                type: 'POST',
                                data: {
                                    action: 'choice',
                                    _token: '{{csrf_token()}}',
                                    data: elections,
                                },

                                success: (data) => {
                                    console.log(data);

                                var choicesList = $('#choicesList');
                                choicesList.empty();

                                for (const key in data) {
                                    if (data.hasOwnProperty(key)) {
                                        const position = data[key].position;
                                        const candidate = data[key].candidate;
                                        addChoiceToList(choicesList, candidate.fullname, candidate.level, candidate.nickname, position.name)

                                    }
                                }

                                $('#successModal').modal('show');

                                var count_election = $("#election_count").length;

                                $('#okButton').click(function() {
                                    // Make the vote
                                               $.ajax({
                url: "/votenow",
                method: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    elections: elections,
                    count: count_election,
                },
                success: function(response) {
                    if(response.s == 1) {
                         notyf.success({
                            message: response.m,
                            duration: 4000,
                            position: {
                                x: 'right',
                                y: 'top',
                            },
                        });
                        setTimeout(() => {
                            window.location.href = "/logout";
                        }, 3000);
                    } else {
                        notyf.error({
                            message: response.m,
                            duration: 4000,
                            position: {
                                x: 'right',
                                y: 'top',
                            },
                        });
                    }
                },
                error: function(xhr) {
                    alert('There was an error submitting your vote.');
                    // Optionally, handle errors here

                    console.error(xhr.responseText)
                }
            });


                                });

                                },

                                error: (xhr) => {
                                    console.error(xhr.responseText);
                                }

                             });



                            } else {
                                otperror.html(data.m);
                            }
                        },
                        error: (xhr) => {
                            console.error(xhr.responseText);
                        }
                     });


                    });





                    $("#resendOtepLink").click(function() {
                        $.ajax({
                        url: '/otep',
                        type: 'POST',
                        data: {
                            action: 'sendotep',
                            _token: "{{ csrf_token() }}",
                        },
                        
                        success: (data) => {
                            console.log(data);
                        },
                        error: (xhr) => {
                            console.error(xhr.responseText);
                        }
                     });
                    });










        });


                    // Function to add a choice to the list
            function addChoiceToList(choicesList, name, level, team, position) {
                // var name = names.find('.custom-option-header .h6').text();
                // var level = teams.find('.custom-option-body span').text();
                // var teamAlias = teams.find('.ms-3 small:last-child').text().replace('TEAM ALIAS:', '').trim();

                var choiceHtml = '<div class="choice-card d-flex align-items-center">';
                choiceHtml += '<div class="circle-icon"><i class="bx bx-check bx-sm"></i></div>';
                choiceHtml += '<div class="choice-details">';
                choiceHtml += '<h6>' + name + '</h6>';
                choiceHtml += '<p>' + position + ' (' + level + ')<br>' + team + '</p>';
                choiceHtml += '</div>';
                choiceHtml += '</div>';

                choicesList.append(choiceHtml);
            }
    });
</script>


<script>
    $(document).ready(function() {
        $('input[type="radio"]').click(function() {
            var radioGroup = $(this).attr('name');
            $('input[name="' + radioGroup + '"]').closest('.custom-option').removeClass('selected');
            $(this).closest('.custom-option').addClass('selected');
        });
    });
</script>

    <script>
        $(document).ready(function() {
            // Show the modal when the "Proceed" button is clicked
            $('button.btn-success').click(function() {
                $('#otepModal').modal('show');
            });

            // Handle OTP input functionality
            $('.otp-input').on('input', function() {
                if (this.value.length === 1) {
                    $(this).next('.otp-input').focus();
                }
            });

            $('.otp-input').on('keydown', function(e) {
                if (e.key === 'Backspace' && this.value.length === 0) {
                    $(this).prev('.otp-input').focus();
                }
            });

            // Handle cancel button click
            $('#cancelButton').click(function() {
                $('#otepModal').modal('hide');
            });











        });
    </script>
</body>

</html>