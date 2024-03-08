import Toastify from "toastify-js";

const flashData = $(".cart-data").data("cart");

if (flashData) {
    Toastify({
        text: flashData,
        duration: 3000,
        gravity: "top",
        position: "center",
        newWindow: true,
        close: true,

        offset: {
            // horizontal axis - can be a number or a string indicating unity. eg: '2em'
            y: 100, // vertical axis - can be a number or a string indicating unity. eg: '2em'
        },
        style: {
            background: "linear-gradient(to right, #00b09b, #96c93d)",
        },
    }).showToast();
}
