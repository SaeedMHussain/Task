	<?php
	include_once("config.php");
	
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['geonameId'])) {
    $geonameId = intval($_POST['geonameId']);

    $url = $getCityUrl."geonameId=$geonameId&username=$username";

    // Fetch data from GeoNames API
    $response = file_get_contents($url);

    // Decode JSON response
    $data = json_decode($response, true);

    // Display city details
    if ($data) {
        echo "<h2>City Details</h2>";
        echo "<p><strong>Name:</strong> " . $data['name'] . "</p>";
        echo "<p><strong>Region:</strong> " . $data['adminName1'] . "</p>";
        echo "<p><strong>Country:</strong> " . $data['countryName'] . "</p>";
        echo "<p><strong>Population:</strong> " . ($data['population'] ?? 'N/A') . "</p>";
        echo "<p><strong>Latitude:</strong> " . $data['lat'] . "</p>";
        echo "<p><strong>Longitude:</strong> " . $data['lng'] . "</p>";
    } else {
        echo "<p>City details not found.</p>";
    }
} else {
    echo "<p>Invalid request.</p>";
}
?>
