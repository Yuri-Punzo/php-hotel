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

foreach ($hotels as $hotel) {
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
}

?>