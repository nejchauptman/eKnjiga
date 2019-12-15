<?php

    //PDO DATABASE razred
    //Povezava do baze

    class Database{
        private $host = DB_HOST;
        private $user = DB_USER;
        private $pass = DB_PASS;
        private $dbname = DB_NAME;

        private $dbh;
        private $stmt;
        private $error;

        public function __construct(){
            //nastavimo DSN
            $dsn = 'mysql:host='.$this->host .';dbname='.$this->dbname;
            $options = array(
                //preverimo, če je povezava že vzpostavljena z DB
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            );

            try{
                $this ->dbh = new PDO($dsn, $this->user, $this->pass, $options);

            } catch(PDOException $e){
                //nastavimo error message na spremenljivko
                $this->error = $e->getMessage();
                echo $this->error;
            }
        }

        //pripravimo query
        public function query($sql){
            //pripravljen query pošljemo v bazo, ker uporabljamo pa razred potrebujemo dbh = database handler
            $this->stmt = $this->dbh->prepare($sql);
        }

        //bindamo
        //naredimo query, bindamo vrednosti, izvedemo
        public function bind($param, $value, $type = null){
            if(is_null($type)){
                switch(true){
                    case is_int($value):
                        $type = PDO::PARAM_INT;
                        break;
                    case is_bool($value):
                        $type = PDO::PARAM_BOOL;
                        break;
                    case is_null($value):
                        $type = PDO::PARAM_NULL;
                        break;
                    default:
                        $type = PDO::PARAM_STR;
                }
            }
            $this ->stmt->bindValue($param,$value, $type);
        }

        //executamo stmt
        public function execute(){
            return $this->stmt->execute();
        }

        //GET rezultate (vse) kot array objektov
        public function resultSet(){
            $this->execute();
            return $this->stmt->fetchAll(PDO::FETCH_OBJ);
        }

        //GET 1 rezultat
        public function single(){
            $this->execute();
            return $this->stmt->fetch(PDO::FETCH_OBJ);
        }

        //GET število vrstic
        public function rowCount(){
            return $this->stmt->rowCount();
        }

    }