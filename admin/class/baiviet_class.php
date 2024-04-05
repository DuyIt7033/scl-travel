<?php
include "database.php";
?>
<?php
class baiviet
{
    private $db;
    // Constructor để khởi tạo đối tượng kết nối
    public function __construct()
    {
        $this->db = new Database();
    }

    public function insert_bv()
    {
        $tieu_de = $_POST['tieu_de'];
        $id_tinh = $_POST['id_tinh'];
        $id_loai = $_POST['id_loai'];
        $noidung = $_POST['noidung'];
        $mo_ta_ngan = $_POST['mo_ta_ngan'];
        $anh_avt_bv = $_FILES['anh_avt_bv']['name'];
        $publish_date = $_POST['publish_date'];
        $map = $_POST['map'];

        move_uploaded_file($_FILES['anh_avt_bv']['tmp_name'], "uploads/" . $_FILES['anh_avt_bv']['name']);

        $query = "INSERT INTO baiviet (tieu_de, id_tinh, id_loai, noidung, mo_ta_ngan, anh_avt_bv, publish_date,map)
                  VALUES ('$tieu_de', '$id_tinh', '$id_loai', '$noidung','$mo_ta_ngan', '$anh_avt_bv', '$publish_date','$map')";

        $result = $this->db->insert($query);

        if ($result) {
            $query = "SELECT * FROM baiviet ORDER BY id_baiviet DESC LIMIT 1";
            $result = $this->db->select($query)->fetch_assoc();
            $id_baiviet = $result['id_baiviet'];

            $filename = $_FILES['anh_baiviet']['name'];
            $filetmp = $_FILES['anh_baiviet']['tmp_name'];

            foreach ($filename as $key => $value) {
                move_uploaded_file($filetmp[$key], "uploads/" . $value);

                $query = "INSERT INTO anh_bv_mt (id_baiviet, anh_baiviet) VALUES ('$id_baiviet', '$value')";
                $result = $this->db->insert($query);
            }
        }
        return $result;
    }





    public function show_bv()
    {
        $query = "SELECT * FROM baiviet";
        $result = $this->db->select($query);
        return $result;
    }
    public function show_tinhthanh()
    {
        $query = "SELECT * FROM tinh";
        $result = $this->db->select($query);
        return $result;
    }
    public function show_loaibv()
    {
        $query = "SELECT * FROM loai_bv";
        $result = $this->db->select($query);
        return $result;
    }

    public function get_bv($id_baiviet)
    {
        $query = "SELECT * FROM baiviet WHERE id_baiviet = '$id_baiviet'";
        $result = $this->db->select($query);
        return $result;
    }

    public function update_bv($tieu_de, $id_tinh, $id_loai, $noidung, $anh_avt_bv, $publish_date, $id_baiviet,$map)
    {
        // Khởi tạo một mảng để lưu các thông tin cần cập nhật
        $update_fields = array();
    
        // Xây dựng câu truy vấn SQL dựa trên các trường hợp
        if (!empty($tieu_de)) {
            $update_fields[] = "tieu_de = '$tieu_de'";
        }
        if (!empty($id_tinh)) {
            $update_fields[] = "id_tinh = '$id_tinh'";
        }
        if (!empty($id_loai)) {
            $update_fields[] = "id_loai = '$id_loai'";
        }
        if (!empty($noidung)) {
            $update_fields[] = "noidung = '$noidung'";
        }
        if (!empty($anh_avt_bv)) {
            // Lưu ảnh đại diện mới vào thư mục
            move_uploaded_file($_FILES['anh_avt_bv']['tmp_name'], "uploads/" . $anh_avt_bv);
            // Cập nhật tên ảnh mới trong cơ sở dữ liệu
            $update_fields[] = "anh_avt_bv = '$anh_avt_bv'";
        }
        if (!empty($publish_date)) {
            $update_fields[] = "publish_date = '$publish_date'";
        }
        if (!empty($map)) {
            $update_fields[] = "map = '$map'";
        }
    
        // Nếu không có trường nào được cập nhật, không cần thực hiện truy vấn
        if (empty($update_fields)) {
            return false; // Trả về false để báo hiệu rằng không có gì cần cập nhật
        }
    
        // Xây dựng câu truy vấn update
        $update_query = "UPDATE baiviet SET " . implode(", ", $update_fields) . " WHERE id_baiviet = '$id_baiviet'";
    
        // Thực hiện truy vấn
        $values = array($id_baiviet);
        $result = $this->db->update($update_query, $values);
    
        return $result;
    }
    




    public function del_bv($id_baiviet)
    {
        $query = "DELETE FROM baiviet WHERE id_baiviet = '$id_baiviet'";
        $result = $this->db->delete($query);
        header('Location: update_bv.php');
        return $result;
    }
}


?>