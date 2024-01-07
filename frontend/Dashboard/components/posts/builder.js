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
    let user_id = item.user_id
    const card = document.createElement('tr');
    card.classList = 'max-max-w-[200px] w-full w-full rounded-full max-w-sm bg-white border border-gray-200  shadow dark:bg-[#111c2d] dark:border-gray-700';
    card.innerHTML = `
    <td class="px-5 py-5 border-b border-gray-200  text-sm">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 w-10 h-10">
                                <img class="w-full h-full rounded-full" src="${IMG_BASE_URL}${item.image}" alt="${item.title}" />
                            </div>
                            <div class="ml-3">
                                <p class="text-gray-900 dark:text-white whitespace-no-wrap">
                                   ${item.title}
                                </p>
                            </div>
                        </div>
                    </td>

                    <td class="px-5 py-5 border-b border-gray-200  text-sm">
                        <p class="text-gray-900 dark:text-white whitespace-no-wrap">${item.category}</p>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200  text-sm">
                        <p class="text-gray-900 dark:text-white whitespace-no-wrap">
                        ${item.date_created.slice(0, 10)}
                        </p>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200  text-sm">

                    <span class="relative inline-block px-3 py-1 font-semibold ${isActivePost ? 'text-green-900 ' : 'text-red-900 '} leading-tight">
                    <span aria-hidden class="absolute inset-0 ${isActivePost ? 'bg-green-200' : 'bg-red-200'}  opacity-50 rounded-full"></span>
                    <span class="relative">${isActivePost ? 'Active' : 'Blocked'}</span>

                </span>
                
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200  text-sm">
                 
                    <button 
                    onclick="onBtnChnageStatus(${item.post_id})"
                    type="button" class="text-white ${isActivePost ? "bg-red-700 hover:bg-red-800 " : "bg-green-700 hover:bg-green-800 "}  font-medium rounded-full text-sm px-4 py-1 text-center me-2 mb-2  ">${isActivePost ? 'Block' : 'Active'}</button>
           
                       <a href="/posts/${item.post_id}" target="blank"><i class="ti ti-eye"></i></a>

                    </td > `;

    container_list.appendChild(card);
}
