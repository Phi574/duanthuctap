<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Chi tiết bài đăng</title>
    <link rel="stylesheet" href="/duanthuctap/admin_sinhdoi/views/layout/css/style.css">
    <link rel="stylesheet" href="/duanthuctap/admin_sinhdoi/views/dashboard/css/baidang_detail.css">
</head>
<body>

<?php
include __DIR__ . '/../../layout/html/header.php';
include __DIR__ . '/../../layout/html/sidebar.php';
?>

<div class="main">
    <h2 class="page-title">Chi tiết bài đăng</h2>

    <div class="detail-box">
        <p><strong>Tiêu đề:</strong> <?= htmlspecialchars($baidang['tieu_de']) ?></p>
        <p><strong>Loại BĐS:</strong> <span class="badge"><?= $baidang['ten_loai'] ?></span></p>
        <p><strong>Người đăng:</strong> <?= $baidang['ten_nguoi_dang'] ?></p>
        <p><strong>Giá:</strong> <?= number_format($baidang['gia']) ?> đ</p>
        <p><strong>Diện tích:</strong> <?= $baidang['dien_tich'] ?> m²</p>
        <p><strong>Địa chỉ:</strong> <?= $baidang['dia_chi'] ?></p>

        <?php if ($baidang['loai_bds_id'] == 1): // Nếu là NHÀ ?>
            <p><strong>Số phòng:</strong> <?= $baidang['so_phong'] ?? 0 ?> phòng</p>
            <p><strong>Số tầng:</strong> <?= $baidang['so_tang'] ?? 0 ?> tầng</p>
        <?php elseif ($baidang['loai_bds_id'] == 2): // Nếu là ĐẤT ?>
            <p><strong>Loại đất:</strong> <?= ($baidang['loai_dat'] ?? 'Đang cập nhật') ?></p>
            <p><strong>Pháp lý:</strong> <?= ($baidang['phap_ly_dat'] ?? 'Đang cập nhật') ?></p>
        <?php endif; ?>
        
        <p><strong>Mô tả:</strong></p>
        <div class="content">
            <?= nl2br(($baidang['mo_ta'])) ?>
        </div>
        <p><strong>Ngày đăng:</strong> <?= date('d/m/Y H:i', strtotime($baidang['created_at'])) ?></p>

        <div style="margin-top: 20px;">
            <a href="index.php?action=baidang" class="btn back">← Quay lại</a>
            <a href="index.php?action=baidang_edit&id=<?= $baidang['id'] ?>" class="btn edit" style="background-color: #ffc107; color: #000; padding: 8px 15px; border-radius: 4px; text-decoration: none;">Sửa bài</a>
        </div>
    </div>

    <h3 style="margin-top: 30px;">Hình ảnh bài đăng</h3>
    <div class="image-gallery">
        <?php if (!empty($images)): ?>
            <?php foreach($images as $img): ?>
                <div class="image-item">
                    <img src="/DUANTHUCTAP/uploads/<?= ($img['image']) ?>" alt="Hình ảnh bài đăng">
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="empty-msg">Không có hình ảnh nào cho bài đăng này.</p>
        <?php endif; ?>
    </div>
</div>

<?php include __DIR__ . '/../../layout/html/footer.php'; ?>

</body>
</html>