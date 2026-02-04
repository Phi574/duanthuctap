<!doctype html>
<html lang="vi">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>SinhDoiLand - Bất Động Sản Cao Cấp</title>

        <script src="https://cdn.tailwindcss.com"></script>
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>


        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>




        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
        <link
            href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap"
            rel="stylesheet"
        />
        <link rel="stylesheet" href="views/css/list_product.css" />
        <link rel="stylesheet" href="/duanthuctap/sinhdoi/views/css/index.css" />
    </head>
    <style>
        /* ==============================
   HERO SWIPER FIX
================================ */

        .hero-swiper {
            width: 100%;
            height: 100%;
        }

        .hero-swiper .swiper-wrapper {
            display: flex;
        }

        .hero-swiper .swiper-slide {
            flex-shrink: 0;
            width: 100%;
            height: 100%;
            position: relative;
        }

        .hero-swiper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        /* ==============================
   HERO SWIPER – FORCE FULL COVER
================================ */

        /* Khung swiper PHẢI có chiều cao */
        .hero-swiper {
            width: 100%;
            height: 420px; /* bắt buộc */
        }

        /* Wrapper */
        .hero-swiper .swiper-wrapper {
            width: 100%;
            height: 100%;
        }

        /* Slide */
        .hero-swiper .swiper-slide {
            width: 100%;
            height: 100%;
            position: relative;
            overflow: hidden;
        }

        /* IMG BỊ ÉP PHỦ KÍN */
        .hero-swiper .swiper-slide img {
            position: absolute; /* 👈 QUAN TRỌNG */
            inset: 0; /* top right bottom left = 0 */
            width: 100%;
            height: 100%;
            object-fit: cover; /* 👈 luôn phủ kín */
            object-position: center;
        }
    </style>
    <body class="bg-slate-50 text-slate-900">
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
                    <a href="index.php?action=trangchu" class="nav-link active">Trang Chủ</a>
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

    <a href="index.php?action=trangchu" class="mobile-link text-xl font-bold text-[#ff5722] tracking-widest transition">Trang Chủ</a>
    <a href="index.php?action=list_product" class="mobile-link text-xl font-bold text-white hover:text-[#ff5722] tracking-widest transition">Bất Động Sản</a>
    <a href="index.php?action=gioithieu" class="mobile-link text-xl font-bold text-white hover:text-[#ff5722] tracking-widest transition">Giới Thiệu</a>
    <a href="index.php?action=lienhe" class="mobile-link text-xl font-bold text-white hover:text-[#ff5722] tracking-widest transition">Liên Hệ</a>
</div>
            </div>
        </header>

        <section class="relative min-h-screen flex items-center bg-[#0b0f19] pt-20 overflow-hidden">
            <div class="absolute inset-0 opacity-30">
                <div class="absolute inset-0 bg-gradient-to-r from-[#0b0f19] via-transparent to-transparent z-10"></div>
                <img
                    src="https://images.unsplash.com/photo-1582407947304-fd86f028f716?auto=format&fit=crop&w=1920&q=80"
                    class="w-full h-full object-cover"
                    alt="Hero Background"
                />
            </div>

            <div class="container mx-auto px-6 grid lg:grid-cols-2 gap-16 items-center relative z-20">
                <div data-aos="fade-right">
                    <div
                        class="inline-flex items-center space-x-3 mb-6 bg-white/5 border border-white/10 px-4 py-2 rounded-full backdrop-blur-md"
                    >
                        <span class="text-white text-xs font-bold tracking-[0.3em] uppercase"
                            >Nâng tầm giá trị sống</span
                        >
                    </div>
                    <h1 class="text-6xl md:text-8xl font-extrabold text-white leading-none mb-8">
                        TÌM KIẾM <br />
                        <span class="text-gradient">AN CƯ</span>
                    </h1>
                    <p class="text-gray-400 text-lg mb-12 max-w-lg font-light leading-relaxed">
                        Kiến tạo không gian sống thượng lưu và giải pháp đầu tư bất động sản an toàn, sinh lời bền vững.
                    </p>
                    <div class="flex flex-wrap gap-5">
                        <button
                            onclick="document.getElementById('danh-muc-san-pham').scrollIntoView()"
                            class="bg-[#ff5722] hover:bg-[#e64a19] text-white px-10 py-5 rounded-2xl font-bold transition-all shadow-2xl flex items-center group"
                        >
                            Khám phá dự án
                            <i
                                class="fa-solid fa-arrow-right-long ml-3 group-hover:translate-x-2 transition-transform"
                            ></i>
                        </button>
                    </div>
                </div>

                <div class="relative hidden lg:block" data-aos="zoom-in">
                    <div class="absolute -inset-4 bg-orange-500/20 blur-3xl rounded-full"></div>
                    <div
                        class="relative z-10 rounded-[4rem] overflow-hidden border-[15px] border-white/5 shadow-2xl transform rotate-2"
                    >
                        <div class="swiper hero-swiper">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <img
                                        src="/DUANTHUCTAP/uploads/<?= $data_index_settings['slide1'] ?>"
                                        class="w-full h-full object-cover"
                                        alt="Slide 1"
                                    />
                                </div>
                                <div class="swiper-slide">
                                    <img
                                        src="/DUANTHUCTAP/uploads/<?= $data_index_settings['slide2'] ?>"
                                        class="w-full h-full object-cover"
                                        alt="Slide 2"
                                    />
                                </div>
                                <div class="swiper-slide">
                                    <img
                                        src="/DUANTHUCTAP/uploads/<?= $data_index_settings['slide3'] ?>"
                                        class="w-full h-full object-cover"
                                        alt="Slide 3"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="danh-muc-san-pham" class="py-32 bg-slate-50">
            <div class="container mx-auto px-6">
                <div class="flex flex-col md:flex-row md:items-end justify-between mb-20 gap-8">
                    <div data-aos="fade-up">
                        <span class="text-[#ff5722] font-bold tracking-widest text-sm uppercase mb-3 block"
                            >Dự án mới nhất</span
                        >
                        <h2 class="text-4xl md:text-5xl font-black text-slate-900 uppercase leading-tight">
                            Danh mục <span class="text-gradient">sản phẩm</span>
                        </h2>
                        <div class="h-1.5 w-40 bg-gradient-to-r from-[#ff5722] to-orange-300 rounded-full mt-4"></div>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <?php foreach($data_index as $data) { ?>

                    <a href="index.php?action=product&id=<?=$data['id']?>">
                        <div
                            class="property-card-v2 bg-white rounded-3xl overflow-hidden shadow-sm hover:shadow-2xl transition-all duration-500 border border-slate-100 group"
                            data-aos="fade-up"
                        >
                            <div class="relative h-64 overflow-hidden">
                                <div
                                    class="badge-hot-diamond absolute top-4 left-4 z-10 bg-indigo-600 text-white text-[10px] font-bold px-3 py-1.5 rounded-full flex items-center gap-1 shadow-lg"
                                >
                                    <span>💎</span> HOT
                                </div>

                                <div class="flex h-full gap-1">
                                    <!-- Ảnh lớn bên trái -->
                                    <div class="w-2/3 h-full overflow-hidden">
                                        <?php if (!empty($data['images'][0])){ ?>
                                        <img
                                            src="/DUANTHUCTAP/uploads/<?= $data['images'][0] ?>"
                                            class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                                            alt="Thumbnail"
                                        />
                                        <?php } else { ?>
                                        <img
                                            src="/DUANTHUCTAP/uploads/error.jpg"
                                            class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                                            alt="Thumbnail"
                                        />
                                        <?php }?>
                                    </div>

                                    <!-- 2 ảnh nhỏ bên phải -->
                                    <div class="w-1/3 flex flex-col gap-1">
                                        <!-- Ảnh trên -->
                                        <div class="h-1/2 overflow-hidden">
                                            <?php if (!empty($data['images'][1])){ ?>
                                            <img
                                                src="/DUANTHUCTAP/uploads/<?= $data['images'][1] ?>"
                                                class="w-full h-full object-cover"
                                                alt="Sub 1"
                                            />
                                            <?php }else { ?>
                                            <img
                                                src="/DUANTHUCTAP/uploads/error.jpg"
                                                class="w-full h-full object-cover"
                                                alt="Sub 1"
                                            />
                                            <?php } ?>
                                        </div>

                                        <div class="h-1/2 overflow-hidden relative">
                                            <?php if (!empty($data['images'][2])){ ?>
                                            <img
                                                src="/DUANTHUCTAP/uploads/<?= $data['images'][2] ?>"
                                                class="w-full h-full object-cover opacity-80"
                                                alt="Sub 2"
                                            />
                                            <?php } else { ?>
                                            <img
                                                src="/DUANTHUCTAP/uploads/error.jpg"
                                                class="w-full h-full object-cover opacity-80"
                                                alt="Sub 2"
                                            />
                                            <?php } ?> <?php if (!empty($data['images']) && count($data['images']) > 3)
                                            { ?>
                                            <div
                                                class="absolute inset-0 flex items-center justify-center bg-black/40 text-white text-xs font-bold"
                                            >
                                                📷 <?= count($data['images']) - 3 ?>+
                                            </div>
                                            <?php }; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="p-6">
                                <div class="flex justify-between items-start mb-3">
                                    <span
                                        class="text-[10px] font-black tracking-widest text-[#ff5722] uppercase bg-orange-50 px-2 py-1 rounded"
                                        >Đất Nền</span
                                    >
                                </div>

                                <h3
                                    class="text-lg font-bold text-slate-800 mb-3 line-clamp-2 hover:text-[#ff5722] transition-colors cursor-pointer"
                                >
                                    <?= $data['tieu_de'] ?>
                                </h3>

                                <div class="flex items-baseline gap-2 mb-4">
                                    <span class="text-xl font-black text-[#ff5722]"
                                        ><?= number_format($data['gia'] ?? 'giá cả thương lượng') ?></span
                                    >
                                </div>

                                <div class="flex items-baseline gap-2 mb-4">
                                    <span class="text-slate-400 text-sm"> <?= $data['dien_tich'] ?>m²</span>
                                </div>

                                <div class="flex items-center gap-2 text-slate-500 text-sm mb-6">
                                    <i class="fa-solid fa-location-dot text-slate-400"></i>
                                    <p class="truncate"><?= $data['dia_chi'] ?></p>
                                </div>

                                <div class="pt-4 border-t border-slate-100 flex justify-between items-center">
                                    <div class="flex items-center gap-3">
                                        <div
                                            class="w-9 h-9 bg-gradient-to-tr from-slate-200 to-slate-100 rounded-full flex items-center justify-center font-bold text-slate-600 text-xs"
                                        >
                                            <?= substr($data['user_name'], 0, 1) ?>
                                        </div>
                                        <div>
                                            <p class="text-xs font-bold text-slate-800"><?= $data['user_name'] ?></p>
                                            <p class="text-[10px] text-slate-400"><?= $data['created_at'] ?></p>
                                        </div>
                                    </div>
                                    <div class="flex gap-2">
                                        <button
                                            class="w-9 h-9 rounded-xl border border-slate-100 flex items-center justify-center text-slate-400 hover:bg-red-50 hover:text-red-500 transition-all"
                                        >
                                            <i class="fa-regular fa-heart"></i>
                                        </button>
                                        <button
                                            class="w-9 h-9 rounded-xl bg-slate-900 text-white flex items-center justify-center hover:bg-[#ff5722] transition-all"
                                        >
                                            <i class="fa-solid fa-phone-volume text-xs"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>

                    <?php } ?>
                </div>

                <div class="flex justify-center mt-20 gap-6">
                    <a
                        href="index.php?action=list_product"
                        class="bg-[#0f172a] text-white px-12 py-5 rounded-2xl font-bold hover:bg-[#ff5722] transition-all shadow-xl flex items-center gap-3 active:scale-95"
                    >
                        XEM THÊM <i class="fa-solid fa-chevron-right"></i>
                    </a>
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

        <div id="contactModal"
     class="hidden fixed inset-0 z-[200] flex items-center justify-center p-6 bg-black/70 backdrop-blur-sm">

    <div class="bg-white w-full max-w-lg rounded-[3rem] shadow-2xl overflow-hidden relative">
        <button onclick="closeModal()"
            class="absolute top-6 right-6 w-10 h-10 flex items-center justify-center rounded-full bg-slate-100 text-slate-500 hover:bg-[#ff5722] hover:text-white transition-all">
            <i class="fa-solid fa-xmark"></i>
        </button>

        <div class="bg-[#ff5722] p-8 text-white text-center">
            <h3 class="text-2xl font-bold uppercase">Nhận tư vấn ngay</h3>
            <p class="text-orange-100 text-sm opacity-80">Chúng tôi sẽ liên hệ lại sau 5 phút</p>
        </div>

        <!-- ✅ THÔNG BÁO THÀNH CÔNG -->
        <div id="successMessage" class="hidden p-12 text-center">
            <i class="fa-solid fa-circle-check text-5xl text-green-500 mb-4"></i>
            <h3 class="text-2xl font-bold text-slate-800 mb-2">
                Gửi thông tin thành công 🎉
            </h3>
            <p class="text-slate-500">
                Chúng tôi sẽ liên hệ với bạn trong thời gian sớm nhất.
            </p>
        </div>

        <!-- ✅ FORM -->
        <form id="form-tuvan"
              method="POST"
              action="index.php?action=tuvan_trangchu"
              class="p-8 space-y-4">

            <input type="text" name="name" required placeholder="Họ và tên"
                class="w-full p-4 bg-slate-50 border border-slate-200 rounded-2xl outline-none focus:border-[#ff5722]" />

            <input type="text" name="sdt" required placeholder="Số điện thoại"
                class="w-full p-4 bg-slate-50 border border-slate-200 rounded-2xl outline-none focus:border-[#ff5722]" />

            <input type="email" name="email" required placeholder="Email"
                class="w-full p-4 bg-slate-50 border border-slate-200 rounded-2xl outline-none focus:border-[#ff5722]" />

            <textarea name="noidung" rows="2" placeholder="Bạn cần tư vấn gì?"
                class="w-full p-4 bg-slate-50 border border-slate-200 rounded-2xl outline-none focus:border-[#ff5722]"></textarea>

            <button type="submit" name="btn_tuvan_trangchu" value="1"
                class="w-full bg-[#ff5722] text-white font-bold py-5 rounded-2xl shadow-lg hover:bg-[#e64a19] transition-all uppercase tracking-widest">
                Gửi Thông Tin
            </button>
        </form>
    </div>
</div>
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

    <script>
document.addEventListener('DOMContentLoaded', function () {


    if (window.AOS) {
        AOS.init({
            duration: 1000,
            once: true
        });
    }

    const modal = document.getElementById('contactModal');
    const form  = document.getElementById('form-tuvan');
    const successMessage = document.getElementById('successMessage');

    window.openModal = function () {
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    };

    window.closeModal = function () {
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    };


    if (!localStorage.getItem('submittedConsultation')) {
        setTimeout(openModal, 5000);
    }


    form.addEventListener('submit', function (e) {
        e.preventDefault();

        const formData = new FormData(form);

        fetch(form.action, {
            method: 'POST',
            body: formData
        })
        .then(() => {
   
            form.classList.add('hidden');

  
            successMessage.classList.remove('hidden');


            localStorage.setItem('submittedConsultation', 'true');

            setTimeout(closeModal, 2500);
        })
        .catch(() => {
            alert('Có lỗi xảy ra, vui lòng thử lại!');
        });
    });

 
    if (document.querySelector('.hero-swiper')) {
        new Swiper('.hero-swiper', {
            slidesPerView: 1,
            loop: true,
            speed: 900,
            effect: 'fade',
            fadeEffect: { crossFade: true },
            autoplay: {
                delay: 3500,
                disableOnInteraction: false,
            }
        });
    }

});
</script>

</html>
