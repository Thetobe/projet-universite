<?php 

class myClassBandeau 
{
function ajouterBandeau($titreBandeau, $descriptionBandeau, $imageBandeau)
{

$objectErreur = new myClassErreur();
$titreBandeau = mysql_real_escape_string ($titreBandeau);
$descriptionBandeau = mysql_real_escape_string ($descriptionBandeau);
$imageBandeau = mysql_real_escape_string ($imageBandeau);
$idAuteur = $_SESSION["ID_USER"];



$requete = mysql_query("INSERT INTO bandeau (titre_bandeau, description_bandeau, image_bandeau, auteur_bandeau) VALUES ('$titreBandeau','$descriptionBandeau', '$imageBandeau', '$idAuteur')") or die(mysql_error());
if($requete )$objectErreur->initialiserErreur("Enregistrement avec succ�" , 1);
else $objectErreur->initialiserErreur("Erreur d'enregistrement a la base de donn�es" , 0);
}


function supprimerBandeau( $idBandeau ) 
{	
	
	$objectErreur = new myClassErreur();
	$requteImage=  mysql_query("SELECT * FROM bandeau WHERE id_bandeau='$idBandeau'") or die(mysql_error());
	$getImage=mysql_fetch_assoc($requteImage);
	$image=$getImage['image_bandeau'];
	$requeteBandeau = mysql_query("DELETE FROM bandeau WHERE id_bandeau='$idBandeau'") or die(mysql_error());
	$lienImage = "../uploadBandeau/".$image; //nom de ton fichier ici.
    unlink($lienImage);
	
	
				if ($requeteBandeau )
				{
					
					$objectErreur->initialiserErreur("Votre bandeau a �t� supprim� avec succ�s", 1);
				} else 
				{
					$objectErreur->initialiserErreur("Erreur de suppression de la base de donn�es", 0);
				}
}
}

 ?>