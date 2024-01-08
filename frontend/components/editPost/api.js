
const API_BASE_URL = 'http://localhost/blog/backend/post.php';
const IMG_BASE_URL = 'http://localhost/blog/backend/';
const API_Category_URL = 'http://localhost/blog/backend/category.php';
const API_TAG_URL = 'http://localhost/blog/backend/tag.php';

document.addEventListener('DOMContentLoaded', async function () {


    //fetch all categoriies
    try {
        let routePromise = await fetch(API_Category_URL);



        let response = await routePromise.json();
        console.log(response);
        // build  options inside category seector
        response.map((item) => fillInputsCategory(categorySelector, item)
        )
        await buildTagsSelectedFun()
        //active loader
        loader.classList.add('hidden')

    } catch (error) {
        console.error(error);
    }




    //fetch all post detail
    try {
        let routePromise = await fetch(`${API_BASE_URL}?action=find&post_id=${searchParams.get('post_id')}`);



        let response = await routePromise.json();
        console.log(response);

        title.value = response.title
        content.value = response.content
        categorySelector.value = response.category_id
        await response.tags.split(',').forEach((tag) => tagsSelected.push(tag))

        displatImg.value = `${IMG_BASE_URL}${response.image}`

        displatImg.src = `${IMG_BASE_URL}${response.image}`

    } catch (error) {
        console.error(error);
    }



    // fetch all tags from db
    try {

        let routePromise = await fetch(API_TAG_URL);
        let response = await routePromise.json();
        list_tags_select.innerHTML = ''
        response.map((tag) => buildTag(tag.tag_name))
        console.log(tagsSelected)
        buildTagsSelectedFun()
    } catch (error) {
        console.log('no tags pb')
    }




})