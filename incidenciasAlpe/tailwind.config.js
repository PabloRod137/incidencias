import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                alpe: {
                    blue: '#0a4d98',
                    'blue-dark': '#073a73',
                    orange: '#f18a00',
                    'orange-light': '#ffb142',
                }
            }
        },
    },

    plugins: [forms],
};
