require('./bootstrap');

const routes = [
    '/',
    '/products',
    '/users',
    '/roles'
];

const route = window.location.pathname;

if(routes.includes(route)) {
    document.querySelectorAll('.sidebar li a').forEach(menu => {
        if("/" + menu.href.split('/')[menu.href.split('/').length - 1] === route) {
            menu.classList.add('active')
        } else {
            menu.classList.remove('active')
        }
    });
}
