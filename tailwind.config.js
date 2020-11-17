const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    purge: [
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Open Sans', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                gray: {
                    50: '#F5F5F5',
                    100: '#EAEAEA',
                    200: '#CBCBCB',
                    300: '#ACACAC',
                    400: '#6E6E6E',
                    500: '#303030',
                    600: '#2B2B2B',
                    700: '#1D1D1D',
                    800: '#161616',
                    900: '#0E0E0E',
                },
                primary: '#0121FB',
            },
        },
    },

    variants: {
        opacity: ['responsive', 'hover', 'focus', 'disabled'],
    },

    plugins: [require('@tailwindcss/ui')],
};
