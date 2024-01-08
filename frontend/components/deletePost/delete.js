const API_BASE_URL = 'http://localhost/blog/backend/post.php';


async function onDeletePost(id) {

    try {
        let routePromise = await fetch(`${API_Category_URL}?action=delete&post_id=${id}`);



        let response = await routePromise.json();
        console.log(response);
        // build  options inside category seector
        response.map((item) => fillInputsCategory(categorySelector, item)
        )


    } catch (error) {
        console.error(error);
    }
}