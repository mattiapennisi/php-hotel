<?php

$hotels = [

    [
        'name' => 'Hotel Belvedere',
        'description' => 'Hotel Belvedere Description',
        'parking' => true,
        'vote' => 4,
        'distance_to_center' => 10.4
    ],
    [
        'name' => 'Hotel Futuro',
        'description' => 'Hotel Futuro Description',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 2
    ],
    [
        'name' => 'Hotel Rivamare',
        'description' => 'Hotel Rivamare Description',
        'parking' => false,
        'vote' => 1,
        'distance_to_center' => 1
    ],
    [
        'name' => 'Hotel Bellavista',
        'description' => 'Hotel Bellavista Description',
        'parking' => false,
        'vote' => 5,
        'distance_to_center' => 5.5
    ],
    [
        'name' => 'Hotel Milano',
        'description' => 'Hotel Milano Description',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 50
    ],

];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotels</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>

<body>

    <div class="container">

        <h1 class="text-center mt-4">Hotels List</h1>

        <form class="mt-4" action="./hotels-filtered.php" method="get">

            <input type="checkbox" name="withParking">

            <input type="radio" name="oneStars">
            <input type="radio" name="twoStars">
            <input type="radio" name="threeStars">
            <input type="radio" name="fourStars">
            <input type="radio" name="fiveStars">

            <button type="submit">Enter</button>

        </form>

        <?php


        echo "<table class='table mt-4'>
            <thead>
                <tr>
                    <th scope='col'>Name</th>
                    <th scope='col'>Description</th>
                    <th scope='col'>Parking</th>
                    <th scope='col'>Vote</th>
                    <th scope='col'>Distance to center</th>
                </tr>
            </thead>
            <tbody>
        ";

        foreach ($hotels as $hotel) {
            echo "
                <tr>
                    <td>{$hotel['name']}</td>
                    <td>{$hotel['description']}</td>
                    <td>" . ($hotel['parking'] ? 'Yes' : 'No') . "</td>
                    <td>{$hotel['vote']}/5</td>
                    <td>{$hotel['distance_to_center']} Km</td>
                </tr>
            ";
        }

        echo "
            </tbody>
        </table>
        ";

        ?>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>

</body>

</html>