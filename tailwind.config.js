let defaultConfig = require('tailwindcss/defaultConfig')

module.exports = {
  purge: {
    content: [
      'source/**/*.html',
      'source/**/*.md',
      'source/**/*.js',
      'source/**/*.php',
      'source/**/*.vue',
    ],
    options: {
      whitelist: [
        /language/,
        /hljs/,
        /mce/,
      ],
    },
  },
  theme: {
    backgroundColor: theme => theme('colors'),
    textColor: theme => theme('colors'),
    borderColor: theme => theme('colors'),
    container: {
      center: true,
      padding: '1rem',
    },
    extend: {
      height: {
        'half': '50vh',
      },
      colors: {
        'transparent': 'transparent',
        'primary': '#23478d',
        'secondary': '#4D8AF0',
        'tertiary': '#282731',
        'steel-blue': '#EEF4F4',
        'black': '#282731',
      },
      fontFamily: {
        sans: [
          'Poppins'
        ],
        mono: [
          'Menlo',
          'Monaco',
          'Consolas',
          'Liberation Mono',
          'Courier New',
          'monospace'
        ],
      },
      lineHeight: {
        normal: '1.6',
        loose: '1.75',
      },
      maxWidth: {
        none: 'none',
        '7xl': '80rem',
        '8xl': '88rem'
      },
      spacing: {
        '7': '1.75rem',
        '9': '2.25rem'
      },
      boxShadow: {
        'lg': '0 -1px 27px 0 rgba(0, 0, 0, 0.04), 0 4px 15px 0 rgba(0, 0, 0, 0.08)',
      },
    },
    fontSize: {
      'xs': '.8rem',
      'sm': '.925rem',
      'base': '1rem',
      'lg': '1.125rem',
      'xl': '1.25rem',
      '2xl': '1.5rem',
      '3xl': '1.75rem',
      '4xl': '2.125rem',
      '5xl': '2.75rem',
      '6xl': '4rem',
    },
  },
  variants: {
    borderRadius: ['responsive', 'focus'],
    borderWidth: ['responsive', 'active', 'focus'],
    gridAutoFlow: ['responsive', 'hover', 'focus'],
    width: ['responsive', 'focus']
  },
  plugins: [
    function ({ addUtilities }) {
      const newUtilities = {
        '.transition-fast': {
          transition: 'all .2s ease-out',
        },
        '.transition': {
          transition: 'all .5s ease-out',
        },
      }
      addUtilities(newUtilities)
    }
  ]
}