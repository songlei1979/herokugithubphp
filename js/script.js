$(document).ready(function () {
    $('#logoutDiv').hide();

    $("#loginBtn").click(function () {
        url = "http://herokugitphpleisong.herokuapp.com/api/adminlogin.php";
        posting = $.post( url, { username: $('#username').val(), password: $('#password').val() } );
        posting.done(function( data ) {
            console.log(data);
            $("#loginDiv").hide();
            $('#logoutDiv').show();
            i = 0;
            while (i<data.length){
                $('#availablepages').append('<p><a href="api/'+data[1]+'">'+data[0]+'</a></p>');
            }

        });
    }) ;



});
