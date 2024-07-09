import preset from './vendor/filament/support/tailwind.config.preset'
import defaultTheme from "tailwindcss/defaultTheme.js";
import forms from "@tailwindcss/forms";

export default {
    presets: [preset],
    content: [
        './app/Filament/**/*.php',
        './resources/views/**/*.blade.php',
        './vendor/filament/**/*.blade.php',
        'node_modules/preline/dist/*.js',
    ],
    darkMode: 'class',
    theme: {
        extend: {
            fontFamily: {
                sans: ['Noto Kufi Arabic', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms,require('preline/plugin'),],

}
