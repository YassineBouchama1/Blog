
if (localStorage.getItem('role') !== 'admin') {
    window.location.href = `${window.location.origin}/blog/frontend/auth/login.php`

}
