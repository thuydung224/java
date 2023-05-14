       <?php
            function connectgestion_kiosque(){
                    $host = "localhost"; // ou sql.hebergeur.com
                    $user = "root"; // ou login
                    $password = "root"; // ou xxxxxx
                    $dbname = "gestion_kiosque";
                    $port = '3308';
                    try {
                        $bdd = new PDO('mysql:host = ' . $host . ';dbname=' . $dbname .
                        ';charset=utf8' . ';port=' . $port, $user, $password);
                        // echo ("connexion BD gestion_kiosque OK <br/>") ;
                        return $bdd;
                    }
                    catch (Exception $e) {
                        die('Erreur : '.$e->getMessage());
                    }
                    }
            // echo ("Connexion BD gestion_kiosque") ;
            $bdd = connectgestion_kiosque();
        ?>