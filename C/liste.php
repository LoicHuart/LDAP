<?php  
  require 'V/liste.php';


  if (isset($_POST['nouveauGroupe'])) {
    if (isset($_POST['groupeInput'])) {
      $groupeInput =$_POST['groupeInput'];
      $manager->ldapNouveauOu($groupeInput);
    }
  }

  if (isset($_POST['valide'])) {
    $groupe = $_POST['groupe'];
    $manager->valideListe($user,$groupe);
  }

  if (isset($_POST['supp'])) {
    $manager->suppListe($user,$userLdap);
  } 

  if (isset($_POST['suppGroupe'])) {
    $groupe = $_POST['groupe'];
    $manager->suppOu($groupe);
  }




?>