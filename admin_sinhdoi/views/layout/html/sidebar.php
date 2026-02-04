<aside class="sidebar bg-[#1e293b] text-white w-64 min-h-screen flex flex-col transition-all duration-300" id="admin-sidebar">
    
    <div class="h-16 flex items-center justify-between px-6 bg-[#0f172a] border-b border-gray-700">
        <div class="text-2xl font-bold tracking-wider">
            SinhDoi<span class="text-orange-500">Land</span>
        </div>
        <button id="close-sidebar" class="lg:hidden text-gray-400 hover:text-white text-2xl">
            <i class="fa-solid fa-xmark"></i>
        </button>
    </div>

    <nav class="flex-1 py-6 space-y-1 overflow-y-auto">
        
        <a href="index.php?action=dashboard" class="block px-6 py-3 hover:bg-white/10 hover:border-r-4 border-orange-500 transition-all <?= ($action=='dashboard') ? 'bg-white/10 border-r-4 border-orange-500' : '' ?>">
            <i class="fa-solid fa-chart-pie w-6"></i> Tổng quan
        </a>

        <a href="index.php?action=baidang" class="block px-6 py-3 hover:bg-white/10 hover:border-r-4 border-orange-500 transition-all <?= ($action=='baidang' || $action=='baidang_add' || $action=='baidang_edit') ? 'bg-white/10 border-r-4 border-orange-500' : '' ?>">
            <i class="fa-solid fa-building w-6"></i> Bài đăng BĐS
        </a>

        <a href="index.php?action=tuvan" class="block px-6 py-3 hover:bg-white/10 hover:border-r-4 border-orange-500 transition-all <?= ($action=='tuvan') ? 'bg-white/10 border-r-4 border-orange-500' : '' ?>">
            <i class="fa-solid fa-comments w-6"></i> Khách hàng tư vấn
        </a>

        <a href="index.php?action=user" class="block px-6 py-3 hover:bg-white/10 hover:border-r-4 border-orange-500 transition-all <?= ($action=='user') ? 'bg-white/10 border-r-4 border-orange-500' : '' ?>">
            <i class="fa-solid fa-users w-6"></i> Quản lý tài khoản
        </a>

        <a href="index.php?action=setting" class="block px-6 py-3 hover:bg-white/10 hover:border-r-4 border-orange-500 transition-all <?= ($action=='setting') ? 'bg-white/10 border-r-4 border-orange-500' : '' ?>">
            <i class="fa-solid fa-gear w-6"></i> Cấu hình chung
        </a>

    </nav>

    <div class="p-4 bg-[#0f172a] text-xs text-gray-400 text-center">
        &copy; 2024 SinhDoiLand Admin
    </div>
</aside>