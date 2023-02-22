<?php

require_once('Date.php');

$convertedDate = null;

if (isset($_POST['date'])) {

    $dateString = $_POST['date'];
    $convertedDate = Date::convertDate($dateString);
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Date Converter</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
            crossorigin="anonymous"></script>

</head>
<body>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form method="post">
                <div class="form-group">
                    <label for="date-input">Enter a date in string [ex: August 05 2002]:</label>
                    <input type="text" class="form-control" id="date-input" name="date"
                           required>
                </div>
                <button type="submit" class="btn btn-primary">Convert to mm/dd/yyyy</button>
            </form>
            <?php
            echo "Converted date: " . $convertedDate;
            ?>
        </div>
    </div>
</div>
</body>
</html>
