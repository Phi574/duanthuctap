<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý tư vấn</title>
    <link rel="stylesheet" href="/duanthuctap/admin_sinhdoi/views/layout/css/style.css">
    <link rel="stylesheet" href="/duanthuctap/admin_sinhdoi/views/dashboard/css/baidang.css">
    <style>
        /* Màu sắc cho từng loại badge trạng thái hiện tại */
        .status-badge { padding: 5px 10px; border-radius: 4px; font-size: 12px; color: #fff; font-weight: bold; display: inline-block; min-width: 80px; text-align: center; }
        .status-0 { background-color: #6c757d; } /* Chưa xử lý - Xám */
        .status-1 { background-color: #17a2b8; } /* Đã liên hệ - Xanh biển */
        .status-2 { background-color: #ffc107; color: #000; } /* Đã cọc - Vàng */
        .status-3 { background-color: #28a745; } /* Đã chốt - Xanh lá */
        
        /* Style cho ô chọn trạng thái */
        .select-status {
            padding: 6px;
            border-radius: 4px;
            border: 1px solid #ccc;
            background-color: #fff;
            cursor: pointer;
            font-size: 13px;
        }
        .select-status:hover { border-color: #007bff; }
    </style>
</head>
<body>

<?php
include __DIR__ . '/../../layout/html/header.php';
include __DIR__ . '/../../layout/html/sidebar.php';
?>

<div class="main">
    <h2>Danh sách tư vấn</h2>
    <table class="tuvan-table">
        <thead>
            <tr>
                <th>Khách hàng</th> 
                <th>SĐT / Email</th> 
                <th>Bài đăng</th>    
                <th>Nội dung</th>    
                <th>Trạng thái hiện tại</th>  
                <th>Cập nhật trạng thái</th>   
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($tuvan)): ?>
                <?php foreach ($tuvan as $tv): ?>
                    <tr>
                        <td><strong><?= ($tv['ten_khach']) ?></strong></td>
                        <td>
                            <div><?= ($tv['phone']) ?></div>
                            <small style="color: #666;"><?= ($tv['email']) ?></small>
                        </td>
                        <td><?= ($tv['tieu_de'] ?? '—') ?></td>
                        <td><?= ($tv['noi_dung']) ?></td>

                        <td>
                            <?php 
                                $status_text = ['Chưa xử lý', 'Đã liên hệ', 'Đã cọc', 'Đã chốt'];
                                $curr_status = $tv['trang_thai'];
                            ?>
                            <span class="status-badge status-<?= $curr_status ?>">
                                <?= $status_text[$curr_status] ?? 'Không xác định' ?>
                            </span>
                        </td>

                        <td>
                            <select class="select-status" onchange="confirmUpdate(<?= $tv['id'] ?>, this)">
                                <option value="0" <?= $curr_status == 0 ? 'selected' : '' ?>>⚪ Chưa xử lý</option>
                                <option value="1" <?= $curr_status == 1 ? 'selected' : '' ?>>📞 Đã liên hệ</option>
                                <option value="2" <?= $curr_status == 2 ? 'selected' : '' ?>>💰 Đã cọc</option>
                                <option value="3" <?= $curr_status == 3 ? 'selected' : '' ?>>🤝 Đã chốt</option>
                            </select>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="6" style="text-align:center;">Chưa có dữ liệu</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<script>
function confirmUpdate(id, selectElement) {
    const selectedText = selectElement.options[selectElement.selectedIndex].text;
    if (confirm("Bạn có chắc chắn muốn đổi sang trạng thái: " + selectedText + "?")) {
        // Chuyển hướng đến link xử lý với ID và Status tương ứng
        window.location.href = "index.php?action=tuvan&duyet_id=" + id + "&status=" + selectElement.value;
    } else {
        // Nếu nhấn "Hủy", reset lại ô select về giá trị cũ bằng cách load lại trang
        location.reload();
    }
}
</script>

<?php include __DIR__ . '/../../layout/html/footer.php'; ?>
</body>
</html>