<html>
  <head>
    <title>suppression de données en PHP :: partie 1</title>
    <script language="javascript">
      function confirme( identifiant )
      {
        var confirmation = confirm( "Voulez vous vraiment supprimer cet enregistrement ?" ) ;
	if( confirmation )
	{
	  document.location.href = "suppression2.php?idPersonne="+identifiant ;
	}
      }
    </script>
  </head>
<body>
  <?php
    //connection au serveur:
     $cnx = new PDO( "mysql:hosts=localhost;dbname=INFOS", "root", "beziers01" ) ;
 
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
           ." <a href=\"suppression2.php?idPersonne=".$personne['id']."\">supprimer</a></div>\n"
       ) ;
      }
  ?>
</body>
</html>