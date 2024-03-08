import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],
    daisyui: {
        themes: [
            {
                mytheme: {
                    primary: "#570df8",

                    secondary: "#f000b8",

                    accent: "#22c55e",

                    neutral: "#2b3440",

                    "base-100": "#ffffff",

                    info: "#3abff8",

                    success: "#36d399",

                    warning: "#fbbd23",

                    error: "#f87272",
                },
            },
        ],
    },

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms, require("@tailwindcss/typography"), require("daisyui")],
};
