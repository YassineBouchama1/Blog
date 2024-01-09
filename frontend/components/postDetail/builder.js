const API_BASE_URL = 'http://localhost/blog/backend/post.php';
const IMG_BASE_URL = 'http://localhost/blog/backend/';

document.addEventListener('DOMContentLoaded', function () {
  let loader = document.getElementById('loader')


  const searchParams = new URLSearchParams(window.location.search);

  console.log(searchParams.get('post_id'))
  loader.classList.remove('hidden')




  let container_list = document.getElementById('container_Post')


  onLoadBuild()
  onLoadIncressViewsPost()

  //this function bring data from server and send it to
  // function <builder> to create
  async function onLoadBuild() {
    try {
      const routePromise = await fetch(`${API_BASE_URL}?action=find&post_id=${searchParams.get('post_id')}`);
      const data = await routePromise.json();


      console.log(data)
      container_list.innerHTML = '';
      builder(container_list, data)
      setInterval(() => loader.classList.add('hidden'), 2000)
    } catch (error) {
      console.error("Error fetching compines:", error);
    }
  }



  async function onLoadIncressViewsPost() {
    try {
      const routePromise = await fetch(`${API_BASE_URL}?action=views&post_id=${searchParams.get('post_id')}`);
      const data = await routePromise.json();


      console.log(data)
      setInterval(() => loader.classList.add('hidden'), 2000)


    } catch (error) {
      console.error("Error fetching compines:", error);
    }
  }




  //this function for building cards Category
  //required:container div  and data 
  function builder(container_list, item) {





    //     //slice tags cuz all tags came liek thsi js,code,...
    //     let tags = item.tags.split(',');

    //     // Map through the tags array to generate button elements
    //     const tagButtons = tags.map(tag => `
    // <button class="inline-flex items-center justify-center font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-10 rounded-full text-xs py-1 px-2">
    // ${tag.trim()}
    // </button>
    // `).join('');



    const card = document.createElement('p');



    card.classList = 'pb-6 ';
    card.innerHTML = `
        <div class="mb-4 md:mb-0 w-full max-w-screen-md mx-auto relative" style="height: 24em;">
        <div class="absolute left-0 bottom-0 w-full h-full z-10" style="background-image: linear-gradient(180deg,transparent,rgba(0,0,0,.7));"></div>
        <img src="${IMG_BASE_URL}${item.image}" class="absolute left-0 top-0 w-full h-full z-0 object-cover" />
        <div class="p-4 absolute bottom-0 left-0 z-20">
          <a href="#" class="px-4 py-1 bg-black text-gray-200 inline-flex items-center justify-center mb-2">${item.category}</a>
          <h2 class="text-4xl font-semibold text-gray-100 leading-tight">
          ${item.title}
          </h2>
          <div class="flex mt-3">
            <img src="${IMG_BASE_URL}${item.image_author}" class="h-10 w-10 rounded-full mr-2 object-cover" />
            <div>
              <p class="font-semibold text-gray-200 text-sm">${item.username}</p>

            </div>
          </div>
        </div>
      </div>
  
      <div id="container_Post" class="px-4 lg:px-0 mt-12 text-gray-700 dark:text-white max-w-screen-md mx-auto text-lg leading-relaxed">
        <p class="pb-6">${item.content}</p>
  
  
      </div>
        `

    container_list.appendChild(card);
  }

})