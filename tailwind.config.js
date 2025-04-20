const defaultTheme = require('tailwindcss/defaultTheme')

/** @type {import('tailwindcss').Config} */
module.exports = {
    darkMode: "class",

    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/js/**/*.js",
        "./node_modules/flowbite/**/*.js",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Inter", ...defaultTheme.fontFamily.sans],
            },
            screens: {
                "lg-custom": "1132px",
            },

            colors: {
                dark: {
                    "eval-0": "#151823",
                    "eval-1": "#222738",
                    "eval-2": "#2A2F42",
                    "eval-3": "#2C3142",
                },
            },

            backdropBlur: {
                xs: "2px",
                sm: "4px",
                md: "8px",
                lg: "12px",
                xl: "16px",
            },

            boxShadow: {
                glass: "0 10px 25px rgba(255, 255, 255, 0.1)",
            },
        },
    },
    plugins: [require("@tailwindcss/forms"), require("flowbite/plugin")],
};
