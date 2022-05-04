<?php
    class categ{
        private $categorie;
        private $vente;
        private $nbFilms;

        function __construct($categ, $vente, $nb){
			$this->categorie = $categ;
            $this->vente = $vente;
            $this->nbFilms = $nb;
		}

        function getCateg(){
			return $this->categorie;
		}

        function getVente(){
			return $this->vente;
		}

        function getNb(){
			return $this->nbFilms;
		}
    }
?>