"use strict";
$(function () {
  var e = $(".selectpicker"),
    t = $(".select2"),
    i = $(".select2-icons");
  function l(e) {
    return e.id
      ? "<i class='bx bxl-" + $(e.element).data("icon") + " me-2'></i>" + e.text
      : e.text;
  }
  e.length && e.selectpicker(),
    t.length &&
      t.each(function () {
        var e = $(this);
        e.wrap('<div class="position-relative"></div>').select2({
          placeholder: "Select",
          dropdownParent: e.parent(),
        });
      }),
    i.length &&
      i.wrap('<div class="position-relative"></div>').select2({
        templateResult: l,
        templateSelection: l,
        escapeMarkup: function (e) {
          return e;
        },
      });
});
