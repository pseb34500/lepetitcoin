<html>
  <head>
    <title>modification de données en PHP :: partie2</title>
  </head>
<body>
  <?php
  //connection au serveur:
  $cnx = new PDO( "mysql:hosts=localhost;dbname=INFOS", "root", "beziers01" ) ;
 
  //récupération de la variable d'URL,
  //qui va nous permettre de savoir quel enregistrement modifier
  $id  = $_GET["idPersonne"] ;
 
  //requête SQL:
  $sql = "SELECT *
            FROM personnes
	    WHERE id = ".$id ;
 
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
<form name="insertion" action="modification3.php" method="POST">
  <input type="hidden" name="id" value="<?php echo($id) ;?>">
  <table border="0" align="center" cellspacing="2" cellpadding="2">
    <tr align="center">
      <td>nom</td>
      <td><input type="text" name="nom" value="<?php echo($result->nom) ;?>"></td>
    </tr>
    <tr align="center">
      <td>prenom</td>
      <td><input type="text" name="prenom" value="<?php echo($result->prenom) ;?>"></td>
    </tr>
    <tr align="center">
      <td>adresse</td>
      <td><input type="text" name="adresse" value="<?php echo($result->adresse) ;?>"></td>
    </tr>
    <tr align="center">
      <td>code postal</td>
      <td><input type="text" name="codePostal" value="<?php echo($result->cp) ;?>"></td>
    </tr>
    <tr align="center">
      <td>numéro de téléphone</td>
      <td><input type="text" name="telephone" value="<?php echo($result->telephone) ;?>"></td>
    </tr>
    <tr align="center">
      <td colspan="2"><input type="submit" value="modifier"></td>
    </tr>
  </table>
</form>
   </body>
</html>