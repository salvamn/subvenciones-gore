/** @type {import('tailwindcss').Config} */
module.exports = {
//   prefix: 'tw-',
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

