<?php
    $host = 'localhost';
    $dbname = 'stellar';
    $user = 'postgres'; // nom d'utilisateur PostgreSQL
    $password = 'postgres'; // mot de passe de l'utilisateur PostgreSQL
    $options = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // afficher les erreurs uniquement
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // mode de récupération par défaut des données
    );

    try {
        $db = new PDO('pgsql:host='.$host.';dbname='.$dbname, $user, $password, $options);
        $db->exec("SET NAMES 'utf8'");
    } catch (PDOException $e) {
        die('Erreur : ' . $e->getMessage());
    }

    $req = $db->prepare('SELECT * FROM etoile WHERE proper IS NOT NULL');
    $req->execute();
    $result = $req->fetchAll(\PDO::FETCH_ASSOC);
    $req->closeCursor();
 ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>

        <link rel="stylesheet" href="./style.css">
    </head>
    <body>
        
    <div id="container">
        <h1>Stars</h1>
        <div class="table-sortable">
            Loading ...
            <?php if($result): ?>
            <pre><?php var_dump($result) ?></pre>
            <?php endif; ?>
        </div>
    </div>

    <script>
        const stars = <?php echo json_encode($result); ?>;
        console.log(stars);
    </script>
    <script src="jquery.min.js"></script>
    <script src="table-sortable.js"></script>
    <script src="main.js"></script>
    </body>
</html>