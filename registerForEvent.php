<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>cems</title>
    <title></title>
    <?php require 'utils/styles.php'; ?><!--css links. file found in utils folder-->

</head>

<body>


    <?php require 'utils/header.php'; ?><!--header content. file found in utils folder-->


    <div class="content"><!--body content holder-->
        <div class="container">
            <div class="col-md-6 col-md-offset-3">
                <form class="form-group" method="POST">
                    <div class="form-group">
                        <label for="usn"> Student USN: </label>
                        <input type="text" id="usn" name="usn" class="form-control">
                    </div>
                    <button type="submit" name="update" class="btn btn-default">Login</button>
                </form>
                <a href="register.php"><u> Sign in </u></a>
            </div>
        </div>
    </div>

    <?php require 'utils/footer.php'; ?><!--footer content. file found in utils folder-->
</body>

</html>

<?php

require 'classes/db1.php';
$id = $_GET['id'];

if (isset($_POST["update"])) {
    $usn = $_POST['usn'];

    if (!empty($usn)) {

        $INSERT = "INSERT INTO registered (rid, usn, event_id) VALUES (NULL, '$usn', $id)";

        if ($conn->query($INSERT) === true) {
            echo "<script>
                    alert('Registered Successfully!');
                    window.location.href='RegisteredEvents.php?usn=' + encodeURIComponent('$usn');
                    </script>";
        } else {
            echo "<script>
                    alert('Already registered this USN');
                    window.location.href='RegisteredEvents.php';
                    </script>";
        }

        $conn->close();
    } else {
        echo "<script>
            alert('All fields are required');
            
            </script>";
    }
}
?>