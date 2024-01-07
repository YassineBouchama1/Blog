
window.location.pathname;

document.addEventListener('DOMContentLoaded', function () {




    let toggleSideBar = document.getElementById('toggleSideBarinside');
    let sidebar_dash = document.getElementById('sidebar_dash');

    toggleSideBar.addEventListener('click', onToggle);

    function onToggle() {
        if (sidebar_dash.classList.contains('left-[-100%]')) {
            sidebar_dash.classList.remove('left-[-100%]');
            sidebar_dash.classList.add('left-5');
        } else {
            sidebar_dash.classList.remove('left-5');
            sidebar_dash.classList.add('left-[-100%]');
        }
    }



    
});
