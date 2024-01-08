document.addEventListener('DOMContentLoaded', function () {

  // let toggleSideBar = document.getElementById('toggleSideBar');
  // let sidebar_dash = document.getElementById('sidebar_dash');

  // toggleSideBar.addEventListener('click', onToggle);

  // function onToggle() {
  //   if (sidebar_dash.classList.contains('left-[-100%]')) {
  //     sidebar_dash.classList.remove('left-[-100%]');
  //     sidebar_dash.classList.add('left-5');
  //   } else {
  //     sidebar_dash.classList.remove('left-5');
  //     sidebar_dash.classList.add('left-[-100%]');
  //   }
  // }



  let logoutBtn = document.getElementById('logout')
  // let profileLink = document.getElementById('profileLink');

  if (localStorage.getItem('role') === 'author') {
    logoutBtn.classList.remove('hidden')
    // profileLink.classList.remove('hidden')
    profileLink.href = `profile.php?action=userPosts&user_id=${localStorage.getItem('user_id')}`;
  }
  else {
    logoutBtn.classList.add('hidden')
    // profileLink.classList.add('hidden')

  }


  logoutBtn.addEventListener('click', function () {
    console.log('clicklogout')
    localStorage.clear()

    window.location.reload()
  })
});