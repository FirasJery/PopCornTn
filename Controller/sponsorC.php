<?php

    require_once '../../config.php';
    require_once '../../model/sponsor.php';


    Class sponsorC {

        function affichersponsor()
        {
            $requete = "select * from sponsor";
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




        function getsponsorbyID($id)
        {
            $requete = "select * from sponsor where id=:id";
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

        function ajoutersponsor($sponsor)
        {
            $config = config::getConnexion();
            try {
                $querry = $config->prepare('
                INSERT INTO sponsor
                (nom_sponsor,id_event)
                VALUES
                (:nom_sponsor,:id_event)
                ');
                $querry->execute([
                    'nom_sponsor'=>$sponsor->getNom_sponsor(),
                    'id_event'=>$sponsor->getId_event()
                ]);
                $sponsor->setid($config->lastInsertId());
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }
        function modifiersponsor($sponsor)
        {
            $config = config::getConnexion();
            try {
                $querry = $config->prepare('
                UPDATE sponsor SET
                titre=:titre,description=:description,img=:img,auteur=:auteur,prix=:prix

                where id=:id
                ');
                $querry->execute([
                    'id'=>$sponsor->getid(),
                    'titre'=>$sponsor->gettitre(),
                    'description'=>$sponsor->getdescription(),
                    'auteur'=>$sponsor->getauteur(),
                    'img'=>$sponsor->getimg(),
                    'prix'=>$sponsor->getPrix()

                  
                ]);
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }



        function supprimersponsor($id)
        {
            $sql="DELETE FROM sponsor WHERE id= :id_user";
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
