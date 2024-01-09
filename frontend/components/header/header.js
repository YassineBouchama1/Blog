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
  let createBtn = document.getElementById('createBtn')
  let searchBtn = document.getElementById('searchBtn')

  let btnProtected = Array.from(document.querySelectorAll('.isAuthor'));
  let profileLink = document.getElementById('profileLink');
  console.log(btnProtected[0])
  if (localStorage.getItem('role') === 'author') {
    btnProtected.map((btn) => btn.classList.remove('hidden'))


    profileLink.href = `profile.php?action=userPosts&user_id=${localStorage.getItem('user_id')}`;
  }
  else {
    btnProtected.map((btn) => btn.classList.add('hidden'))


  }
  searchBtn.addEventListener('click', function () {
    searchBar.classList.remove("hidden")
  })



  logoutBtn.addEventListener('click', function () {
    console.log('clicklogout')
    localStorage.clear()

    window.location.reload()
  })
});