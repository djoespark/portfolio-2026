/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
  ],
  theme: {
    extend: {
      colors: {
        'void': '#09090B',    // Un noir plus riche que le noir standard
        'silk': '#F4F4F5',    // Un blanc cassé élégant
        'gold': '#C4A484',    // Ton rappel du projet Aurelius
        'neon': '#00FFF3',    // Ton rappel du projet Nova-Scout
      },
      fontFamily: {
        'display': ['Inter', 'sans-serif'], // Ou une police plus "stylée" si tu en as une
      },
    },
  },
  plugins: [],
}