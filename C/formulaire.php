<?php  
  require 'V/formulaire.php';

  if (isset($_POST['validerForm'])) {
    $nom = strtoupper($_POST['nom']); 
    $prenom = ucfirst(strtolower($_POST['prenom'])); 
    $mail = $_POST['mail'];
    $mailConfirmation = $_POST['mailConfirmation'];
    $tel = $_POST['tel']; 
    $mdp = $_POST['mdp'];
    $mdpConfirmation = $_POST['mdpConfirmation'];

    if ($mail==$mailConfirmation) 
    {
      if ($mdp==$mdpConfirmation) 
      {

        $user = new User(NULL,$nom,$prenom,$mail,$tel,$mdp,"","","","","");
        $manager->envoiDataBDD('liste',$user->getUid(),$user->getCn(),$user->getGivenName(),$user->getSn(),$user->getNom(),$user->getPrenom(),$user->getMail(),$user->getTel(),$user->getMdp());
      }
      else{
        echo "<script>alert(\"Mot de passe non identique\")</script>";
      }
    }
    else{
      echo "<script>alert(\"mail non identique\")</script>";
    }   
  }
?>