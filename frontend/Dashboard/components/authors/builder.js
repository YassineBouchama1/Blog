const API_BASE_URL = 'http://localhost/blog/backend/user.php';
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
    if (item.role === 'admin') return
    let isActiveAuthor = item.isActive === 1;
    let dateCreated = item.date_created
    const card = document.createElement('tr');
    card.classList = 'max-max-w-[200px] w-full w-full rounded-full max-w-sm bg-white border border-gray-200  shadow dark:bg-[#111c2d] dark:border-gray-700';
    card.innerHTML = `
    <td class="px-5 py-5 border-b border-gray-200  text-sm">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 w-10 h-10">
                                <img class="w-full h-full rounded-full" src="${IMG_BASE_URL}${item.image}" alt="${item.username}" />
                            </div>
                            <div class="ml-3">
                                <p class="text-gray-900 dark:text-white whitespace-no-wrap">
                                   ${item.username}
                                </p>
                            </div>
                        </div>
                    </td>

                    <td class="px-5 py-5 border-b border-gray-200  text-sm">
                        <p class="text-gray-900 dark:text-white whitespace-no-wrap">${item.email}</p>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200  text-sm">
                        <p class="text-gray-900 dark:text-white whitespace-no-wrap">
                            ${item.date_created.slice(0, 10)}
                        </p>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200  text-sm">

                    <span class="relative inline-block px-3 py-1 font-semibold ${isActiveAuthor ? 'text-green-900 ' : 'text-red-900 '} leading-tight">
                    <span aria-hidden class="absolute inset-0 ${isActiveAuthor ? 'bg-green-200' : 'bg-red-200'}  opacity-50 rounded-full"></span>
                    <span class="relative">${isActiveAuthor ? 'Active' : 'Blocked'}</span>

                </span>
                
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200  text-sm">
                 
            <button 
            onclick={onBtnChnageStatus(${item.user_id})} 
            type="button" class="text-white ${isActiveAuthor ? "bg-red-700 hover:bg-red-800 " : "bg-green-700 hover:bg-green-800 "}  font-medium rounded-full text-sm px-4 py-1 text-center me-2 mb-2  ">${isActiveAuthor ? 'Block' : 'Active'}</button>
           
                       

                    </td > `;

    container_list.appendChild(card);
}
