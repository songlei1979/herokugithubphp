<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Single Students</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <?php
        $studentID = $_GET["id"];
    ?>
    <script>
        $(document).ready(function () {
            url1 = "api/apiStudent.php?id="+<?php echo $studentID;?>;
            console.log(url1);
            $.ajax({
                type:'GET',
                url:url1,
                dataType: "JSON",
                success: function (data) {
                    console.log(data);
                    $("#studentName").val(data.name);
                    $("#studentUsername").val(data.username);
                    $("#studentName").dblclick(function () {
                        $("#studentName").removeProp("readonly");
                    });
                    $("#studentUsername").dblclick(function () {
                        $("#studentUsername").removeProp("readonly");
                    });
                },
                error: function () {
                    alert("Not connected");
                }
            });
        });
    </script>
</head>
<body>

<div id="studentInfoDiv">
    <p>Name: <input type="text" id="studentName" readonly></p>
    <p>Username: <input type="text" id="studentUsername" readonly></p>
    <p><button>Save</button></p>
</div>
</body>
</html>
