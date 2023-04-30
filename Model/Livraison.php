<?php
	class Livraison{
	
		private $id ;
		private $description ;
        private $adresse;
		private $id_commande ;
        private $date;
		public function __construct( $id, $description, $adresse, $id_commande , $date ){
	
	
			$this->id=$id;
			$this->description=$description;
            $this->adresse=$adresse;
			$this->id_commande=$id_commande;
            $this->date=$date;
     
		}
		public function getid(){
			return $this->id;
		}
		public function getdescription(){
			return $this->description;
		}
		
        public function getadresse(){
			return $this->adresse;
		}

		
		public function getid_commande(){
			return $this->id_commande;
		}
        public function getdate(){
			return $this->date;
		}

		
		function setid($id){
			$this->id=$id;
		}
		function setdescription($description){
			$this->description=$description;
		}
        function setadresse($adresse){
			$this->adresse=$adresse;
		}
		
		
		function setdate( $date){
			$this->date=$date;
		}

        function setid_commande( $id_commande){
			$this->id_commande=$id_commande;
		}
       
		
	}


?>