<?php
include "database.php"
?>
<?php
class tinhthanh{
    private $db;
    // Constructor để khởi tạo đối tượng kết nối
    public function __construct() {
        $this->db = new Database();
    }

    public function insert_tinhthanh(){
        $query = "INSERT INTO tinh (Ten_tinh) VALUES ('$Ten_tinh')";
        $result = $this ->db->insert($query);
        return $result;
    
    }

    public function show_tinhthanh(){
        $query = "SELECT * FROM tinh";
        $result = $this ->db->select($query);
        return $result;
    
    }
}
?>