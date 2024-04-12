/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  prefix: "tw-",
  theme: {
    container: {
      center:true,
      padding: '20px'
    },
    extend: {
      colors: {
        'cst-yellow': '#EDE700',
        'cst-black': '#0C1C29',
        'cst-blue': '#0F3446',
      }
    },
  },
  plugins: [],
}

