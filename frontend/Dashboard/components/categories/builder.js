const API_BASE_URL = 'http://localhost/blog/backend/category.php';


document.addEventListener('DOMContentLoaded', onLoadBuildTable)



let container_list = document.getElementById('container_list')
//this function bring data from server and send it to
// function <builder> to create
async function onLoadBuildTable() {
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
    const card = document.createElement('div');
    card.classList = 'w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-[#111c2d] dark:border-gray-700';
    card.innerHTML = `
    <div class="flex flex-col items-center py-10">
    <img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="http://localhost/blog/backend/${item.image}" alt="${item.category_name}" />
    <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">${item.category_name}</h5>

    <div class="flex mt-4 md:mt-6">
        <button onclick="onBtnDelete(${item.category_id})" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800     dark:bg-red-600 dark:hover:bg-red-700 ">Delete</button>
        <button href="#" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100  dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-700 ms-3">Edit</button>
    </div>
</div>`;

    container_list.appendChild(card);
}
