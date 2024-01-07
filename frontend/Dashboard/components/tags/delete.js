


// this unction for delete category
async function onBtnDelete(id) {
    console.log('id:', id)
    try {
        let routePromise = await fetch(`${API_BASE_URL}?action=delete&tag_id=${id}`);

        let response = await routePromise.json();
        console.log(response);
        onLoadBuild();

        console.log('deleted')
    } catch (error) {
        console.error(error);
    }

}













