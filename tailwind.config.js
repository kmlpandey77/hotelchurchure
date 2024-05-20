/** @type {import('tailwindcss').Config} */
const defaultTheme = require("tailwindcss/defaultTheme");

module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./app/View/**/*.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ["Poppins", ...defaultTheme.fontFamily.sans],
                serif: ["ZCOOL XiaoWei", ...defaultTheme.fontFamily.serif],
            },
            colors: {
                primary: "#a77131"
            },
        },
    },
    plugins: [],
}
