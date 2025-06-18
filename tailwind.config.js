import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: "class", // Tambahkan ini di dalam objek konfigurasi utama

    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                // Tambahkan custom colors
                primary: {
                    DEFAULT: "#FF4B2B",
                    light: "#FF8A65",
                    dark: "#E53935",
                },
                background: {
                    light: "#FDFDFC",
                    dark: "#1a1a1a",
                },
                text: {
                    light: "#1b1b18",
                    dark: "#EDEDEC",
                },
            },
        },
    },

    plugins: [forms],
};
