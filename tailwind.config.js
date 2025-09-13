const defaultTheme = require('tailwindcss/defaultTheme');

export default {
    darkMode: 'class',
    safelist: [
        'bg-red-100',
        'bg-green-100',
        'bg-green-600',
        'bg-blue-100',
        'bg-yellow-100',
        'text-red-800',
        'border-red-500',
        // Anda juga bisa menggunakan pola regex untuk mencocokkan beberapa kelas
        // sekaligus
        {
            pattern: /bg-(red|green|blue|yellow)-(100|200|300)/,
            variants: ['hover', 'focus']
        }
    ],
    theme: {
        extend: {
            colors: {

            },
            fontFamily: {
                'body': [
                    'Inter',
                    'ui-sans-serif',
                    'system-ui',
                    '-apple-system',
                    'system-ui',
                    'Segoe UI',
                    'Roboto',
                    'Helvetica Neue',
                    'Arial',
                    'Noto Sans',
                    'sans-serif',
                    'Apple Color Emoji',
                    'Segoe UI Emoji',
                    'Segoe UI Symbol',
                    'Noto Color Emoji'
                ],
                'sans': [
                    'Inter',
                    'ui-sans-serif',
                    'system-ui',
                    '-apple-system',
                    'system-ui',
                    'Segoe UI',
                    'Roboto',
                    'Helvetica Neue',
                    'Arial',
                    'Noto Sans',
                    'sans-serif',
                    'Apple Color Emoji',
                    'Segoe UI Emoji',
                    'Segoe UI Symbol',
                    'Noto Color Emoji'
                ]
            }
        }
    }
}