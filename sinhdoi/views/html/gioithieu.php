<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet"
    />
    <link rel="stylesheet" href="views/css/list_product.css" />
    <title>liên hệ</title>
    <style>
        .text-orange-main { color: #ff5722; }
        .bg-orange-main { background-color: #ff5722; }
        .bg-hero-dark {
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), 
                        url('https://images.unsplash.com/photo-1449824913935-59a10b8d2000?auto=format&fit=crop&w=1920&q=80');
            background-size: cover;
            background-position: center;
        }
         
    </style>
</head>
<body class="bg-white font-sans text-gray-800">

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
                <a href="index.php?action=gioithieu" class="nav-link active">giới thiệu</a>
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

    <section class="bg-hero-dark h-[500px] flex items-center justify-center text-center px-4">
        <div class="max-w-4xl bg-black/30 p-8 rounded-lg backdrop-blur-sm">
            <h1 class="text-white text-2xl md:text-4xl font-bold leading-relaxed uppercase italic">
                "SINHDOILAND nỗ lực mang đến nhiều sản phẩm được xác minh thông qua nền tảng công nghệ, giúp bạn dễ dàng tìm được mảnh đất ưng ý với mức giá cả hợp lý"
            </h1>
        </div>
    </section>

    <section class="container mx-auto px-6 py-20 max-w-5xl">
        <div class="space-y-16">
            
            <div>
                <h2 class="text-2xl font-bold text-gray-700 mb-6 uppercase tracking-wide border-l-4 border-orange-main pl-4">Giới thiệu về SINHDOILAND</h2>
                <p class="leading-loose text-gray-600 text-justify">
                    SINHDOILAND là đơn vị hoạt động trong lĩnh vực bất động sản tại Thái Nguyên, được thành lập với đội ngũ giàu kinh nghiệm, am hiểu thị trường địa phương. Chúng tôi chuyên tư vấn, môi giới và phân phối các sản phẩm bất động sản đa dạng như đất nền, nhà ở và dự án đầu tư, nhằm mang đến cho khách hàng những giải pháp phù hợp, minh bạch và hiệu quả. SINHDOILAND luôn đặt uy tín và lợi ích của khách hàng làm trọng tâm trong mọi hoạt động.
                </p>
            </div>

            <div>
                <h2 class="text-2xl font-bold text-gray-700 mb-8 uppercase tracking-wide border-l-4 border-orange-main pl-4">Giá trị cốt lõi</h2>
                <div class="space-y-8 ml-4">
                    <div>
                        <h4 class="font-bold text-gray-800 mb-2 italic">- Chính trực:</h4>
                        <p class="text-gray-600 pl-4">Liêm chính, trung thực trong ứng xử và trong tất cả các giao dịch.</p>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-800 mb-2 italic">- Khát vọng:</h4>
                        <p class="text-gray-600 pl-4">Chuyển mình cùng thời cuộc, nỗ lực để vươn đến sự thịnh vượng, thành công.</p>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-800 mb-2 italic">- Hợp tác:</h4>
                        <p class="text-gray-600 pl-4">Đặt mục tiêu thấu hiểu, tôn trọng, chia sẻ thông tin một cách trung thực và cởi mở đến Quý đối tác & Quý khách hàng.</p>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-800 mb-2 italic">- Tiên phong:</h4>
                        <p class="text-gray-600 pl-4">Mogivi luôn cống hiến, dẫn đầu về công nghệ trong lĩnh vực môi giới bất động sản bằng hành động và kết quả.</p>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-800 mb-2 italic">- Con người:</h4>
                        <p class="text-gray-600 pl-4">Con người là trọng tâm, là nhân tố quyết định sự phát triển của doanh nghiệp.</p>
                    </div>
                </div>
            </div>

            <div>
                <h2 class="text-2xl font-bold text-gray-700 mb-8 uppercase tracking-wide border-l-4 border-orange-main pl-4">Tầm nhìn và sứ mệnh</h2>
                <div class="space-y-6 ml-4">
                    <p class="text-gray-600">
                        <strong class="text-gray-800">Tầm nhìn:</strong> Trở thành công ty công nghệ bất động sản phát triển bền vững, gia nhập vào hệ sinh thái Proptech tại Việt Nam.
                    </p>
                    <p class="text-gray-600">
                        <strong class="text-gray-800">Sứ mệnh:</strong> Góp phần minh bạch hóa các giao dịch trên thị trường bất động sản, tận tâm mang đến giá trị thiết thực cho Đối tác và Khách hàng.
                    </p>
                </div>
            </div>

        </div>
    </section>

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

</body>
</html>