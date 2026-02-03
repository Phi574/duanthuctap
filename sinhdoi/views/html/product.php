<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet"
    />
    <link rel="stylesheet" href="views/css/product.css" />
</head>
<body class="bg-gray-100">

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
                <a href="index.php?action=list_product" class="nav-link">Bất Động Sản</a>
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
        </div>
    </header>

    <div class="max-w-6xl mx-auto grid grid-cols-1 lg:grid-cols-3 gap-6">
        
        <div class="lg:col-span-2 space-y-6">
            
            <div class="bg-white p-4 rounded-lg shadow-sm">
    <!-- Ảnh chính -->
    <div class="aspect-video bg-gray-200 rounded-lg overflow-hidden mb-4">
        <img
    id="mainImage"
    src="/DUANTHUCTAP/uploads/<?= $data_img[0]['image'] ?>"
    alt="Hình ảnh bất động sản"
    class="w-full h-full object-cover transition duration-300"
/>
    </div>

    <!-- Ảnh thumbnail -->
    <div class="flex gap-2 overflow-x-auto">
        <?php foreach ($data_img as $index => $img): ?>
    <button
        type="button"
        onclick="changeImage('<?= $img['image'] ?>')"
        class="w-20 h-16 rounded overflow-hidden border
               <?= $index === 0 ? 'border-orange-500' : 'border-gray-200' ?>
               hover:border-orange-500 transition shrink-0"
    >
        <img
            src="/DUANTHUCTAP/uploads/<?= $img['image'] ?>"
            alt="Ảnh chi tiết bất động sản"
            class="w-full h-full object-cover"
        >
    </button>
<?php endforeach; ?>
    </div>

    <!-- Action -->
    <div class="flex justify-between mt-4 text-gray-600 border-t pt-4 text-sm">
        <button class="hover:text-red-500 transition">
            <i class="far fa-heart mr-2"></i>like
        </button>
        
    </div>
</div>


            <div class="bg-white p-6 rounded-lg shadow-sm">
                <h1 class="text-xl font-bold text-gray-800 mb-2">
                    <?= $data['tieu_de'] ?>
                </h1>
                <div class="flex items-baseline gap-4 mb-4">
                    <span class="text-red-600 font-bold text-2xl"> Giá : <?= number_format($data['gia'] ?? 'giá cả thương lượng') ?></span>
                    <span class="text-gray-500"><?=  $data['dien_tich'] ?>  m² </span>
                    <span class="text-gray-400 text-sm"><?= number_format($data['gia'] /  $data['dien_tich']) ?>/m²   </span>
                </div>
                <p class="text-gray-500 text-sm italic"><i class="fas fa-map-marker-alt mr-2"></i><?=  $data['dia_chi'] ?></p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-sm">
                <h3 class="font-bold border-b pb-2 mb-4">Chi tiết bất động sản</h3>





                <div class="grid grid-cols-2 gap-y-4 text-sm">

                    <div class="text-gray-500">
                        <h2 class="font-medium text-right lg:text-left">Giấy tờ pháp lý: </h2>
                        <?php  ?> <?=  $data['phap_ly_dat'] ??  $data['phap_ly_nha'] ?>
                    </div>

                    <div class="text-gray-500">
                        <h2 class="font-medium text-right lg:text-left">Nội thất: </h2>  
                        <?php echo  $data['noi_that'] ?> 
                    </div>

                    <div class="text-gray-500">
                        <h2 class="font-medium text-right lg:text-left">Diện tích: </h2>
                         <?=$data['dien_tich'] ?? '' ?>/m²
                    </div>
                    <div class="text-gray-500">
                        <h2 class="font-medium text-right lg:text-left">Đất: </h2>
                        <?php  ?> <?=  $data['loai_dat'] ?? '' ?>
                    </div>

                    <div class="text-gray-500">
                        <h2 class="font-medium text-right lg:text-left">số phòng: </h2>
                        <?php  ?> <?=  $data['so_phong']  ?? '' ?>
                    </div>

                    <div class="text-gray-500">
                        <h2 class="font-medium text-right lg:text-left">số tầng: </h2>
                        <?php  ?> <?=  $data['so_tang'] ?? '' ?>
                    </div>

                </div>






            </div>

            <div class="bg-white p-6 rounded-lg shadow-sm">
                <h3 class="font-bold border-b pb-2 mb-4">Mô tả</h3>
                <p class="text-gray-700 leading-relaxed text-sm">
                    <?=  
                        $data['mo_ta'];
                    ?>
                </p>
            </div>
        </div>

        <div class="space-y-6">
            <div class="bg-white p-6 rounded-lg shadow-sm sticky top-4">
                <div class="flex items-center gap-4 mb-6">
                    <div class="w-12 h-12 bg-blue-600 rounded-full flex items-center justify-center text-white font-bold">R</div>
                    <div>
                        <p class="font-bold"><?=  $data['name'] ?></p>
                        <p class="text-xs text-gray-400">đăng ngày : <?=  $data['created_at'] ?></p>
                    </div>
                </div>
                
                <div class="space-y-3">
                    <button class="w-full py-3 bg-green-600 text-white rounded-lg font-bold hover:bg-green-700 transition">
                        <i class="fas fa-phone-alt mr-2"></i> <?=  $data['phone'] ?> <span class="text-xs font-normal ml-2">gọi ngay</span>
                    </button>
                    
                </div>

                
            </div>
        </div>

    </div>
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
  <script src="views/js/product.js"></script>
</body>
</html>