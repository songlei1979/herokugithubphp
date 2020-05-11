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
            $.ajax({
                type:'GET',
                url:"api/apiStudent.php?id="+<?php echo $studentID;?>,
                dataType: "JSON",
                success: function (data) {
                    console.log(data);
                    $("#studentName").val(data.name);
                    $("#studentUsername").val(data.username);

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
    <p>Name: <input type="text" id="studentName"></p>
    <p>Username: <input type="text" id="studentUsername"></p>
    <p><button>Save</button></p>
</div>
</body>
</html>
