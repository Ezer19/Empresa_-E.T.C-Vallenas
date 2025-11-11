/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./app/**/*.php",
    ],
    theme: {
        extend: {
            colors: {
                primary: {
                    50: '#e3f2fd',
                    100: '#bbdefb',
                    200: '#90caf9',
                    300: '#64b5f6',
                    400: '#42a5f5',
                    500: '#1565C0',
                    600: '#1976d2',
                    700: '#1565c0',
                    800: '#0D47A1',
                    900: '#0d47a1',
                },
                brandnavy: {
                    DEFAULT: '#0b1b2e',
                    dark: '#091521'
                },
                brandorange: {
                    DEFAULT: '#ef6c2c',
                    dark: '#d95c1f'
                },
                secondary: {
                    50: '#fff8e1',
                    100: '#ffecb3',
                    200: '#ffe082',
                    300: '#ffd54f',
                    400: '#ffca28',
                    500: '#FFC107',
                    600: '#ffb300',
                    700: '#ffa000',
                    800: '#ff8f00',
                    900: '#ff6f00',
                },
                success: {
                    DEFAULT: '#28A745',
                    dark: '#218838',
                },
                danger: {
                    DEFAULT: '#DC3545',
                    dark: '#c82333',
                },
                warning: {
                    DEFAULT: '#FFC107',
                    dark: '#e0a800',
                },
                info: {
                    DEFAULT: '#17A2B8',
                    dark: '#138496',
                },
            },
            fontFamily: {
                sans: ['Inter', 'Plus Jakarta Sans', 'system-ui', 'sans-serif'],
                display: ['Plus Jakarta Sans', 'Inter', 'sans-serif'],
                brand: ['Inter', 'Plus Jakarta Sans', 'system-ui', 'sans-serif']
            },
            fontSize: {
                'xs': '0.75rem',
                'sm': '0.875rem',
                'base': '1rem',
                'lg': '1.125rem',
                'xl': '1.25rem',
                '2xl': '1.5rem',
                '3xl': '1.875rem',
                '4xl': '2.25rem',
                '5xl': '3rem',
            },
            spacing: {
                '128': '32rem',
                '144': '36rem',
            },
            borderRadius: {
                '4xl': '2rem',
            },
            boxShadow: {
                'soft': '0 2px 15px -3px rgba(0, 0, 0, 0.07), 0 10px 20px -2px rgba(0, 0, 0, 0.04)',
                'hover': '0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04)',
            },
            animation: {
                'fade-in': 'fadeIn 0.5s ease-in-out',
                'slide-in': 'slideIn 0.3s ease-out',
                'bounce-slow': 'bounce 3s infinite',
            },
            keyframes: {
                fadeIn: {
                    '0%': { opacity: '0' },
                    '100%': { opacity: '1' },
                },
                slideIn: {
                    '0%': { transform: 'translateY(-10px)', opacity: '0' },
                    '100%': { transform: 'translateY(0)', opacity: '1' },
                },
            },
        },
    },
    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
    ],
}
