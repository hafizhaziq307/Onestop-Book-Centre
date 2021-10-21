const colors = require('tailwindcss/colors')


module.exports = {
  purge: ['./resources/**/*.blade.php'],  
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
      colors: {
        cyan: colors.cyan
      }
    }
  },
  variants: {
    extend: {},
  },
  plugins: [
    require('@tailwindcss/forms'),
  ],
}
