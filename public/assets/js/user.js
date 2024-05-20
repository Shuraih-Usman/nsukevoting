//SHURAIH USMAN CODE - https://github.com/Shuraih-Usman/
$(document).ready(function() {

    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    var notyf = new Notyf();

    $('#loginAdminButton').click(function() {
        // Display success notification with Notyf

        var username  =  $("#user_matric").val();
        var password = $("#user_dob").val();

        

        $.ajax({
            url: '/ajax',
            type: 'POST',
            data: {
                action: 'studentlogin',
                matric_number: username,
                date_of_birth: password,
            },
            headers: {
                'X-CSRF-TOKEN': csrfToken 
            },

            success: (data) => {
                console.log(data);
                if(data.s == 1) {
                    notyf.success({
                        message: data.m,
                        duration: 4000,
                        position: {
                            x: 'right',
                            y: 'top',
                        },
                    });
                    setTimeout(() => {
                        window.location.href = "/vote";
                    }, 2000);
                } else {
                    notyf.error({
                        message: data.m,
                        duration: 4000,
                        position: {
                            x: 'right',
                            y: 'top',
                        },
                    });

                    
                }
            },

            error: (xhr) => {
                console.error(xhr.responseText);
            }


        });
    });
});