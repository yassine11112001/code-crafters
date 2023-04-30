<?php
	class Ligne_commande{
	
		private $id_comm ;
		private $id_produit ;
        private $prix;
		private $quantite;
        private $total;
		public function __construct( $id_comm, $id_produit, $prix, $quantite, $total){
	
	
			$this->id_comm=$id_comm;
			$this->id_produit=$id_produit;
            $this->prix=$prix;
			$this->quantite=$quantite;
            $this->total=$total;
     
		}
		public function getid_comm(){
			return $this->id_comm;
		}
		public function getid_produit(){
			return $this->id_produit;
		}
		
        public function getprix(){
			return $this->prix;
		}

		
		public function getquantite(){
			return $this->quantite;
		}
        public function gettotal(){
			return $this->total;
		}

		
		function setid_comm($id_comm){
			$this->id_comm=$id_comm;
		}
		function setid_produit($id_produit){
			$this->id_produit=$id_produit;
		}
        function setprix($prix){
			$this->prix=$prix;
		}
		
		
		function setquantite( $quantite){
			$this->quantite=$quantite;
		}

        	
		function settotal( $total){
			$this->total=$total;
		}
       
		
	}


?>