import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            colors: {
                primary: {
                    DEFAULT: '#006b56',
                    soft: '#4aaf94',
                    container: '#c2ebe0',
                },
                surface: {
                    DEFAULT: '#f8faf9',
                    alt: '#f2f4f3',
                },
                accent: {
                    rose: '#994158',
                    pink: '#e67f96',
                },
                ink: '#191c1c',
            },
            fontFamily: {
                sans: ['Be Vietnam Pro', ...defaultTheme.fontFamily.sans],
                display: ['Plus Jakarta Sans', ...defaultTheme.fontFamily.sans],
            },
            borderRadius: {
                pill: '9999px',
                card: '1rem',
                'card-lg': '2rem',
            },
        },
    },
    plugins: [],
};
