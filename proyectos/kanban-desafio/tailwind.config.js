import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    safelist: [
        'bg-violet-300',
        'bg-teal-200',
        'bg-indigo-300',
        'badge-info',
        'badge-warning',
        'badge-error',
        'bg-default',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [
        forms,
        // require("@tailwindcss/typography"), 
        require("daisyui"),
    ],

    daisyui: {
        themes: ["dracula"], // Configuración de temas
    },
};
