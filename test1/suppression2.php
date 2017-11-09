<?php
  //connection au serveur:
  $cnx = new PDO( "mysql:hosts=localhost;dbname=INFOS", "root", "beziers01" ) ;
  
 
  //récupération de la variable d'URL,
  //qui va nous permettre de savoir quel enregistrement supprimer:
  $id  = $_GET["idPersonne"] ;
 
  //requête SQL:
  $sql = "DELETE 
            FROM personnes
	    WHERE id = ".$id ;
  	    
  //exécution de la requête:
   $requete = $cnx->prepare($sql)->execute();
 
  //affichage des résultats, pour savoir si la suppression a marchée:
  if($requete)
  {
    echo("La suppression à été correctement effectuée") ;
  }
  else
  {
    echo("La suppression à échouée") ;
  }
?>