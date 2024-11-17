import defaultTheme from 'tailwindcss/defaultTheme';
import formsPlugin from '@tailwindcss/forms';
import typographyPlugin from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/views/report/index.blade.php',
        './resources/js/**/*.js',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: '#1D4ED8',
                secondary: '#9333EA',
            },
            spacing: {
                '128': '32rem',
                '144': '36rem',
            },
        },
    },
    plugins: [
        formsPlugin,
        typographyPlugin,
    ],
};
