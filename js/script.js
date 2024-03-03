import Swiper from "https://unpkg.com/swiper@7/swiper-bundle.esm.browser.min.js";

let searchBtn = document.querySelector("#search-btn");
let searchBar = document.querySelector(".search-bar-container");

let formBtn = document.querySelector("#login-btn");
let loginForm = document.querySelector(".login-form-container");
let formClose = document.querySelector("#form-close");

const slider5 = document.getElementById("glide_5");
const slider4 = document.getElementById("glide_4");

window.onscroll = () => {
  searchBtn.classList.remove("fa-times");
  searchBar.classList.remove("active");
  menu.classList.remove("fa-times");
  navbar.classList.remove("active");
  loginForm.classList.remove("active");
};

let navbar = document.querySelector(".header .navbar");

document.querySelector("#menu-btn").onclick = () => {
  navbar.classList.add("active");
};

document.querySelector("#nav-close").onclick = () => {
  navbar.classList.remove("active");
};

let searchForm = document.querySelector(".search-form");

document.querySelector("#search-btn").onclick = () => {
  searchForm.classList.add("active");
};

document.querySelector("#close-search").onclick = () => {
  searchForm.classList.remove("active");
};

window.onscroll = () => {
  navbar.classList.remove("active");

  if (window.scrollY > 0) {
    document.querySelector(".header").classList.add("active");
  } else {
    document.querySelector(".header").classList.remove("active");
  }
};

window.onload = () => {
  if (window.scrollY > 0) {
    document.querySelector(".header").classList.add("active");
  } else {
    document.querySelector(".header").classList.remove("active");
  }
};

const loginBtn = document.getElementById("login");
const registerBtn = document.getElementById("register");
const effectBtn = document.getElementById("btn");

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
let swiper2 = new Swiper(".brand-slider", {
  spaceBetween: 20,
  loop: true,
  autoplay: {
    delay: 1000,
    disableOnInteraction: false,
  },
  breakpoints: {
    450: {
      slidesPerView: 2,
    },
    768: {
      slidesPerView: 3,
    },
    991: {
      slidesPerView: 4,
    },
    1200: {
      slidesPerView: 5,
    },
  },
});

let swiper3 = new Swiper(".gallery-slider1", {
  spaceBetween: 20,
  loop: true,
  autoplay: {
    delay: 1000,
    disableOnInteraction: false,
  },
  breakpoints: {
    450: {
      slidesPerView: 2,
    },
    768: {
      slidesPerView: 3,
    },
    991: {
      slidesPerView: 4,
    },
    1200: {
      slidesPerView: 5,
    },
  },
});
let swiper4 = new Swiper(".gallery-slider2", {
  spaceBetween: 20,
  loop: true,
  autoplay: {
    delay: 3000,
    disableOnInteraction: false,
  },
  breakpoints: {
    450: {
      slidesPerView: 2,
    },
    768: {
      slidesPerView: 3,
    },
    991: {
      slidesPerView: 4,
    },
    1200: {
      slidesPerView: 5,
    },
  },
});
let swiper5 = new Swiper(".gallery-slider3", {
  spaceBetween: 20,
  loop: true,

  autoplay: {
    delay: 5000,
    disableOnInteraction: false,
  },
  breakpoints: {
    450: {
      slidesPerView: 2,
    },
    768: {
      slidesPerView: 3,
    },
    991: {
      slidesPerView: 4,
    },
    1200: {
      slidesPerView: 5,
    },
  },
});

var swiper = new Swiper(".home-slider", {
  loop: true,
  grabCursor: true,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});
if (slider5) {
  new Glide("#glide_5", {
    type: "carousel",
    startAt: 0,
    perView: 5,
    rewin: false,
    autoplay: 3000,
    animationDuration: 800,
    animationTimingFunc: "cubic-bezier(0.165, 0.840, 0.440, 1.000)",
    breakpoints: {
      424: {
        perView: 1,
      },
      998: {
        perView: 2,
      },
      768: {
        perView: 1,
      },
    },
  }).mount();
}
if (slider4) {
  new Glide("#glide_4", {
    type: "carousel",
    startAt: 0,
    perView: 1,
    rewin: false,
    animationDuration: 800,
    animationTimingFunc: "cubic-bezier(0.165, 0.840, 0.440, 1.000)",
  }).mount();
}

// searchBtn.addEventListener("click", () => {
//   searchBtn.classList.toggle("fa-times");
//   searchBar.classList.toggle("active");
// });

formBtn.addEventListener("click", () => {
  loginForm.classList.add("active");
});

formClose.addEventListener("click", () => {
  loginForm.classList.remove("active");
});
