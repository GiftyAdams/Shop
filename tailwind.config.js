import defaultTheme from "tailwindcss/defaultTheme";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
                jost: ["Jost", "sans"],
            },
            fontSize: {
                xs: "0.625rem",
                sm: "0.754rem",
            },
            colors: {
                background: "#FFFFFF",
            },
            textColor: {
                subHeader: "rgb(148 163 184 / var(--tw-bg-opacity, 1))",
            }
        },
    },
    plugins: [],
};
