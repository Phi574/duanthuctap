<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Chỉnh sửa bài đăng</title>
    <link rel="stylesheet" href="/duanthuctap/admin_sinhdoi/views/layout/css/style.css">
    <link rel="stylesheet" href="/duanthuctap/admin_sinhdoi/views/dashboard/css/baidang_edit.css">
</head>
<body>

<?php
include __DIR__ . '/../../layout/html/header.php';
include __DIR__ . '/../../layout/html/sidebar.php';
?>

<div class="main">
    <h2 class="page-title">Chỉnh sửa bài đăng #<?= $baidang['id'] ?></h2>

    <div class="detail-box">
        <form action="index.php?action=baidang_edit&id=<?= $baidang['id'] ?>" method="POST" enctype="multipart/form-data">
            
            <input type="hidden" name="id" value="<?= $baidang['id'] ?>">

            <div class="form-group">
                <label>Tiêu đề bài đăng</label>
                <input type="text" name="tieu_de" class="form-control" value="<?= $baidang['tieu_de'] ?>" required>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Giá (VND)</label>
                    <input type="number" name="gia" class="form-control" value="<?= $baidang['gia'] ?>">
                </div>
                <div class="form-group">
                    <label>Diện tích (m²)</label>
                    <input type="number" name="dien_tich" class="form-control" value="<?= $baidang['dien_tich'] ?>">
                </div>
            </div>

            <div class="form-group">
                <label>Địa chỉ</label>
                <input type="text" name="dia_chi" class="form-control" value="<?= $baidang['dia_chi'] ?>">
            </div>

            <div class="form-group">
                <label>Mô tả chi tiết</label>
                <textarea name="mo_ta" class="form-control" rows="5"><?= $baidang['mo_ta'] ?></textarea>
            </div>

            <hr>

            <?php if ($baidang['loai_bds_id'] == 1): ?>
                <h4 class="section-title">Thông tin Nhà</h4>
                <div class="form-row">
                    <div class="form-group"><label>Số phòng</label><input type="number" name="so_phong" class="form-control" value="<?= $baidang['so_phong'] ?? '' ?>"></div>
                    <div class="form-group"><label>Số tầng</label><input type="number" name="so_tang" class="form-control" value="<?= $baidang['so_tang'] ?? '' ?>"></div>
                    <div class="form-group"><label>pháp lý</label><input  name="phap_ly" class="form-control" value="<?= $baidang['phap_ly_nha'] ?? '' ?>"></div>
                    <div class="form-group"><label>nội thất</label><input  name="noi_that" class="form-control" value="<?= $baidang['noi_that'] ?? '' ?>"></div>
                </div>
            <?php elseif ($baidang['loai_bds_id'] == 2): ?>
                <h4 class="section-title">Thông tin Đất</h4>
                <div class="form-row">
                    <div class="form-group"><label>Loại đất</label><input type="text" name="loai_dat" class="form-control" value="<?= $baidang['loai_dat'] ?? '' ?>"></div>
                    <div class="form-group"><label>Pháp lý</label><input type="text" name="phap_ly_dat" class="form-control" value="<?= $baidang['phap_ly_dat'] ?? '' ?>"></div>
                </div>
            <?php endif; ?>

            <hr>

            <h4 class="section-title">Hình ảnh hiện tại</h4>
            <div class="image-gallery">
                <?php if (!empty($baidang['images'])): ?>
                    <?php foreach ($baidang['images'] as $img): ?>
                        <div class="image-item">
                            <img src="/duanthuctap/uploads/<?= $img['image'] ?>">
                            <label class="delete-img">
                                <input type="checkbox" name="delete_images[]" value="<?= $img['id'] ?>"> Xóa
                                
                            </label>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="empty-msg">Chưa có ảnh.</p>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label>Thêm ảnh mới</label>
                <input type="file" name="new_images[]" class="form-control" multiple>
                
            </div>

            <div class="action-buttons">
                <button type="submit" name="btn_edit" class="btn-save">Lưu thay đổi</button>
                <a href="index.php?action=baidang" class="btn back">Quay lại</a>
            </div>
        </form>
    </div>
</div>
<?php include __DIR__ . '/../../layout/html/footer.php'; ?>
</body>
</html>