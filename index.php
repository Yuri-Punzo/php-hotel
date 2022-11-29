<!-- Partiamo da questo array di hotel: https://www.codepile.net/pile/OEWY7Q1G
Stampare tutti i nostri hotel con tutti i dati disponibili.
Iniziate in modo graduale. Prima stampate in pagina i dati, senza preoccuparvi dello stile.
Dopo aggiungete Bootstrap e mostrate le informazioni con una tabella.
Bonus: 1
Aggiungere un form ad inizio pagina che tramite una richiesta GET permetta di filtrare gli hotel che hanno un parcheggio.
Aggiungere un secondo campo al form che permetta di filtrare gli hotel per voto
(es. inserisco 3 ed ottengo tutti gli hotel che hanno un voto di tre stelle o superiore)
NOTA: deve essere possibile utilizzare entrambi i filtri contemporaneamente
(es. ottenere una lista con hotel che dispongono di parcheggio e che hanno un voto di tre stelle o superiore)
Se non viene specificato nessun filtro, visualizzare come in precedenza tutti gli hotel. -->

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

/* foreach ($hotels as $hotel) {
    echo $hotel["name"] . "<br>";
    echo $hotel["description"] . "<br>";
    if ($hotel["parking"] === true) {
        echo "Con parcheggio" . "<br>";
    } else {
        echo "Senza parcheggio" . "<br>";
    }
    echo $hotel["vote"] . "<br>";
    echo $hotel["distance_to_center"] . "<br>";
    echo "<br>";
} */

//var_dump($_GET);

if (isset($_GET['parking']) && isset($_GET['rating'])) {
    //var_dump('Filter by parking e rating');
    // filter array $hotels 
    $hotels = array_filter($hotels, function ($hotel) {
        return $hotel['parking'] && $hotel['vote'] >= $_GET['rating'];
    });
} elseif (isset($_GET['parking'])) {
    //var_dump('Filter by parking');
    $hotels = array_filter($hotels, function ($hotel) {
        return $hotel['parking'];
    });
} elseif (isset($_GET['rating'])) {
    //var_dump('Filter by rating');
    $hotels = array_filter($hotels, function ($hotel) {
        return $hotel['vote'] >= $_GET['rating'];
    });
}

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
    <h1 class="pt-5 text-center">Hotel</h1>

    <form action="index.php" method="get">
        <label for="parking">
            Has Parking:
            <input type="checkbox" name="parking" id="parking">
        </label>
        <div class="mt-2">
            <select name="rating" id="rating">
                <option value="" disabled selected>Filter by rating</option>
                <option value="1">1+</option>
                <option value="2">2+</option>
                <option value="3">3+</option>
                <option value="4">4+</option>
                <option value="5">5</option>
            </select>
        </div>
        <div class="mt-2">
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-primary">Reset</button>
        </div>
    </form>


    <div class="table-responsive mt-5">
        <?php foreach ($hotels as $hotel) : ?>
            <table class="table table-primary">
                <thead>
                    <tr>
                        <th scope="col">
                            <?php echo $hotel["name"] ?>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="">
                        <td scope="row"><?php echo $hotel["description"] ?></td>
                    </tr>
                    <tr class="">
                        <td scope="row">
                            <?php if ($hotel["parking"] === true) {
                                echo "Possibilità di parcheggio: Si" . "<br>";
                            } else {
                                echo "Possibilità di parcheggio: No" . "<br>";
                            } ?>
                        </td>
                    </tr>
                    <tr class="">
                        <td scope="row">
                            <?php echo "Voto: " . $hotel["vote"] . "/5" ?>
                        </td>
                    </tr>
                    <tr class="">
                        <td scope="row">
                            <?php echo "Distanza dal centro: " . $hotel["distance_to_center"] . " km" ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        <?php endforeach ?>
    </div>
</body>

</html>