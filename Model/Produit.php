<?php
	class Produit{
	
		private $id;
		private $nom;
        private $description;
		private $prix;
		public function __construct( $id, $nom, $description, $prix){
	
	
			$this->id=$id;
			$this->nom=$nom;
            $this->description=$description;
			$this->prix=$prix;
     
		}
		public function getid(){
			return $this->id;
		}
		public function getnom(){
			return $this->nom;
		}
		
        public function getdescription(){
			return $this->description;
		}

		
		public function getprix(){
			return $this->prix;
		}

		
		function setid($id){
			$this->id=$id;
		}
		function setnom($nom){
			$this->nom=$nom;
		}
        function setdescription($description){
			$this->description=$description;
		}
		
		
		function setprix( $prix){
			$this->prix=$prix;
		}
       
		
	}


?>