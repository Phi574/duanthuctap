<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cấu hình hệ thống</title>

    <link rel="stylesheet" href="/duanthuctap/admin_sinhdoi/views/layout/css/style.css">
    <link rel="stylesheet" href="/duanthuctap/admin_sinhdoi/views/dashboard/css/baidang.css">
    <link rel="stylesheet" href="/duanthuctap/admin_sinhdoi/views/dashboard/css/settings.css">
</head>
<body>

<?php
include __DIR__ . '/../../layout/html/header.php';
include __DIR__ . '/../../layout/html/sidebar.php';
?>

<div class="main">
    <h2>Cấu hình hệ thống</h2>

    <!-- CHỈ 1 FORM DUY NHẤT -->
    <form action="index.php?action=settings" method="POST" enctype="multipart/form-data" class="form-settings">

        <div class="form-group">
            <label>Tên Website:</label>
            <input type="text" name="site_name" value="<?= $settings['site_name'] ?>" class="form-control">
        </div>

        <div class="form-row">
            <div class="col">
                <label>Hotline:</label>
                <input type="text" name="hotline" value="<?= $settings['hotline'] ?>" class="form-control">
            </div>
            <div class="col">
                <label>Email liên hệ:</label>
                <input type="email" name="email" value="<?= $settings['email'] ?>" class="form-control">
            </div>
        </div>

        <div class="form-group">
            <label>Địa chỉ:</label>
            <input type="text" name="address" value="<?= $settings['address'] ?>" class="form-control">
        </div>

        <div class="form-group">
            <label>Màu chủ đạo:</label>
            <input type="color" name="site_color" value="<?= $settings['site_color'] ?>">
            <span><?= $settings['site_color'] ?></span>
        </div>

        <hr>
        <h3>SEO</h3>

        <div class="form-group">
            <label>SEO Title:</label>
            <input type="text" name="seo_title" value="<?= $settings['seo_title'] ?>" class="form-control">
        </div>

        <div class="form-group">
            <label>SEO Description:</label>
            <textarea name="seo_description" class="form-control"><?= $settings['seo_description'] ?></textarea>
        </div>

        <hr>
        <h3>Hình ảnh</h3>

        <!-- LOGO -->
        <div class="form-group">
            <label>Logo Website:</label><br>
            <?php if (!empty($settings['logo'])): ?>
                <img src="/duanthuctap/uploads/<?= $settings['logo'] ?>" height="80">
            <?php endif; ?>
            <input type="file" name="logo" class="form-control">
            <small>Để trống nếu muốn giữ ảnh cũ</small>
        </div>

        <!-- SLIDES -->
        <div class="form-row">
            <?php for ($i = 1; $i <= 3; $i++): 
                $s = "slide$i"; ?>
                <div class="col">
                    <label>Slide <?= $i ?>:</label><br>
                    <?php if (!empty($settings[$s])): ?>
                        <img src="/duanthuctap/uploads/<?= $settings[$s] ?>" style="width:100%; height:80px; object-fit:cover; margin-bottom:6px;">
                    <?php endif; ?>
                    <input type="file" name="<?= $s ?>" class="form-control">
                </div>
            <?php endfor; ?>
        </div>

        <button type="submit" name="btn_save_settings" class="btn-submit">
            Lưu cấu hình
        </button>

    </form>
</div>

<?php include __DIR__ . '/../../layout/html/footer.php'; ?>
</body>
</html>
