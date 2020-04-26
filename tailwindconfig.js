module.exports = {
    important: true,

    theme: {
        extend: {
            colors: {
                primary: {
                    lighter: 'var(--primary-lighter, #ffcdd2)',
                    light: 'var(--primary-light, #ff6659)',
                    default: 'var(--primary, #d32f2f)',
                    dark: 'var(--primary-dark, #9a0007)',
                }
            },

            textColor: {
                'on-primary-lighter': 'var(--text-on-primary-lighter, #000000)',
                'on-primary-light': 'var(--text-on-primary, #000000)',
                'on-primary': 'var(--text-on-primary, #ffffff)',
                'on-primary-dark': 'var(--text-on-primary-dark, #ffffff'
            }
        }
    },
};
