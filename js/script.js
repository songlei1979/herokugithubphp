$(document).ready(function () {
    $("#loginBtn").click(function () {
        url = "http://herokugitphpleisong.herokuapp.com/api/adminlogin.php";
        posting = $.post( url, { username: $('#username').val(), password: $('#password').val() } );
        posting.done(function( data ) {
            alert('success');
            $("#loginDiv").hide();
        });
    }) ;



});
