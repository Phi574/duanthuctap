<?php

class model
{
    private $host = 'localhost';
    private $name = 'root';
    private $pass = '';
    private $db = 'batdongsan_v2';

    private $connect;



    public function __construct()
    {
        $this->ketnoi();
    }

    public function ketnoi()
    {
        $this->connect = new mysqli($this->host, $this->name, $this->pass, $this->db);
        $this->connect->set_charset('utf8');
    }





    

    public function check_login($email, $pass)
    {
       $sql = "SELECT * FROM users WHERE users.email = '".$email."' AND users.password = '".$pass."'";
        $result = $this->connect->query($sql);
        if($result->num_rows ==  1)
            {
                return $result->fetch_assoc();
            }
            else
                {
                     return false;
                }
           
    }

    public function registerUser($name, $email, $password, $phone)
{
    $conn = $this->connect;

    // kiểm tra email tồn tại
    $check = "SELECT id FROM users WHERE email = '$email'";
    $rs = $conn->query($check);

    if ($rs && $rs->num_rows > 0) {
        return 'Email đã tồn tại';
    }

    // mã hóa mật khẩu bằng MD5
    $hash = md5($password);

    $sql = "
        INSERT INTO users (name, email, password, phone, role, status, created_at)
        VALUES (
            '$name',
            '$email',
            '$hash',
            '$phone',
            'user',
            1,
            NOW()
        )
    ";

    if ($conn->query($sql)) {
        return true;
    }

    return 'Đăng ký thất bại, vui lòng thử lại';
}



    

   public function updatePriority($id, $priority)
{
    $id = (int)$id;
    $priority = (int)$priority; // 1 là ghim, 0 là bỏ ghim

    $sql = "UPDATE baidang SET is_priority = $priority WHERE id = $id";
    
    return $this->connect->query($sql);
}

    public function count_baidang()
{
    $sql = "SELECT COUNT(*) FROM baidang";
    $result = $this->connect->query($sql);
    $row = $result->fetch_row(); 
    return $row[0]; 
}

public function updateStatusBaiDang($id, $status) {
    $id = (int)$id;
    $status = (int)$status;
    $sql = "UPDATE baidang SET trang_thai = $status, updated_at = NOW() WHERE id = $id";
    return $this->connect->query($sql);
}
public function count_baidang_choduyet()
{
    $sql = "SELECT COUNT(*) FROM baidang where baidang.trang_thai = 0";
    $result = $this->connect->query($sql);
    $row = $result->fetch_row(); 
    return $row[0]; 
}


public function count_tuvan_choduyet()
{
    $sql = "SELECT COUNT(*) FROM tuvan where tuvan.trang_thai = 0";
    $result = $this->connect->query($sql);
    $row = $result->fetch_row(); 
    return $row[0]; 
}

public function count_tuvan_daduyet()
{
    $sql = "SELECT COUNT(*) FROM tuvan where tuvan.trang_thai != 0";
    $result = $this->connect->query($sql);
    $row = $result->fetch_row(); 
    return $row[0]; 
}



// thống kê  -       -------------------------------------------------


// Bài đăng theo ngày (7 ngày gần nhất)
    public function tkBaiDangTheoNgay()
    {
        $data = [];
        $sql = "
            SELECT DATE(created_at) AS label, COUNT(*) AS total
            FROM baidang
            WHERE created_at >= CURDATE() - INTERVAL 6 DAY
            GROUP BY DATE(created_at)
            ORDER BY label
        ";

        if ($result = $this->connect->query($sql)) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }

    // Bài đăng theo tuần (4 tuần gần nhất)
    public function tkBaiDangTheoTuan()
    {
        $data = [];
        $sql = "
            SELECT YEARWEEK(created_at, 1) AS label, COUNT(*) AS total
            FROM baidang
            GROUP BY label
            ORDER BY label DESC
            LIMIT 4
        ";

        if ($result = $this->connect->query($sql)) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }

    // Bài đăng theo tháng
    public function tkBaiDangTheoThang()
    {
        $data = [];
        $sql = "
            SELECT DATE_FORMAT(created_at, '%Y-%m') AS label, COUNT(*) AS total
            FROM baidang
            GROUP BY label
            ORDER BY label
        ";

        if ($result = $this->connect->query($sql)) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }

    /* =========================
       THỐNG KÊ TƯ VẤN
    ========================= */

    // Tư vấn theo ngày
    public function tkTuVanTheoNgay()
    {
        $data = [];
        $sql = "
            SELECT DATE(created_at) AS label, COUNT(*) AS total
            FROM tuvan
            WHERE created_at >= CURDATE() - INTERVAL 6 DAY
            GROUP BY DATE(created_at)
            ORDER BY label
        ";

        if ($result = $this->connect->query($sql)) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }

    // Tư vấn theo tuần
    public function tkTuVanTheoTuan()
    {
        $data = [];
        $sql = "
            SELECT YEARWEEK(created_at, 1) AS label, COUNT(*) AS total
            FROM tuvan
            GROUP BY label
            ORDER BY label DESC
            LIMIT 4
        ";

        if ($result = $this->connect->query($sql)) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }

    // Tư vấn theo tháng
    public function tkTuVanTheoThang()
    {
        $data = [];
        $sql = "
            SELECT DATE_FORMAT(created_at, '%Y-%m') AS label, COUNT(*) AS total
            FROM tuvan
            GROUP BY label
            ORDER BY label
        ";

        if ($result = $this->connect->query($sql)) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }

    /* =========================
       CỌC & CHỐT
    ========================= */

    // Bài đã cọc
    public function tkBaiDaCocTheoThang()
    {
        $data = [];
        $sql = "
            SELECT DATE_FORMAT(updated_at, '%Y-%m') AS label, COUNT(*) AS total
            FROM baidang
            WHERE trang_thai = 4
            GROUP BY label
        ";

        if ($result = $this->connect->query($sql)) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }

    // Bài đã chốt
    public function tkBaiDaChotTheoThang()
    {
        $data = [];
        $sql = "
            SELECT DATE_FORMAT(updated_at, '%Y-%m') AS label, COUNT(*) AS total
            FROM baidang
            WHERE trang_thai = 5
            GROUP BY label
        ";

        if ($result = $this->connect->query($sql)) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }


    /* =========================
       USER: xem bài đăng của mình
    ========================= */
    public function getBaiDangByUser($user_id)
    {
        $sql = "
            SELECT *
            FROM baidang
            WHERE user_id = $user_id
            ORDER BY created_at DESC
        ";

        $result = $this->connect->query($sql);
        $data = [];

        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }

        return $data;
    }

    /* =========================
       ADMIN: xem tất cả bài đăng
    ========================= */
    public function getAllBaiDang()
    {
        $sql = "
            SELECT baidang.*, users.name AS ten_user
            FROM baidang
            JOIN users ON baidang.user_id = users.id
            ORDER BY baidang.created_at DESC
        ";

        $result = $this->connect->query($sql);
        $data = [];

        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }

        return $data;
    }

    /* =========================
       ADMIN: lọc bài đăng theo trạng thái
    ========================= */
    public function getBaiDangByTrangThai($trang_thai)
    {
        $sql = "
            SELECT baidang.*, users.name AS ten_user
            FROM baidang
            JOIN users ON baidang.user_id = users.id
            WHERE baidang.trang_thai = $trang_thai
            ORDER BY baidang.created_at DESC
        ";

        $result = $this->connect->query($sql);
        $data = [];

        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }

        return $data;
    }

    /* =========================
       USER: đếm bài đăng của mình
    ========================= */
    public function countBaiDangByUser($user_id)
    {
        $sql = "SELECT COUNT(*) AS total FROM baidang WHERE user_id = $user_id";
        $result = $this->connect->query($sql);

        if ($result) {
            $row = $result->fetch_assoc();
            return $row['total'];
        }

        return 0;
    }


    public function duyetBaiDang($id)
{
    $id = (int)$id;

    $sql = "
        UPDATE baidang 
        SET trang_thai = 1,
            updated_at = NOW()
        WHERE id = $id
    ";

    return $this->connect->query($sql);
}


    /* =========================
       ADMIN: đếm toàn bộ bài đăng
    ========================= */
    public function countAllBaiDang()
    {
        $sql = "SELECT COUNT(*) AS total FROM baidang";
        $result = $this->connect->query($sql);

        if ($result) {
            $row = $result->fetch_assoc();
            return $row['total'];
        }

        return 0;
    }

    
public function getBaiDangById($id)
{
    $sql = "SELECT * FROM baidang WHERE id = $id LIMIT 1";
    return $this->connect->query($sql);
}


public function deleteBaiDang($id)
{
    $sql = "DELETE FROM baidang WHERE id = $id";
    return $this->connect->query($sql);
}


public function getBaiDangDetail($id)
{
    $id = (int)$id;
    $sql = "
        SELECT 
            b.*, 
            u.name AS ten_nguoi_dang, 
            p.ten_loai,
            -- Lấy dữ liệu từ bảng nhà
            bn.so_phong, bn.so_tang, bn.phap_ly_nha, bn.noi_that,
            -- Lấy dữ liệu từ bảng đất
            bd.loai_dat, bd.phap_ly_dat
        FROM baidang b
        JOIN users u ON b.user_id = u.id
        JOIN phanloai_bds p ON b.loai_bds_id = p.id
        LEFT JOIN baidang_nha bn ON b.id = bn.baidang_id
        LEFT JOIN baidang_dat bd ON b.id = bd.baidang_id
        WHERE b.id = $id
        LIMIT 1
    ";
    return $this->connect->query($sql);
}


public function get_img($id)
{
    $sql = "select * from baidang_images where baidang_images.baidang_id = '$id' ";
    $result = $this->connect->query($sql);
    $data = [];
    if($result->num_rows > 0)
        {
            while ($row = $result->fetch_assoc())
                {
                    $data[] = $row;
                }
        }
        return $data;
}


public function getBaiDangEdit($id, $user_id, $role)
{
    // Đảm bảo dùng chung một biến kết nối (ví dụ: $this->conn)
    $sql = "SELECT b.*, l.ten_loai, 
                   n.so_phong, n.so_tang, n.phap_ly_nha, n.noi_that,
                   d.loai_dat, d.phap_ly_dat
            FROM baidang b
            LEFT JOIN phanloai_bds l ON b.loai_bds_id = l.id
            LEFT JOIN baidang_nha n ON b.id = n.baidang_id
            LEFT JOIN baidang_dat d ON b.id = d.baidang_id
            WHERE b.id = " . (int)$id;

    if ($role !== 'admin') {
        $sql .= " AND user_id = " . (int)$user_id;
    }

    $result = $this->connect->query($sql);

    // Debug: Nếu không chạy, hãy bỏ comment dòng dưới để xem lỗi SQL
    // if (!$result) die($this->conn->error); 

    if ($result && $result->num_rows > 0) {
        $baidang = $result->fetch_assoc();
        
        // Lấy ảnh
        $sql_img = "SELECT * FROM baidang_images WHERE baidang_id = " . (int)$id;
        $rs_img  = $this->connect->query($sql_img);

        $images = [];
        while ($rs_img && $row = $rs_img->fetch_assoc()) {
            $images[] = $row;
        }

        $baidang['images'] = $images;
        return $baidang;
    }

    return false;
}


public function updateBaiDang($data, $user_id, $role)
{
    $id = (int)$data['id'];

    // 1. Kiểm tra quyền
    $check = "SELECT loai_bds_id FROM baidang WHERE id = $id";
    if ($role !== 'admin') { $check .= " AND user_id = $user_id"; }
    $rs = $this->connect->query($check);
    if ($rs->num_rows == 0) return false;
    
    $row = $rs->fetch_assoc();
    $loai_bds_id = $row['loai_bds_id'];

    // 2. Làm sạch dữ liệu chung
    $tieu_de   = $this->connect->real_escape_string($data['tieu_de']);
    $mo_ta     = $this->connect->real_escape_string($data['mo_ta']);
    $gia       = (double)$data['gia'];
    $dien_tich = (double)$data['dien_tich'];
    $dia_chi   = $this->connect->real_escape_string($data['dia_chi']);

    // 3. Cập nhật bảng chính `baidang`
    $sqlMain = "UPDATE baidang SET 
                tieu_de = '$tieu_de', mo_ta = '$mo_ta', 
                gia = $gia, dien_tich = $dien_tich, 
                dia_chi = '$dia_chi', updated_at = NOW() 
                WHERE id = $id";
    $this->connect->query($sqlMain);

    // 4. Cập nhật bảng phụ dựa trên loai_bds_id
    if ($loai_bds_id == 1) { 
        // Cập nhật bảng baidang_nha
        $so_phong = (int)$data['so_phong'];
        $so_tang  = (int)$data['so_tang'];
        $phap_ly  = $this->connect->real_escape_string($data['phap_ly']);
        $noi_that = $this->connect->real_escape_string($data['noi_that']);

        $sqlSub = "UPDATE baidang_nha SET 
                   so_phong = $so_phong, so_tang = $so_tang, 
                   phap_ly_nha = '$phap_ly', noi_that = '$noi_that' 
                   WHERE baidang_id = $id";
    } else { 
        // Cập nhật bảng baidang_dat
        $loai_dat = $this->connect->real_escape_string($data['loai_dat']);
        $phap_ly  = $this->connect->real_escape_string($data['phap_ly_dat']);

        $sqlSub = "UPDATE baidang_dat SET 
                   loai_dat = '$loai_dat', phap_ly_dat = '$phap_ly' 
                   WHERE baidang_id = $id";
    }

    return $this->connect->query($sqlSub);
}
public function addBaiDangImages($baidang_id, $files)
{
    // đường dẫn tuyệt đối tới thư mục uploads
    $upload_dir = dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR;

    // đảm bảo thư mục tồn tại
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    if (empty($files['name'])) {
        return;
    }

    for ($i = 0; $i < count($files['name']); $i++) {

        if ($files['error'][$i] == 0) {

            // tránh trùng tên file
            $file_name = time() . '_' . basename($files['name'][$i]);
            $tmp_name  = $files['tmp_name'][$i];
            $target    = $upload_dir . $file_name;

            if (move_uploaded_file($tmp_name, $target)) {

                $sql = "
                    INSERT INTO baidang_images (baidang_id, image)
                    VALUES ($baidang_id, '$file_name')
                ";
                $this->connect->query($sql);

            } else {
                error_log("Upload failed: " . $target);
            }
        }
    }
}


public function deleteBaiDangImages($image_ids = [])
{
    if (empty($image_ids)) return;

    foreach ($image_ids as $img_id) {
        $img_id = (int)$img_id;

        // lấy tên file
        $sql = "SELECT image FROM baidang_images WHERE id = $img_id";
        $rs  = $this->connect->query($sql);

        if ($rs && $rs->num_rows > 0) {
            $row = $rs->fetch_assoc();
            $file = 'uploads/' . $row['image'];

            if (file_exists($file)) {
                unlink($file);
            }

            // xóa DB
            $this->connect->query("DELETE FROM baidang_images WHERE id = $img_id");
        }
    }
}





public function insertBaiDang($data, $files, $user)
{
    $conn = $this->connect;

    $user_id     = (int)$user['id'];
    $loai_bds_id = (int)$data['loai_bds_id'];

    /* =====================
       1. LƯU BÀI ĐĂNG
    ====================== */

    $sql = "
        INSERT INTO baidang
        (user_id, loai_bds_id, tieu_de, gia, dien_tich, dia_chi, mo_ta, trang_thai, created_at)
        VALUES (
            $user_id,
            $loai_bds_id,
            '".$conn->real_escape_string($data['tieu_de'])."',
            '".$conn->real_escape_string($data['gia'])."',
            '".$conn->real_escape_string($data['dien_tich'])."',
            '".$conn->real_escape_string($data['dia_chi'])."',
            '".$conn->real_escape_string($data['mo_ta'])."',
            0,
            NOW()
        )
    ";
    $conn->query($sql);

    $baidang_id = $conn->insert_id;

    /* =====================
       2. NHÀ
    ====================== */
    if ($loai_bds_id == 1) {
        $conn->query("
            INSERT INTO baidang_nha
            (baidang_id, so_phong, so_tang, phap_ly_nha, noi_that)
            VALUES (
                $baidang_id,
                '".$conn->real_escape_string($data['so_phong'])."',
                '".$conn->real_escape_string($data['so_tang'])."',
                '".$conn->real_escape_string($data['phap_ly_nha'])."',
                '".$conn->real_escape_string($data['noi_that'])."'
            )
        ");
    }

    /* =====================
       3. ĐẤT
    ====================== */
    if ($loai_bds_id == 2) {
        $conn->query("
            INSERT INTO baidang_dat
            (baidang_id, loai_dat, phap_ly_dat)
            VALUES (
                $baidang_id,
                '".$conn->real_escape_string($data['loai_dat'])."',
                '".$conn->real_escape_string($data['phap_ly_dat'])."'
            )
        ");
    }

    /* =====================
       4. UPLOAD NHIỀU ẢNH
    ====================== */
    if (!empty($files['images']['name'][0])) {

        // ĐƯỜNG DẪN CHUẨN (filesystem)
        $uploadDir = __DIR__ . '/../../uploads/';

        // Cho phép các định dạng ảnh
        $allowExt = ['jpg', 'jpeg', 'png', 'webp'];

        foreach ($files['images']['name'] as $key => $name) {

            if ($files['images']['error'][$key] !== UPLOAD_ERR_OK) {
                continue;
            }

            $tmp = $files['images']['tmp_name'][$key];
            $ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));

            if (!in_array($ext, $allowExt)) {
                continue;
            }

            $newName = time() . '_' . uniqid() . '.' . $ext;

            if (move_uploaded_file($tmp, $uploadDir . $newName)) {

                $conn->query("
                    INSERT INTO baidang_images (baidang_id, image)
                    VALUES ($baidang_id, '$newName')
                ");
            }
        }
    }

    return true;
}

public function getAllTuVan()
{
    $sql = "
        SELECT t.*, b.tieu_de
        FROM tuvan t
        LEFT JOIN baidang b ON t.baidang_id = b.id
        ORDER BY t.created_at DESC
    ";

    $result = $this->connect->query($sql);
    $data = [];

    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    return $data;
}
public function updateTrangThaiTuVan($id, $status)
{
    // Sử dụng ép kiểu (int) để đảm bảo an toàn dữ liệu đầu vào
    $id = (int)$id;
    $status = (int)$status;

    $sql = "
        UPDATE tuvan
        SET trang_thai = $status
        WHERE id = $id
    ";
    
    return $this->connect->query($sql);
}




public function getSettings() {
    $sql = "SELECT * FROM settings WHERE id = 1";
    return $this->connect->query($sql)->fetch_assoc();
}

public function updateSettings($data) {
    $sql = "UPDATE settings SET 
            site_name = '{$data['site_name']}',
            logo = '{$data['logo']}',
            hotline = '{$data['hotline']}',
            email = '{$data['email']}',
            address = '{$data['address']}',
            site_color = '{$data['site_color']}',
            seo_title = '{$data['seo_title']}',
            seo_description = '{$data['seo_description']}',
            slide1 = '{$data['slide1']}',
            slide2 = '{$data['slide2']}',
            slide3 = '{$data['slide3']}'
            WHERE id = 1";
    return $this->connect->query($sql);
}

    public function getAllUsers()
{
    $sql = "SELECT * FROM users ORDER BY id DESC";
    $rs = $this->connect->query($sql);

    $data = [];
    if ($rs && $rs->num_rows > 0) {
        while ($row = $rs->fetch_assoc()) {
            $data[] = $row;
        }
    }
    return $data;
}


public function toggleUserRole($id)
{
    $id = (int)$id;

    // lấy role hiện tại
    $sql = "SELECT role FROM users WHERE id = $id";
    $rs  = $this->connect->query($sql);

    if (!$rs || $rs->num_rows == 0) {
        return false;
    }

    $user = $rs->fetch_assoc();
    $newRole = ($user['role'] == 'admin') ? 'user' : 'admin';

    return $this->connect->query("
        UPDATE users SET role = '$newRole' WHERE id = $id
    ");
}
public function setUserStatus($id, $status)
{
    $id     = (int)$id;
    $status = (int)$status; // 0 | 1

    return $this->connect->query("
        UPDATE users SET status = $status WHERE id = $id
    ");
}
public function getUserById($id)
{
    $id = (int)$id;
    $rs = $this->connect->query("SELECT * FROM users WHERE id = $id");

    if ($rs && $rs->num_rows > 0) {
        return $rs->fetch_assoc();
    }
    return false;
}
public function isAdmin($user)
{
    return isset($user['role']) && $user['role'] === 'admin';
}

} 
?>