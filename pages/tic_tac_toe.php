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
    <table class="ticTacToe">

    </table>
    <a href="?reinitialiser">Réinitialiser</a>
</body>
</html>
