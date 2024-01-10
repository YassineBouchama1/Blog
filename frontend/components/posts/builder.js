const API_BASE_URL = 'http://localhost/blog/backend/post.php';
// const IMG_BASE_URL = 'http://localhost/blog/backend/';


document.addEventListener('DOMContentLoaded', async function () {


  let loader = document.getElementById('loader')
  let user_id = localStorage.getItem('user_id') ? localStorage.getItem('user_id') : ''



  let container_list = document.getElementById('container_list')


  onLoadBuild()

  loader.classList.remove('hidden')


  //this function bring data from server and send it to
  // function <builder> to create
  async function onLoadBuild() {


    try {
      const routePromise = await fetch(API_BASE_URL);
      const data = await routePromise.json();


      if (data.length >= 0) {
        container_list.innerHTML = '';

        await data.forEach(item => builder(container_list, item));
        loader.classList.add('hidden')
      } else {
        console.log('no posts')
        container_list.innerHTML = `<div class="text-center absolute left-0 right-0">
        <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-4">No Posts Available</h1>
        <p class="text-gray-600 dark:text-gray-400"></p>
      </div>`
        loader.classList.add('hidden')

      }



    } catch (error) {
      console.error("Error fetching compines:", error);
    }
  }




  //this function for building cards Category
  //required:container div  and data 
  async function builder(container_list, item) {

    let isActivePost = item.archived === 1;

    //if post archived dont display it
    if (!isActivePost) return;



    //slice tags cuz all tags came liek thsi js,code,...
    let tags = item.tags.split(',');

    // Map through the tags array to generate button elements
    const tagButtons = tags.map(tag => `
    <a href="./tags.php?name=${tag}"  class="inline-flex items-center justify-center font-medium border-black ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-6 rounded-full text-xs py-1 px-1">
        ${tag.trim()}
    </a>
`).join('');

    const relativeTime = await timeAgo(item.date_created);


    const card = document.createElement('article');
    let isOwner = item.user_id == user_id


    card.classList = 'hover:animate-pulse relative flex flex-col items-center min-h-[250px] h-auto  w-full bg-[#e5e5e5] dark:bg-[#252936] dark:text-white text-black rounded-[18px]   backdrop-blur-md ';
    card.innerHTML = `
    <button class="absolute top-[-4%]  bg-[#0085DB] rounded-lg text-white px-4 py-2 ">${item.category}</button>
    <div class="">
      <img class="rounded-tl-[18px] rounded-tr-[18px] " src="${IMG_BASE_URL}${item.image}">
  
    </div>
    <div class="p-2 text-center ">
      <div class="flex justify-between gap-x-4 mb-4">
        <p><i class="ti ti-clock-hour-5"></i> <span>${relativeTime}</span></p>
        <p><i class="ti ti-eye"></i> <span>${item.views} Views</span></p>
  
      </div>
      <a href="post.php?post_id=${item.post_id}" class="text-center  mb-2 text-md font-bold leading-none tracking-tight text-gray-900/80 md:text-xl  dark:text-white ">${item.title}</a>
  
  
      <div class="flex flex-wrap gap-2 mt-2">
      ${tagButtons}
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
        ''
      }
      </div>
  
    </div>
  
  
  
  
  
  `;

    container_list.appendChild(card);
  }

})

async function onDeletePost(id) {

  try {
    let routePromise = await fetch(`${API_BASE_URL}?action=delete&post_id=${id}`);



    let response = await routePromise.json();
    console.log(response);
    onLoadBuild()

  } catch (error) {
    console.error(error);
  }
}