<?php

    require_once '..\..\config.php';
    require_once '..\..\model\salle.php';


    Class salleC {

        function affichersalle()
        {
            $requete = "select * from salle";
            $config = config::getConnexion();
            try {
                $querry = $config->prepare($requete);
                $querry->execute();
                $result = $querry->fetchAll();
                return $result ;
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }
        function searchsalle($search)
        {
            $requete = "select * from salle  WHERE Nom LIKE '%$search%'";
            $config = config::getConnexion();
            try {
                $querry = $config->prepare($requete);
                $querry->execute();
                $result = $querry->fetchAll();
                return $result ;
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }



        function getsallebyID($id)
        {
            $requete = "select * from salle where id=:id";
            $config = config::getConnexion();
            try {
                $querry = $config->prepare($requete);
                $querry->execute(
                    [
                        'id'=>$id
                    ]
                );
                $result = $querry->fetch();
                return $result ;
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }

        function ajoutersalle($salle)
        {
            $config = config::getConnexion();
            try {
                $querry = $config->prepare('
                INSERT INTO salle
                (Nom,Adresse,capacite,Gouvernorat,frais,img)
                VALUES
                (:Nom,:Adresse,:capacite,:Gouvernorat,:frais,:img)
                ');
                $querry->execute([
                    'Nom'=>$salle->getNom(),
                    'Adresse'=>$salle->getAdresse(),
                    'capacite'=>$salle->getcap(),
                    'Gouvernorat'=>$salle->getGov(),
                    'frais'=>$salle->getfrais(),
                    'img'=>$salle->getimg()
                    
                    
                ]);
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }
        function modifiersalle($salle)
        {
            $config = config::getConnexion();
            try {
                $querry = $config->prepare('
                UPDATE salle SET
                Nom=:Nom,Adresse=:Adresse,capacite=:capacite,Gouvernorat=:Gouvernorat,frais=:frais,img=:img

                where id=:id
                ');
                $querry->execute([
                    'id'=>$salle->getid(),
                    'Nom'=>$salle->getNom(),
                    'Adresse'=>$salle->getAdresse(),
                    'capacite'=>$salle->getcap(),
                    'Gouvernorat'=>$salle->getGov(),
                    'frais'=>$salle->getfrais(),
                    'img'=>$salle->getimg()
                   
                    

                  
                ]);
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }



        function supprimersalle($id)
        {
            $sql="DELETE FROM salle WHERE id= :id_user";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':id_user',$id);
			try{
				$req->execute();
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
        }
    
     function updatesalleWithLatLng() {
        $sql = "UPDATE salle SET lat = :lat, lng = :lng WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':lat', $this->lat);
        $stmt->bindParam(':lng', $this->lng);
        $stmt->bindParam(':id', $this->id);

        if($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
 function getsalleBlankLatLng() {
        $sql = "SELECT * FROM salle WHERE lat IS NULL AND lng IS NULL";
        $config = config::getConnexion();
        try {
            $querry = $config->prepare($sql);
            
            $result = $querry->fetch();
            return $result ;
        } catch (PDOException $th) {
             $th->getMessage();
        }
    }
function getAllsalle() {
        $sql = "SELECT * FROM salle";
        $config = config::getConnexion();
        try {
            $querry = $config->prepare($sql);
            
            $result = $querry->fetch();
            return $result ;
        } catch (PDOException $th) {
             $th->getMessage();
        }
    }
}