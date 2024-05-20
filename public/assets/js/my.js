$(document).ready( function() {

    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    var notyf = new Notyf();
    $('#loginAdminButton').click(function() {
        // Display success notification with Notyf

        var username  =  $("#admin_email").val();
        var password = $("#admin_password").val();

        

        $.ajax({
            url: '/ajax',
            type: 'POST',
            data: {
                action: 'adminlogin',
                email: username,
                password: password,
            },
            "headers": {
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
                        window.location.href = "/admin/dashboard";
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


        })
    });

    var ajaxURL = "/admin/"+$("#model").data('name')+"/process";
    var dataTable = $("#dataTable");
    var table = $("#model").data('name');
    var Datatable = dataTable.DataTable({
        "processing": true,
        "serverSide": true,
        "stateSave": true,
        "ajax": {
            "url": ajaxURL,
            "type": "POST",
            "headers": {
              'X-CSRF-TOKEN': csrfToken 
          },
            "data": function (d) {
                d.order = [{ column: d.order[0].column, dir: d.order[0].dir }];
                d.action = "list";
                d.table = table;
                d.filterdata = $("#dataTable").attr('data-filter');
            },
  
            "error": function(xhr, error) {
              console.log(xhr.responseText || error);
          }
        },
        "columns": null,
        "order": [[0, 'desc']],
  
        "initComplete": function (settings, json) {
            if (json.columns) {
                this.api().columns().header().to$().each(function (column, idx) {
                    $(column).text(json.columns[idx]);
                });
            }
        },
        responsive: true,
        dom: "Bflrtip",
        select: {
            style: "os",
            selector: "td:nth-child(2)",
        },
  
        buttons: [
            "selectAll",
            "selectNone",
            'csv', 'excel', 'pdf', 'print',
            {
                text: "Delete",
                className: "btn btn-danger waves-effect waves-light",
                action: function () {
                    var selectedRows = Datatable.rows({ selected: true }).data().toArray();
                    var ids = selectedRows.map(row => row[0]);
                    var count = Datatable.rows({ selected: true }).count();
                    if (count > 0) {
                        ActiontoStatus("deleteAll");
                    } else {
                        Swal.fire("Error", "You did not select any item on" + table, "warning");
                    }
                },
            },
        ],
  
        createdRow: function (row, data, dataIndex) {
            var selectedRows = Datatable.rows({ selected: true }).data().toArray();
            var ids = selectedRows.map(row => row[0]);
            var count = Datatable.rows({ selected: true }).count();
            if (count > 0) {
                $('td', row).css({'color': 'white', 'background-color': ''});
            } else {
                $('td', row).css({'color': 'black', 'background-color': ''});
  
            }
        },
  
    });



    $(document).on('submit', '#modaddform', function(e) {
        e.preventDefault();
    
        const formData = new FormData($(this)[0]);
        modRequest(ajaxURL, formData);
      });

      $(document).on('click', '#setDATE', function() {

        var start = $('#startdate').val();
        var end = $("#enddate").val();

        $.ajax({
            url: '/admin/dddd/process',
            method: 'post',
            data: {
                start: start,
                end: end,
                action: 'setting',
            },
            headers: {
              'X-CSRF-TOKEN': csrfToken 
          },
      
            success: function(data) {
              console.log(data);
              if(data.s == 1) {
                
                  Notifi(1, data.m);
                  setTimeout(() => {
                    location.reload();
                }, 2000);
              }   else {
                Notifi(0, data.m);
      
              }
            },
      
            error: function(xhr, error, status) {
              console.log(xhr.responseText || error);
            }
          });
      });









    function modRequest(url, Formdata) {
        $.ajax({
          url: url,
          method: 'post',
          data: Formdata,
          contentType: false, 
          processData: false,
          headers: {
            'X-CSRF-TOKEN': csrfToken 
        },
    
          success: function(data) {
            console.log(data);
            if(data.s == 1) {
              
                Notifi(1, data.m);
                Datatable.draw(false);
              
            }   else {
              Notifi(0, data.m);
    
            }
          },
    
          error: function(xhr, error, status) {
            console.log(xhr.responseText || error);
          }
        });
      }

      function Notifi(type, text, url = null, reload = null) {
        if(type == 1) {
            notyf.success({
                message: text,
                duration: 4000,
                position: {
                    x: 'right',
                    y: 'top',
                },
            });

            if(url) {
                setTimeout(() => {
                    window.location.href = url;
                }, 2000); 
            }

            if(reload) {
                location.reload();
            }
        } else {
            notyf.error({
                message: text,
                duration: 4000,
                position: {
                    x: 'right',
                    y: 'top',
                },
            });
        }


      }

});