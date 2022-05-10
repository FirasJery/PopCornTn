<?php
    class film
    {
        private $id;
        public $titre;
        public $description;
		private $img;
		private $auteur;
		private $date_ajout;
		private $prix;
		private $vente;
		private $categorie;

    

        function __construct($id, $titre, $description, $img, $auteur, $prix, $vente, $categorie){
			$this->id=$id;
			$this->titre=$titre;
			$this->description=$description;
			$this->img=$img;
			$this->auteur =$auteur;
			$this->prix = $prix;
			$this->vente = $vente;
			$this->categorie = $categorie;
		}

        function setid(string $id){
			$this->id=$id;
		}
        function settitre(string $titre){
			$this->titre=$titre;
		}
        function setdescription(string $description){
			$this->description=$description;
        }

        function getid(){
			return $this->id;
		}
        function gettitre(){
			return $this->titre;
		}
        function getdescription(){
			return $this->description;
		}
		function getimg(){
			return $this->img;
		}
		function getauteur(){
			return $this->auteur;
		}
		function getdate_ajout(){
			return $this->date_ajout;
		}
		function get_vente(){
			return $this->vente;
		}
		function get_categ(){
			return $this->categorie;
		}

        

		/**
		 * Get the value of prix
		 */ 
		public function getPrix()
		{
				return $this->prix;
		}

		/**
		 * Set the value of prix
		 *
		 * @return  self
		 */ 
		public function setPrix($prix)
		{
				$this->prix = $prix;

				return $this;
		}
    }
    

?>