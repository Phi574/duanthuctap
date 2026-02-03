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
                        $_POST['tukhoa'] ?? '',
                        $_POST['loaibds'] ?? '',
                        $_POST['tinhthanh'] ?? '',
                        $_POST['dientich'] ?? '',
                        $_POST['gia'] ?? ''
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


            case 'lienhe':
                $data_index_settings = $this->model->get_setting();
                include 'views/html/lienhe.php';


            case 'gioithieu':
                $data_index_settings = $this->model->get_setting();
                include 'views/html/gioithieu.php';
    

            default:
                header('Location: index.php?action=trangchu');
                exit;
        }
    }
}
?>
