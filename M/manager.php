<?php

class manager
{
	private $_BDD;
	private $_donnees;

	private $_ldap;
	private $_ldapBind;
	private $_ouLdap;

	public function getBDD(){return $this->_BDD;}
	public function getDonnees(){return $this->_donnees;}
	public function getLdap(){return $this->_ldap;}
	public function getLdapBind(){return $this->_ldapBind;}
	public function getOuLdap(){return $this->_ouLdap;}
	
	public function setBDD($BDD)
	{
		$this->_BDD = $BDD;
	}
	public function setDonnees($donnees)
	{
		$this->_donnees = $donnees;
	}
	public function setLdap($ldap)
	{
		$this->_ldap = $ldap;
	}
	public function setLdapBind($ldapBind)
	{
		$this->_ldapBind = $ldapBind;
	}
	public function setOuLdap($ouLdap)
	{
		$this->_ouLdap = $ouLdap;
	}

	public function connectBDD()
	{
		try
		{
		$this->setBDD(new PDO('mysql:host=localhost;dbname=ldap','root',''));
		}
		catch(Exception $e)
		{
		die('Erreur : '.$e->getMessage());
		}
	}
	public function envoiDataBDD($nomTable,$uid,$cn,$givenName,$sn,$nom,$prenom,$mail,$tel,$mdp)
	{
		$this->getBDD()->exec("INSERT INTO $nomTable(uid,cn,givenName,sn,nom,prenom,mail,tel,mdp) VALUES('$uid','$cn','$givenName','$sn','$nom','$prenom','$mail','$tel','$mdp')");
	}
	public function recupDataBDD()
	{
		$this->setDonnees($this->getBDD()->query("SELECT * FROM liste"));
	}
	public function dataToUser()
	{
		$q = $this->getDonnees();
		while ($donnees = $q->fetch()) {
			$user[] = new User($donnees['id'],$donnees['nom'],$donnees['prenom'],$donnees['mail'],$donnees['tel'],$donnees['mdp'],"","","","","");
		}
		return $user;
	}
	public function valideListe($user,$groupe)
	{
		foreach ($user as $nb)
		{
			$name = 'name'.$nb->getId();

			if(isset($_POST[$name]))
			{
				$id = $nb->getId();
				$this->envoiLdap($user,$groupe,$id);
				$this->suppListe($user,$userLdap);
			}
	    }
	    header("Refresh: 0; url=index.php?router=liste&identifiant=".$_GET['identifiant']."&mdp=".$_GET['mdp']);
	}
	public function suppListe($user,$userLdap)
	{

		foreach ($user as $nb)
		{
			$name = 'name'.$nb->getId();

			if(isset($_POST[$name]))
			{
				$id = $nb->getId();
				$this->getBDD()->exec("DELETE FROM liste WHERE id = '$id'");
			}
	    }

		$ldap=$this->getLdap();
		$ldapbind = $this->getLdapBind();
	    foreach ($userLdap as $nb)
		{
			$name = "name".$nb->getUid().$nb->getGroupe();

			if(isset($_POST[$name]))
			{
				$Uid = $nb->getUid();
				$ou = $nb->getGroupe();
				$info= "uid=".$Uid.",ou=".$ou.",ou=STUDENTS,dc=ldap,dc=egnom,dc=pro";
				
				ldap_delete($ldap, $info);

/* marche pas 

				$info3["member"] = "uid=".$Uid.",cn=".$ou.",ou=".$ou.",ou=STUDENTS,dc=ldap,dc=egnom,dc=pro";
				$ldapbind = ldap_mod_del($ldap, "cn=".$groupe.",ou=".$groupe.",ou=STUDENTS,dc=ldap,dc=egnom,dc=pro", $info3);

marche pas */			



			}
	    }
	    header("Refresh: 0; url=index.php?router=liste&identifiant=".$_GET['identifiant']."&mdp=".$_GET['mdp']);
	}
	
	public function connectionLdap(){
		$server = "localhost";

		$rootdn = "cn=admin,dc=ldap,dc=egnom,dc=pro";

		$rootpw = "btssio";

		$ldap=ldap_connect($server);
		ldap_set_option($ldap, LDAP_OPT_PROTOCOL_VERSION, 3);

		$ldapbind = ldap_bind($ldap, $rootdn, $rootpw);
		$this->setLdap($ldap);
		$this->setLdapBind($ldapbind);
	}


	public function envoiLdap($user,$groupe,$id)
	{
		foreach ($user as $nb)
		{	
			if ($nb->getId() == $id) 
			{
			   	$info["objectClass"][0] = "top";
			   	$info["objectClass"][1]= "person";
			   	$info["objectClass"][2] = "organizationalPerson";
			   	$info["objectClass"][3] = "inetOrgPerson";
			   	$info["cn"] = $nb->getCn();
			   	$info["sn"] = $nb->getSn();
			   	$info["givenName"] = ucfirst(strtolower($nb->getPrenom())); //marche pas avec getGivenName()
			   	$info["mail"] = $nb->getMail();
			   	if ($nb->getTel()!='') {
			   		$info["mobile"] = $nb->getTel();			
				}	
				$info["uid"] = $nb->getUid();
				$info["userPassword"] = "{SSHA}" . $nb->getMdp();
				
				$ldap=$this->getLdap();
				$ldapbind = $this->getLdapBind();
				
				$ldapbind= ldap_add($ldap, "uid=". $nb->getUid() .",ou=".$groupe.",ou=STUDENTS,dc=ldap,dc=egnom,dc=pro", $info);

				$info2["member"] = "uid=".$nb->getUid().",cn=".$groupe.",ou=".$groupe.",ou=STUDENTS,dc=ldap,dc=egnom,dc=pro";

				$ldapbind= ldap_mod_add($ldap,"cn=".$groupe.",ou=".$groupe.",ou=STUDENTS,dc=ldap,dc=egnom,dc=pro",$info2);

				$info3["member"] = "uid=admin,cn=".$groupe.",ou=".$groupe.",ou=STUDENTS,dc=ldap,dc=egnom,dc=pro";
				$ldapbind = ldap_mod_del($ldap, "cn=".$groupe.",ou=".$groupe.",ou=STUDENTS,dc=ldap,dc=egnom,dc=pro", $info3);
			}
		}
	}

	public function ldapNouveauOu($groupeInput){

		$ldap = $this->getLdap();
		$ldapBind = $this->getLdapBind();


		$info["objectClass"][0] = "top";
		$info["objectClass"][1] = "organizationalUnit";
		$info["ou"] = $groupeInput;

		$ldapBind = ldap_add($ldap, "ou=".$groupeInput.",ou=STUDENTS,dc=ldap,dc=egnom,dc=pro", $info);
		
		$info2["objectClass"][0] = "top";
		$info2["objectClass"][1] = "groupOfNames";
		$info2["cn"] = $groupeInput;
		$info2["member"] = "uid=admin,cn=".$groupeInput.",ou=".$groupeInput.",ou=STUDENTS,dc=ldap,dc=egnom,dc=pro";
		$ldapBind = ldap_add($ldap, "cn=".$groupeInput.",ou=".$groupeInput.",ou=STUDENTS,dc=ldap,dc=egnom,dc=pro", $info2);

	}

	public function recupOuLdap(){
		$ldapName = "ou=STUDENTS,dc=ldap,dc=egnom,dc=pro";
		$filter = "ou=*";
		$ldap= $this->getLdap();
		$read = ldap_search($ldap, $ldapName, $filter);

		$info = ldap_get_entries($ldap, $read);

		for ($i=0; $i < $info["count"]; $i++) {
			$ou[]=$info[$i]['ou'][0];
		}
		$this->setOuLdap($ou);
	}

	public function recupLdapData($ou){
		$ldap = $this->getLdap();

		$ldapName = "ou=".$ou.",ou=STUDENTS,dc=ldap,dc=egnom,dc=pro";
		$filter = "objectClass=inetOrgPerson";

		$read = ldap_search($ldap, $ldapName, $filter);
		$info = ldap_get_entries($ldap, $read);
        
        //var_dump($info);
        return $info;
	}

	public function dataLdapToUserLdap(){
		$listeOu = $this->getOuLdap();

		foreach ($listeOu as $ou) {

			$info =$this->recupLdapData($ou);
			
			for ($j=0; $j < $info["count"]; $j++) {
			    $uid= $info[$j]['uid'][0];
			    $cn= $info[$j]['cn'][0];
			    $sn= $info[$j]['sn'][0];
			    $givenName= $info[$j]['givenname'][0];
			    $mail= $info[$j]['mail'][0];
			    $mobile= $info[$j]['mobile'][0];
			    $mdp= $info[$j]['userpassword'][0];
				$userLdap[] = new User("","","",$mail,$mobile,$mdp, $uid,$cn,$sn,$givenName,$ou);	
			}
		} 
		return $userLdap;
	}
/*marche pas
	public function suppOu($groupe){
		$ldap = $this->getLdap();
		ldap_delete ($ldap, "ou=sio3,ou=STUDENTS,dc=ldap,dc=egnom,dc=pro");
	}
marche pas*/

}



?>