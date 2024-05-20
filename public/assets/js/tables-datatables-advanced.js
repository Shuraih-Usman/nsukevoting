$(function () {
  var e = $(".dt-responsive");

  // Create DataTable for e
  if (e.length) {
    e.DataTable({
      orderCellsTop: true,
      destroy: true,
      dom: '<"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-end"f>>t<"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
      responsive: true, // Enable responsiveness
    });
  }

  // Remove "form-control-sm" and "form-select-sm" classes after 200ms
  setTimeout(() => {
    $(".dataTables_filter .form-control").removeClass("form-control-sm");
    $(".dataTables_length .form-select").removeClass("form-select-sm");
  }, 200);
});
