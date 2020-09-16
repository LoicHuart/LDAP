<?php

class User
{
	private $_id;
	private $_uid;
	private $_cn;
	private $_givenName;
	private $_sn;
	private $_nom;
	private $_prenom;
	private $_mail;
	private $_tel;
	private $_mdp;
	private $_valide;
	private $_groupe;

	function __construct($id,$nom,$prenom,$mail,$tel,$mdp, $uid,$cn,$sn,$givenName,$groupe)
	{
		$this->setId($id);
		$this->setNom($nom);
		$this->setPrenom($prenom);

		$this->setMail($mail);
		$this->setMdp($mdp);
		$this->setTel($tel);

		$this->setUid($uid);
		$this->setCn($cn);
		$this->setGivenName($givenName);
		$this->setSn($sn);
		$this->setGroupe($groupe);
	}

	public function getId(){return $this->_id;}
	public function getUid(){return $this->_uid;}
	public function getCn(){return $this->_cn;}
	public function getGivenName(){return $this->_givenName;}
	public function getSn(){return $this->_sn;}
	public function getNom(){return $this->_nom;}
	public function getPrenom(){return $this->_prenom;}
	public function getMail(){return $this->_mail;}
	public function getTel(){return $this->_tel;}
	public function getMdp(){return $this->_mdp;}
	public function getGroupe(){return $this->_groupe;}

	public function setId($id)
	{
		$this->_id = $id;
	}
	public function setUid($uid)
	{	
		if($uid!=""){
			$this->_uid = $uid;
		}
		else{
			$this->_uid = date('y') . strtolower($this->getNom());
		}
	}
	public function setCn($cn)
	{
		if($cn!=""){
			$this->_cn = $cn;
		}
		else{
			$this->_cn = $this->getPrenom() . $this->getNom();
		}
	}
	public function setGivenName($givenName)
	{
		if($givenName!=""){
			$this->_givenName = $givenName;
		}
		else{
			$this->_givenName = $this->getPrenom();
		}
	}
	public function setSn($sn)
	{
		if($sn!=""){
			$this->_sn = $sn;
		}
		else{
			$this->_sn = $this->getNom();
		}
	}
	public function setNom($Nom)
	{
		$this->_nom = strtoupper($Nom);
	}
	public function setPrenom($prenom)
	{
		$this->_prenom = ucfirst(strtolower($prenom));
	}
	public function setMail($mail)
	{
		$this->_mail = $mail;
	}
	public function setTel($tel)
	{
		$this->_tel = $tel;
	}
	public function setMdp($mdp)
	{
		$mdp=sha1($mdp);
		$this->_mdp = $mdp;
	}
	public function setGroupe($groupe)
	{
		$this->_groupe = $groupe;
	}
}
?>