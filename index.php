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
//var_dump($_GET);
// isset($_GET['parking']) ? 'checked'  '';

var_dump($_GET);









?>


<!-- Bonus:
Aggiungere un form ad inizio pagina che tramite una richiesta GET permetta di filtrare gli hotel che hanno un parcheggio.
Aggiungere un secondo campo al form che permetta di filtrare gli hotel per voto (es. inserisco 3 ed ottengo tutti gli hotel che hanno un voto di tre stelle o superiore)
NOTA: deve essere possibile utilizzare entrambi i filtri contemporaneamente (es. ottenere una lista con hotel che dispongono di parcheggio e che hanno un voto di tre stelle o superiore) Se non viene specificato nessun filtro, visualizzare come in precedenza tutti gli hotel. -->


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>H di Hotel</title>
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body class="bg-dark">
    <div class="container my-5">
        <div class="row my-3">
            <form class="d-flex gap-4 justify-content-center align-items-center" action="" method="GET">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="true" id="parking" name="parking" <?= isset($_GET['parking']) && $_GET['parking'] ? 'checked' : ''; ?>>
                    <label class="form-check-label text-white" for="parking">
                        Parcheggio
                    </label>
                </div>
                <div>
                    <div class="mb-3">
                        <select class="form-select form-select-lg" name="vote" id="vote">
                            <option value="" <?= !isset($_GET['vote']) || $_GET['vote'] === '' ? 'selected' : ''; ?>>Filtra per Voto..</option>
                            <option value="1" <?= isset($_GET['vote']) && $_GET['vote'] === '1' ? 'selected' : ''; ?>>1 Stella</option>
                            <option value="2" <?= isset($_GET['vote']) && $_GET['vote'] === '2' ? 'selected' : ''; ?>>2 Stelle</option>
                            <option value="3" <?= isset($_GET['vote']) && $_GET['vote'] === '3' ? 'selected' : ''; ?>>3 Stelle</option>
                            <option value="4" <?= isset($_GET['vote']) && $_GET['vote'] === '4' ? 'selected' : ''; ?>>4 Stelle</option>
                            <option value="5" <?= isset($_GET['vote']) && $_GET['vote'] === '5' ? 'selected' : ''; ?>>5 Stelle</option>



                        </select>
                    </div>

                </div>
                <button type="submit">Filtra</button>
            </form>
        </div>


        <div class="row my-3">

            <div class="table-responsive">
                <table class="table table-dark table-hover table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Parking</th>
                            <th scope="col">Vote</th>
                            <th scope="col">Distance to the center</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">

                        <?php foreach ($hotels as $key => $hotel) : ?>

                            <?php if ($hotel['parking']) {
                                $parking = 'si';
                            } else {
                                $parking = 'no';
                            }
                            ?>
                            <tr>
                                <?php if (isset($_GET['parking']) && $hotel['parking'] && ($_GET['vote']) <= $hotel['vote']) : ?>
                                    <td scope="row"><?php echo $hotel['name'] ?></td>
                                    <td><?php echo $hotel['description'] ?></td>
                                    <td><?php echo $parking ?></td>
                                    <td><?php echo $hotel['vote'] ?></td>
                                    <td><?php echo $hotel['distance_to_center'] ?> km</td>
                                <?php elseif (!isset($_GET['parking']) && isset($_GET['vote']) && ($_GET['vote']) <= $hotel['vote']) : ?>
                                    <td><?php echo $hotel['name']; ?></td>
                                    <td><?php echo $hotel['description']; ?></td>
                                    <td><?php echo $parking; ?></td>
                                    <td><?php echo $hotel['vote']; ?></td>
                                    <td><?php echo $hotel['distance_to_center']; ?></td>
                                <?php endif; ?>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!-- /.table -->
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>