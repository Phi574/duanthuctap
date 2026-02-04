<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý bài đăng</title>
    <link rel="stylesheet" href="/duanthuctap/admin_sinhdoi/views/layout/css/style.css">
    <link rel="stylesheet" href="/duanthuctap/admin_sinhdoi/views/dashboard/css/user.css">
    <link rel="stylesheet" href="/duanthuctap/admin_sinhdoi/views/dashboard/css/baidang.css">

</head>
<body>

<?php
// Header và Sidebar
include __DIR__ . '/../../layout/html/header.php';
include __DIR__ . '/../../layout/html/sidebar.php';
?>

<div class="main">
    <div class="card">
    <h2>👤 Quản lý người dùng</h2>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>THÔNG TIN CƠ BẢN</th>
                <th>QUYỀN HẠN</th>
                <th>TRẠNG THÁI</th>
                <th>HÀNH ĐỘNG</th>
            </tr>
        </thead>
        <tbody>

        <?php if (!empty($users)) : ?>
            <?php foreach ($users as $u) : ?>
                <tr>
                    <td>#<?= $u['id'] ?></td>

                    <td class="user-info">
                        <strong><?= ($u['name']) ?></strong>
                        <span><?= ($u['email']) ?></span>
                    </td>

                    <td>
                        <?php if ($u['role'] == 'admin') : ?>
                            <span class="badge badge-admin">Admin</span>
                        <?php else : ?>
                            <span class="badge badge-user">User</span>
                        <?php endif; ?>

                        <?php if ($u['id'] != $_SESSION['user']['id']) : ?>
                            <a class="btn btn-change"
                               href="index.php?action=user_role&id=<?= $u['id'] ?>"
                               onclick="return confirm('Đổi quyền user này?')">
                                ⇄ Đổi
                            </a>
                        <?php endif; ?>
                    </td>

                    <td>
                        <?php if ($u['status'] == 1) : ?>
                            <span class="status active">● Hoạt động</span>
                        <?php else : ?>
                            <span class="status lock">● Đã khóa</span>
                        <?php endif; ?>
                    </td>

                    <td>
                        <?php if ($u['id'] == $_SESSION['user']['id']) : ?>
                            <span class="note">(Đang đăng nhập)</span>
                        <?php else : ?>
                            <?php if ($u['status'] == 1) : ?>
                                <a class="btn btn-lock"
                                   href="index.php?action=user_lock&id=<?= $u['id'] ?>"
                                   onclick="return confirm('Khóa user này?')">
                                    🔒 Khóa
                                </a>
                            <?php else : ?>
                                <a class="btn btn-change"
                                   href="index.php?action=user_unlock&id=<?= $u['id'] ?>">
                                    🔓 Mở
                                </a>
                            <?php endif; ?>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else : ?>
            <tr>
                <td colspan="5">Không có dữ liệu</td>
            </tr>
        <?php endif; ?>

        </tbody>
    </table>
</div>
</div>
<?php include __DIR__ . '/../../layout/html/footer.php'; ?>

</body>
</html>