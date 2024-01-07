


// this unction for delete category
async function onBtnDelete(id) {
    console.log('id:', id)
    try {
        let routePromise = await fetch(`${API_BASE_URL}?action=delete&category_id=${id}`);

        let response = await routePromise.json();
        console.log(response);
        onLoadBuildTable();

        console.log('deleted')
    } catch (error) {
        console.error(error);
    }



}













