<?php
include 'admin/database.php';

class loaibv {
    private $db;
    
    // Constructor để khởi tạo đối tượng kết nối
    public function __construct() {
        $this->db = new Database();
    }

       public function show_loaibv() {
        $query = "SELECT * FROM loai_bv ORDER BY loai_bv ASC";
        $result = $this->db->select($query);
        return $result;
    }

    public function get_loaibv($id_loai) {
        $query = "SELECT * FROM loai_bv WHERE id_loai ='$id_loai'";
        $result = $this ->db->select($query);
        return $result;
    }
    
}
?>
