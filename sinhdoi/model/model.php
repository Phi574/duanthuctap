<?php
class model
{
    private $conn;

    public function __construct()
    {
        $this->conn = mysqli_connect('localhost', 'root', '', 'batdongsan_v2');
        mysqli_set_charset($this->conn, 'utf8');
    }

    /* ========== SETTINGS ========== */
    public function get_setting()
    {
        $sql = "SELECT * FROM settings LIMIT 1";
        $rs  = mysqli_query($this->conn, $sql);

        if ($rs && mysqli_num_rows($rs) > 0) {
            return mysqli_fetch_assoc($rs);
        }
        return [];
    }

    /* ========== TRANG CHỦ ========== */
    public function get_baidang_trangchu()
    {
        $sql = "
            SELECT b.*, u.name AS user_name
            FROM baidang b
            JOIN users u ON b.user_id = u.id
            WHERE b.is_priority = 1 AND b.trang_thai = 1
            ORDER BY b.updated_at DESC
            LIMIT 3
        ";

        $rs = mysqli_query($this->conn, $sql);
        $data = [];

        if ($rs) {
            while ($row = mysqli_fetch_assoc($rs)) {
                $row['images'] = $this->get_images_by_baidang($row['id']);
                $data[] = $row;
            }
        }
        return $data;
    }

    /* ========== DANH SÁCH BÀI ĐĂNG ========== */
    public function get_all_baidang()
    {
        $sql = "
            SELECT b.*, u.name AS user_name
            FROM baidang b
            JOIN users u ON b.user_id = u.id
            ORDER BY b.created_at DESC
        ";

        $rs = mysqli_query($this->conn, $sql);
        $data = [];

        if ($rs) {
            while ($row = mysqli_fetch_assoc($rs)) {
                $row['images'] = $this->get_images_by_baidang($row['id']);
                $data[] = $row;
            }
        }
        return $data;
    }

    /* ========== ẢNH THEO BÀI ĐĂNG ========== */
    public function get_images_by_baidang($id)
    {
        $sql = "SELECT image FROM baidang_images WHERE baidang_id = $id";
        $rs  = mysqli_query($this->conn, $sql);
        $images = [];

        if ($rs) {
            while ($row = mysqli_fetch_assoc($rs)) {
                $images[] = $row['image'];
            }
        }
        return $images;
    }

    /* ========== PHÂN LOẠI BĐS ========== */
    public function get_loai_bds()
    {
        $sql = "SELECT * FROM phanloai_bds";
        $rs  = mysqli_query($this->conn, $sql);
        $data = [];

        if ($rs) {
            while ($row = mysqli_fetch_assoc($rs)) {
                $data[] = $row;
            }
        }
        return $data;
    }

    /* ========== SEARCH ========== */
    public function search_list_baidang($key, $loaibds, $tinhthanh, $dientich, $gia)
    {
        $where = [];

        if ($key != '') {
            $where[] = "
                (b.tieu_de LIKE '%$key%'
                OR b.mo_ta LIKE '%$key%'
                OR b.dia_chi LIKE '%$key%')
            ";
        }

        if ($loaibds != '') {
            $where[] = "p.ten_loai LIKE '%$loaibds%'";
        }

        if ($tinhthanh != '') {
            $where[] = "b.tinh_thanh LIKE '%$tinhthanh%'";
        }

        if ($dientich != '') {
            $where[] = "b.dien_tich <= $dientich";
        }

        if ($gia != '') {
            $where[] = "b.gia <= $gia";
        }

        $where_sql = '';
        if (!empty($where)) {
            $where_sql = ' AND ' . implode(' AND ', $where);
        }

        $sql = "
            SELECT b.*, u.name AS user_name
            FROM baidang b
            JOIN users u ON b.user_id = u.id
            JOIN phanloai_bds p ON b.loai_bds_id = p.id
            WHERE 1=1
            $where_sql
            ORDER BY b.created_at DESC
        ";

        $rs = mysqli_query($this->conn, $sql);
        $data = [];

        if ($rs) {
            while ($row = mysqli_fetch_assoc($rs)) {
                $row['images'] = $this->get_images_by_baidang($row['id']);
                $data[] = $row;
            }
        }
        return $data;
    }



    public function get_baidang($id)
    {
        $sql = "
            SELECT *
            
            FROM baidang
            JOIN users  ON baidang.user_id = users.id
            LEFT JOIN baidang_dat ON baidang.id = baidang_dat.baidang_id
            LEFT JOIN baidang_nha ON baidang.id = baidang_nha.baidang_id
            JOIN phanloai_bds  ON baidang.loai_bds_id = phanloai_bds.id
            where
            baidang.id = '".$id."'
            
        ";

        $result = $this->conn->query($sql);
        $data = [];
        if($result->num_rows > 0)
            {
                while($row = $result->fetch_assoc())
                    {
                        $data = $row;
                    }
            }
        return $data;
    }


    public function get_images_product($id)
    {
        $sql = "SELECT * FROM baidang_images WHERE baidang_id = $id";
        $rs  = mysqli_query($this->conn, $sql);
        $images = [];

        if ($rs) {
            while ($row = mysqli_fetch_assoc($rs)) {
                $images[] = $row;
            }
        }
        return $images;
    }

}

?>
