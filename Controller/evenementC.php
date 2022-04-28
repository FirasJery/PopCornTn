<?php

    require_once '../../config.php';
    require_once '../../model/evenement.php';


    Class evenementC {

        function afficherevenement()
        {
            $requete = "select * from evenement INNER JOIN sponsor ON evenement.id = sponsor.id_event";
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

        function searchevenement($search)
        {
            $requete = "select * from evenement INNER JOIN sponsor ON evenement.id = sponsor.id_event WHERE evenement.titre LIKE '%$search%'";
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




        function getevenementbyID($id)
        {
            $requete = "select * from evenement where id=:id";
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

        function ajouterevenement($evenement)
        {
            $config = config::getConnexion();
            try {
                $querry = $config->prepare('
                INSERT INTO evenement
                (titre,description,img,auteur,prix)
                VALUES
                (:titre,:description,:img,:auteur,:prix)
                ');
                $querry->execute([
                    'titre'=>$evenement->gettitre(),
                    'description'=>$evenement->getdescription(),
                    'img'=>$evenement->getimg(),
                    'auteur'=>$evenement->getauteur(),
                    'prix'=>$evenement->getPrix()
                ]);
                $evenement->setid($config->lastInsertId());
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }
        function modifierevenement($evenement)
        {
            $config = config::getConnexion();
            try {
                $querry = $config->prepare('
                UPDATE evenement SET
                titre=:titre,description=:description,img=:img,auteur=:auteur,prix=:prix

                where id=:id
                ');
                $querry->execute([
                    'id'=>$evenement->getid(),
                    'titre'=>$evenement->gettitre(),
                    'description'=>$evenement->getdescription(),
                    'auteur'=>$evenement->getauteur(),
                    'img'=>$evenement->getimg(),
                    'prix'=>$evenement->getPrix()

                  
                ]);
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }



        function supprimerevenement($id)
        {
            $sql="DELETE FROM evenement WHERE id= :id_user";
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
    }
