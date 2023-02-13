<!DOCTYPE html>
<html>
<head>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"/>
    <title>Calculator Maangas</title>
</head>
<body>
<div class="container">
    <h2 class="text-center">Calculator</h2>
    <form action="" method="post">
        <div class="form-group">
            <input
                type="text"
                name="num1"
                class="form-control"
                placeholder="Enter first number"
            />
        </div>
        <div class="form-group">
            <input
                type="text"
                name="num2"
                class="form-control"
                placeholder="Enter second number"
            />
        </div>
        <div class="form-group text-center">
            <input type="submit" name="add" value="+" class="btn btn-primary mr-2" />
            <input type="submit" name="subtract" value="-" class="btn btn-danger mr-2" />
            <input type="submit" name="multiply" value="x" class="btn btn-success mr-2" />
            <input type="submit" name="divide" value="/" class="btn btn-warning" />
        </div>
    </form>
</div>

<?php
if (isset($_POST['add'])) {
    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];
    $result = $num1 + $num2;
    echo "<h2 class='text-center'>Result: $result</h2>";
}

if (isset($_POST['subtract'])) {
    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];
    $result = $num1 - $num2;
    echo "<h2 class='text-center'>Result: $result</h2>";
}

if (isset($_POST['multiply'])) {
    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];
    $result = $num1 * $num2;
    echo "<h2 class='text-center'>Result: $result</h2>";
      }

      if (isset($_POST['divide'])) {
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];
        if ($num2 == 0) {
          echo "<h2 class='text-center'>Error: Cannot divide by 0</h2>";
        } else {
          $result = $num1 / $num2;
          echo "<h2 class='text-center'>Result: $result</h2>";
        }
      }
    ?>
  </body>
</html>
