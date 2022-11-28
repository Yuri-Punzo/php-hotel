<?php

$hotels = [
    [
        'name' => 'Hotel Belvedere',
        'description' => 'Descrizione Hotel Belvedere',
        'parking' => true,
        'vote' => 4,
        'distance_to_center' => 10.4
    ],
    [
        'name' => 'Hotel Futuro',
        'description' => 'Descrizione Hotel Futuro',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 2
    ],
    [
        'name' => 'Hotel Rivamare',
        'description' => 'Descrizione Hotel Rivamare',
        'parking' => false,
        'vote' => 1,
        'distance_to_center' => 1
    ],
    [
        'name' => 'Hotel Bellavista',
        'description' => 'Descrizione Hotel Bellavista',
        'parking' => false,
        'vote' => 5,
        'distance_to_center' => 5.5
    ],
    [
        'name' => 'Hotel Milano',
        'description' => 'Descrizione Hotel Milano',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 50
    ]
];

$parking = $_GET["parking"];

$rating = $_GET["rating"];

/* per ogni hotel se il valore del voto è uguale a quello ottenuto con get ratings lo mostro altriemnti niente */
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>PHP Hotels</title>
</head>

<body class="bg-dark text-light">
    <h1 class="pt-5 text-center">Hotels</h1>

    <div class="table-responsive mt-5">
        <table class="table table-primary">
            <thead>
                <tr>
                    <?php foreach ($hotels as $hotel) : ?>
                        <th scope="col">
                            <?php if ($parking === "true" && $hotel["parking"] === true) {
                                echo $hotel["name"];
                            } elseif ($parking === "false" && $hotel["parking"] === false) {
                                echo $hotel["name"];
                            } else {
                            } ?>
                        </th>
                    <?php endforeach ?>
                </tr>
            </thead>
            <tbody>
                <tr class="">
                    <?php foreach ($hotels as $hotel) : ?>
                        <td scope="row"><?php echo $hotel["description"] ?></td>
                    <?php endforeach ?>
                </tr>
                <tr class="">
                    <?php foreach ($hotels as $hotel) : ?>
                        <td scope="row">
                            <?php if ($hotel["parking"] === true) {
                                echo "Possibilità di parcheggio: Si" . "<br>";
                            } else {
                                echo "Possibilità di parcheggio: No" . "<br>";
                            } ?>
                        </td>
                    <?php endforeach ?>
                </tr>
                <tr class="">
                    <?php foreach ($hotels as $hotel) : ?>
                        <td scope="row">
                            <?php echo "Voto: " . $hotel["vote"] . "/5" ?>
                        </td>
                    <?php endforeach ?>
                </tr>
                <tr class="">
                    <?php foreach ($hotels as $hotel) : ?>
                        <td scope="row">
                            <?php echo "Distanza dal centro: " . $hotel["distance_to_center"] . " km" ?>
                        </td>
                    <?php endforeach ?>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>