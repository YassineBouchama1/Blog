const IMG_URL = 'http://localhost/blog/backend/';
document.addEventListener('DOMContentLoaded', function () {
    let logoutDashboard = document.getElementById('logoutDashboard')
    let toggleSideBar = document.getElementById('toggleSideBar');
    let sidebar_dash = document.getElementById('sidebar_dash');
    // header dahsboard info admin
    let ProfileImg = document.getElementById('ProfileImg')
    let username_admin = document.getElementById('username_admin')

    toggleSideBar.addEventListener('click', onToggle);


    ProfileImg.src = `${IMG_URL}${localStorage.getItem('image_admin')}`
    username_admin.textContent = localStorage.getItem('username_admin')

    function onToggle() {
        if (sidebar_dash.classList.contains('left-[-100%]')) {
            sidebar_dash.classList.remove('left-[-100%]');
            sidebar_dash.classList.add('left-5');
        } else {
            sidebar_dash.classList.remove('left-5');
            sidebar_dash.classList.add('left-[-100%]');
        }
    }



    logoutDashboard.addEventListener('click', function () {
        console.log('clicklogout')
        localStorage.clear()

        window.location.reload()
    })


});


