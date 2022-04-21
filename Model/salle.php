<?php
    class salle
    {
        private $id;
        public $Nom;
        public $Adresse;
		private $capacite;

    

        function __construct($id, $Nom, $Adresse,$capacite){
			$this->id=$id;
			$this->Nom=$Nom;
			$this->Adresse=$Adresse;
			$this->capacite = $capacite;
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

        function getid(){
			return $this->id;
		}
        function getNom(){
			return $this->Nom;
		}
        function getAdresse(){
			return $this->Adresse;
		}
	


    
		function getcap()
		{
				return $this->capacite;
		}

		
    }
    

?>