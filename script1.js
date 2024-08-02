// script1.js

const slider = document.querySelector('.slider');
const images = slider.querySelectorAll('img');
let currentIndex = 0;

function nextImage() {
  images[currentIndex].classList.remove('active');
  currentIndex = (currentIndex + 1) % images.length;
  images[currentIndex].classList.add('active');
}

// Set the first image as active
images[0].classList.add('active');

// Set the interval to change the image every 3 seconds
setInterval(nextImage, 3000);