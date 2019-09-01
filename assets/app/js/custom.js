$(document).ready(function() {
  $("#resume").change(function(e) {
    var fileExtension = ["pdf", "doc", "docx"];
    if (
      $.inArray(
        $(this)
          .val()
          .split(".")
          .pop()
          .toLowerCase(),
        fileExtension
      ) == -1
    ) {
      alert(
        "Hanya format file berikut yang dapat diterima : " +
          fileExtension.join(", ")
      );
    } else {
      var namafile = e.target.files[0].name;
      var ukurfile = e.target.files[0].size;
      if (ukurfile <= 10 * Math.pow(2, 20)) {
        $("#filename").html(namafile);
      } else {
        alert(
          "Ukuran file tersebut terlalu besar. Batas maksimum ukuran file adalah 10 MB"
        );
      }
    }
  });

  $("#bukti").change(function(e) {
    var fileExtension = ["jpg", "jpeg", "png"];
    if (
      $.inArray(
        $(this)
          .val()
          .split(".")
          .pop()
          .toLowerCase(),
        fileExtension
      ) == -1
    ) {
      alert(
        "Hanya format file berikut yang dapat diterima : " +
          fileExtension.join(", ")
      );
    } else {
      var namafile = e.target.files[0].name;
      var ukurfile = e.target.files[0].size;
      if (ukurfile <= 10 * Math.pow(2, 20)) {
        $("#filename").html(namafile);
      } else {
        alert(
          "Ukuran file tersebut terlalu besar. Batas maksimum ukuran file adalah 10 MB"
        );
      }
    }
  });

  $("#resume").change(function(e) {
    var fileExtension = ["pdf", "doc", "docx"];
    if (
      $.inArray(
        $(this)
          .val()
          .split(".")
          .pop()
          .toLowerCase(),
        fileExtension
      ) == -1
    ) {
      alert(
        "Hanya format file berikut yang dapat diterima : " +
          fileExtension.join(", ")
      );
    } else {
      var namafile = e.target.files[0].name;
      var ukurfile = e.target.files[0].size;
      if (ukurfile <= 10 * Math.pow(2, 20)) {
        $("#filename").html(namafile);
      } else {
        alert(
          "Ukuran file tersebut terlalu besar. Batas maksimum ukuran file adalah 1 MB"
        );
      }
    }
  });
  // var x;
  var i;
  $(document).on(
    "change",
    "#identitas1, #identitas2, #identitas3, #identitas4",
    function(e) {
      var fileExtension = ["pdf", "doc", "docx"];
      if (
        $.inArray(
          $(this)
            .val()
            .split(".")
            .pop()
            .toLowerCase(),
          fileExtension
        ) == -1
      ) {
        alert(
          "Hanya format file berikut yang dapat diterima : " +
            fileExtension.join(", ")
        );
      } else {
        var namafile = e.target.files[0].name;
        var ukurfile = e.target.files[0].size;
        i = this.id.slice(9);
        console.log(i);
        if (ukurfile <= 10 * Math.pow(2, 20)) {
          $("#filename" + i).html(namafile);
        } else {
          alert(
            "Ukuran file tersebut terlalu besar. Batas maksimum ukuran file adalah 1 MB"
          );
        }
      }
    }
  );

  // }

  $("#bukti").change(function(e) {
    var fileExtension = ["jpg", "jpeg", "png"];
    if (
      $.inArray(
        $(this)
          .val()
          .split(".")
          .pop()
          .toLowerCase(),
        fileExtension
      ) == -1
    ) {
      alert(
        "Hanya format file berikut yang dapat diterima : " +
          fileExtension.join(", ")
      );
    } else {
      var namafile = e.target.files[0].name;
      var ukurfile = e.target.files[0].size;
      if (ukurfile <= 10 * Math.pow(2, 20)) {
        $("#filename").html(namafile);
      } else {
        alert(
          "Ukuran file tersebut terlalu besar. Batas maksimum ukuran file adalah 10 MB"
        );
      }
    }
  });

  $("#perlombaan").change(function(e) {
    var fileExtension = ["zip", "rar"];
    if (
      $.inArray(
        $(this)
          .val()
          .split(".")
          .pop()
          .toLowerCase(),
        fileExtension
      ) == -1
    ) {
      alert(
        "Hanya format file berikut yang dapat diterima : " +
          fileExtension.join(", ")
      );
    } else {
      var namafile = e.target.files[0].name;
      var ukurfile = e.target.files[0].size;
      if (ukurfile <= 50 * Math.pow(2, 20)) {
        $("#filename1").html(namafile);
      } else {
        alert(
          "Ukuran file tersebut terlalu besar. Batas maksimum ukuran file adalah 50 MB"
        );
      }
    }
  });

  $("#surat").change(function(e) {
    var fileExtension = ["pdf"];
    if (
      $.inArray(
        $(this)
          .val()
          .split(".")
          .pop()
          .toLowerCase(),
        fileExtension
      ) == -1
    ) {
      alert(
        "Hanya format file berikut yang dapat diterima : " +
          fileExtension.join(", ")
      );
    } else {
      var namafile = e.target.files[0].name;
      var ukurfile = e.target.files[0].size;
      if (ukurfile <= 10 * Math.pow(2, 20)) {
        $("#filename2").html(namafile);
      } else {
        alert(
          "Ukuran file tersebut terlalu besar. Batas maksimum ukuran file adalah 10 MB"
        );
      }
    }
  });
});

function tryLogin(home) {
  var e = $("#u").val();
  var p = $("#p").val();

  swal({
    text: "Lanjutkan Login ?",
    buttons: {
      //here is the magic
      confirm: {
        text: "Oke",
        className: "sweet-warning",
        closeModal: false
      }
      // cancel: "Belum"
    }
  }).then(confirmed => {
    if (confirmed) {
      var update = $.ajax({
        url: home + "login/loginprocess",
        type: "POST",
        data: "e=" + e + "&p=" + p,
        error: function(xhr, ajaxOptions, thrownError) {
          console.log(xhr.status);
          console.log(xhr.responseText);
          console.log(thrownError);
        },
        success: function(data) {}
      });

      update.done(function(json) {
        var data = JSON.parse(json);

        if (data.success == false) {
          swal.stopLoading();
          swal.close();
          swal("Gagal", data.msg, "danger").then(ok => {});
        } else if (data.success == true) {
          swal.stopLoading();
          swal.close();
          swal("Login sukses", {
            buttons: false,
            timer: 600
          });
          setTimeout(function() {
            window.location.replace(home + "login");
          }, 600);
        } else {
        }
      });
    }
  });
}

function showWhatsApp() {
  $("#whatsapp").addClass("is-active");
}

function hideWhatsApp() {
  $("#whatsapp").removeClass("is-active");
}

function tryRegister(home) {
  var n = $("#n").val();
  var e = $("#u").val();
  var p = $("#p").val();
  var p2 = $("#p2").val();

  swal({
    text: "Lanjutkan Mendaftar ?",
    buttons: {
      //here is the magic
      confirm: {
        text: "Oke",
        className: "sweet-warning",
        closeModal: false
      }
      // cancel: "Belum"
    }
  }).then(confirmed => {
    if (confirmed) {
      var update = $.ajax({
        url: home + "register/registerprocess",
        type: "POST",
        data: "n=" + n + "&e=" + e + "&p=" + p + "&p2=" + p2,
        error: function(xhr, ajaxOptions, thrownError) {
          console.log(xhr.status);
          console.log(xhr.responseText);
          console.log(thrownError);
        },
        success: function(data) {}
      });

      update.done(function(json) {
        var data = JSON.parse(json);

        if (data.success == "Internal Server Error") {
          swal.stopLoading();
          swal.close();
          swal("gagal", "Email anda udah terdaftar", "danger").then(ok => {
            //do anything
          });
        } else if (data.success == true) {
          swal.stopLoading();
          swal.close();
          swal(
            "Berhasil",
            "Anda sudah terdaftar silahkan cek email untuk aktivasi akun",
            "success"
          ).then(ok => {
            window.location.replace(home + "login");
          });
        } else if (data.success == false) {
          swal.stopLoading();
          swal.close();
          swal("Gagal", "Anda gagal mendaftar", "danger").then(ok => {
            //do anything
          });
        }
      });
    }
  });
}

function trySelect(home, id, koors) {
  $.ajax({
    url: home + "user/pilihlomba",
    type: "POST",
    data: "lomba=" + id + "&id_koor=" + koors,
    error: function(xhr, ajaxOptions, thrownError) {
      console.log(xhr.status);
      console.log(xhr.responseText);
      console.log(thrownError);
    },
    success: function(data) {
      //alert(data);
      $("#warnings").html(data);
    }
  });
}

function submission(home) {
  $("#progress").html("Proses unggah data: <progress></progress><br>");
  $("#simpan").addClass("is-loading");
  $.ajax({
    url: home + "user/submission",
    type: "POST",
    data: new FormData($("form")[0]),
    cache: false,
    contentType: false,
    processData: false,

    // Custom XMLHttpRequest
    xhr: function() {
      var myXhr = $.ajaxSettings.xhr();
      if (myXhr.upload) {
        // For handling the progress of the upload
        myXhr.upload.addEventListener(
          "progress",
          function(e) {
            if (e.lengthComputable) {
              $("progress").attr({
                value: e.loaded,
                max: e.total
              });
            }
          },
          false
        );
      }
      return myXhr;
    },
    error: function(xhr, ajaxOptions, thrownError) {
      console.log(xhr.status);
      console.log(xhr.responseText);
      console.log(thrownError);
    },
    success: function(data) {
      //alert(data);
      $("#warnings").html(data);
    },
    complete: function(data) {
      $("#progress").html("");
      $("#simpan").removeClass("is-loading");
    }
  });
}

function trySaveBayar(home) {
  $("#progress").html("Proses unggah data: <progress></progress><br>");
  $("#simpan").addClass("is-loading");
  $.ajax({
    url: home + "user/bayar",
    type: "POST",
    data: new FormData($("form")[0]),
    cache: false,
    contentType: false,
    processData: false,

    // Custom XMLHttpRequest
    xhr: function() {
      var myXhr = $.ajaxSettings.xhr();
      if (myXhr.upload) {
        // For handling the progress of the upload
        myXhr.upload.addEventListener(
          "progress",
          function(e) {
            if (e.lengthComputable) {
              $("progress").attr({
                value: e.loaded,
                max: e.total
              });
            }
          },
          false
        );
      }
      return myXhr;
    },
    error: function(xhr, ajaxOptions, thrownError) {
      console.log(xhr.status);
      console.log(xhr.responseText);
      console.log(thrownError);
    },
    success: function(data) {
      //alert(data);
      $("#warning").html(data);
    },
    complete: function(data) {
      $("#progress").html("");
      $("#simpan").removeClass("is-loading");
    }
  });
}

function trySaveKoor(home) {
  $("#progress").html("Proses unggah data: <progress></progress><br>");
  $("#simpan").addClass("is-loading");
  $.ajax({
    url: home + "user/submitkoor",
    type: "POST",
    data: new FormData($("form")[0]),
    cache: false,
    contentType: false,
    processData: false,

    // Custom XMLHttpRequest
    xhr: function() {
      var myXhr = $.ajaxSettings.xhr();
      if (myXhr.upload) {
        // For handling the progress of the upload
        myXhr.upload.addEventListener(
          "progress",
          function(e) {
            if (e.lengthComputable) {
              $("progress").attr({
                value: e.loaded,
                max: e.total
              });
            }
          },
          false
        );
      }
      return myXhr;
    },
    error: function(xhr, ajaxOptions, thrownError) {
      console.log(xhr.status);
      console.log(xhr.responseText);
      console.log(thrownError);
    },
    success: function(data) {
      //alert(data);
      $("#warnings").html(data);
    },
    complete: function(data) {
      $("#progress").html("");
      $("#simpan").removeClass("is-loading");
    }
  });
}
