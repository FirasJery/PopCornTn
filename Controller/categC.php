<?php
    require_once '../../config.php';
    require_once '../../model/categ.php';

    class categC{
        function afficherCateg()
        {
            $requete = "select * from categories";
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

        function getcategbyCateg($string)
        {
            $requete = "select * from categories where categorie=:string";
            $config = config::getConnexion();
            try {
                $querry = $config->prepare($requete);
                $querry->execute(
                    [
                        'string'=>$string
                    ]
                );
                $result = $querry->fetch();
                return $result ;
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }

        function augmenterFilms($string){
            $requete = "update categories set nb_films = nb_films + 1 where categorie=:string";
            $config = config::getConnexion();
            try {
                $querry = $config->prepare($requete);
                $querry->execute(['string'=>$string]);
            }
            catch (PDOException $th) {
                $th->getMessage();
           }
        }

        function diminuerFilms($string){
            $requete = "update categories set nb_films = nb_films - 1 where categorie=:string";
            $config = config::getConnexion();
            try {
                $querry = $config->prepare($requete);
                $querry->execute(['string'=>$string]);
            }
            catch (PDOException $th) {
                $th->getMessage();
           }
        }

        function augmenterVente($string){
            $requete = "update categories set nb_ventes = nb_ventes + 1 where categorie=:string";
            $config = config::getConnexion();
            try {
                $querry = $config->prepare($requete);
                $querry->execute(['string'=>$string]);
            }
            catch (PDOException $th) {
                $th->getMessage();
           }
        }

        function diminuerVente($string){
            $requete = "update categories set nb_ventes = nb_ventes - 1 where categorie=:string";
            $config = config::getConnexion();
            try {
                $querry = $config->prepare($requete);
                $querry->execute(['string'=>$string]);
            }
            catch (PDOException $th) {
                $th->getMessage();
           }
        }
    }
?>