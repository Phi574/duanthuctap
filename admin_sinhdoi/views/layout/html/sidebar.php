<div class="sidebar">
    <div class="logo">SinhDoiLand</div>
    <ul>
        <li>
            <a href="index.php?action=trangchu">Dashboard</a>
        </li>

        <li>
            <a href="index.php?action=baidang">Bài đăng</a>
        </li>

        <li>
            <a href="index.php?action=tuvan">Tư vấn</a>
        </li>

        <?php if (isset($_SESSION['user']) && $_SESSION['user']['role'] === 'admin'): ?>
            <li>
                <a href="index.php?action=settings">Setting</a>
            </li>

            <li>
                <a href="index.php?action=users">Người dùng</a>
            </li>
        <?php endif; ?>

        <li>
            <a href="index.php?action=logout">Đăng xuất</a>
        </li>
    </ul>
</div>
