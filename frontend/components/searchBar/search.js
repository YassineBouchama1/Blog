const API_FILTER_URL = 'http://localhost/blog/backend/filter.php';
// const IMG_BASE_URL = 'http://localhost/blog/backend/';

const searchInput = document.getElementById('search_input');
const searchBar = document.getElementById('searchBar');

const resultSearch = document.getElementById('result_Search');


searchInput.addEventListener('input', onLoadSearch);


searchBar.addEventListener('click', function () {
    searchBar.classList.add("hidden")
})

async function onLoadSearch() {
    console.log('onsearch')
    try {
        const routePromise = await fetch(`${API_FILTER_URL}?action=search&word=${searchInput.value}`);
        const data = await routePromise.json();
        console.log(data)
        if (data.length > 0) {

            resultSearch.innerHTML = '';
            data.forEach(item => builderResultSearch(item));
        } else {
            resultSearch.innerHTML = `    <li class=" px-2 py-1 border-b-2 border-gray-100 flex justify-start items-center gap-x-1 cursor-pointer hover:bg-yellow-50 hover:text-gray-900">
            <p>No Posts Aviable</p>
        </li>`
        }
    } catch (error) {
        console.error("Error fetching posts:", error);
    }
}

function builderResultSearch(item) {
    const li = document.createElement('li')


    li.innerHTML = ` <a  href="post.php?post_id=${item.post_id}" class="px-2 py-1 border-b-2 border-gray-100 flex justify-start items-center gap-x-1 cursor-pointer hover:bg-[#0085DB]/50 hover:text-gray-900">
    <img class="max-h-5 max-w-5 rounded-full" src="${IMG_BASE_URL}${item.image}">
    <p class="truncate">${item.title}</p></a>`

    resultSearch.appendChild(li)

}
