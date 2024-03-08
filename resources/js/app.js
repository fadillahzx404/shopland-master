import "./bootstrap";

import Alpine from "alpinejs";

import ClipboardJS from "clipboard";

new ClipboardJS(".btn-clipboard");

window.Alpine = Alpine;

Alpine.start();
