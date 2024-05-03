import Swiper from "https://unpkg.com/swiper@7/swiper-bundle.esm.browser.min.js";

const searchBtn = document.querySelector("#search-btn");
const searchBar = document.querySelector(".search-bar-container");
const formBtn = document.querySelector("#login-btn");
const loginForm = document.querySelector(".login-form-container");
const formClose = document.querySelector("#form-close");
const navbar = document.querySelector(".header .navbar");
const loginBtn = document.getElementById("login");
const registerBtn = document.getElementById("register");
const effectBtn = document.getElementById("btn");

window.addEventListener("scroll", () => {
  navbar.classList.remove("active");
  searchBar.classList.remove("active");
  searchBtn.classList.remove("fa-times");
});

window.addEventListener("scroll", () => {
  navbar.classList.remove("active");
  document
    .querySelector(".header")
    .classList.toggle("active", window.scrollY > 0);
});

window.addEventListener("load", () => {
  document
    .querySelector(".header")
    .classList.toggle("active", window.scrollY > 0);
});

const initializeSwiper = (selector, autoplayDelay) => {
  new Swiper(selector, {
    loop: true,
    autoplay: {
      delay: autoplayDelay,
      disableOnInteraction: false,
    },
    breakpoints: {
      450: { slidesPerView: 2 },
      768: { slidesPerView: 3 },
      991: { slidesPerView: 4 },
      1200: { slidesPerView: 5 },
    },
  });
};

initializeSwiper(".brand-slider", 1000);
initializeSwiper(".gallery-slider1", 1000);
initializeSwiper(".gallery-slider2", 3000);
initializeSwiper(".gallery-slider3", 5000);
initializeSwiper(".home-slider", 0);

const initializeGlide = (selector, perView) => {
  if (document.getElementById(selector)) {
    new Glide(`#${selector}`, {
      type: "carousel",
      startAt: 0,
      perView,
      rewin: false,
      animationDuration: 800,
      animationTimingFunc: "cubic-bezier(0.165, 0.840, 0.440, 1.000)",
    }).mount();
  }
};

initializeGlide("glide_5", 5);
initializeGlide("glide_4", 1);

searchBtn.addEventListener("click", () => {
  searchBtn.classList.toggle("fa-times");
  searchBar.classList.toggle("active");
});

formBtn.addEventListener("click", () => {
  loginForm.classList.add("active");
});

formClose.addEventListener("click", () => {
  loginForm.classList.remove("active");
});

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
