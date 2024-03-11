<?php
    class_Database{
        private $hostname = 'localhost';
        private $username = 'root';
        private $pass = '';
        private $dbname = 'scl';

        private $conn = NULL;
        private $result =NULL;

        public function connect()
        {
            $this->conn = m=new mysqli($this->hostname, $this->username,$this->pass, $this->dbname);
            if(!$this->conn){
                echo"Kết nôi thất bại";
                exit();
            }
            else{
                mysqli_set_charset($this->conn, 'utf8');
            }
            return $this->conn;
        }
        // THực thi truy vấn
        public function execute($sql)
        {
            $this->result = $this ->conn->query($sql);
        }
        //Get data
        public function getData(){
            if($this->result){
                $data = mysqli_fetch_array($this->result);
            }
            else{
                $data = 0;
            }
            return $data;
        }

        //Get all datda
        public function getAllData(){
            if($this->result){
               $data = 0;
            }
            else{
                while($data = $this->getData()){
                    $data[] = $datas;
                }
            }
            return $data;
        }

        // Add data
        public function InsertData($){
            $sql = "INSERT INTO $"
        }

    }
?>