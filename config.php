<?php
    class config {
        private static $pdo = NULL ;
        public static function getConnexion() {
            if (!isset(self::$pdo)) {
                try {
                      self::$pdo = new PDO("mysql:host=localhost; dbname=film", "root", "2013",
                        [
                            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                        ]
                        );
                echo "Connected Successfully" . PHP_EOL;
                }
                catch (Exception $e) {
                    die('Erreur:' .$e->getMessage()) ;
                }
            }
            return self::$pdo ;
        }
    }
?>
