const API_BASE_URL = 'http://localhost/blog/backend/post.php';

let listNotifecation = document.getElementById('listNotifecation')

document.addEventListener('DOMContentLoaded', onLoadBuild)

//this function bring all posts
//
async function onLoadBuild() {


    try {
        const routePromise = await fetch(API_BASE_URL);
        const data = await routePromise.json();


        if (data.length >= 0) {
            listNotifecation.innerHTML = '';

            await data.forEach(item => builderNotifecation(item));
            loader.classList.add('hidden')
        } else {
            console.log('no posts')
            listNotifecation.innerHTML = `
            <div class="border-b">
    
                <p class="text-sm text-gray-600">Loading!</p>
            </div>
        </div>`
            loader.classList.add('hidden')

        }



    } catch (error) {
        console.error("Error fetching compines:", error);
    }
}


function builderNotifecation(item) {



    let divNotif = document.createElement('div')
    divNotif.classList = 'border-b'

    divNotif.innerHTML = `  <p class="text-sm text-gray-600">${item.title}!</p>`

    listNotifecation.appendChild(divNotif)
}