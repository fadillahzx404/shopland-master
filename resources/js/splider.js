import { Splide } from "@splidejs/splide";

var splide1 = document.getElementById("frist-splide");
var splide2 = document.getElementById("second-splide");
var main = document.getElementById("main-carousel");
var thumbnail = document.getElementById("thumbnail-carousel");

if (splide1) {
    var fristSplide = new Splide(".splide", {
        type: "loop",
        perPage: 1,
        autoplay: true,
        pagination: false,
    });
    fristSplide.mount();
} else if (splide2) {
    var secondSplide = new Splide(".splide", {
        autoWidth: true,
        gap: 20,
        padding: { left: "4%", right: "4%" },
        rewind: false,
        autoHeight: true,
        pagination: false,
        width: "90vw",
        cover: true,
        mediaQuery: "max",
        breakpoints: {
            640: {
                padding: { left: "8%" },
                gap: 5,
                width: "100vw",
            },
        },
    });

    secondSplide.mount();
} else if (main || thumbnail) {
    var splide = new Splide("#main-carousel", {
        pagination: false,
        width: "55vw",
        arrows: false,
        height: "70vh",
        gap: 10,
        rewind: true,
        pagination: false,
    });

    var thumbnails = document.getElementsByClassName("thumbnail");
    var current;

    for (var i = 0; i < thumbnails.length; i++) {
        initThumbnail(thumbnails[i], i);
    }

    function initThumbnail(thumbnail, index) {
        thumbnail.addEventListener("click", function () {
            splide.go(index);
        });
    }

    splide.on("mounted move", function () {
        var thumbnail = thumbnails[splide.index];

        if (thumbnail) {
            if (current) {
                current.classList.remove("is-active");
            }

            thumbnail.classList.add("is-active");
            current = thumbnail;
        }
    });

    splide.mount();
}
