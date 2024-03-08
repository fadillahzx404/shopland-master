import Toastify from "toastify-js";

const errorData = $(".flash-error").data("error");
var errorDataArray = $.map($(".flash-error"), function (el) {
    return [$(el).data("error")];
});

let arr = errorDataArray.toString();

let err = arr.split(",").join("\n");

console.log(errorData);

if (errorData) {
    Toastify({
        text: err,
        duration: 5000,
        stopOnFocus: true,
        gravity: "top",
        position: "center",
        newWindow: true,
        close: false,

        offset: {
            x: 50, // horizontal axis - can be a number or a string indicating unity. eg: '2em'
            y: 150, // vertical axis - can be a number or a string indicating unity. eg: '2em'
        },
        style: {
            background: "linear-gradient(to left, #ff0000, 	#a70000)",
        },
    }).showToast();
}
