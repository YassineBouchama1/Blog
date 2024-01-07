const API_BASE_URL = 'http://localhost/blog/backend/post.php';
const IMG_BASE_URL = 'http://localhost/blog/backend/';


document.addEventListener('DOMContentLoaded', onLoadBuild)



let container_list = document.getElementById('container_list')




//this function bring data from server and send it to
// function <builder> to create
async function onLoadBuild() {
    try {
        const routePromise = await fetch(API_BASE_URL);
        const data = await routePromise.json();


        console.log(data)
        container_list.innerHTML = '';
        data.forEach(item => builder(container_list, item));

    } catch (error) {
        console.error("Error fetching compines:", error);
    }
}




//this function for building cards Category
//required:container div  and data 
function builder(container_list, item) {

    let isActivePost = item.archived === 1;

    //if post archived dont display it
    if (!isActivePost) return;



    //slice tags cuz all tags came liek thsi js,code,...
    let tags = item.tags.split(',');

    // Map through the tags array to generate button elements
    const tagButtons = tags.map(tag => `
    <button class="inline-flex items-center justify-center font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-10 rounded-full text-xs py-1 px-2">
        ${tag.trim()}
    </button>
`).join('');



    const card = document.createElement('article');



    card.classList = 'relative flex flex-col items-center min-h-[250px] h-auto max-w-[300px] w-full bg-white dark:bg-[#111c2d] dark:text-white text-black transition-shadow rounded-[18px] shadow-md  backdrop-blur-md ';
    card.innerHTML = `
   
    <button class="absolute top-[-4%]  bg-[#0085DB] rounded-lg text-white px-4 py-2 ">${item.category}</button>
    <div class="">
        <img class="rounded-tl-[18px] rounded-tr-[18px] min-w-[300px] h-[200px] bg-cover bg-center" src="${IMG_BASE_URL}${item.image}" alt="${item.title}">

    </div>
    <div class="p-4 text-center">
        <div class="flex justify-around mb-4">
            <p><i class="ti ti-clock-hour-5"></i> <span>20 Minuts</span></p>
            <p><i class="ti ti-eye"></i> <span>${item.views} Views</span></p>

        </div>
        <a href="post.php?post_id=${item.post_id}" class="text-center text-transparent bg-clip-text bg-gradient-to-r to-[#2AA6F8] from-[#034877] text-center mb-2 text-3xl font-extrabold leading-none tracking-tight text-gray-900 md:text-4xl     ">${item.title}</a>
        <p class="max-w-xs break-words text-center overflow-ellipsis">${item.content}</p>
     

  <div class="flex flex-wrap gap-2 mt-2">

  ${tagButtons}
  </div>

    </div>
    <div class="pb-4 pl-4	self-start	 text-md  ">
        
    <img w-[20px] h-[20px] src="${IMG_BASE_URL}${item.image_author}">
    <span>${item.username}</span>
    <i class="ti ti-discount-check-filled text-[#1DA1F2]"></i>

</div>
`;

        container_list.appendChild(card);
}
