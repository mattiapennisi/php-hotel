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

$parkingGetQueryExists = isset($_GET['filterByParking']);
$ratingFilterValue = isset($_GET['filterByRating']) ? (int)$_GET['filterByRating'] : 1;

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

    <div class="container-fluid">

        <h1 class="text-center mt-4"><a href='./index.php'>Hotels List</a></h1>

        <h5 class="mt-4">Filters:</h5>
        <form class="d-flex flex-row form-control" action="./index.php" method="get">

            <input class="me-2" type="checkbox" name="filterByParking">
            <label class="me-4 pt-1" for="filterByParking">Only with parking</label>

            <select class="me-4" name="filterByRating">
                <option>Filter by rating</option>
                <option value="1">One star</option>
                <option value="2">Two stars</option>
                <option value="3">Three stars</option>
                <option value="4">Four stars</option>
                <option value="5">Five stars</option>
            </select>

            <button type="submit" class="btn btn-outline-primary">Enter</button>

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

            if ($parkingGetQueryExists && $hotel['parking'] && $hotel['vote'] >= $ratingFilterValue) {
                echo "
                    <tr>
                        <td>{$hotel['name']}</td>
                        <td>{$hotel['description']}</td>
                        <td>Yes</td>
                        <td>{$hotel['vote']}/5</td>
                        <td>{$hotel['distance_to_center']} Km</td>
                    </tr>
                    ";
            } else if (!$parkingGetQueryExists && $hotel['vote'] >= $ratingFilterValue) {
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