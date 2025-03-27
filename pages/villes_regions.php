<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Villes et régions</title>
    <link rel="stylesheet" href="../water.css">
</head>
<body>
    <nav>
        <a href="../index.php">Retour</a>
    </nav>
    <h1>Villes et régions</h1>

    <?php
        $regionAdmin = [

            'Montréal'=>'Montréal',
            'Québec'=>'Québec',
            'Laval'=>'Laval',
            'Gatineau'=>'Outaouais',
            'Longueuil'=>'Montérégie',
            'Sherbrooke'=>'Estrie',
            'Magog'=>'Estrie',
            'Coaticook'=>'Estrie',
            'Trois-Rivières'=>'Mauricie',
            'Drummondville'=>'Centre-du-Québec',
        ];

        if (isset($_POST['ville'])){
            
            $ville = $_POST['ville'];

            if(isset($regionAdmin[$ville])){

                echo 'La ville de '. $ville .' est dans la région administrative "' .$regionAdmin[$ville].'".<br>';
                echo '<a href="villes_regions.php">Entrer une autre ville</a>';
            }
            else{
                echo 'La région administrative correspondant a la ville de '.$ville.' est inconnue.<br>';
                echo '<a href="villes_regions.php">Entrer une autre ville</a>';
            }

        }
        else{
            echo'<form method="post">
                    <label for="region">Entrez le nom d\'une ville:</label>
                    <input type="text" id="ville" name="ville" />
                    <button type="submit">Soumettre</button>
                </form>';
                
        }

    ?>


</body>
</html>
