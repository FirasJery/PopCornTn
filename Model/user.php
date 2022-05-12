<?php
    class User
    {
		public $id;
        public $nom;
        public $prenom;
        public $sexe;
		public $email;
		public $login;
		public$date_n;
		public $password;

    

        function __construct($nom, $prenom, $sexe, $email , $login,$date_n,$password){
			$this->nom=$nom;
			$this->prenom=$prenom;
			$this->sexe=$sexe;
			$this->email=$email;
			$this->login =$login;
			$this->date_n= $date_n;
			$this->password=$password;
		}
	}
   
?>