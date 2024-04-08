<?php
include 'admin/database.php';
?>
<?php
class tinhthanh{
    private $db;
    // Constructor để khởi tạo đối tượng kết nối
    public function __construct() {
        $this->db = new Database();
    }



    public function show_tinhthanh(){
        $query = "SELECT * FROM tinh ORDER BY Ten_tinh ASC"; // Sắp xếp theo tên tỉnh theo thứ tự tăng dần (A-Z)
        $result = $this->db->select($query);
        return $result;
    }
    

    public function get_tinhthanh($id_tinh){
        $query = "SELECT * FROM tinh WHERE id_tinh ='$id_tinh'";
        $result = $this->db->select($query);
        return $result;
    }
    
}
?>