<?php
    class salle
    {
        private $id;
        public $Nom;
        public $Adresse;
		private $capacite;
		private $Gouvernorat;
		private $frais;
		private $img;
		
		

    

        function __construct($id, $Nom, $Adresse,$capacite,$Gouvernorat,$frais,$img){
			$this->id=$id;
			$this->Nom=$Nom;
			$this->Adresse=$Adresse;
			$this->capacite = $capacite;
			$this->Gouvernorat=$Gouvernorat;
			$this->frais=$frais;
			$this->img=$img;
		
			
		}

        function setid(string $id){
			$this->id=$id;
		}
        function setNom(string $Nom){
			$this->Nom=$Nom;
		}
        function setAdresse(string $Adresse){
			$this->Adresse=$Adresse;
        }
		function setcap(string $capacite){
			$this->capacite=$capacite;
        }
		function setGov(){
			$this->Gouvernorat=$Gouvernorat;
		}
		function setfrais() {
			$this->frais=$frais;
		}
		function setimg() {
			$this->img=$img;
		}

        function getid(){
			return $this->id;
		}
		function getGov(){
			return $this->Gouvernorat;
		}
        function getNom(){
			return $this->Nom;
		}
        function getAdresse(){
			return $this->Adresse;
		}
		function getimg(){
			return $this->img;
		}
		function getfrais(){
			return $this->frais;
		}
		
	 


    
		function getcap()
		{
				return $this->capacite;
		}

		
    }
	function setLat($lat) { $this->lat = $lat; }
		function getLat() { return $this->lat; }
		function setLng($lng) { $this->lng = $lng; }
		function getLng() { return $this->lng; }

    

?>