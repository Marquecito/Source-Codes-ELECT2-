<?php
class Date {
    public static function convertDate($dateString) {
        $date = strtotime($dateString);
        return $date ? date('m/d/Y', $date) : null;
    }
}

$convertedDate = null;
if (isset($_POST['date'])) {
    $dateString = $_POST['date'];
    $convertedDate = Date::convertDate($dateString);
}


?>