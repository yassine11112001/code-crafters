<?php
	class Commande{
        private $id;
		private $total;
		private $date;
        private $id_user ;
	
		public function __construct( $id, $total, $date, $id_user){
	
	
			$this->id=$id;
			$this->total=$total;
            $this->date=$date;
			$this->id_user=$id_user;
     
		}
		public function getid(){
			return $this->id;
		}
		public function gettotal(){
			return $this->total;
		}
		
        public function getdate(){
			return $this->date;
		}

		
		public function getid_user(){
			return $this->id_user;
		}

		
		function setid($id){
			$this->id=$id;
		}
		function settotal($total){
			$this->total=$total;
		}
        function setid_user($id_user){
			$this->id_user=$id_user;
		}
		
		
		function setdate( $date){
			$this->date=$date;
		}
       
		
	}


?>