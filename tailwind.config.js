/** @type {import('tailwindcss').Config} */
export default {
  content: ["./resources/**/*.{blade.php, js}"],
  theme: {
    extend: {
      fontFamily: {
        'poppins': ['Poppins', 'sans-serif'],
        'inter': ['Inter', 'sans-serif'],
        'inconsolata': ['Inconsolata', 'sans-serif'],
      },
    },
  },
  plugins: [],
}

