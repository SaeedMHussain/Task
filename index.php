<?php
include_once("config.php");
// GeoNames API URL to fetch UK cities
$url = $getCitiesUrl . "username=$username";

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
    <link rel="stylesheet" href="styles.css">
    <script src="js/jquery-3.6.4.min.js"></script>
    <script src="js/script.js"></script>
</head>
<body>
    <div class="container">
        <header class="header">
            <h1>Explore UK Cities</h1>
        </header>
        
        <main class="main-content">
            <p>Select a city from the dropdown to view its details.</p>
            <form method="post" id="cityForm" class="city-form">
                <label for="cityDropdown" class="form-label">Choose a City:</label>
                <select name="cityDropdown" id="cityDropdown" class="form-dropdown">
                    <option value="">Select a City</option>
                    <?php foreach ($cities as $city): ?>
                        <option value="<?= $city['geonameId'] ?>">
                            <?= $city['name'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </form>

            <div id="cityDetails" class="city-details"></div>
        </main>
        
        <footer class="footer">
            <p>&copy; <?= date("Y") ?> GeoNames UK Cities. All Rights Reserved.</p>
        </footer>
    </div>
</body>
</html>
