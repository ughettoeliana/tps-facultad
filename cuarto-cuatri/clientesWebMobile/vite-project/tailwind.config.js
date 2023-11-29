/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "index.html",
    "./src/**/*.{vue, js, ts, jsx, tsx}"
  ],
  theme: {
    extend: {
      gridTemplateRows: {
      layout: '64px 1fr 100px',
      },
      colors: {
        'custom-blue': 'rgb(14, 165, 233)',
      },
     
    },
  },
  plugins: [],
}

