<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý bài đăng</title>
    <link rel="stylesheet" href="/duanthuctap/admin_sinhdoi/views/layout/css/style.css">
    <link rel="stylesheet" href="/duanthuctap/admin_sinhdoi/views/dashboard/css/baidang.css">
</head>
<body>

<?php
// Header và Sidebar
include __DIR__ . '/../../layout/html/header.php';
include __DIR__ . '/../../layout/html/sidebar.php';
?>

<div class="main">
    <h2 class="page-title">
        <?= ($role === 'admin') ? 'Tất cả bài đăng hệ thống' : 'Bài đăng của tôi' ?>
    </h2>

    <div class="action-header">
        <a href="index.php?action=baidang_add" class="btn btn-add">
            <i class="fas fa-plus"></i> Thêm bài đăng
        </a>
    </div>

    <div class="table-box">
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tiêu đề</th>
                    <th>Giá</th>
                    <th>Diện tích</th>
                    <th>Trạng thái</th>
                    <th>Cập nhật</th> <th>Ngày đăng</th>
                    <th>Ưu tiên</th>
                    <th>Hành động</th>
                </tr>
            </thead>

            <tbody>
<?php 
if (isset($baidang) && (is_array($baidang) || is_object($baidang))) : 
    
    if (is_object($baidang) && $baidang->num_rows > 0) {
        $data = $baidang;
    } else if (is_array($baidang) && count($baidang) > 0) {
        $data = $baidang;
    } else {
        $data = null;
    }

    if ($data) :
        $i = 1;
        foreach ($data as $row) : 
?>
    <tr>
        <td><?= $i++ ?></td>
        <td class="title"><?= htmlspecialchars($row['tieu_de']) ?></td>
        <td><?= number_format($row['gia']) ?> đ</td>
        <td><?= $row['dien_tich'] ?> m²</td>
        
        <td>
            <?php 
                $status_labels = [
                    0 => ['text' => 'Chờ duyệt', 'class' => 'warning'],
                    1 => ['text' => 'Hoạt động', 'class' => 'success'],
                    2 => ['text' => 'Đã chốt', 'class' => 'danger'],
                    3 => ['text' => 'Đã ẩn', 'class' => 'info']
                ];
                $st = $row['trang_thai'] ?? 0;
            ?>
            <span class="status <?= $status_labels[$st]['class'] ?>">
                <?= $status_labels[$st]['text'] ?>
            </span>
        </td>

        <td>
            <?php if ($role === 'admin'): ?>
                <form method="POST" action="index.php?action=baidang_update_status" style="display: flex; gap: 5px;">
                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                    <select name="new_status" style="padding: 2px; border-radius: 4px; border: 1px solid #ddd;">
                        <option value="0" <?= $st == 0 ? 'selected' : '' ?>>Chờ duyệt</option>
                        <option value="1" <?= $st == 1 ? 'selected' : '' ?>>Hoạt động</option>
                        <option value="2" <?= $st == 2 ? 'selected' : '' ?>>Đã bán/chốt</option>
                        <option value="3" <?= $st == 3 ? 'selected' : '' ?>>Ẩn bài</option>
                    </select>
                    <button type="submit" name="btn_update_status" class="btn approve" style="padding: 2px 8px; font-size: 11px;">Lưu</button>
                </form>
            <?php else: ?>
                <span style="font-size: 12px; color: #999;">Không có quyền</span>
            <?php endif; ?>
        </td>

        <td><?= date('d/m/Y', strtotime($row['created_at'])) ?></td>

        <td style="text-align: center;">
            <?php if (isset($row['is_priority']) && $row['is_priority'] == 1): ?>
                <a href="index.php?action=baidang&gim_id=<?= $row['id'] ?>&priority=0" 
                   title="Bỏ ghim" onclick="return confirm('Bỏ ghim bài viết này?')">
                   <span style="font-size: 1.2rem;">📌</span>
                </a>
            <?php else: ?>
                <a href="index.php?action=baidang&gim_id=<?= $row['id'] ?>&priority=1" 
                   title="Ghim lên đầu" onclick="return confirm('Ghim bài viết này lên đầu trang?')">
                   <span style="font-size: 1.2rem; filter: grayscale(100%); opacity: 0.5;">📍</span>
                </a>
            <?php endif; ?>
        </td>

        <td class="action">
            <div style="display: flex; gap: 5px;">
                <a href="index.php?action=baidang_detail&id=<?= $row['id'] ?>" class="btn view">Xem</a>
                <a href="index.php?action=baidang_edit&id=<?= $row['id'] ?>" class="btn view" style="background-color: #f39c12;">Sửa</a>
                
                <form method="post" action="index.php?action=baidang" onsubmit="return confirm('Xác nhận xóa bài đăng này?')">
                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                    <button type="submit" name="btn_delete" class="btn delete">Xóa</button>
                </form>
            </div>
        </td>
    </tr>

<?php 
        endforeach; 
    else : 
?>
    <tr><td colspan="9" class="empty">Không có dữ liệu bài đăng.</td></tr>
<?php 
    endif;
endif; 
?>
</tbody>
        </table>
    </div>
</div>
<?php include __DIR__ . '/../../layout/html/footer.php'; ?>

</body>
</html>