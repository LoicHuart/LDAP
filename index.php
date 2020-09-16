<?php 

require 'M/User.php';
require 'M/manager.php';

$manager = new manager;
$manager->connectBDD();
$manager->recupDataBDD();
$user =$manager->dataToUser();
$manager->connectionLdap();
$manager->recupOuLdap();
$userLdap = $manager->dataLdapToUserLdap();

if (isset($_GET['router'])) {
	if($_GET['router'] == 'connection'){
		require 'C/connection.php';
	}
	if($_GET['router'] == 'liste'){
		$identifiant = 'root';
		$mdp = 'btssio';
		if(($_GET['identifiant'] == $identifiant) AND ($_GET['mdp'] == $mdp)){
		require 'C/liste.php';
		}
		else{
			require 'C/connection.php';
		} 
	}
	if($_GET['router'] == 'rgpd'){
		require 'C/rgpd.php';
	}
}
else{
	require 'C/formulaire.php';
}
?>





