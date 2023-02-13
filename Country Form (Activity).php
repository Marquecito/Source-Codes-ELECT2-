<!DOCTYPE html>
<html>
<head>

    <title>Country Select</title>
</head>
<body>
<h2>Enter a Country:</h2>
<form action="" method="post">
    <input type="text" name="country" />
    <input type="submit" value="Submit" />
</form>

<?php
function cleanString($string) {
    return trim(strtolower($string));
}

function getCountryInformation($country) {
    $countries = [
        ["country" => "germany", "capital" => "berlin", "details" => "Germany is a country in Central and Western Europe."],
        ["country" => "france", "capital" => "paris", "details" => "France is a country in Western Europe."],
        ["country" => "italy", "capital" => "rome", "details" => "Italy is a country in Southern Europe."],
        ["country" => "spain", "capital" => "madrid", "details" => "Spain is a country in Southwestern Europe."],
        ["country" => "united kingdom", "capital" => "london", "details" => "The United Kingdom is a country in Northern Europe."],
        ["country" => "russia", "capital" => "moscow", "details" => "Russia is a country in Eastern Europe and Northern Asia. "],
        ["country" => "united states", "capital" => "washington d.c.", "details" => "The United States is a country in North America. "],
        ["country" => "china", "capital" => "beijing", "details" => "China is a country in East Asia. "],
        ["country" => "japan", "capital" => "tokyo", "details" => "Japan is an island country in East Asia."],
        ["country" => "india", "capital" => "new delhi", "details" => "India is a country in South Asia. "]
    ];

    foreach ($countries as $c) {
        if (cleanString($c["country"]) == cleanString($country)) {
            return [
                "capital" => $c["capital"],
                "details" => $c["details"]
            ];
        }
    }

    return null;
}

if (isset($_POST['country'])) {
    $country = $_POST['country'];
    $info = getCountryInformation($country);
    if ($info) {
        echo "<h2>Capital: " . $info['capital'] . "</h2>";
        echo "<p>" . $info['details'] . "</p>";
    } else {
        echo "<h2>Country not found</h2>";
    }
}
?>
</body>
</html>


