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
            },
            spacing: {
                '60%': '60%',
            },
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
