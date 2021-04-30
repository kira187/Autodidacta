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
                sans: ['Poppins', 'sans-serif'],
            },
            textColor: {
                'primary': '#1C88F4',
                'secondary': '#ffed4a',
                'danger': '#e3342f',
            },
        },
    },    
      
    variants: {
        opacity: ['responsive', 'hover', 'focus', 'disabled'],
    },

    corePlugins: {
       container: false,
    },
    
    plugins: [require('@tailwindcss/ui')],
};
