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
                $('#availablepages').append('<p><a href="'+data[i].url+'">'+data[i].name+'</a></p>');
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
                $("#studentsTable").append("<tr><td><a href='studentInformation.php?id="+data[i].id+"'>"+data[i].id+"</a></td>" +
                    "<td>"+ data[i].name +"</td>" +
                    "<td>"+ data[i].username +"<button deleteid='"+data[i].id+"' class='deleteBtn'>X</button></td></tr>");
                i = i+1;
            }

            $(".deleteBtn").click(function () {
                studentID = $(this).attr("deleteid");
                $(this).parent().parent().remove(); //I need to remove the table row
                    $.ajax({
                        type: 'GET',
                        url: "api/apiRemoveStudent.php?id="+studentID,
                        dataType: "JSON",
                        success: function (data) {
                            alert("This student has been deleted");
                        },
                        error: function () {
                            alert("Not connected");
                        }
                    });
            });

        },
        error: function () {
            alert("Not connected");
        }
    });
}
