<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/duanthuctap/admin_sinhdoi/views/layout/css/style.css">
    <link rel="stylesheet" href="/duanthuctap/admin_sinhdoi/views/dashboard/css/baidang_add.css">
    <link rel="stylesheet" href="/duanthuctap/admin_sinhdoi/views/dashboard/css/baidang.css">
    <title>Document</title>
</head>
<body>
    <?php
// Header và Sidebar
include __DIR__ . '/../../layout/html/header.php';
include __DIR__ . '/../../layout/html/sidebar.php';
?>
  <div class="main">
    <form method="post" enctype="multipart/form-data">
        <label>Tiêu đề</label>
        <input type="text" name="tieu_de" placeholder="Ví dụ: Bán nhà mặt phố Quận 1" required>

        <div class="grid-row">
            <div>
                <label>Giá (VNĐ)</label>
                <input type="number" name="gia">
            </div>
            <div>
                <label>Diện tích (m²)</label>
                <input type="number" name="dien_tich">
            </div>
        </div>

        <label>Địa chỉ</label>
        <input type="text" name="dia_chi">

        <label>Mô tả</label>
        <textarea name="mo_ta" placeholder="Nhập thông tin chi tiết về bất động sản..."></textarea>

        <label>Loại BĐS</label>
        <select name="loai_bds_id" id="loai_bds_select" required>
            <option value="1">🏠 Nhà</option>
            <option value="2">🌱 Đất</option>
        </select>

        <div class="grid-row" id="group_nha">
            <div>
                <label>Số phòng</label>
                <input type="number" name="so_phong">
            </div>
            <div>
                <label>Số tầng</label>
                <input type="number" name="so_tang">
            </div>

            <div>
                <label>pháp lý: </label>
                <input type="text" name="phap_ly_nha">
            </div>

            <div>
                <label> nội thất: </label>
                <input type="text" name="noi_that">
            </div>
        </div>

        <div class="grid-row" id="group_dat" style="display: none;">
            <div>
                <label>Loại đất</label>
                <input type="text" name="loai_dat">
            </div>
            <div>
                <label>Pháp lý</label>
                <input type="text" name="phap_ly_dat">
            </div>
        </div>

        <label>Hình ảnh (Có thể chọn nhiều)</label>
        <input type="file" name="images[]" multiple>

        <button type="submit" name="btn_add">Đăng bài ngay</button>
    </form>
</div>
<?php include __DIR__ . '/../../layout/html/footer.php'; ?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const selectBds = document.getElementById('loai_bds_select');
    const groupNha = document.getElementById('group_nha');
    const groupDat = document.getElementById('group_dat');

    function toggleFields() {
        const value = selectBds.value;
        if (value === '1') {
            // Hiển thị thông tin Nhà, ẩn Đất
            groupNha.style.display = 'flex'; // Hoặc 'grid' tùy CSS của bạn
            groupDat.style.display = 'none';
        } else if (value === '2') {
            // Hiển thị thông tin Đất, ẩn Nhà
            groupNha.style.display = 'none';
            groupDat.style.display = 'flex';
        }
    }

    // Chạy ngay khi load trang để khớp trạng thái mặc định
    toggleFields();

    // Lắng nghe sự kiện thay đổi
    selectBds.addEventListener('change', toggleFields);
});
</script>
</body>
</html>