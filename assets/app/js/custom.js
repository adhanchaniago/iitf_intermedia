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

function trySave(home, step) {
    switch (step) {
        case 0:
            var n = $('#nama').val();
            var e = $('#email').val();
            var h = $('#no_hp').val();
            var i = $('#instansi').val();
            $("#simpan").addClass("is-loading");
            $.ajax({
                url : home + "user/submit?stepnow=" + step,
                type : "POST",
                data : "nama=" + n + "&email=" + e + "&no_hp=" + h + "&instansi=" + i,
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
            break;
        case 1:
            break;
    }
    
}