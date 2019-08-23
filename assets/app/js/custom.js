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