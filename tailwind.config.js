/** @type {import('tailwindcss').Config} */
export default {
    content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
    ],
    theme: {
      extend: {
        colors: {
            primary: "#FBC797",
            secondary: "#FCE3C5",
            third: "#FF9F63",
        },
      },
    },
    plugins: [
        require('daisyui'),
      ],
  }
