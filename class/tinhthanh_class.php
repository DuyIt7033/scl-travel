<?php
include "lib/database.php"
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
        $result = $this->db->insert_pro($query, $values);
        return $result;
    }

    public function show_tinhthanh(){
        $query = "SELECT * FROM tinh";
        $result = $this ->db->select($query);
        return $result;
    }

    public function get_tinhthanh($id_tinh){
        $query = "SELECT * FROM tinh WHERE id_tinh ='$id_tinh'";
        $result = $this->db->select($query);
        return $result;
    }
    
    
    public function update_tinhthanh($Ten_tinh, $anh_avt_tinh, $id_tinh){
        // Khởi tạo một mảng để lưu các thông tin cần cập nhật
        $update_fields = array();
    
        // Xây dựng câu truy vấn SQL dựa trên các trường hợp
        if (!empty($Ten_tinh)) {
            $update_fields[] = "Ten_tinh = '$Ten_tinh'";
        }
        if (!empty($anh_avt_tinh)) {
            $update_fields[] = "anh_avt_tinh = '$anh_avt_tinh'";
        }
    
        // Nếu không có trường nào được cập nhật, không cần thực hiện truy vấn
        if (empty($update_fields)) {
            return false; // Trả về false để báo hiệu rằng không có gì cần cập nhật
        }
    
        // Xây dựng câu truy vấn update
        $update_query = "UPDATE tinh SET " . implode(", ", $update_fields) . " WHERE id_tinh = '$id_tinh'";
    
        // Thực hiện truy vấn
        $result = $this->db->update($update_query);
    
        return $result;
    }

    public function del_tinhthanh($id_tinh){
        $query = "DELETE FROM tinh WHERE id_tinh = '$id_tinh'";
        $result = $this ->db->delete($query);
        header('Location: update_tinhthanh.php');
        return $result;
    }
    
}
?>S