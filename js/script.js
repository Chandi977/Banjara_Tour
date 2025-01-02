// import Swiper from "https://unpkg.com/swiper@7/swiper-bundle.esm.browser.min.js";

// DOM element selectors
const searchBtn = document.querySelector("#search-btn");
const searchBar = document.querySelector(".search-bar-container");
const formBtn = document.querySelector("#login-btn");
const loginForm = document.querySelector(".login-form-container");
const formClose = document.querySelector("#form-close");
const navbar = document.querySelector(".header .navbar");
const loginBtn = document.getElementById("login");
const registerBtn = document.getElementById("register");
const effectBtn = document.getElementById("btn");

// Scroll events
window.addEventListener("scroll", () => {
  navbar.classList.remove("active");
  searchBar.classList.remove("active");
  searchBtn.classList.remove("fa-times");

  document
    .querySelector(".header")
    .classList.toggle("active", window.scrollY > 0);
});

window.addEventListener("load", () => {
  document
    .querySelector(".header")
    .classList.toggle("active", window.scrollY > 0);
});

// Swiper Initialization Function
const initializeSwiper = (selector, autoplayDelay) => {
  const swiperContainer = document.querySelector(selector);
  if (swiperContainer) {
    new Swiper(selector, {
      loop: true,
      autoplay: {
        delay: autoplayDelay,
        disableOnInteraction: false,
      },
      navigation: {
        nextEl: ".swiper-button-next", // Link the next button
        prevEl: ".swiper-button-prev", // Link the prev button
      },
      slidesPerView: 1,
      breakpoints: {
        450: { slidesPerView: 1 },
        768: { slidesPerView: 1 },
        991: { slidesPerView: 1 },
        1200: { slidesPerView: 1 },
      },
    });
  }
};

// Initialize Swipers with different autoplay delays
initializeSwiper(".brand-slider", 5000);
initializeSwiper(".gallery-slider1", 1000);
initializeSwiper(".gallery-slider2", 2000);
initializeSwiper(".gallery-slider3", 3000);
initializeSwiper(".home-slider", 4000);

// Glide Initialization Function
const initializeGlide = (selector, perView) => {
  const glideContainer = document.getElementById(selector);
  if (glideContainer) {
    new Glide(`#${selector}`, {
      type: "carousel",
      startAt: 0,
      perView,
      rewin: false,
      animationDuration: 5000,
      animationTimingFunc: "cubic-bezier(0.165, 0.840, 0.440, 1.000)",
    }).mount();
  }
};

// Initialize Glide sliders
initializeGlide("glide_5", 5);
initializeGlide("glide_4", 1);

// Event listeners for search button and login form
searchBtn.addEventListener("click", () => {
  searchBtn.classList.toggle("fa-times");
  // Uncomment to toggle search bar visibility
  // searchBar.classList.toggle("active");
});

formBtn.addEventListener("click", () => {
  loginForm.classList.add("active");
});

formClose.addEventListener("click", () => {
  loginForm.classList.remove("active");
});

// Register and login form switching
function register() {
  loginBtn.style.left = "-400px";
  registerBtn.style.left = "50px";
  effectBtn.style.left = "110px";
}

function login() {
  loginBtn.style.left = "50px";
  registerBtn.style.left = "450px";
  effectBtn.style.left = "0";
}
