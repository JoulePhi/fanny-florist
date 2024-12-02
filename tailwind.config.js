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
                bloom: {
                    50: "#fff1f2",
                    100: "#ffe4e7",
                    200: "#fecdd3",
                    300: "#fda4af",
                    400: "#fb7185", // Main brand color
                    500: "#f43f5e",
                    600: "#e11d48",
                    700: "#be123c",
                    800: "#9f1239",
                    900: "#881337",
                },
                // Secondary colors
                petal: {
                    50: "#fdf4ff",
                    100: "#fae8ff",
                    200: "#f5d0fe",
                    300: "#f0abfc",
                    400: "#e879f9",
                    500: "#d946ef",
                    600: "#c026d3",
                    700: "#a21caf",
                    800: "#86198f",
                    900: "#701a75",
                },
                // Accent colors
                leaf: {
                    50: "#f0fdf4",
                    100: "#dcfce7",
                    200: "#bbf7d0",
                    300: "#86efac",
                    400: "#4ade80",
                    500: "#22c55e",
                    600: "#16a34a",
                    700: "#15803d",
                    800: "#166534",
                    900: "#14532d",
                },
                // Neutral colors
                soil: {
                    50: "#faf5f0",
                    100: "#f5ebe1",
                    200: "#e7d5c4",
                    300: "#d4b499",
                    400: "#b89174",
                    500: "#a47454",
                    600: "#8b5e43",
                    700: "#724a36",
                    800: "#5e3d2f",
                    900: "#4e3328",
                },
            },
        },
    },
    plugins: [],
};
