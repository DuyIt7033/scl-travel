<?php
include "database.php"
?>
<?php
class tinhthanh
{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }
    public function insert_tinhthanh($Ten_tinh, $anh_avt_tinh, $Mo_ta)
    {
        $targetDirectory = "uploads/";

        $anh_avt_tinh_name = basename($anh_avt_tinh["name"]);

        $targetFilePath = $targetDirectory . $anh_avt_tinh_name;

        if (move_uploaded_file($anh_avt_tinh["tmp_name"], $targetFilePath)) {
            $query = "INSERT INTO tinh (Ten_tinh, anh_avt_tinh, Mo_ta) VALUES (?, ?, ?)";
            $values = array($Ten_tinh, $targetFilePath, $Mo_ta);
            $result = $this->db->insert_pro($query, $values);

            if ($result) {
                return true;
            } else {
                // Nếu có lỗi xảy ra khi chèn dữ liệu vào cơ sở dữ liệu, xóa tệp ảnh đã tải lên
                unlink($targetFilePath);
                return false;
            }
        } else {
            return false;
        }
    }




    public function show_tinhthanh(){
        $query = "SELECT * FROM tinh ORDER BY Ten_tinh ASC";
        $result = $this->db->select($query);
        return $result;
    }
    

    public function get_tinhthanh()
    {
        $query = "SELECT * FROM tinh WHERE id_tinh ='id_tinh'";
        $result = $this->db->select($query);
        return $result;
    }
    public function update_tinhthanh($Ten_tinh, $anh_avt_tinh, $id_tinh, $Mo_ta)
    {
        
        $update_fields = array();

        
        if (!empty($Ten_tinh)) {
            $update_fields[] = "Ten_tinh = '$Ten_tinh'";
        }
        if (!empty($anh_avt_tinh)) {
           
            move_uploaded_file($_FILES['anh_avt_tinh']['tmp_name'], "uploads/" . $anh_avt_tinh);
            $update_fields[] = "anh_avt_tinh = '$anh_avt_tinh'";
        }
        if (!empty($Mo_ta)) {
            $update_fields[] = "Mo_ta = '$Mo_ta'";
        }

        // Nếu không có trường nào được cập nhật, không cần thực hiện truy vấn
        if (empty($update_fields)) {
            return false; 
        }

     
        $update_query = "UPDATE tinh SET " . implode(", ", $update_fields) . " WHERE id_tinh = '$id_tinh'";
        $result = $this->db->update($update_query);

        return $result;
    }





    public function del_tinhthanh($id_tinh)
    {
        $query = "DELETE FROM tinh WHERE id_tinh = '$id_tinh'";
        $result = $this->db->delete($query);
        header('Location: update_tinhthanh.php');
        return $result;
    }
}
?>S