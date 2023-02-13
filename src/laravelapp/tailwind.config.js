const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
                note: ['-apple-system','BlinkMacSystemFont', 'Helvetica Neue', 'Segoe UI','Hiragino Kaku Gothic ProN', 'Hiragino Sans', 'ヒラギノ角ゴ ProN W3', 'Arial', 'メイリオ', 'Meiryo', 'sans-serif'],
            },
            height: {
                '1/8': '12.5%',
                '7/8': '87.5%',
                "10vh": "10vh",
                "20vh": "20vh",
                "30vh": "30vh",
                "40vh": "40vh",
                "50vh": "50vh",
                "60vh": "60vh",
                "70vh": "70vh",
                "80vh": "80vh",
                "90vh": "90vh",
                "100vh": "100vh",
            },
            width: {
                "10vw": "10vw",
                "20vw": "20vw",
                "30vw": "30vw",
                "40vw": "40vw",
                "50vw": "50vw",
                "60vw": "60vw",
                "70vw": "70vw",
                "80vw": "80vw",
                "90vw": "90vw",
                "100vw": "100vw",
            },
            spacing: {
                '60%': '60%',
            },
            fontSize: {
                0: '0rem',
            },
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
