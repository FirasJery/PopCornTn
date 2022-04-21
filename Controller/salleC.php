<?php

    require_once '../../config.php';
    require_once '../../model/salle.php';


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
                (Nom,Adresse,capacite)
                VALUES
                (:Nom,:Adresse,:capacite)
                ');
                $querry->execute([
                    'Nom'=>$salle->getNom(),
                    'Adresse'=>$salle->getAdresse(),
                    'capacite'=>$salle->getcap()
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
                Nom=:Nom,Adresse=:Adresse,capacite=:capacite

                where id=:id
                ');
                $querry->execute([
                    'id'=>$salle->getid(),
                    'Nom'=>$salle->getNom(),
                    'Adresse'=>$salle->getAdresse(),
                    'capacite'=>$salle->getcap()

                  
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
    }
