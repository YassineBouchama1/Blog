const CAT_BASE_URL = 'http://localhost/blog/backend/category.php';
const IMG_BASE_URL = 'http://localhost/blog/backend/';
document.addEventListener('DOMContentLoaded', async function () {

    let category_list = document.getElementById('category_list')
    //fetch all post detail
    try {
        let routePromise = await fetch(CAT_BASE_URL);



        let response = await routePromise.json();

        console.log('categories', response)
        category_list.innerHTML = ''
        // loop thought  categories and build it
        response.map((item) => buildCategory(category_list, item))


    } catch (error) {
        console.error(error);
    }


    async function buildCategory(category_list, item) {


        let divCat = document.createElement('a')
        divCat.classList = 'flex flex-col items-center dark:text-white'
        divCat.href = `./categories?name=${item.category_name}`
        divCat.innerHTML = `
        <img class="w-[100px] h-[100px] rounded-full" src="${IMG_BASE_URL}${item.image} ">
        <h5> ${item.category_name}</h5> `

        category_list.append(divCat)
    }
})