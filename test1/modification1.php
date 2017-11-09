<html>
  <head>
    <title>modification de données en PHP :: partie 1</title>
  </head>
<body>
  <?php
    //connection au serveur:
    $cnx = new PDO( "mysql:hosts=localhost;dbname=tuto", "root", "root" ) ;

    //sélection de la base de données:


    //requête SQL:
    $sql = "SELECT *
	      FROM personnes
	      ORDER BY nom" ;

    //exécution de la requête:
    $requete = $cnx->prepare($sql)->execute();


    //affichage des données:
    $personnes = $cnx->query($sql)->fetchAll();

    foreach($personnes as $personne) {
         echo(
           "<div align=\"center\">"
           .$personne['nom']." ".$personne['prenom']
           ." <a href=\"modification2.php?idPersonne=".$personne['id']."\">modifier</a></div>\n"
       ) ;
    }

  ?>
</body>
</html>
