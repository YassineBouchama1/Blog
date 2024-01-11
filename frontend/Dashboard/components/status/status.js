const API_FILTER_URL = 'http://localhost/blog/backend/filter.php'

onLoadStatus()
let articleStatus = document.getElementById('articleStatus')
let authorStatus = document.getElementById('authorStatus')
let archivedStatus = document.getElementById('archivedStatus')
let viewsStatus = document.getElementById('viewsStatus')
let categoriesStatus = document.getElementById('categoriesStatus')

async function onLoadStatus() {


    try {
        let routePromise = await fetch(`${API_FILTER_URL}?action=status`);

        let response = await routePromise.json();
        console.log(response)

        articleStatus.textContent = response.postsStatus
        authorStatus.textContent = response.uersStatus
        viewsStatus.textContent = response.viewsStatus
        archivedStatus.textContent = response.postsArchived
        categoriesStatus.textContent = response.categoriesStatus

        //  builderSTatus(item)
    } catch (error) {
        console.error(error);
    }
}


function builderSTatus(item) {

}
