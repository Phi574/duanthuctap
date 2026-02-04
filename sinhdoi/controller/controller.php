<?php
require_once 'model/model.php';

class controller
{
    private $model;

    public function __construct()
    {
        $this->model = new model();
    }

    public function hienthi()
    {
        $data_index          = $this->model->get_baidang_trangchu();
        $data_index_settings = $this->model->get_setting();

        include 'views/html/index.php';
    }

    public function dieuhuong()
    {
        $action = $_GET['action'] ?? 'trangchu';

        switch ($action) {

            case 'trangchu':
                $this->hienthi();
                break;

            case 'list_product':
            case 'search':

                $list_data = $this->model->get_all_baidang();
                $data_index_settings = $this->model->get_setting();

                if (isset($_POST['btn_search'])) {
                    $list_data = $this->model->search_list_baidang(
                        $_POST['tukhoa']    ?? '',
                        $_POST['loaibds']   ?? '',
                        $_POST['tinhthanh'] ?? '',
                        $_POST['dientich'] ?? '',
                        $_POST['gia']       ?? ''
                    );
                }

                $data_index_settings = $this->model->get_setting();
                $phanloaibds = $this->model->get_loai_bds();

                include_once 'views/html/list_product.php';
                break;


            case 'product':
                $data_index_settings = $this->model->get_setting();
                $id = $_GET['id'];
                $data = $this->model->get_baidang($id);
                $data_img = $this->model->get_images_product($id);
                include_once 'views/html/product.php';
                break;


            case 'tuvan_product':
              
                if (isset($_POST['btn_tuvan_product'])) 
                    {
                    $id_user = 1;
                    $name    = $_POST['name']    ?? '';
                    $sdt     = $_POST['sdt']     ?? '';
                    $email   = $_POST['email']   ?? '';
                    $noidung = $_POST['noidung'] ?? '';
                    $baidang_id = $_POST['baidang_id'];
 
                    $this->model->tuvan_product($id_user, $name, $sdt, $email, $noidung, $baidang_id);
                    header('location: index.php?action=product&id='.$baidang_id);
                    exit();                    
                }
                include_once 'views/html/product.php';
                break;




            







            case 'lienhe':
                $data_index_settings = $this->model->get_setting();
                include 'views/html/lienhe.php';
                break;






            case 'gioithieu':
                $data_index_settings = $this->model->get_setting();
                include 'views/html/gioithieu.php';
                break;





            case 'tuvan_trangchu':
                if ($_SERVER['REQUEST_METHOD'] === 'POST' || isset($_POST['btn_tuvan_product'])) {
                    $id_user = 1;
                    $name    = $_POST['name']    ?? '';
                    $sdt     = $_POST['sdt']     ?? '';
                    $email   = $_POST['email']   ?? '';
                    $noidung = $_POST['noidung'] ?? '';

                    if (!empty($name) && !empty($sdt)) {
                        $this->model->tuvan_trangchu($id_user, $name, $sdt, $email, $noidung);

                        if (session_status() === PHP_SESSION_NONE) {
                            session_start();
                        }

                        $_SESSION['da_gui_form'] = true;

                        header('location: index.php?action=trangchu');
                        exit();
                    }
                }

                include_once 'views/html/index.php';
                include_once 'views/html/lienhe.php';
                break;

            
                
            default:
                header('Location: index.php?action=trangchu');
                exit;
        }
    }
}
?>
