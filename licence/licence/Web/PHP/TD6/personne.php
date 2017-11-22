<?php
	class Personne{
		//attributs
		private $id;
		private $nom;
		private $prenom;

		//constructeur
		public function __construct($id=NULL, $nom=NULL, $prenom=NULL){
			if($id != NULL && $nom != NULL && $prenom != NULL)
				$this->id=$id;
				$this->nom=$nom;
				$this->prenom=$prenom;
		}

		//getter
		public function getId($i){
			return $this->id;
		}
		public function getNom($n){
			return $this->nom;
		}
		public function getPrenom($p){
			return $this->prenom;
		}

		//setter
		public function setNom($n){
			$this->nom=$n;
		}
		public function setPrenom($p){
			$this->prenom=$p;
		}

		public function afficher(){
			return $this->nom." ".$this->prenom;
		}
	}

?>