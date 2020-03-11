<?php
    class Database {
        private static $INSTANCE = null;
        private $DB,
                $HOST = "localhost",
                $USER = "root",
                $PASS = "",
                $DBNM = "cl_fb";
        public function __construct()
        {
            $this->DB = new mysqli($this->HOST, $this->USER, $this->PASS, $this->DBNM);
        }
        public static function getConnection()
        {
            if (!isset(self::$INSTANCE)) {
                self::$INSTANCE = new Database();
            }

            return self::$INSTANCE;
        }
        public function tes()
        {
           echo('<h1>syawal</h1>');
           return true;
        }

        public function insert($table, $data = array())
        {
            $column = implode(", ", array_keys($data));
            $values = array();
            $i = 0;
            foreach ($data as $key => $value) {
                $values[$i] = "'".$value."'";
                $i++;
            }
            $value = implode(", ", array_values($values));
            

            $query = "INSERT INTO $table ($column) VALUES($value)";
            // die($query);
            if ($this->DB->query($query)) {
                return true;
            }else{
                return false;
            }
        }
        
        public function select($table)
        {
            $query = "SELECT * FROM $table";
            if ($data = $this->DB->query($query)) {
                return $data;
            }
        }

        public function delete($id)
        {
            $query = "DELETE FROM user WHERE id='$id'";
            if($this->DB->query($query)){
                return true;
            }else{
                return false;
            }
        }

        public function edit($id)
        {
            # code...
        }

        public function selectByCredentials($table,$email,$pass)
        {
            $query = "SELECT * FROM $table WHERE email='$email' and pass='$pass'";
            // die($query);
            if($data=$this->DB->query($query)){
                return mysqli_fetch_assoc($data);
            }
        }

    }
?>