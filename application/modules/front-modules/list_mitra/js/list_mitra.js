var url_controller = baseUrl + "/" + prefix_folder + "/" + _controller + "/";
var testimoni = new Splide("#list-carousel", {
  grid: {
    rows: 2,
    cols: 3,
    gap: {
      row: "1rem",
      col: "1.5rem",
    },
  },
  breakpoints: {
    767: {
      grid: {
        rows: 2,
        cols: 1,
        gap: {
          row: "1rem",
          col: "1.5rem",
        },
      },
    },
  },
});
testimoni.mount(window.splide.Extensions);

$(".mybutton").click(function (e) {
  e.preventDefault();

  city = $("#city").val();
  apotek = $("#apotek").val();

  if (city == "" && apotek == "") {
    Swal.fire({
      icon: "error",
      title: "Kesalahan",
      text: "Masukkan Kota / Area terlebih dahulu",
      showConfirmButton: false,
      timer: 1500,
    });
  } else {
    Swal.showLoading()
    $.ajax({
      url: url_controller + "mitra",
      type: "POST",
      dataType: "JSON",
      data: { city: city, apotek: apotek },
      success: function (data) {
        if (data.status) {
          $("#not_found").html("");
          $("#list_mitra").html(data.html_mitra);
          testimoni.destroy();
          testimoni.mount(window.splide.Extensions);
          Swal.fire({
            icon: "success",
            title: "Sukses Load data",
            showConfirmButton: false,
            timer: 1500,
          });
        } else {
          $("#not_found").html(data.html_mitra);
          $("#list_mitra").html("");
          testimoni.destroy();
          Swal.fire({
            icon: "error",
            title: "Data Not Found",
            showConfirmButton: false,
            timer: 1500,
          });
        }
      },
      error: function (jqXHR, textStatus, errorThrown) {
        notif_error(textStatus);
      },
    });
  }
});
