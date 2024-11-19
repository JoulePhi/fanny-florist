import defaultTheme from "tailwindcss/defaultTheme";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
            backgroundImage: {
                hero: "url('../../public/images/hero.jpg')",
            },
            colors: {
                "royal-blue": {
                    50: "#eef6ff",
                    100: "#e0eeff",
                    200: "#c8defd",
                    300: "#a6c8fb",
                    400: "#82a8f7",
                    500: "#6588ef",
                    600: "#546de5",
                    700: "#3a51c8",
                    800: "#3144a2",
                    900: "#2f3f80",
                    950: "#1c254a",
                },
            },
        },
    },
    plugins: [],
};
