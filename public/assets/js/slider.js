const parent = document.querySelector('.slider');
const slides = parent.querySelectorAll('.slide');

const dots = parent.querySelector('.dots');

let currentIndex = 0;

slides.forEach((slide) => {
    dots.insertAdjacentHTML('beforeend',
`
        <span class="dot"></span>
    `);
})

const dotEl = parent.querySelectorAll('.dot');

slides.forEach((slide) => {
    slides.forEach(() => {
        slide.classList.remove('active');
    })
    slides[currentIndex].classList.add('active');
    dotEl[currentIndex].classList.add('active');
})

dotEl.forEach((dot, index) => {
    dot.addEventListener('click', () => {
        slides.forEach((slide) => {
            slide.classList.remove('active');
        })
        dotEl.forEach((dot) => {
            dot.classList.remove('active');
        })
        currentIndex = index;

        dot.classList.add('active');
        slides[index].classList.add('active');
    })
})
