<?php
    session_start();

    if (isset($_GET['reinitialiser'])) {
        session_unset();
        session_destroy();
    }

    if(!isset($_SESSION['tableaux'])){
        $_SESSION['tableaux'] = ([
            ['()','()','()'],
            ['()','()','()'],
            ['()','()','()'],
            
            ]);
    }

    $tableaux = $_SESSION['tableaux'];

    $joueur = 'x';
    $message = '';

    if(!isset($_SESSION['joueur'])){
        $_SESSION['joueur'] = 'x';
    }
    $joueur = $_SESSION['joueur'];
    
    $ligne = 0;
    $colonne = 0;

    if(isset($_GET['ligne']) && isset($_GET['colonne']) ){
        $ligne = htmlspecialchars($_GET['ligne']);
        $colonne = htmlspecialchars($_GET['colonne']);
  
        if($tableaux[$ligne][$colonne] == '()'){
            $tableaux[$ligne][$colonne] = $joueur;
            $_SESSION['tableaux'] = $tableaux;

            for($i = 0; $i < 3; $i++){

               //validation verticale
                if(($tableaux[0][$i] === 'x' && $tableaux[1][$i] === 'x' && $tableaux[2][$i] === 'x') || ($tableaux[0][$i] === 'o' && $tableaux[1][$i] === 'o' && $tableaux[2][$i] === 'o')) {
                    $message = 'Vous avez gagné !';
                    
                }

            //validation horizontale
                if(($tableaux[$i][0] == 'x' && $tableaux[$i][1] == 'x' && $tableaux[$i][2] == 'x') || ($tableaux[$i][0] == 'o' && $tableaux[$i][1] == 'o' && $tableaux[$i][2] == 'o')){
                    $message = 'Vous avez gagné !';
                    
                }

                
            //validation diagonale vers Droite
                if(($tableaux[0][0] == 'x' && $tableaux[1][1] == 'x' && $tableaux[2][2] == 'x') || ($tableaux[0][0] == 'o' && $tableaux[1][1] == 'o' && $tableaux[2][2] == 'o')){
                    $message = 'Vous avez gagné !';  
                }


            //validation diagonale vers Gauche
                if(($tableaux[0][2] == 'x' && $tableaux[1][1] == 'x' && $tableaux[2][0] == 'x') || ($tableaux[0][2] == 'o' && $tableaux[1][1] == 'o' && $tableaux[2][0] == 'o')){
                    $message = 'Vous avez gagné !';
                    
                }
        }

    }

    $_SESSION['joueur'] = ($_SESSION['joueur'] == 'x') ? 'o' : 'x';
}

?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tic Tac Toe</title>
    <link rel="stylesheet" href="../water.css">
    <style>
        .ticTacToe {
            border-collapse: collapse;
            width: auto;
        }

        .ticTacToe tr {
            background-color:rgba(254, 254, 254, 0.57) !important;
        }

        .ticTacToe td {
            border: 1px solid black;
            width: 75px;
            height: 75px;
            text-align: center;
            vertical-align: middle;
            color: black;
            font-size: 2em;
        }

        .ticTacToe a {
            color: darkblue;
        }
    </style>
</head>
<body>
    <nav>
        <a href="../index.php">Retour</a>
    </nav>
    <h1>Tic Tac Toe</h1>

    <?php echo '<p>C\'est le tour des '.$joueur.'</p>';?>
    <table class="ticTacToe">
    <?php
        echo $message;
        foreach($tableaux as $l => $tableau){
            echo'<tr>';
                foreach($tableau as $c => $colonne){
                    echo'<td><a href="?joueur='.$joueur.'&ligne='.$l.'&colonne='.$c.'">'.$colonne.'</a></td>';
                }
            echo'</tr>';
            }
    ?>
    
    </table>
    <a href="?reinitialiser">Réinitialiser</a>
</body>
</html>
