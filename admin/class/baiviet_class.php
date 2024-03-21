<?php
include "database.php"
?>
<?php
class baiviet{
    private $db;
    // Constructor để khởi tạo đối tượng kết nối
    public function __construct() {
        $this->db = new Database();
    }

    public function insert_bv() {
        $tieu_de = $_POST['tieu_de'];
        $id_tinh = $_POST['id_tinh'];
        $id_loai = $_POST['id_loai'];
        $noidung = $_POST['noidung'];
        $anh_avt_bv = $_FILES['anh_avt_bv']['name'];
        $publish_date = $_POST['publish_date'];
    
        $query = "INSERT INTO baiviet (tieu_de, id_tinh, id_loai, noidung, anh_avt_bv, publish_date)
         VALUES ('$tieu_de', '$id_tinh', '$id_loai', '$noidung', '$anh_avt_bv', '$publish_date')";
        
        // Truyền mảng rỗng hoặc null vào hàm insert()
        $result = $this->db->insert($query); // hoặc $result = $this->db->insert($query, null);
        return $result;
    }
    
    

    public function show_bv(){
        $query = "SELECT * FROM baiviet";
        $result = $this ->db->select($query);
        return $result;
    }
    public function show_tinhthanh(){
        $query = "SELECT * FROM tinh";
        $result = $this ->db->select($query);
        return $result;
    
    }
    public function show_loaibv() {
        $query = "SELECT * FROM loai_bv";
        $result = $this->db->select($query);
        return $result;
    }

    public function get_bv(){
        $query = "SELECT * FROM tinh WHERE id_tinh ='id_tinh'";
        $result = $this ->db->select($query);
        return $result;
    
    }

    public function update_bv($Ten_tinh, $anh_avt_tinh, $id_tinh){
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

    public function del_bv($id_bv){
        $query = "DELETE FROM baiviet WHERE id_bv = '$id_bv'";
        $result = $this->db->delete($query);
        return $result;
    }
    
    }
    

?>