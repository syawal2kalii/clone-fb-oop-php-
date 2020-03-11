<?php
    require '../vendor/Database.php';
    class User {
        private $_db;
        public function __construct()
        {
            $this->_db = Database::getConnection();
        }
        public function insertUser($data  = array())
        {
           if ($this->_db->insert('user', $data)) {
               return true;
           }
           else{
               return false;
           }
        }
        public function selectUser(){
            if ($data = $this->_db->select('user')) {
                return $data;
            }
        }
        public function selectByCredentialsUser($email,$pass)
        {
            if($data=$this->_db->selectByCredentials('user',$email,$pass)){
                return $data;
            }
        }
        public function deleteByID($id)
        {
            if($this->_db->delete($id)){
                return true;
            }else{
                return false;
            }
        }
    }
?>