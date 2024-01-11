
window.location.pathname;

document.addEventListener('DOMContentLoaded', function () {
    var currentPath = window.location.pathname;

    // Find the corresponding link in the sidebar and add the "active" class
    var sidebarLinks = document.querySelectorAll("#sidebar_dash a");



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





    sidebarLinks.forEach(function (link) {
        var href = link.getAttribute("href");
        console.log(link)
        // Check if the currentPath matches the href
        if (currentPath === href) {
            link.parentNode.classList.add("text-red-500");
            console.log(link)
        }
    });


});



