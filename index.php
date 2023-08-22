<?php

    $hotels = [

        [
            'name' => 'Hotel Belvedere',
            'description' => 'Hotel Belvedere Descrizione',
            'parking' => true,
            'vote' => 4,
            'distance_to_center' => 10.4
        ],
        [
            'name' => 'Hotel Futuro',
            'description' => 'Hotel Futuro Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 2
        ],
        [
            'name' => 'Hotel Rivamare',
            'description' => 'Hotel Rivamare Descrizione',
            'parking' => false,
            'vote' => 1,
            'distance_to_center' => 1
        ],
        [
            'name' => 'Hotel Bellavista',
            'description' => 'Hotel Bellavista Descrizione',
            'parking' => false,
            'vote' => 5,
            'distance_to_center' => 5.5
        ],
        [
            'name' => 'Hotel Milano',
            'description' => 'Hotel Milano Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 50
        ],

    ];
    $selectedParking = isset($_GET['parking']) ? $_GET['parking'] : null;


function filterHotels($hotels, $parking) {
    if ($parking === 'yes') {
        return array_filter($hotels, function($hotel) {
            return $hotel['parking'];
        });
    } elseif ($parking === 'no') {
        return array_filter($hotels, function($hotel) {
            return !$hotel['parking'];
        });
    } else {
        return $hotels; 
    }
}


$filteredHotels = filterHotels($hotels, $selectedParking);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Hotel</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div>
    <form action="index.php" method="GET">
        <label>
            <input type="radio" name="parking" value="yes"> Yes
        </label>
        <label>
            <input type="radio" name="parking" value="no"> No
        </label>
        <button type="submit">Filter</button>
    </form></div>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Nome hotel</th>
                <th>Descrizione</th>
                <th>Parcheggio</th>
                <th>Voto</th>
                <th>Distanza dal centro</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach ($filteredHotels as $index => $hotel) {
            ?>
                <tr>
                    <td><?php echo $index + 1; ?></td>
                    <td><?php echo $hotel['name']; ?></td>
                    <td><?php echo $hotel['description']; ?></td>
                    <td><?php echo $hotel['parking'] ? 'Sì' : 'No'; ?></td>
                    <td><?php echo $hotel['vote']; ?></td>
                    <td><?php echo $hotel['distance_to_center']; ?> km</td>
                </tr>
            <?php
                }
            ?>
        </tbody>
    </table>

</body>
</html>





