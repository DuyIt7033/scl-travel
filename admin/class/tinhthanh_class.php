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

    public function insert_tinhthanh($Ten_tinh, $anh_avt_tinh) {
        // Sử dụng Prepared Statements để ngăn chặn SQL injection
        $query = "INSERT INTO tinh (Ten_tinh, anh_avt_tinh) VALUES (?, ?)";
        $values = array($Ten_tinh, $anh_avt_tinh);
        $result = $this->db->insert($query, $values);
        return $result;
    }

    public function show_tinhthanh(){
        $query = "SELECT * FROM tinh";
        $result = $this ->db->select($query);
        return $result;
    
    }
}
?>