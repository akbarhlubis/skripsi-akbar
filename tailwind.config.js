/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    darkMode: 'class', // or 'media' or 'class'
    mode: "jit",
    theme: {
        extend: {
            animation: {
                marquee: "marquee 25s linear infinite",
                marquee2: "marquee2 25s linear infinite",
            },
            keyframes: {
                marquee: {
                    "0%": { transform: "translateX(0%)" },
                    "100%": { transform: "translateX(-100%)" },
                },
                marquee2: {
                    "0%": { transform: "translateX(100%)" },
                    "100%": { transform: "translateX(0%)" },
                },
            },
        },
    },
    plugins: [
        require("daisyui"),
        require("@tailwindcss/forms"),
        require("tailwind-gradient-mask-image"),
    ],
    daisyui: {
        themes: [
            {
                SimanevUTI: {
                    primary: "#BB1634",

                    secondary: "#241F20",

                    accent: "#fcedc2",

                    neutral: "#ffffff",

                    "base-100": "#f3f4f6",

                    info: "#24a8f0",

                    success: "#4ade80",

                    warning: "#d39c03",

                    error: "#ea7b7f",
                },
            },
        ],
    },
};
