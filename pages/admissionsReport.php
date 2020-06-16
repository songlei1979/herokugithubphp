<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admission Report</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $.ajax({
                type: 'GET',
                url: "http://unitecproject.herokuapp.com/api/apiAllAdmissions.php",
                dataType: "JSON",
                success: function (data) {
                    i = 0;
                    while (i < data.length){
                        $("#report").append("<hr>");
                        $("#report").append("<p>ID: "+data[i].id+" </p>");
                        $("#report").append("<p>patientID: "+data[i].patientID+" </p>");
                        $("#report").append("<p>description: "+data[i].description+" </p>");
                        $("#report").append("<hr>");
                        i = i+1;
                    }
                },
                error: function () {
                    alert("Not connected");
                }
            });
        });
    </script>
</head>
<body>
<div id="report">

</div>
</body>
</html>
