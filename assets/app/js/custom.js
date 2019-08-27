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