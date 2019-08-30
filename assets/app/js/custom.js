$(document).ready(function () {
    $("#resume").change(function (e) {
        var fileExtension = ['pdf', 'doc', 'docx'];
        if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
            alert("Hanya format file berikut yang dapat diterima : "+fileExtension.join(', '));
        } else {
            var namafile = e.target.files[0].name;
            $("#filename").html(namafile);
        }
    });

    $("#bukti").change(function (e) {
        var fileExtension = ['jpg', 'jpeg', 'png'];
        if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
            alert("Hanya format file berikut yang dapat diterima : "+fileExtension.join(', '));
        } else {
            var namafile = e.target.files[0].name;
            $("#filename").html(namafile);
        }
    });
});

function tryLogin(home) {
    var e = $('#u').val();
    var p = $('#p').val();
    
    $.ajax({
        url : home + "login/loginprocess",
        type : "POST",
        data : "e=" + e + "&p=" + p,
        error : function(xhr, ajaxOptions, thrownError){
            console.log(xhr.status);
            console.log(xhr.responseText);
            console.log(thrownError);
        },
        success : function(data){
            //alert(data);
            $('#loginWarnings').html(data);
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
    var n = $('#n').val();
    var e = $('#u').val();
    var p = $('#p').val();
    var p2 = $('#p2').val();
    
    $.ajax({
        url : home + "register/registerprocess",
        type : "POST",
        data : "n=" + n + "&e=" + e + "&p=" + p + "&p2=" + p2,
        error : function(xhr, ajaxOptions, thrownError){
            console.log(xhr.status);
            console.log(xhr.responseText);
            console.log(thrownError);
        },
        success : function(data){
            //alert(data);
            $('#regWarnings').html(data);
        }
    });
}

function trySelect(home, id, koors) {
    $.ajax({
        url : home + "user/pilihlomba",
        type : "POST",
        data : "lomba=" + id + "&id_koor=" + koors,
        error : function(xhr, ajaxOptions, thrownError){
            console.log(xhr.status);
            console.log(xhr.responseText);
            console.log(thrownError);
        },
        success : function(data){
            //alert(data);
            $('#warnings').html(data);
        }
    });
}

function trySaveBayar(home) {
    $("#progress").html("Proses unggah data: <progress></progress><br>");
    $("#simpan").addClass("is-loading");
    $.ajax({
        url : home + "user/bayar",
        type : "POST",
        data : new FormData($("form")[0]),
        cache: false,
        contentType: false,
        processData: false,

        // Custom XMLHttpRequest
        xhr: function () {
        var myXhr = $.ajaxSettings.xhr();
            if (myXhr.upload) {
                // For handling the progress of the upload
                myXhr.upload.addEventListener('progress', function (e) {
                if (e.lengthComputable) {
                    $('progress').attr({
                    value: e.loaded,
                    max: e.total,
                    });
                }
                }, false);
            }
            return myXhr;
        },
        error : function(xhr, ajaxOptions, thrownError){
            console.log(xhr.status);
            console.log(xhr.responseText);
            console.log(thrownError);
        },
        success : function(data){
            //alert(data);
            $('#warning').html(data);
            $("#simpan").removeClass("is-loading");
        }
    });
    
}

function trySaveKoor(home) {
    $("#progress").html("Proses unggah data: <progress></progress><br>");
    $("#simpan").addClass("is-loading");
    $.ajax({
        url : home + "user/submitkoor",
        type : "POST",
        data : new FormData($("form")[0]),
        cache: false,
        contentType: false,
        processData: false,

        // Custom XMLHttpRequest
        xhr: function () {
        var myXhr = $.ajaxSettings.xhr();
            if (myXhr.upload) {
                // For handling the progress of the upload
                myXhr.upload.addEventListener('progress', function (e) {
                if (e.lengthComputable) {
                    $('progress').attr({
                    value: e.loaded,
                    max: e.total,
                    });
                }
                }, false);
            }
            return myXhr;
        },
        error : function(xhr, ajaxOptions, thrownError){
            console.log(xhr.status);
            console.log(xhr.responseText);
            console.log(thrownError);
        },
        success : function(data){
            //alert(data);
            $('#warnings').html(data);
            $("#simpan").removeClass("is-loading");
        }
    });
    
}