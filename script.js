var map = L.map('map').setView([51.505, -0.09], 13);
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

function addPlaceToMap(latitude, longitude, placeName) {
    var marker = L.marker([latitude, longitude]).addTo(map);
    marker.bindPopup(placeName).openPopup();
}

function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else {
        alert("Geolocation is not supported by this browser.");
    }
}

function showPosition(position) {
    var userLocation = [position.coords.latitude, position.coords.longitude];
    map.setView(userLocation, 13);

    <?php
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM Places";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $placeLatitude = $row["Latitude"];
            $placeLongitude = $row["Longitude"];
            $placeName = $row["PlaceName"];

            // Calculate distance using Haversine formula
            $distance = calculateDistance($position->coords->latitude, $position->coords->longitude, $placeLatitude, $placeLongitude);
            echo "alert('Distance to $placeName: $distance km');";
        }
    } else {
        echo "0 results";
    }
    $conn->close();

    function calculateDistance($lat1, $lon1, $lat2, $lon2) {
        $earthRadius = 6371; // Radius of the earth in km
        $dLat = deg2rad($lat2 - $lat1);  // deg2rad below
        $dLon = deg2rad($lon2 - $lon1);
        $a =
            sin($dLat / 2) * sin($dLat / 2) +
            cos(deg2rad($lat1)) * cos(deg2rad($lat2)) *
            sin($dLon / 2) * sin($dLon / 2)
        ;
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
        $distance = $earthRadius * $c; // Distance in km
        return $distance;
    }
    ?>
}
