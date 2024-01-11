
window.location.pathname;

document.addEventListener('DOMContentLoaded', function () {


    let currentPath = window.location.pathname;

    // Find the corresponding link in the sidebar and add the "active" class
    let sidebarLinks = document.querySelectorAll("#sidebar_dash a");
    let mainlink = document.getElementById("mainlink");


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




    // 
    sidebarLinks.forEach(function (link) {
        let href = link.getAttribute("href");



        // if href empty or contain index that mean 
        //add active link to dashboard li
        if (href.slice(2) === '' || href.slice(2).includes('index')) {
            mainlink.classList.add("bg-[#e5f3fb]", "text-[#0085DB]");

        }

        //  //add active link to  similar text
        else if (currentPath.includes(href.slice(2))) {

            link.parentNode.classList.add("bg-[#e5f3fb]", "text-[#0085DB]");
            mainlink.classList.remove("bg-[#e5f3fb]", "text-[#0085DB]");
        }
    });



});



