<!DOCTYPE html>
<html lang="en">
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

    <style>.text-orange-main { color: #ff5722; }
        .bg-orange-main { background-color: #ff5722; }
        .bg-hero-contact {
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), 
                        url('https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=1920&q=80');
            background-size: cover;
            background-position: center;
        }</style>
</head>
<body style="background-color: #f5eded;">

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
                <a href="index.php?action=lienhe" class="nav-link active">liên hệ</a>
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
    <section class="bg-hero-contact py-20 text-center text-white">
        <h1 class="text-4xl font-bold uppercase mb-4">Liên Hệ Với Chúng Tôi</h1>
        <p class="text-gray-300 max-w-2xl mx-auto px-4">Chúng tôi luôn sẵn sàng lắng nghe và hỗ trợ bạn. Hãy gửi tin nhắn cho chúng tôi ngay hôm nay.</p>
    </section>

    <main class="container mx-auto px-4 py-16">
        
        <?php if(isset($_GET['status'])): ?>
            <?php if($_GET['status'] == 'success'): ?>
                <div class="mb-8 p-4 bg-green-100 border-l-4 border-green-500 text-green-700 rounded shadow-sm">
                    <i class="fa fa-check-circle mr-2"></i> Cảm ơn bạn! Thông tin liên hệ đã được gửi thành công. Chúng tôi sẽ phản hồi sớm nhất.
                </div>
            <?php else: ?>
                <div class="mb-8 p-4 bg-red-100 border-l-4 border-red-500 text-red-700 rounded shadow-sm">
                    <i class="fa fa-exclamation-triangle mr-2"></i> Có lỗi xảy ra. Vui lòng kiểm tra lại thông tin hoặc thử lại sau.
                </div>
            <?php endif; ?>
        <?php endif; ?>

        <div class="flex flex-col lg:flex-row gap-8">
            <div class="lg:w-1/3 space-y-4">
                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 flex items-start gap-4">
                    <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center text-orange-main shrink-0">
                        <i class="fa fa-phone-alt text-xl"></i>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-800">Điện Thoại</h3>
                        <p class="text-orange-main font-bold text-lg mt-1">0346 619 632</p>
                        <p class="text-gray-400 text-xs mt-1">Hỗ trợ tư vấn 24/7</p>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 flex items-start gap-4">
                    <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center text-orange-main shrink-0">
                        <i class="fa fa-envelope text-xl"></i>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-800">Email</h3>
                        <p class="text-gray-600 font-medium mt-1">contact@sinhdoiland.com</p>
                        <p class="text-gray-400 text-xs mt-1">Phản hồi trong vòng 24 giờ làm việc</p>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 flex items-start gap-4">
                    <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center text-orange-main shrink-0">
                        <i class="fa fa-map-marker-alt text-xl"></i>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-800">Địa Chỉ</h3>
                        <p class="text-gray-600 font-medium mt-1">Thủ Đức, TP. Hồ Chí Minh</p>
                        <p class="text-gray-400 text-xs mt-1">Văn phòng đại diện SINHDOILAND</p>
                    </div>
                </div>
            </div>

            <div class="lg:w-2/3 bg-white p-8 rounded-xl shadow-sm border border-gray-100">
                <h2 class="text-2xl font-bold text-gray-800 mb-8">Gửi Lời Nhắn Cho Chúng Tôi</h2>
                
                <form action="index.php?act=contact_submit" method="POST" class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label class="text-sm font-semibold text-gray-600">Họ và Tên *</label>
                            <input type="text" name="ho_ten" required placeholder="Nhập họ và tên" class="w-full border border-gray-200 rounded-lg p-3 focus:outline-none focus:border-orange-main transition">
                        </div>
                        <div class="space-y-2">
                            <label class="text-sm font-semibold text-gray-600">Email *</label>
                            <input type="email" name="email" required placeholder="Nhập địa chỉ email" class="w-full border border-gray-200 rounded-lg p-3 focus:outline-none focus:border-orange-main transition">
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label class="text-sm font-semibold text-gray-600">Số Điện Thoại</label>
                            <input type="tel" name="so_dien_thoai" placeholder="Nhập số điện thoại" class="w-full border border-gray-200 rounded-lg p-3 focus:outline-none focus:border-orange-main transition">
                        </div>
                        <div class="space-y-2">
                            <label class="text-sm font-semibold text-gray-600">Tiêu Đề *</label>
                            <input type="text" name="tieu_de" required placeholder="Bạn quan tâm đến dự án nào?" class="w-full border border-gray-200 rounded-lg p-3 focus:outline-none focus:border-orange-main transition">
                        </div>
                    </div>
                    <div class="space-y-2">
                        <label class="text-sm font-semibold text-gray-600">Nội Dung Tin Nhắn *</label>
                        <textarea name="noi_dung" required rows="4" placeholder="Nhập nội dung tin nhắn chi tiết..." class="w-full border border-gray-200 rounded-lg p-3 focus:outline-none focus:border-orange-main transition"></textarea>
                    </div>
                    
                    <button type="submit" name="gui_lien_he" class="w-full bg-orange-main text-white font-bold py-4 rounded-lg hover:bg-orange-600 transition flex items-center justify-center gap-2 shadow-lg shadow-orange-100">
                        <i class="fa fa-paper-plane"></i> GỬI TIN NHẮN NGAY
                    </button>
                    <p class="text-center text-xs text-gray-400 italic font-medium">* Chúng tôi cam kết bảo mật thông tin của bạn</p>
                </form>
            </div>
        </div>
    </main>
    <footer class="bg-[#0b0f19] text-gray-400 pt-24 pb-12 overflow-hidden relative">
            <div class="absolute top-0 right-0 w-1/3 h-full bg-[#ff5722]/5 blur-[120px] rounded-full -mr-20"></div>

            <div class="container mx-auto px-6 relative z-10">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-16 mb-20">
                    <div data-aos="fade-up">
                        <div class="flex items-center space-x-3 mb-8">
                            <div class="w-10 h-10 bg-[#ff5722] rounded-xl flex items-center justify-center shadow-lg">
                                <img src="/DUANTHUCTAP/uploads/<?= $data_index_settings['logo'] ?>" alt="" />
                            </div>
                            <span class="brand-font font-extrabold text-xl tracking-tighter text-white uppercase">
                                <?= $data_index_settings['site_name'] ?>
                            </span>
                        </div>
                        <p class="leading-relaxed mb-8 text-sm">
                            SinhDoiLand tự hào là đơn vị tiên phong trong lĩnh vực môi giới bất động sản cao cấp, mang
                            lại giá trị thực và niềm tin bền vững cho khách hàng.
                        </p>
                        <div class="flex space-x-4">
                            <a href="#" class="social-icon"><i class="fa-brands fa-facebook-f"></i></a>
                            <a href="#" class="social-icon"><i class="fa-brands fa-youtube"></i></a>
                            <a href="#" class="social-icon"><i class="fa-brands fa-tiktok"></i></a>
                            <a href="#" class="social-icon"><i class="fa-solid fa-envelope"></i></a>
                        </div>
                    </div>

                    <div data-aos="fade-up" data-aos-delay="100">
                        <h4
                            class="text-white font-bold text-lg mb-8 uppercase tracking-widest border-l-4 border-[#ff5722] pl-4"
                        >
                            Khám Phá
                        </h4>
                        <ul class="space-y-4 text-sm font-medium">
                            <li><a href="index.php?action=trangchu" class="block hover:text-white">Trang chủ</a></li>
                            <li>
                                <a href="index.php?action=list_product" class="block hover:text-white"
                                    >Danh sách dự án</a
                                >
                            </li>
                            <li>
                                <a href="index.php?action=introduce" class="block hover:text-white">Về SinhDoiLand</a>
                            </li>
                            <li><a href="#" class="block hover:text-white">Tin tức thị trường</a></li>
                            <li>
                                <a href="index.php?action=contact" class="block hover:text-white">Liên hệ hợp tác</a>
                            </li>
                        </ul>
                    </div>

                    <div data-aos="fade-up" data-aos-delay="200">
                        <h4
                            class="text-white font-bold text-lg mb-8 uppercase tracking-widest border-l-4 border-[#ff5722] pl-4"
                        >
                            Sản Phẩm
                        </h4>
                        <ul class="space-y-4 text-sm font-medium">
                            <li>
                                <a href="#" onclick="filterProducts('nha')" class="block hover:text-white"
                                    >Nhà phố cao cấp</a
                                >
                            </li>
                            <li>
                                <a href="#" onclick="filterProducts('dat')" class="block hover:text-white"
                                    >Đất nền dự án</a
                                >
                            </li>
                            <li><a href="#" class="block hover:text-white">Biệt thự nghỉ dưỡng</a></li>
                            <li><a href="#" class="block hover:text-white">Căn hộ Penthouse</a></li>
                            <li><a href="#" class="block hover:text-white">Bất động sản công nghiệp</a></li>
                        </ul>
                    </div>

                    <div data-aos="fade-up" data-aos-delay="300">
                        <h4
                            class="text-white font-bold text-lg mb-8 uppercase tracking-widest border-l-4 border-[#ff5722] pl-4"
                        >
                            Liên Hệ
                        </h4>
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

                <div
                    class="border-t border-white/5 pt-12 mt-12 flex flex-col md:flex-row justify-between items-center gap-6"
                >
                    <p class="text-xs tracking-widest uppercase">
                        &copy; 2024 <span class="text-white font-bold"><?= $data_index_settings['site_name'] ?></span>.
                        All Rights Reserved.
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