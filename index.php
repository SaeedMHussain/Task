<?php
include_once("config.php");
// GeoNames API URL to fetch UK cities
$url = $getCitiesUrl."username=$username";

// Fetch data from GeoNames API
$response = file_get_contents($url);

// Decode JSON response
$data = json_decode($response, true);

// Check if the data contains cities
if (isset($data['geonames'])) {
    $cities = $data['geonames'];
} else {
    $cities = [];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UK Cities with GeoNames</title>
    <script src="js/jquery-3.6.4.min.js"></script>
    <script src="js/script.js"></script>
</head>
<body>
    <h1>Select a UK City</h1>
    <form method="post" id="cityForm">
        <select name="cityDropdown" id="cityDropdown">
            <option value="">Select a City</option>
            <?php foreach ($cities as $city): ?>
                <option value="<?= $city['geonameId'] ?>">
                    <?= $city['name'] ?>
                </option>
            <?php endforeach; ?>
        </select>
    </form>

    <div id="cityDetails" style="margin-top: 20px;"></div>

</body>
</html>
