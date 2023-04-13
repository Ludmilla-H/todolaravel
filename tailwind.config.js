/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./resources/**/*.blade.php",
            "./resources/**/*.js",
],
  theme: {
    extend: {maxWidth:{
      '8xl' : '84rem'
    }},
  },
  plugins: [],
}

