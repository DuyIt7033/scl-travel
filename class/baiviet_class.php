<?php
include 'admin/database.php';
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

    
    public function show_bv()
    {
        $query = "SELECT * FROM baiviet ORDER BY id_baiviet DESC";
        $result = $this->db->select($query);
        return $result;
    }
    public function show_bv_limit($limit, $offset)
{
    $query = "SELECT * FROM baiviet ORDER BY id_baiviet DESC LIMIT $limit OFFSET $offset";
    $result = $this->db->select($query);
    return $result;
}

    public function show_tinhthanh()
    {
        $query = "SELECT * FROM tinh ";
        $result = $this->db->select($query);
        return $result;
    }
    public function show_loaibv()
    {
        $query = "SELECT * FROM loai_bv";
        $result = $this->db->select($query);
        return $result;
    }
    public function get_bv_loai_baiviet($loai_baiviet) {

        $query = "SELECT * FROM baiviet 
                  INNER JOIN loai_bv ON baiviet.id_loai = loai_bv.id_loai 
                  WHERE loai_bv.loai_baiviet = '$loai_baiviet'";
    
        $result = $this->db->select($query);
        return $result;
    }
    public function get_bv_id_loai_baiviet($id_loai) {
        $query = "SELECT * FROM baiviet 
                  WHERE id_loai = '$id_loai'";
        $result = $this->db->select($query);
        return $result;
    }
    
    public function get_bv($id_baiviet)
    {
        $query = "SELECT * FROM baiviet WHERE id_baiviet = '$id_baiviet'";
        $result = $this->db->select($query);
        return $result;
    }

  

    public function get_tinh_id_from_baiviet_id($id_baiviet)
{
    $query = "SELECT tinh.id_tinh 
              FROM baiviet 
              INNER JOIN tinh ON baiviet.id_tinh = tinh.id_tinh 
              WHERE baiviet.id_baiviet = '$id_baiviet'";

    $result = $this->db->select($query);
    if ($result) {
        $row = $result->fetch_assoc();
        return $row['id_tinh'];
    } else {
        return null; // hoặc thực hiện xử lý khác tùy vào yêu cầu của bạn
    }
}

    public function get_baiviet_by_tinh($id_tinh)
    {
        $query = "SELECT * FROM baiviet WHERE id_tinh = '$id_tinh'";
        $result = $this->db->select($query);
        return $result;
    }

    public function filter_bv_by_location_and_type($id_tinh, $id_loai) {
        // Xây dựng câu truy vấn để lấy danh sách bài viết đã lọc
        $query = "SELECT * FROM baiviet WHERE id_tinh = '$id_tinh' AND id_loai = '$id_loai'";
        $result = $this->db->select($query);
        return $result;
    }

    public function search_bv($keyword) {
        $query = "SELECT * FROM baiviet WHERE tieu_de LIKE '%$keyword%'";
        $result = $this->db->select($query);
        return $result;
    }
    
    
}



?>