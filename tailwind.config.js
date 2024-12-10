/** @type {import('tailwindcss').Config} */
module.exports = {
  purge: [
    './resources/views/**/*.blade.php',
    './resources/css/**/*.css',
    './resources/js/**/*.js',
],
darkMode: false, // or 'media' or 'class'
theme: {
    extend: {},
},
variants: {
    extend: {},
},
plugins: [],
}

