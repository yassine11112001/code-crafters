<?php
	class reservation{
		private int $id;
		private string $nom;
		private string $etat;
		
		private string $date;
        private string $nbp;

		private int $id_event;
		
		
		
		function __construct($id, $nom,$etat, $date,$nbp,$id_event){
			$this->id=$id;
			$this->nom=$nom;
			$this->etat=$etat;
			$this->date=$date;
			$this->nbp=$nbp;
			$this->$id_event = $id_event;
		}
		function getid(){
			return $this->id;
		}
		function getnom(){
			return $this->nom;
		}
		function getetat(){
			return $this->etat;
		}
		function getdate(){
			return $this->date;
		
    }
    function getnbp(){
        return $this->nbp;
    }

	function getIdEvent(){
		return $this->id_event;
	}
		
		function setid(string $id){
			$this->id=$id;
		}
		function setnom(string $nom){
			$this->nom=$nom;
		}
		function setetat(string $etat){
			$this->etat=$etat;
		}
		function setdate(string $date){
			$this->date=$date;
		}
        function setnbp(string $nbp){
			$this->nbp=$nbp;
		}

		function setIdEvent(int $id_event){
			$this->id_event = $id_event;
		}
		
	}


?>