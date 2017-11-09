<?php
try {
  //connection au serveur
  $cnx = new PDO( "mysql:hosts=localhost;dbname=tuto", "root", "root" ) ;

  //sélection de la base de données:

  //récupération des valeurs des champs:
  //nom:
  $nom     = $_POST["nom"] ;
  //prenom:
  $prenom = $_POST["prenom"] ;

  $motdepasse = $_POST["mdp"];

  $inscritdepuis = $_POST["inscritd"];

  //adresse:
  $adresse = $_POST["adresse"] ;

  $ville = $_POST["ville"];
  //code postal:
  $cp        = $_POST["codePostal"] ;
  //numéro de téléphone:
  $tel       = $_POST["telephone"] ;

  $mobile = $_POST["mobile"];

  //création de la requête SQL:
  $sql = "INSERT  INTO personnes (nom, prenom,mdp, inscritd, adresse, ville, cp, telephone, mobile)
            VALUES ( '$nom', '$prenom','$motdepasse', '$inscritdepuis', '$adresse', '$ville', '$cp', '$tel', '$mobile' ) " ;
    //exécution de la requête SQL:

  $requete = $cnx->prepare($sql)->execute();

    //affichage des résultats, pour savoir si l'insertion a marchée:
    if($requete)
    {
      echo("L'insertion a été correctement effectuée") ;
    }
    else
    {
      echo("L'insertion à échouée") ;
    }

  } catch (Exception $ex) {
      echo $ex->getMessage();
  }

?>
