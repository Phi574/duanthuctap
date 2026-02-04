<!doctype html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SINHDOILAND - Hệ thống cho thuê nhà đất toàn quốc</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet"
    />
    <link rel="stylesheet" href="views/css/list_product.css" />
</head>

<body class="bg-[#f8f9fa] text-slate-900">

    <!-- HEADER -->
    <header class="bg-[#111] text-white sticky top-0 z-[100] shadow-xl">
        <div class="container mx-auto px-4 h-16 flex justify-between items-center">

            <div class="flex items-center space-x-3 group cursor-pointer">
                <div
                    class="w-10 h-10 bg-orange-600 rounded-xl flex items-center justify-center shadow-lg shadow-orange-900/20 group-hover:rotate-12 transition-transform overflow-hidden"
                >
                    <img
                        src="/DUANTHUCTAP/uploads/<?= $data_index_settings['logo'] ?? '' ?>"
                        alt="Logo"
                        class="w-full h-full object-cover"
                    />
                </div>

                <span class="font-extrabold text-2xl tracking-tighter uppercase">
                    <?= $data_index_settings['site_name'] ?? 'SINHDOILAND' ?>
                </span>
            </div>

            <nav class="hidden md:flex items-center space-x-8 text-[13px] uppercase font-bold tracking-wider">
                <a href="index.php?action=trangchu"  class="nav-link">Trang Chủ</a>
                <a href="index.php?action=list_product" class="nav-link active">Bất Động Sản</a>
                <a href="index.php?action=gioithieu" class="nav-link">giới thiệu</a>
                <a href="index.php?action=lienhe" class="nav-link">liên hệ</a>
            </nav>

            <a
                href="tel:<?= $data_index_settings['hotline'] ?? '0900000000' ?>"
                class="bg-orange-600 hover:bg-orange-700 px-5 py-2.5 rounded-full font-bold text-xs transition-all flex items-center gap-2"
            >
                <i class="fa-solid fa-phone-volume animate-pulse"></i>
                <?= $data_index_settings['hotline'] ?? 'Gọi ngay' ?>
            </a>
            </a>
            <button id="mobile-menu-btn" class="lg:hidden text-white text-2xl p-2 focus:outline-none">
    <i class="fa-solid fa-bars"></i>
</button>

<div id="mobile-menu-overlay" class="fixed inset-0 bg-black/95 z-[999] hidden flex-col items-center justify-center space-y-8 transition-opacity duration-300">
    <button id="close-menu-btn" class="absolute top-6 right-6 text-white text-4xl p-2 hover:text-orange-500 transition">
        <i class="fa-solid fa-xmark"></i>
    </button>

    <div class="text-3xl font-bold text-white mb-4">
        SinhDoi<span class="text-[#ff5722]">Land</span>
    </div>

    <a href="index.php?action=trangchu" class="mobile-link text-xl font-bold text-white hover:text-[#ff5722] tracking-widest transition">Trang Chủ</a>
    <a href="index.php?action=list_product" class="mobile-link text-xl font-bold text-[#ff5722] tracking-widest transition">Bất Động Sản</a>
    <a href="index.php?action=gioithieu" class="mobile-link text-xl font-bold text-white hover:text-[#ff5722] tracking-widest transition">giới thiệu</a>
    <a href="index.php?action=lienhe" class="mobile-link text-xl font-bold text-white hover:text-[#ff5722] tracking-widest transition">liên hệ</a>
</div>
        </div>
    </header>

    <!-- MAIN -->
    <main class="container mx-auto px-4 py-8">
        <div class="flex flex-col lg:flex-row gap-8">

            <!-- CONTENT -->
            <section class="flex-1">

                <div class="mb-6 sticky-top-left">
                    <div class="flex items-center gap-2 text-xs text-gray-400 mb-2">
                        <a href="#" class="hover:text-orange-500">Trang chủ</a>
                        <span>/</span>
                        <span class="text-gray-600">Cho thuê nhà đất</span>
                    </div>

                    <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4">
                        <div>
                            <h1 class="text-2xl font-extrabold text-slate-800 tracking-tight">
                                Cho thuê nhà đất toàn quốc
                            </h1>
                            <p class="text-sm text-slate-500 mt-1">
                                Tìm thấy
                                <span class="font-bold text-orange-600"><?= count($list_data ?? []) ?></span>
                                tin đăng phù hợp
                            </p>
                        </div>

                        
                    </div>
                </div>

                <div id="productList" class="grid gap-6">

                    <?php if (!empty($list_data)) : ?>
                        <?php foreach ($list_data as $data) : ?>

                            <a href="index.php?action=product&id=<?=(int)$data['id']?>">

                                <div
                                class="product-item bg-white border border-gray-100 rounded-2xl overflow-hidden hover:shadow-2xl hover:shadow-gray-200/50 transition-all duration-300 group flex flex-col md:flex-row ring-1 ring-transparent hover:ring-orange-100">
                                <!-- IMAGE -->
                                <div class="md:w-[380px] h-[240px] relative overflow-hidden flex shrink-0 bg-gray-100">

                                    <?php
                                        $images    = $data['images'] ?? [];
                                        $total     = count($images);
                                        $error_img = 'error.jpg';
                                    ?>

                                    <div class="w-2/3 h-full pr-[2px] overflow-hidden">
                                        <?php if ($total > 0 && !empty($images[0])) : ?>
                                            <img
                                                src="/DUANTHUCTAP/uploads/<?= $images[0] ?>"
                                                class="object-cover w-full h-full group-hover:scale-105 transition-transform duration-700"
                                            />
                                        <?php else : ?>
                                            <img
                                                src="/DUANTHUCTAP/uploads/<?= $error_img ?>"
                                                class="object-cover w-full h-full opacity-60 grayscale"
                                            />
                                        <?php endif; ?>
                                    </div>

                                    <div class="w-1/3 h-full flex flex-col gap-[2px]">

                                        <?php for ($i = 1; $i <= 2; $i++) : ?>
                                            <div class="h-1/2 relative overflow-hidden bg-gray-200">

                                                <?php if (isset($images[$i]) && !empty($images[$i])) : ?>
                                                    <img
                                                        src="/DUANTHUCTAP/uploads/<?= $images[$i] ?>"
                                                        class="object-cover w-full h-full group-hover:scale-110 transition-transform duration-700"
                                                    />

                                                    <?php if ($i == 2 && $total > 3) : ?>
                                                        <div
                                                            class="absolute inset-0 bg-black/60 backdrop-blur-[2px] flex items-center justify-center"
                                                        >
                                                            <span class="text-white text-sm font-bold">
                                                                +<?= $total - 3 ?> ảnh
                                                            </span>
                                                        </div>
                                                    <?php endif; ?>

                                                <?php else : ?>
                                                    <img
                                                        src="/DUANTHUCTAP/uploads/<?= $error_img ?>"
                                                        class="object-cover w-full h-full opacity-60 grayscale"
                                                    />
                                                <?php endif; ?>
                                            </div>
                                        <?php endfor; ?>

                                    </div>
                                </div>

                                <!-- INFO -->
                                <div class="p-5 flex flex-col justify-between flex-1">
                                    <div>
                                        <h2
                                            class="text-base font-bold text-slate-800 leading-snug group-hover:text-orange-600 transition-colors line-clamp-2 uppercase"
                                        >
                                            <?= $data['tieu_de'] ?? 'Tiêu đề trống' ?>
                                        </h2>

                                        <div class="flex flex-wrap items-center gap-y-2 gap-x-4 mt-3">
                                            <div class="flex items-center text-orange-600 font-extrabold text-lg">
                                                <?= number_format($data['gia'] ?? 'giá cả thương lượng') ?>
                                                <span class="text-xs ml-1 text-orange-400">tr</span>
                                            </div>

                                            <div class="w-1 h-1 rounded-full bg-gray-300"></div>

                                            <div class="flex items-center text-slate-700 font-bold text-md">
                                                <?= $data['dien_tich'] ?? '0' ?>
                                                <span class="text-xs ml-1 text-gray-400 font-normal">m²</span>
                                            </div>
                                        </div>

                                        <div class="flex items-start gap-2 mt-3 text-gray-500">
                                            <i class="fa-solid fa-location-dot mt-1 text-sm text-gray-400"></i>
                                            <span class="text-[13px] line-clamp-1 italic">
                                                <?= $data['dia_chi'] ?? 'Chưa cập nhật địa chỉ' ?>
                                            </span>
                                        </div>

                                        <p class="text-gray-500 text-[13px] line-clamp-2 mt-3 leading-relaxed">
                                            <?= $data['mo_ta'] ?? '' ?>
                                        </p>
                                    </div>

                                    <div class="mt-4 pt-4 border-t border-gray-50 flex justify-between items-center">
                                        <h1 class="text-[11px] text-gray-400 font-medium uppercase tracking-tight">
                                            ĐĂNG BỞI:
                                            <span class="text-slate-600">
                                                <?= $data['user_name'] ?? 'Ẩn danh' ?>
                                            </span>
                                            <span class="mx-2 text-gray-200">|</span>
                                            NGÀY:
                                            <span class="text-slate-600">
                                                <?= isset($data['created_at']) ? date('d/m/Y', strtotime($data['created_at'])) : '--/--/--' ?>
                                            </span>
                                        </h1>

                                        <button
                                            class="text-orange-600 hover:text-orange-700 font-bold text-xs flex items-center gap-1"
                                        >
                                            Chi tiết
                                            <i class="fa-solid fa-arrow-right-long text-[10px]"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            </a>

                        <?php endforeach; ?>
                    <?php endif; ?>

                </div>

                <div id="pagination" class="mt-10 flex justify-center items-center gap-2"></div>
            </section>







<?php
$gia_selected = isset($_POST['gia']) ? $_POST['gia'] : 2000000000; // mặc định 2 tỷ
?>

           <button type="button" id="mobile-filter-btn" onclick="toggleMobileFilter()" 
        class="lg:hidden fixed bottom-24 right-4 bg-[#ff5722] text-white w-14 h-14 rounded-full shadow-2xl flex items-center justify-center text-2xl hover:scale-110 transition-transform animate-bounce"
        style="z-index: 99999;"> <i class="fa-solid fa-filter"></i>
</button>

<div class="col-span-12 lg:col-span-3">
    <div id="filter-sidebar" class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 sticky top-24">
        
        <div class="flex justify-between items-center mb-6 lg:hidden border-b pb-4">
            <h3 class="font-bold text-xl flex items-center gap-2 text-[#ff5722]">
                <i class="fa-solid fa-filter"></i> Bộ lọc
            </h3>
            <button type="button" id="close-filter-btn" onclick="toggleMobileFilter()" class="text-3xl text-slate-400 hover:text-red-500">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>

        <form action="index.php?action=search" method="POST" class="search-form space-y-5">
            <h3 class="text-sm font-extrabold text-slate-800 uppercase tracking-wide mb-2 hidden lg:block">
                Tìm kiếm nâng cao
            </h3>

            <div class="form-group">
                <label class="font-bold text-sm text-slate-600 mb-1 block">Từ khóa</label>
                <div class="input-icon relative">
                    <i class="fa-solid fa-magnifying-glass absolute left-3 top-3 text-slate-400"></i>
                    <input type="text" name="tukhoa" placeholder="Nhập từ khóa..." class="w-full pl-10 pr-4 py-2 border border-slate-200 rounded-lg focus:outline-none focus:border-[#ff5722]" />
                </div>
            </div>

            <div class="form-group">
                <label class="font-bold text-sm text-slate-600 mb-1 block">Loại bất động sản</label>
                <select name="loaibds" class="w-full p-2 border border-slate-200 rounded-lg focus:outline-none focus:border-[#ff5722]">
                    <option value="">-- Tất cả --</option>
                    <?php if(isset($phanloaibds)) foreach($phanloaibds as $loai_bds): ?>
                        <option value="<?= $loai_bds['ten_loai'] ?>"><?= $loai_bds['ten_loai'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label class="font-bold text-sm text-slate-600 mb-1 block">Tỉnh / Thành phố</label>
                <select name="tinhthanh" class="w-full p-2 border border-slate-200 rounded-lg focus:outline-none focus:border-[#ff5722]">
                    <option value="">-- Tất cả --</option>
                    <?php if(isset($data_list)) foreach($data_list as $tinhthanh): ?>
                        <option value="<?= $tinhthanh['tinh_thanh'] ?>"><?= $tinhthanh['tinh_thanh'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label class="font-bold text-sm text-slate-600 mb-1 block">Diện tích (m²)</label>
                <div class="input-icon relative">
                    <i class="fa-solid fa-ruler-combined absolute left-3 top-3 text-slate-400"></i>
                    <input type="number" name="dientich" placeholder="VD: 50" class="w-full pl-10 pr-4 py-2 border border-slate-200 rounded-lg focus:outline-none focus:border-[#ff5722]" />
                </div>
            </div>

            <div class="form-group">
                <label class="font-bold text-sm text-slate-600 mb-1 block">
                    Giá tối đa: <span id="rangeValue" class="text-[#ff5722] font-bold">5</span> tỷ
                </label>
                <input type="range" id="priceRange" name="gia" min="500000000" max="10000000000" step="100000000" value="5000000000" class="w-full h-2 bg-slate-200 rounded-lg appearance-none cursor-pointer accent-[#ff5722]">
            </div>

            <button type="submit" name="btn_search" class="w-full bg-[#ff5722] text-white font-bold py-3 rounded-xl shadow-lg hover:bg-orange-700 transition-all">
                LỌC KẾT QUẢ
            </button>
        </form>
    </div>
</div>

<div id="filter-overlay" onclick="toggleMobileFilter()" class="fixed inset-0 bg-black/70 z-[99999] hidden transition-opacity duration-300" style="backdrop-filter: blur(2px);"></div>

<script>
    // Hàm bật tắt filter
    function toggleMobileFilter() {
        const sidebar = document.getElementById('filter-sidebar');
        const overlay = document.getElementById('filter-overlay');
        
        if (!sidebar || !overlay) return;

        // Toggle class để trượt lên/xuống
        sidebar.classList.toggle('active-mobile');
        
        // Xử lý hiển thị màn đen
        if (sidebar.classList.contains('active-mobile')) {
            overlay.classList.remove('hidden');
            document.body.style.overflow = 'hidden'; // Khóa cuộn trang web
        } else {
            overlay.classList.add('hidden');
            document.body.style.overflow = ''; // Mở khóa cuộn
        }
    }

    // Logic thanh kéo giá (Price Range) giữ nguyên
    document.addEventListener("DOMContentLoaded", function() {
        const range = document.getElementById('priceRange');
        const valueDisplay = document.getElementById('rangeValue');
        if(range && valueDisplay) {
            range.addEventListener('input', function() {
                let valInBillion = (this.value / 1000000000).toFixed(1);
                valueDisplay.innerText = valInBillion;
            });
        }
    });
</script>

            
        </div>
    </main>

    <footer class="bg-[#0b0f19] text-gray-400 pt-24 pb-12 overflow-hidden relative">
        <div class="absolute top-0 right-0 w-1/3 h-full bg-[#ff5722]/5 blur-[120px] rounded-full -mr-20"></div>

        <div class="container mx-auto px-6 relative z-10">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-16 mb-20">
                <div data-aos="fade-up">
                    <div class="flex items-center space-x-3 mb-8">
                        <div class="w-10 h-10 bg-[#ff5722] rounded-xl flex items-center justify-center shadow-lg">
                           <img src="/DUANTHUCTAP/uploads/<?= $data_index_settings['logo'] ?>" alt="" >
                        </div>
                        <span class="brand-font font-extrabold text-xl tracking-tighter text-white uppercase">
                            <?= $data_index_settings['site_name'] ?>
                        </span>
                    </div>
                    <p class="leading-relaxed mb-8 text-sm">
                        SinhDoiLand tự hào là đơn vị tiên phong trong lĩnh vực môi giới bất động sản cao cấp, mang lại giá trị thực và niềm tin bền vững cho khách hàng.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="social-icon"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="#" class="social-icon"><i class="fa-brands fa-youtube"></i></a>
                        <a href="#" class="social-icon"><i class="fa-brands fa-tiktok"></i></a>
                        <a href="#" class="social-icon"><i class="fa-solid fa-envelope"></i></a>
                    </div>
                </div>

                <div data-aos="fade-up" data-aos-delay="100">
                    <h4 class="text-white font-bold text-lg mb-8 uppercase tracking-widest border-l-4 border-[#ff5722] pl-4">Khám Phá</h4>
                    <ul class="space-y-4 text-sm font-medium">
                        <li><a href="index.php?action=trangchu" class="block hover:text-white">Trang chủ</a></li>
                        <li><a href="index.php?action=list_product" class="block hover:text-white">Danh sách dự án</a></li>
                        <li><a href="index.php?action=introduce" class="block hover:text-white">Về SinhDoiLand</a></li>
                        <li><a href="#" class="block hover:text-white">Tin tức thị trường</a></li>
                        <li><a href="index.php?action=contact" class="block hover:text-white">Liên hệ hợp tác</a></li>
                    </ul>
                </div>

                <div data-aos="fade-up" data-aos-delay="200">
                    <h4 class="text-white font-bold text-lg mb-8 uppercase tracking-widest border-l-4 border-[#ff5722] pl-4">Sản Phẩm</h4>
                    <ul class="space-y-4 text-sm font-medium">
                        <li><a href="#" onclick="filterProducts('nha')" class="block hover:text-white">Nhà phố cao cấp</a></li>
                        <li><a href="#" onclick="filterProducts('dat')" class="block hover:text-white">Đất nền dự án</a></li>
                        <li><a href="#" class="block hover:text-white">Biệt thự nghỉ dưỡng</a></li>
                        <li><a href="#" class="block hover:text-white">Căn hộ Penthouse</a></li>
                        <li><a href="#" class="block hover:text-white">Bất động sản công nghiệp</a></li>
                    </ul>
                </div>

                <div data-aos="fade-up" data-aos-delay="300">
                    <h4 class="text-white font-bold text-lg mb-8 uppercase tracking-widest border-l-4 border-[#ff5722] pl-4">Liên Hệ</h4>
                    <ul class="space-y-6 text-sm">
                        <li class="flex items-start">
                            <i class="fa-solid fa-map-location-dot text-[#ff5722] mt-1 mr-4 text-lg"></i>
                            <span>123 Đường Bất Động Sản, Quận 1, TP. Hồ Chí Minh</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fa-solid fa-phone-volume text-[#ff5722] mr-4 text-lg"></i>
                            <span class="text-white font-bold text-lg"><?= $data_index_settings['hotline'] ?></span>
                        </li>
                        <li class="flex items-center">
                            <i class="fa-solid fa-envelope-open-text text-[#ff5722] mr-4 text-lg"></i>
                            <span><?= $data_index_settings['email'] ?></span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-white/5 pt-12 mt-12 flex flex-col md:flex-row justify-between items-center gap-6">
                <p class="text-xs tracking-widest uppercase">
                    &copy; 2024 <span class="text-white font-bold"><?= $data_index_settings['site_name'] ?></span>. All Rights Reserved.
                </p>
                <div class="flex space-x-8 text-xs tracking-widest uppercase font-bold">
                    <a href="#" class="hover:text-white transition">Chính sách bảo mật</a>
                    <a href="#" class="hover:text-white transition">Điều khoản sử dụng</a>
                </div>
            </div>
        </div>
    </footer>

    <script src="views/js/list_product.js"></script>
    <script>
    const menuBtn = document.getElementById('mobile-menu-btn');
    const closeBtn = document.getElementById('close-menu-btn');
    const menuOverlay = document.getElementById('mobile-menu-overlay');
    const mobileLinks = document.querySelectorAll('.mobile-link');

    function toggleMenu() {
        menuOverlay.classList.toggle('hidden');
        menuOverlay.classList.toggle('flex');
        
        // Khóa cuộn trang khi mở menu
        if (!menuOverlay.classList.contains('hidden')) {
            document.body.style.overflow = 'hidden';
        } else {
            document.body.style.overflow = 'auto';
        }
    }

    menuBtn.addEventListener('click', toggleMenu);
    closeBtn.addEventListener('click', toggleMenu);

    // Tự đóng menu khi bấm vào link
    mobileLinks.forEach(link => {
        link.addEventListener('click', toggleMenu);
    });
</script>
</body>

</html>