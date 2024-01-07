
tailwind.config = {
    content: ["*/*/*.{html,js}"],
    theme: {
        extend: {},
    },
    plugins: [],
    darkMode: 'class',

}


if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
    document.documentElement.classList.add('dark');
} else {
    document.documentElement.classList.remove('dark')
}