import defaultTheme from "tailwindcss/defaultTheme";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./index.php",
    ],
    darkMode: "class",
    theme: {
        fontFamily: {
            sans: ["Inter"],
        },
        extend: {
            colors: {
                gray: {
                    50: "#F7F8F9",
                },
            },
            fontFamily: {
                syne: ["Syne"],
                // sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
        },
    },
    plugins: [require("tailwindcss-motion")],
};
