<?php
    class sponsor
    {
        private $id;
        public $nom_sponsor;
        public $id_event;


        function __construct($id, $nom_sponsor, $id_event){
			$this->id=$id;
            $this->nom_sponsor=$nom_sponsor;
            $this->id_event=$id_event;
		}

        function getNom_sponsor(){
            return $this->nom_sponsor;
        }

        function getId_event(){
            return $this->id_event;
        }

        function setid(int $id){
			$this->id=$id;
		}


        

    }
    

?>