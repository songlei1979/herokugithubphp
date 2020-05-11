$(document).ready(function () {
    $('#logoutDiv').hide();

    $("#loginBtn").click(function () {
        url = "http://herokugitphpleisong.herokuapp.com/api/adminlogin.php";
        posting = $.post( url, { username: $('#username').val(), password: $('#password').val() } );
        posting.done(function( data ) {
            console.log(JSON.parse(data));
            data = JSON.parse(data);
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

function showStudents() {
    $.ajax({
        type:'GET',
        url:"api/liststudents.php",
        dataType: "JSON",
        success: function (data) {
            console.log(data);
            i = 0;
            while (i<data.length){
                $("#studentsTable").append("<tr><td>"+data[i].id+"</td>" +
                    "<td>"+ data[i].name +"</td>" +
                    "<td>"+ data[i].username +"</td></tr>");
            }

        },
        error: function () {
            alert("Not connected");
        }
    });
}
