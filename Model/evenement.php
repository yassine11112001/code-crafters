<?php
	class evenement{
		private int $id;
		private string $nom;
		private string $data_depart;
		
		private string $description;
		
		
		
		function __construct($id, $nom,$data_depart, $description){
			$this->id=$id;
			$this->nom=$nom;
			$this->data_depart=$data_depart;
			$this->description=$description;
		}
		function getid(){
			return $this->id;
		}
		function getnom(){
			return $this->nom;
		}
		function getdata_depart(){
			return $this->data_depart;
		}
		function getdescription(){
			return $this->description;
		}
		
		function setid(string $id){
			$this->id=$id;
		}
		function setnom(string $nom){
			$this->nom=$nom;
		}
		function setdata_depart(string $data_depart){
			$this->data_depart=$data_depart;
		}
		function setdescription(string $description){
			$this->description=$description;
		}
		
	}


?>