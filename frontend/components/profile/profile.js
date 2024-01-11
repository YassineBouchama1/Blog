const API_BASE_URL = 'http://localhost/blog/backend/user.php';
const POST_BASE_URL = 'http://localhost/blog/backend/post.php';
const IMG_BASE_URL = 'http://localhost/blog/backend/';



// document.addEventListener('DOMContentLoaded', async function () {
let loader = document.getElementById('loader')

document.addEventListener('DOMContentLoaded', onLoadBuilduser)
document.addEventListener('DOMContentLoaded', onLoadBuildPosts)
let user_id = localStorage.getItem('user_id') ? localStorage.getItem('user_id') : ''

let container_list = document.getElementById('container_list')
let image_profile = document.getElementById('image_profile')
let name_profile = document.getElementById('name_profile')
let length_posts = document.getElementById('length_posts')
let email_profile = document.getElementById('email_profile')
let created_at = document.getElementById('created_at')



// bring querys 
const searchParams = new URLSearchParams(window.location.search);
loader.classList.remove('hidden')

// onLoadBuilduser()
// onLoadBuildPosts()
console.log(user_id)



//fetch all data user
async function onLoadBuilduser() {
  try {
    const routePromise = await fetch(`${API_BASE_URL}?action=find&user_id=${searchParams.get('user_id')}`);
    const data = await routePromise.json();


    console.log(data)

    profileBuilder(data)
    loader.classList.add('hidden')
  } catch (error) {
    console.error("Error fetching compines:", error);
  }
}




//this function bring data posts for user from server and send it to
// function <builder> to create
async function onLoadBuildPosts() {
  try {
    const routePromise = await fetch(`${POST_BASE_URL}?action=PostsByUser&user_id=${searchParams.get('user_id')}`);
    const data = await routePromise.json();


    console.log(data)


    if (data.length >= 0) {
      container_list.innerHTML = '';
      length_posts.value = data.length
      length_posts.textContent = data.length
      await data.forEach(item => builder(container_list, item));
      // loader.classList.add('hidden')
    } else {
      console.log('no posts')
      container_list.innerHTML = 'no posts'
      loader.classList.add('hidden')
    }

  } catch (error) {
    console.error("Error fetching compines:", error);
  }
}




// this get data from api and build information about user
async function profileBuilder(dataProfile) {
  const relativeTime = await timeAgo(dataProfile.date_created);
  created_at.textContent = relativeTime
  image_profile.src = `${IMG_BASE_URL}${dataProfile.image}`
  name_profile.value = dataProfile.username
  name_profile.textContent = dataProfile.username
  email_profile.value = dataProfile.email
  email_profile.textContent = dataProfile.email

}


// this function for remove post by passing id
async function onDeletePost(id) {

  try {
    let routePromise = await fetch(`${POST_BASE_URL}?action=delete&post_id=${id}`);



    let response = await routePromise.json();
    console.log(response);
    onLoadBuildPosts()

  } catch (error) {
    console.error(error);
  }
}


//this function for building cards posts
//required:container div  and data 
async function builder(container_list, item) {

  let isActivePost = item.archived === 1;

  let isOwner = item.user_id == user_id

  //if post archived dont display it
  if (!isActivePost && !isOwner) return;



  let tags = null
  let tagButtons = null
  if (item.tags) {
    //slice tags cuz all tags came liek thsi js,code,...
    tags = item.tags.split(',');

    // Map through the tags array to generate button elements
    tagButtons = tags.map(tag => `
  <button class="inline-flex items-center justify-center font-medium border-black ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-6 rounded-full text-xs py-1 px-1">
      ${tag.trim()}
  </button>
`).join('');
  }

  // build time ago from data created post
  const relativeTime = await timeAgo(item.date_created);


  const card = document.createElement('article');



  console.log(isOwner)
  card.classList = `${!isActivePost && 'opacity-20'} relative flex flex-col jusitfy-between gap-4 items-center min-h-[250px] h-auto  w-full bg-[#e5e5e5] dark:bg-[#252936] dark:text-white text-black  rounded-[18px]   backdrop-blur-md  `;
  card.innerHTML = `
  <button class="absolute top-[-4%]  bg-[#0085DB] rounded-lg text-white px-4 py-2 ">${item.category}</button>
  <div class="">
    <img class="rounded-tl-[18px] rounded-tr-[18px] " src="https://www.ancmedia.net/instant-blog/uploads/1640090535.jpg">

  </div>
  <div class="p-2 text-center ">
    <div class="flex justify-between gap-x-4 mb-4">
      <p><i class="ti ti-clock-hour-5"></i> <span>${relativeTime}</span></p>
      <p><i class="ti ti-eye"></i> <span>${item.views} Views</span></p>

    </div>
    <a href="post.php?post_id=${item.post_id}" class="text-center  mb-2 text-md font-bold leading-none tracking-tight text-gray-900 md:text-2xl   dark:text-white   ">${item.title}</a>


    <div class="flex flex-wrap gap-2 mt-2">
    ${tagButtons ? tagButtons : ''}
    </div>

  </div>
  <div class="pb-4 pl-4	self-start flex  justify-between w-full px-4 	 text-md flex   items-center ">

    <div class="flex items-center">
      <img class="w-5 h-5" src="${IMG_BASE_URL}${item.image_author}">
      <a href="profile.php?action=userPosts&user_id=${item.user_id}" class="pl-1"><span>${item.username}</span></a>
      <i class="ti ti-discount-check-filled ml-1  text-[#1DA1F2] "></i>
    </div>
    <div class="flex gap-x-4 items-center">
    ${isOwner ?
      `<a href="edit.php?post_id=${item.post_id}"><i class="ti ti-edit text-green-500"></i></a>
       <button onclick="onDeletePost(${item.post_id})"><i class="ti ti-trash text-red-500"></i></button>` :
      null
    }
    
      
    </div>

  </div>






`;

  container_list.appendChild(card);
}



// })