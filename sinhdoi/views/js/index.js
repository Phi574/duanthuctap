AOS.init({ duration: 1000, once: true });

/* HEADER SCROLL */
window.addEventListener('scroll', () => {
    const header = document.getElementById('main-header');
    window.scrollY > 50
        ? header.classList.add('glass-header', 'py-3')
        : header.classList.remove('glass-header', 'py-3');
});

/* FILTER & LOAD MORE */
let visibleCount = 4;
const step = 4;
let currentType = 'all';

function showItems() {
    const allItems = Array.from(document.querySelectorAll('.product-item'));
    const filtered = allItems.filter(item =>
        currentType === 'all' || item.dataset.category === currentType
    );

    allItems.forEach(i => i.classList.add('hidden-filter'));
    filtered.slice(0, visibleCount).forEach(i => {
        i.classList.remove('hidden-filter');
        i.classList.add('is-visible');
    });

    document.getElementById('loadMoreBtn')
        ?.classList.toggle('hidden', visibleCount >= filtered.length);

    document.getElementById('collapseBtn')
        ?.classList.toggle('hidden', visibleCount <= 4);
}

function loadMore() {
    visibleCount += step;
    showItems();
}

function collapseItems() {
    visibleCount = 4;
    showItems();
}

function filterProducts(type) {
    currentType = type;
    visibleCount = 4;

    document.querySelectorAll('.tab-btn').forEach(btn =>
        btn.classList.toggle('active', btn.dataset.tab === type)
    );

    showItems();
}

/* MODAL */
function openModal() {
    document.getElementById('contactModal').classList.remove('hidden');
    document.getElementById('contactModal').classList.add('flex');
}
function closeModal() {
    document.getElementById('contactModal').classList.add('hidden');
    document.getElementById('contactModal').classList.remove('flex');
}

/* FORM AJAX */
document.getElementById('form-tuvan')?.addEventListener('submit', function(e) {
    e.preventDefault();
    fetch(this.action, { method: 'POST', body: new FormData(this) })
        .then(res => res.json())
        .then(data => alert(data.message));
});

/* INIT */
document.addEventListener('DOMContentLoaded', () => {
    showItems();
    setTimeout(openModal, 8000);

    new Swiper('.hero-swiper', {
        loop: true,
        autoplay: { delay: 3500 },
        effect: 'fade',
        pagination: { el: '.swiper-pagination', clickable: true },
    });
});
