// Select all slides
const slides = document.querySelectorAll(".slide");
const testSlides = document.querySelectorAll('.test_slide');
const prevSlide = document.querySelector(".btn-prev");
const nextSlide = document.querySelector(".btn-next");

const prevTestSlide = document.querySelector('.btn-prev-test');
const nextTestSlide = document.querySelector('.btn-next-test');

let curSlide = 0;
let curTestSlide = 0;
let maxSlide = slides.length - 1;
let maxTestSlide = testSlides.length - 1


// loop through slides and set each slides translateX property to index * 100%
function translate(slides) {
    slides.forEach((slide, indx) => {
        slide.style.transform = `translateX(${
            indx * 100
        }%)`;
    });
}
translate(slides);
translate(testSlides);

// add event listener and navigation functionality

nextSlide.addEventListener("click", function () { // check if current slide is the last and reset current slide
    if (curSlide === maxSlide) {
        curSlide = 0;
    } else {
        curSlide++;
    }

    // move slide by -100%
    slides.forEach((slide, indx) => {
        slide.style.transform = `translateX(${
            100 * (indx - curSlide)
        }%)`;
    });
});

nextTestSlide.addEventListener("click", function () { // check if current slide is the last and reset current slide
    if (curTestSlide === maxTestSlide) {
        curTestSlide = 0;
    } else {
        curTestSlide++;
    }

    // move slide by -100%
    testSlides.forEach((slide, indx) => {
        slide.style.transform = `translateX(${
            100 * (indx - curTestSlide)
        }%)`;
    });
});


// select prev slide button

// add event listener and navigation functionality
prevSlide.addEventListener("click", function () { // check if current slide is the first and reset current slide to last
    clearInterval();
    if (curSlide === 0) {
        curSlide = maxSlide;
    } else {
        curSlide--;
    }

    // move slide by 100%
    slides.forEach((slide, indx) => {
        slide.style.transform = `translateX(${
            100 * (indx - curSlide)
        }%)`;
    });
});

prevTestSlide.addEventListener('click', function () {
    clearInterval();
    if (curTestSlide === 0) {
        curTestSlide = maxTestSlide;
    } else {
        curTestSlide--;
    }

    // move slide by 100%
    testSlides.forEach((slide, indx) => {
        slide.style.transform = `translateX(${
            100 * (indx - curTestSlide)
        }%)`;
    });

})

// setimeout interval
setInterval(() => {
    nextSlide.click();
    nextTestSlide.click()
}, 5000);
