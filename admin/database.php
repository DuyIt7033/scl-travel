<?php
include "config.php";
?>

<?php
class Database{
    public $host = DB_HOST;
    public $user = DB_USER;
    public $pass = DB_PASS;
    public $dbname = DB_NAME;

    public $link;
    public $error;

    public function __construct() {
        $this->connectDB();
    }

    private function connectDB() {
        $this->link = new mysqli($this->host, $this->user, $this->pass, $this->dbname);

        if ($this->link->connect_error) {
            die("Kết nối không thành công: " . $this->link->connect_error);
            return false;
        }
    }

    public function select($query) {
        $result =$this -> link->query($query) or die($this -> link->error.__LINE__);
        if($result->num_rows >0){
            return $result;
        }else{
            return false;
        }
    }
    
    public function insert($query, $values) {
        // Sử dụng Prepared Statements để ngăn chặn SQL injection
        $stmt = $this->link->prepare($query);
        if ($stmt) {
            // Bind giá trị vào câu truy vấn
            if (!empty($values)) {
                $stmt->bind_param(str_repeat('s', count($values)), ...$values);
            }
            // Thực hiện câu truy vấn
            $insert_row = $stmt->execute();
            // Kiểm tra kết quả thực hiện câu truy vấn
            if($insert_row){
                return $insert_row;
            } else {
                return false;
            }
        } else {
            // Nếu không thể chuẩn bị câu truy vấn
            die("Lỗi chuẩn bị câu truy vấn: " . $this->link->error);
            return false;
        }
    }

    public function update($query){
        $update_row = $this -> link->query($query) or die($this -> link->error.__LINE__);
        if($update_row){
            return $update_row;
        }else{
            return false;
        }
    }

    public function delete($query){
        $delete_row = $this -> link->query($query) or die($this -> link->error.__LINE__);
        if($delete_row){
            return $delete_row;
        }else{
            return false;
        }
    }

    


}
?>
