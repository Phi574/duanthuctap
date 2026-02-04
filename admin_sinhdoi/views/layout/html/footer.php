</div> 
    </div>

    <div class="sidebar-overlay" id="sidebar-overlay"></div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const toggleBtn = document.getElementById('sidebar-toggle');
            const closeBtn = document.getElementById('close-sidebar');
            const sidebar = document.getElementById('admin-sidebar');
            const overlay = document.getElementById('sidebar-overlay');

            // Hàm bật/tắt
            function toggleSidebar() {
                sidebar.classList.toggle('active');
                overlay.classList.toggle('active');
                
                // Khóa cuộn trang khi mở menu để trải nghiệm tốt hơn
                if (sidebar.classList.contains('active')) {
                    document.body.style.overflow = 'hidden';
                } else {
                    document.body.style.overflow = '';
                }
            }

            // Gán sự kiện click (Kiểm tra null để tránh lỗi console)
            if(toggleBtn) toggleBtn.addEventListener('click', toggleSidebar);
            if(closeBtn) closeBtn.addEventListener('click', toggleSidebar);
            if(overlay) overlay.addEventListener('click', toggleSidebar);
        });
    </script>

</body>
</html>