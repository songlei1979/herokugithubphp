$(document).ready(function () {
    $('#logoutDiv').hide();

    $("#loginBtn").click(function () {
        url = "http://herokugitphpleisong.herokuapp.com/api/adminlogin.php";
        posting = $.post( url, { username: $('#username').val(), password: $('#password').val() } );
        posting.done(function( data ) {
            console.log(data);
            $("#loginDiv").hide();
        });
    }) ;



});
