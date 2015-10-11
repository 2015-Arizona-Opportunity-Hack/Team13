<?php

    namespace Lib;

    require_once("Config.php");
    use PDO;

    class Database {
        //Database Handle
        private $dbh;
        //Statement Handle
        private $sth;
        private static $instance;
        
        private function __construct() {
            try {
                $this->dbh = new PDO(DATABASE.":host=".DB_SERVER.";dbname=".DB_NAME, DB_USER, DB_PASS);
                $this->dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
                Eloquent::getInstance();
            }
            catch (PDOException $e) {
                echo $e->getMessage();
            }
        }

        public static function getInstance() {
            if (!isset(self::$instance))
            {
                $object = __CLASS__;
                self::$instance = new $object;
            }
            return self::$instance;
        }
        
        // others global functions
        public function fetch_array() {
            $this->sth->setFetchMode(PDO::FETCH_ASSOC);
            if($this->sth->rowCount() > 1)
                return $this->sth->fetchAll();
            else
                return $this->sth->fetch();
        }

        public function fetchJson() {
            $this->sth->setFetchMode(PDO::FETCH_ASSOC);
            return $this->sth->fetchAll();
        }

        public function getDBH() {
            return $this->dbh;
        }

        public function getSTH() {
            return $this->sth;
        }

        public function query($sql, $dataArray) {
            $this->sth = $this->dbh->prepare($sql);
            $this->sth->execute($dataArray);
        }

        //Returns the auto incremented id of the last inserted row by that connection
        public function lastInsertedID($primary='') {
            return $this->dbh->lastInsertId($primary);
        }

        //Returns an integer indicating the number of rows affected by an operation
        public function rowCount() {
            return $this->sth->rowCount();
        }
    }
?>