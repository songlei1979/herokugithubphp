$(document).ready(function () {
    $('#logoutDiv').hide();

    $("#loginBtn").click(function () {
        url = "http://herokugitphpleisong.herokuapp.com/api/adminlogin.php";
        posting = $.post( url, { username: $('#username').val(), password: $('#password').val() } );
        posting.done(function( data ) {
            console.log(data.length);
            $("#loginDiv").hide();
            $('#logoutDiv').show();
            i = 0;
            while (i<data.length){
                $('#availablepages').append('<p><a href="api/'+data[i].url+'">'+data[i].name+'</a></p>');
                i = i+1;
            }

        });
    }) ;



});
