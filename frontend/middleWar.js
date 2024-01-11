
if (localStorage.getItem('role') == 'admin') {
    window.location.href = `${window.location.origin}/blog/frontend/dashboard`

}
else if (localStorage.getItem('role') === 'author') {

}
else {
    window.location.href = `${window.location.origin}/blog/frontend/auth/login.php`

}
