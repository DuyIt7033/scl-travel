<?php
include 'admin/database.php';

class loaibv {
    private $db;
    
    // Constructor để khởi tạo đối tượng kết nối
    public function __construct() {
        $this->db = new Database();
    }

    public function insert_loaibv($ten_loai, $loai_baiviet) {
        // Tạo câu truy vấn
        $query = "INSERT INTO loai_bv (ten_loai, loai_baiviet) VALUES ('$ten_loai', '$loai_baiviet')";
        
        // Gọi phương thức insert từ đối tượng Database và trả về kết quả
        return $this->db->insert($query);
    }
    

    public function show_loaibv() {
        $query = "SELECT * FROM loai_bv";
        $result = $this->db->select($query);
        return $result;
    }

    public function get_loaibv($id_loai) {
        $query = "SELECT * FROM loai_bv WHERE id_loai ='$id_loai'";
        $result = $this ->db->select($query);
        return $result;
    }

    public function update_loaibv($ten_loai, $loai_baiviet, $id_loai) {
        // Khởi tạo một mảng để lưu các thông tin cần cập nhật
        $update_fields = array();

        // Xây dựng câu truy vấn SQL dựa trên các trường hợp
        if (!empty($ten_loai)) {
            $update_fields[] = "ten_loai = '$ten_loai'";
        }
        if (!empty($loai_baiviet)) {
            $update_fields[] = "loai_baiviet = '$loai_baiviet'";
        }

        // Nếu không có trường nào được cập nhật, không cần thực hiện truy vấn
        if (empty($update_fields)) {
            return false; // Trả về false để báo hiệu rằng không có gì cần cập nhật
        }

        // Xây dựng câu truy vấn update
        $update_query = "UPDATE loai_bv SET " . implode(", ", $update_fields) . " WHERE id_loai = '$id_loai'";

        // Thực hiện truy vấn
        $values = array($id_loai);
        $result = $this->db->update($update_query, $values);

        return $result;
    }

    public function del_loaibv($id_loai){
        $query = "DELETE FROM loai_bv WHERE id_loai = '$id_loai'";
        $result = $this ->db->delete($query);
        header('Location: update_loaibv.php');
        return $result;
    }
}
?>
