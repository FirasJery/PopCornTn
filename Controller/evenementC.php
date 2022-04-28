<?php

    require_once '../../config.php';
    require_once '../../model/evenement.php';


    Class filmC {

        function afficherevenement()
        {
            $requete = "select * from film";
            $config = config::getConnexion();
            try {
                $querry = $config->prepare($requete);
                $querry->execute();
                //$result = $querry->fetchAll(PDO::FETCH_COLUMN, 1);
                $result = $querry->fetchAll();
                return $result ;
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }




        function getevenementbyID($id)
        {
            $requete = "select * from film where id=:id";
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

        function getEventbyTitle($title){
            $req = "select * from film where titre = :title";
            $config = config::getConnexion();
            try{
                $query = $config->prepare($req);
                $query->execute(['title'=>$title]);
                $result = $query->fetch();
                return $result;
            } catch(PDOException $th){
                $th->getMessage();
            }
        }

        function ajouterevenement($film)
        {
            $config = config::getConnexion();
            try {
                $querry = $config->prepare('
                INSERT INTO film
                (titre,description,img,auteur,prix)
                VALUES
                (:titre,:description,:img,:auteur,:prix)
                ');
                $querry->execute([
                    'titre'=>$film->gettitre(),
                    'description'=>$film->getdescription(),
                    'img'=>$film->getimg(),
                    'auteur'=>$film->getauteur(),
                    'prix'=>$film->getPrix()
                ]);
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }
        function modifierevenement($film)
        {
            $config = config::getConnexion();
            try {
                $querry = $config->prepare('
                UPDATE film SET
                titre=:titre,description=:description,img=:img,auteur=:auteur,prix=:prix
                where id=:id');
                
                $querry->execute([
                    'id'=>$film->getid(),
                    'titre'=>$film->gettitre(),
                    'description'=>$film->getdescription(),
                    'auteur'=>$film->getauteur(),
                    'img'=>$film->getimg(),
                    'prix'=>$film->getPrix()

                  
                ]);
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }



        function supprimerevenement($id)
        {
            $sql="DELETE FROM film WHERE id= :id_user";
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
