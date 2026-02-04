
        document.addEventListener("DOMContentLoaded", function() {
            const productsPerPage = 5; 
            const productItems = document.querySelectorAll('.product-item');
            const paginationContainer = document.getElementById('pagination');
            let currentPage = 1;

            function displayPage(page) {
                currentPage = page;
                const start = (page - 1) * productsPerPage;
                const end = start + productsPerPage;

                productItems.forEach((item, index) => {
                    if (index >= start && index < end) {
                        item.style.display = 'flex'; 
                        item.style.animation = 'fadeIn 0.4s ease forwards';
                    } else {
                        item.style.display = 'none'; 
                    }
                });

                renderPagination();
                if(page !== 1) window.scrollTo({ top: 100, behavior: 'smooth' });
            }

            function renderPagination() {
                if (!paginationContainer) return;
                const totalItems = productItems.length;
                const pageCount = totalItems > 0 ? Math.ceil(totalItems / productsPerPage) : 1;
                paginationContainer.innerHTML = '';

                // Prev Button
                const prevBtn = document.createElement('button');
                prevBtn.innerHTML = '<i class="fa-solid fa-chevron-left"></i>';
                prevBtn.className = `w-10 h-10 flex items-center justify-center rounded-lg border transition-all ${currentPage === 1 ? 'opacity-30 cursor-not-allowed' : 'hover:border-orange-500 hover:text-orange-500 bg-white shadow-sm'}`;
                prevBtn.onclick = () => { if (currentPage > 1) displayPage(currentPage - 1); };
                paginationContainer.appendChild(prevBtn);

                // Page Numbers
                for (let i = 1; i <= pageCount; i++) {
                    const pageBtn = document.createElement('button');
                    pageBtn.innerText = i;
                    if (i === currentPage) {
                        pageBtn.className = "w-10 h-10 flex items-center justify-center rounded-lg border border-orange-500 bg-orange-500 text-white font-bold shadow-lg shadow-orange-200 scale-105";
                    } else {
                        pageBtn.className = "w-10 h-10 flex items-center justify-center rounded-lg border border-gray-200 bg-white text-gray-600 hover:border-orange-500 hover:text-orange-500 transition-all font-bold";
                        pageBtn.onclick = () => displayPage(i);
                    }
                    paginationContainer.appendChild(pageBtn);
                }

                // Next Button
                const nextBtn = document.createElement('button');
                nextBtn.innerHTML = '<i class="fa-solid fa-chevron-right"></i>';
                nextBtn.className = `w-10 h-10 flex items-center justify-center rounded-lg border transition-all ${currentPage === pageCount ? 'opacity-30 cursor-not-allowed' : 'hover:border-orange-500 hover:text-orange-500 bg-white shadow-sm'}`;
                nextBtn.onclick = () => { if (currentPage < pageCount) displayPage(currentPage + 1); };
                paginationContainer.appendChild(nextBtn);
            }

            displayPage(1);
        });

      


const range = document.getElementById('priceRange');
const value = document.getElementById('rangeValue');


function formatTy(v) {
return (v / 1_000_000_000).toFixed(1);
}


if (range && value) {
value.innerText = formatTy(range.value);
range.addEventListener('input', () => {
value.innerText = formatTy(range.value);
});
}
function setValue() {
    const min = range.min;
    const max = range.max;
    const val = range.value;

    const percent = (val - min) / (max - min);
    const rangeWidth = range.offsetWidth;

    rangeValue.innerHTML = formatTy(val);
    rangeValue.style.left = `calc(${percent * 100}% + (${8 - percent * 16}px))`;
}

// Load ban đầu
setValue();

// Khi kéo
range.addEventListener('input', setValue);







const ranges = document.getElementById('priceRange');
const rangeValue = document.getElementById('rangeValue');

function formatTy(v) {
    return (v / 1_000_000_000).toFixed(1);
}

function setValue() {
    if (!ranges || !rangeValue) return;

    const min = ranges.min;
    const max = ranges.max;
    const val = ranges.value;
    const percent = (val - min) / (max - min);

    rangeValue.innerText = formatTy(val);
    rangeValue.style.left = `calc(${percent * 100}% + (${8 - percent * 16}px))`;
}

if (ranges) {
    ranges.addEventListener('input', setValue);
    setValue();
}

    const priceRange = document.getElementById('priceRange');
    priceRange.addEventListener('input', function () {
        rangeValue.innerText = (this.value / 1000000000).toFixed(1);
    });
