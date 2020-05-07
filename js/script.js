$(document).ready(function () {
    $("#loginBtn").click(function () {
        posting = $.post( url, { username: $('#username').val(), password: $('#password').val() } );
        posting.done(function( data ) {
            alert('success');
            $("#loginDiv").hide();
        });
    }) ;



});
