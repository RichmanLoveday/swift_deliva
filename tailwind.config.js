/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ['./*.html'],
    theme: {
        screens: {
            sm: '480px',
            nav: '1020px',
            md: '768px',
            lg: '1020px',
            xl: '1440px'

        },
        extend: {
            colors: {
                yellowColor: 'hsl(34,98%,62%)',
                darkRed: 'hsl(7,100%,58%)',
                darkGray: 'hsl(0,0%,21%)',
                veryDarkBlue: 'hsl(229, 32%, 21%)'
            },
            fontFamily: {
                sans: ['Inter', 'sans-serif']
            },
            backgroundImage: {
                'dots': "url('../images/bg-dots.svg')"
            }
        }
    },
    plugins: [require('tailwind-scrollbar')]


}
