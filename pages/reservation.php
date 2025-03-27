<?php
  $provinces = [
    'AB' => 'Alberta',
    'BC' => 'Colombie-Britannique',
    'PE' => 'Île-du-Prince-Édouard',
    'MB' => 'Manitoba',
    'NB' => 'Nouveau-Brunswick',
    'QC' => 'Québec',
    'NS' => 'Nouvelle-Écosse',
    'NU' => 'Nunavut',
    'ON' => 'Ontario',
    'SK' => 'Saskatchewan',
    'NL' => 'Terre-Neuve-et-Labrador',
    'NT' => 'Territoires du Nord-Ouest',
    'YT' => 'Yukon'
  ];

  $type_chambre_tableau = [
    '1 lit double',
    '2 lits doubles',
    '1 lit Queen',
    '2 lits Queen',
    '1 lit King'
  ];


  $erreur = "";
?>
   
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réservation</title>
    <link rel="stylesheet" href="../water.css">
</head>
<body>
    <nav>
        <a href="../index.php">Retour</a>
    </nav>              
    <h1>Formulaire de réservation</h1>

    <?php echo $erreur; ?>
    <?php
        if(isset($_POST['submit'])){

    if ((!isset($_POST['prenom'])) || (!isset($_POST['nom']))){
        $erreur = "Vous devez remplir les champs Prénom / Nom";
    }

    if ((!isset($_POST['adresse']))||(!isset($_POST['ville']))){
        $erreur = "Vous devez remplir les champs adresse / ville";
    }

    if ((!isset($_POST['province'])) || (!isset($provinces[$_POST['province']]))){
        $erreur = "Vous devez choisir une province";
    }

    if (!isset($_POST['codePostal'])){
        $erreur = "Vous devez ajouter un code postal";
    }

    if (!isset($_POST['telephone'])){
        $erreur = "Vous devez ajouter un code postal";
    }

    if ((!isset($_POST['courriel']))||(!filter_var($_POST['courriel'], FILTER_VALIDATE_EMAIL))){
        $erreur = "Vous devez ajouter un courriel ou votre courriel n'est pas valide";
    }

    if (!isset($_POST['typeChambre'])){
        $erreur = "Vous devez choisir un type de chambre";
    }
    else{
        if (!in_array($_POST['typeChambre'], $type_chambre_tableau)) {
            $erreur = "Type de chambre invalide.";
        }
    }

    if (!isset($_POST['adultes'])||!is_numeric($_POST['adultes'])){
        $erreur = "Vous devez ajouter un adulte";
    }
    
    if (!isset($_POST['enfants'])||!is_numeric($_POST['enfants'])){
        $erreur = "Vous devez ajouter un adulte";
    }

    if (!isset($_POST['dateArrivee'])){
        $erreur = "Vous devez ajouter une date";
    }

    if ((!isset($_POST['nombreNuits']))|| (!is_numeric($_POST['nombreNuits']))){
        $erreur = "Vous devez ajouter un nombre de nuit";
    }

    echo 'date d\'arrivée : '.htmlspecialchars($_POST['dateArrivee']).'<br>';
    echo 'nombre de nuits : '.htmlspecialchars($_POST['nombreNuits']).'<br>';
    echo 'type de chambre :  '.htmlspecialchars($_POST['typeChambre']).'<br>';
    echo 'nombre d\'adulte : '.htmlspecialchars($_POST['adultes']).'<br>';
    echo 'nombre d\'enfants : '.htmlspecialchars($_POST['enfants']).'<br>';

    }
else{
?>
    <form action="" method="POST">
        <fieldset class="groupe-champs-textes">
        <legend>Informations personnelles</legend>
    
        <label for="prenom-input">Prénom:</label>
        <input type="text" id="prenom-input" name="prenom" required />

        <label for="nom-input">Nom:</label>
        <input type="text" id="nom-input" name="nom" required />
    
        <label for="adresse-input">Adresse:</label>
        <input type="text" id="adresse-input" name="adresse" required />
    
        <label for="ville-input">Ville:</label>
        <input type="text" id="ville-input" name="ville" required />
    
        <label for="province-select">Province / Territoire:</label>
        <select id="province-select" name="province">
        <option value="">Sélectionner une province</option>
        <?php
            foreach ($provinces as $code => $nomProvince) {
            echo "<option value=\"$code\">$nomProvince</option>";
            }
        ?>
        </select>

        <label for="code-postal-input">Code postal:</label>
        <input type="text" id="code-postal-input" name="codePostal" required />

        <label for="telephone-input">Numéro de téléphone:</label>
        <input type="text" id="telephone-input" name="telephone" required />
    
        <label for="courriel-input">Adresse courriel:</label>
        <input type="text" id="courriel-input" name="courriel" required />
                                                                                                
        </fieldset>
        <fieldset>
        <legend>Type de chambre</legend>
        
        <input type="radio" id="type-chambre-1-input" name="typeChambre" value="1 lit double" required />
        <label for="type-chambre-1-input">1 lit double</label>

        <input type="radio" id="type-chambre-2-input" name="typeChambre" value="2 lits doubles" required />
        <label for="type-chambre-2-input">2 lits doubles</label>

        <input type="radio" id="type-chambre-3-input" name="typeChambre" value="1 lit Queen" required />
        <label for="type-chambre-3-input">1 lit Queen</label>

        <input type="radio" id="type-chambre-4-input" name="typeChambre" value="2 lits Queen" required />
        <label for="type-chambre-4-input">2 lits Queen</label>
        
        <input type="radio" id="type-chambre-5-input" name="typeChambre" value="1 lit King" required />
        <label for="type-chambre-5-input">1 lit King</label>            
        </fieldset>
        <fieldset class="groupe-champs-textes">
        <legend>Invités</legend>

        <label for="nombre-adultes-input">Nombre d'adultes: </label>
        <input type="number" id="nombre-adultes-input" name="adultes" value="0" />

        <label for="nombre-enfants-input">Nombre d'enfants: </label>
        <input type="number" id="nombre-enfants-input" name="enfants" value="0" />
        </fieldset>
        <fieldset class="groupe-champs-textes">
        <legend>Dates</legend>

        <label for="date-arrivee-input">Date d'arrivée (JJ/MM/AAAA): </label>
        <input type="text" id="date-arrivee-input" name="dateArrivee" required />

        <label for="nombre-nuits-input">Nombre de nuits: </label>
        <input type="number" id="nombre-nuits-input" name="nombreNuits" value="1" />
        </fieldset>          

        <fieldset class="groupe-reserver">
        <input type="submit" name="submit" value="Réserver" />
        </fieldset>
    </form>

    <?php
  }
  ?>

    </body>
</html>

