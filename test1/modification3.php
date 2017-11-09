<?php
  //connection au serveur
  $cnx = new PDO( "mysql:hosts=localhost;dbname=INFOS", "root", "beziers01" ) ;
  
  
 
  //récupération des valeurs des champs:
  //nom:
  $nom     = $_POST["nom"] ;
  //prenom:
  $prenom = $_POST["prenom"] ;
  //adresse:
  $adresse = $_POST["adresse"] ;
  //code postal:
  $cp        = $_POST["codePostal"] ;
  //numéro de téléphone:
  $tel        = $_POST["telephone"] ;
 
  //récupération de l'identifiant de la personne:
  $id         = $_POST["id"] ;
 
  //création de la requête SQL:
  $sql = "UPDATE personnes
            SET nom         = '$nom', 
	          prenom     = '$prenom',
		  adresse    = '$adresse',
		  cp           = '$cp',
		  telephone = '$tel'
           WHERE id = '$id' " ;
 
  //exécution de la requête SQL:
   $requete = $cnx->prepare($sql)->execute();
 $personnes = $cnx->query($sql)->fetchAll();
    
    foreach($personnes as $personne) {
         echo(
           "<div align=\"center\">"
           .$personne['nom']." ".$personne['prenom']
           ." <a href=\"modification2.php?idPersonne=".$personne['id']."\">modifier</a></div>\n"
       ) ;
    }
    
  //affichage des résultats, pour savoir si la modification a marchée:
  if($requete)
  {
    echo("La modification à été correctement effectuée") ;
  }
  else
  {
    echo("La modification à échouée") ;
  }
?>