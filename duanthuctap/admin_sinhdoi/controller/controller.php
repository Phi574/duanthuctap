<?php
require_once 'model/model.php';

class controller
{
    private $model;

    public function __construct()
    {
        $this->model = new model();
    }

    /* ==========================
        DASHBOARD
    ========================== */
    public function hienthi()
    {
        // Bài đăng
        $tk_baidang_ngay  = $this->model->tkBaiDangTheoNgay();
        $tk_baidang_tuan  = $this->model->tkBaiDangTheoTuan();
        $tk_baidang_thang = $this->model->tkBaiDangTheoThang();

        // Tư vấn
        $tk_tuvan_ngay  = $this->model->tkTuVanTheoNgay();
        $tk_tuvan_tuan  = $this->model->tkTuVanTheoTuan();
        $tk_tuvan_thang = $this->model->tkTuVanTheoThang();

        // Cọc & chốt
        $tk_coc  = $this->model->tkBaiDaCocTheoThang();
        $tk_chot = $this->model->tkBaiDaChotTheoThang();

        $total                   = $this->model->count_baidang();
        $total_choduyet           = $this->model->count_baidang_choduyet();
        $total_tuvan              = $this->model->count_tuvan_choduyet();
        $total_tuvan_daduyet      = $this->model->count_tuvan_daduyet();

        include_once 'views/dashboard/html/dashboard.php';
    }

    /* ==========================
        ROUTER
    ========================== */
    public function dieuhuong()
    {
        if (isset($_GET['action'])) {

            switch ($_GET['action']) {

                /* ===== TRANG CHỦ ===== */
                case 'trangchu':
                    if (!isset($_SESSION['user'])) {
                        header('location: index.php?action=login');
                        exit;
                    } else {
                        $this->hienthi();
                    }
                    break;

                /* ===== LOGIN ===== */
                case 'login':

                    if (isset($_SESSION['user'])) {
                        header('Location: index.php?action=trangchu');
                        exit;
                    }

                    if (isset($_POST['btn_login'])) {

                        $email = $_POST['email'];
                        $pass  = md5($_POST['pass']);

                        $data_login = $this->model->check_login($email, $pass);

                        if (!$data_login) {
                            $_SESSION['error'] = 'Sai email hoặc mật khẩu';
                            header('Location: index.php?action=login');
                            exit;
                        }

                        $_SESSION['user'] = [
                            'id'    => $data_login['id'],
                            'name'  => $data_login['name'],
                            'email' => $data_login['email'],
                            'phone' => $data_login['phone'],
                            'role'  => $data_login['role']
                        ];

                        header('Location: index.php?action=trangchu');
                        exit;
                    }

                    include 'views/auth/login/login.php';
                    break;



                    case 'register':

                        // Nếu đã đăng nhập thì không cho vào đăng ký
                        if (isset($_SESSION['user'])) {
                            header("Location: index.php?action=trangchu");
                            exit;
                        }

                        if (isset($_POST['btn_register'])) {

                            $name     = trim($_POST['name']);
                            $email    = trim($_POST['email']);
                            $password = trim($_POST['password']);
                            $repass   = trim($_POST['re_password']);
                            $phone    = trim($_POST['phone']);

                            /* ===== VALIDATE ===== */

                            // check rỗng
                            if ($name == '' || $email == '' || $password == '' || $repass == '') {
                                $_SESSION['error'] = 'Vui lòng nhập đầy đủ thông tin';
                                header("Location: index.php?action=register");
                                exit;
                            }

                            // check định dạng email
                            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                                $_SESSION['error'] = 'Email không đúng định dạng';
                                header("Location: index.php?action=register");
                                exit;
                            }

                            // check mật khẩu nhập lại
                            if ($password !== $repass) {
                                $_SESSION['error'] = 'Mật khẩu nhập lại không khớp';
                                header("Location: index.php?action=register");
                                exit;
                            }

                            /* ===== GỌI MODEL ===== */
                            $result = $this->model->registerUser($name, $email, $password, $phone);

                            if ($result === true) {
                                $_SESSION['success'] = 'Đăng ký thành công, vui lòng đăng nhập';
                                header("Location: index.php?action=login");
                                exit;
                            } else {
                                $_SESSION['error'] = $result;
                                header("Location: index.php?action=register");
                                exit;
                            }
                        }

                        include 'views/auth/register/register.php';
                        break;




                /* ===== BÀI ĐĂNG ===== */
                case 'baidang':

                    if (!isset($_SESSION['user'])) {
                        header("Location: index.php?action=login");
                        exit;
                    }

                    $user_id    = $_SESSION['user']['id'];
                    $role       = $_SESSION['user']['role'];
                    $trang_thai = isset($_GET['trang_thai']) ? (int)$_GET['trang_thai'] : '';
                    $keyword    = isset($_GET['keyword']) ? trim($_GET['keyword']) : '';

                    // 1. GHIM BÀI
                    if (isset($_GET['gim_id']) && isset($_GET['priority']) && $role === 'admin') {

                        $id       = (int)$_GET['gim_id'];
                        $priority = (int)$_GET['priority'];

                        $this->model->updatePriority($id, $priority);

                        header("Location: index.php?action=baidang&msg=priority_updated");
                        exit;
                    }

                    // 2. DUYỆT BÀI
                    if (isset($_POST['btn_duyet']) && $role === 'admin') {

                        $id = (int)$_POST['id'];
                        $this->model->duyetBaiDang($id);

                        header("Location: index.php?action=baidang&msg=approved");
                        exit;
                    }

                    // 3. XÓA BÀI
                    if (isset($_POST['btn_delete'])) {

                        $id     = (int)$_POST['id'];
                        $result = $this->model->getBaiDangById($id);

                        if ($result && $result->num_rows > 0) {

                            $data = $result->fetch_assoc();

                            if ($role === 'admin' || $data['user_id'] == $user_id) {

                                $this->model->deleteBaiDang($id);
                                header("Location: index.php?action=baidang&msg=deleted");
                                exit;

                            } else {
                                echo "<script>alert('Bạn không có quyền xóa');history.back();</script>";
                                exit;
                            }
                        }
                    }

                    // 4. LẤY DANH SÁCH
                    if ($role === 'admin') {

                        if ($trang_thai !== '') {
                            $baidang = $this->model->getBaiDangByTrangThai($trang_thai);
                        } else {
                            $baidang = $this->model->getAllBaiDang();
                        }

                    } else {
                        $baidang = $this->model->getBaiDangByUser($user_id);
                    }

                    include_once 'views/dashboard/html/baidang.php';
                    break;

                /* ===== CHI TIẾT BÀI ĐĂNG ===== */
                case 'baidang_detail':

                    if (!isset($_SESSION['user'])) {
                        header("Location: index.php?action=login");
                        exit;
                    }

                    $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

                    if ($id <= 0) {
                        header("Location: index.php?action=baidang");
                        exit;
                    }

                    $user_id = $_SESSION['user']['id'];
                    $role    = $_SESSION['user']['role'];

                    $result = $this->model->getBaiDangDetail($id);
                    $images = $this->model->get_img($_GET['id']);

                    if (!$result || $result->num_rows == 0) {
                        echo "<script>alert('Bài đăng không tồn tại');history.back();</script>";
                        exit;
                    }

                    $baidang = $result->fetch_assoc();

                    if (
                        $role !== 'admin'
                        && $baidang['user_id'] != $user_id
                        && $baidang['trang_thai'] != 1
                    ) {
                        echo "<script>alert('Bạn không có quyền xem bài đăng này');history.back();</script>";
                        exit;
                    }

                    include 'views/dashboard/html/baidang_detail.php';
                    break;

                /* ===== UPDATE TRẠNG THÁI ===== */
                case 'baidang_update_status':

                    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btn_update_status'])) {

                        $id         = (int)$_POST['id'];
                        $new_status = (int)$_POST['new_status'];

                        if ($_SESSION['user']['role'] === 'admin') {
                            $this->model->updateStatusBaiDang($id, $new_status);
                            header("Location: index.php?action=baidang&msg=success");
                        } else {
                            header("Location: index.php?action=baidang&msg=no_permission");
                        }
                    }
                    break;

                /* ===== SỬA BÀI ===== */
                case 'baidang_edit':

                    if (!isset($_SESSION['user'])) {
                        header("Location: index.php?action=login");
                        exit;
                    }

                    $user_id = $_SESSION['user']['id'];
                    $role    = $_SESSION['user']['role'];
                    $id      = (int)$_GET['id'];

                    if (isset($_POST['btn_edit'])) {

                        $this->model->updateBaiDang($_POST, $user_id, $role);

                        if (!empty($_POST['delete_images'])) {
                            $this->model->deleteBaiDangImages($_POST['delete_images']);
                        }

                        if (!empty($_FILES['new_images']['name'][0])) {
                            $this->model->addBaiDangImages($id, $_FILES['new_images']);
                        }

                        header("Location: index.php?action=baidang");
                        exit;
                    }

                    $baidang = $this->model->getBaiDangEdit($id, $user_id, $role);

                    if (!$baidang) {
                        echo "Không có quyền chỉnh sửa bài đăng này!";
                        exit;
                    }

                    include 'views/dashboard/html/baidang_edit.php';
                    break;

                /* ===== THÊM BÀI ===== */
                case 'baidang_add':

                    if (!isset($_SESSION['user'])) {
                        header("Location: index.php?action=login");
                        exit;
                    }

                    if (isset($_POST['btn_add'])) {
                        $this->model->insertBaiDang($_POST, $_FILES, $_SESSION['user']);
                        header("Location: index.php?action=baidang");
                        exit;
                    }

                    include 'views/dashboard/html/baidang_add.php';
                    break;

                /* ===== TƯ VẤN ===== */
                case 'tuvan':

                    if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
                        header("Location: index.php?action=login");
                        exit;
                    }

                    if (isset($_GET['duyet_id']) && isset($_GET['status'])) {

                        $id     = (int)$_GET['duyet_id'];
                        $status = (int)$_GET['status'];

                        $this->model->updateTrangThaiTuVan($id, $status);

                        header("Location: index.php?action=tuvan");
                        exit;
                    }

                    $tuvan = $this->model->getAllTuVan();
                    include 'views/dashboard/html/tuvan.php';
                    break;

                /* ===== LOGOUT ===== */
                case 'logout':
                    session_destroy();
                    header('location: index.php?action=login');
                    exit;
                    break;

                /* ===== SETTINGS ===== */
                case 'settings':

                    $current = $this->model->getSettings();

                    if (isset($_POST['btn_save_settings'])) {

                        $data = [
                            'site_name'       => $_POST['site_name'],
                            'hotline'         => $_POST['hotline'],
                            'email'           => $_POST['email'],
                            'address'         => $_POST['address'],
                            'site_color'      => $_POST['site_color'],
                            'seo_title'       => $_POST['seo_title'],
                            'seo_description' => $_POST['seo_description'],
                        ];

                        $image_fields = ['logo', 'slide1', 'slide2', 'slide3'];
                        $uploadDir    = __DIR__ . '/../../uploads/';

                        foreach ($image_fields as $field) {

                            if (isset($_FILES[$field]) && $_FILES[$field]['error'] === UPLOAD_ERR_OK) {

                                $tmpPath  = $_FILES[$field]['tmp_name'];
                                $ext      = pathinfo($_FILES[$field]['name'], PATHINFO_EXTENSION);
                                $fileName = time() . '_' . $field . '.' . $ext;

                                if (move_uploaded_file($tmpPath, $uploadDir . $fileName)) {
                                    $data[$field] = $fileName;
                                } else {
                                    $data[$field] = $current[$field];
                                }

                            } else {
                                $data[$field] = $current[$field];
                            }
                        }

                        $this->model->updateSettings($data);

                        header("Location: index.php?action=settings&msg=success");
                        exit;
                    }

                    $settings = $current;
                    include 'views/dashboard/html/setting.php';
                    break;

                /* ===== USERS ===== */
                case 'users':

                    if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 'admin') {
                        header("Location: index.php?action=login");
                        exit;
                    }

                    $users = $this->model->getAllUsers();
                    include 'views/dashboard/html/user.php';
                    break;

                case 'user_role':

                    if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 'admin') {
                        header("Location: index.php?action=login");
                        exit;
                    }

                    if (!isset($_GET['id'])) {
                        header("Location: index.php?action=users");
                        exit;
                    }

                    $id = (int)$_GET['id'];

                    if ($id == $_SESSION['user']['id']) {
                        header("Location: index.php?action=users&err=self");
                        exit;
                    }

                    $this->model->toggleUserRole($id);
                    header("Location: index.php?action=users");
                    exit;
                    break;

                case 'user_lock':

                    if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 'admin') {
                        header("Location: index.php?action=login");
                        exit;
                    }

                    $id = (int)$_GET['id'];

                    if ($id == $_SESSION['user']['id']) {
                        header("Location: index.php?action=users&err=self");
                        exit;
                    }

                    $this->model->setUserStatus($id, 0);
                    header("Location: index.php?action=users");
                    exit;
                    break;



                case 'user_unlock':

                    if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 'admin') {
                        header("Location: index.php?action=login");
                        exit;
                    }

                    $id = (int)$_GET['id'];

                    $this->model->setUserStatus($id, 1);
                    header("Location: index.php?action=users");
                    exit;
                    break;



                default:
                    header('location: index.php?action=trangchu');
                    exit;
            }

        } else {
            header('location: index.php?action=trangchu');
            exit;
        }
    }
}
?>
