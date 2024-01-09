
if (localStorage.getItem('role') === 'admin') {
    window.location.replace = `http://localhost/blog/frontend/dashboard/`
}
else {
    window.location.replace = `http://localhost/blog/frontend/`

}