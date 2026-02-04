document.addEventListener('DOMContentLoaded', function () {

    /* ===============================
       AOS
    =============================== */
    if (window.AOS) {
        AOS.init({
            duration: 1000,
            once: true
        });
    }

    /* ===============================
       MODAL
    =============================== */
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

    // Mở modal sau 5s nếu chưa gửi
    if (!localStorage.getItem('submittedConsultation')) {
        setTimeout(openModal, 5000);
    }

    /* ===============================
       SUBMIT FORM (KHÔNG JSON)
    =============================== */
    form.addEventListener('submit', function (e) {
        e.preventDefault();

        const formData = new FormData(form);

        fetch(form.action, {
            method: 'POST',
            body: formData
        })
        .then(() => {
            // Ẩn form
            form.classList.add('hidden');

            // Hiện thông báo thành công
            successMessage.classList.remove('hidden');

            // Lưu trạng thái
            localStorage.setItem('submittedConsultation', 'true');

            // Đóng modal sau 2.5s
            setTimeout(closeModal, 2500);
        })
        .catch(() => {
            alert('Có lỗi xảy ra, vui lòng thử lại!');
        });
    });

    /* ===============================
       SWIPER
    =============================== */
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