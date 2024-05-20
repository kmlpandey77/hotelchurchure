import Swiper, { Autoplay, Lazy, Pagination } from "swiper";
import lozad from "lozad";
import Alpine from "alpinejs";
import "swiper/css";
import "swiper/css/lazy";
import "swiper/css/pagination";

import lightGallery from "lightgallery";
import "lightgallery/css/lightgallery.css";

window.Alpine = Alpine;
Alpine.data("dropdown", () => ({
    open: false,
    toggle() {
        this.open = !this.open;
    },
}));
Alpine.start();

const observer = lozad();
observer.observe();

const swiper = new Swiper(".mainSlide", {
    lazy: true,
    autoplay: {
        delay: 5000,
        disableOnInteraction: false,
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    modules: [Autoplay, Lazy, Pagination],
});

swiper.on("slideChange", function () {
    const caption_el = document.getElementById("swiper_caption");
    const el = this.slides[this.activeIndex];
    if (caption_el && el.hasAttribute("data-caption")) {
        caption_el.innerHTML = el.dataset.caption;
    }
});

const room_swiper = new Swiper(".roomSlider", {
    lazy: true,
    autoplay: {
        delay: 5000,
        disableOnInteraction: false,
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    modules: [Autoplay, Lazy, Pagination],
});

lightGallery(document.getElementById("ightgallery"), {
    selector: ".item",
});
