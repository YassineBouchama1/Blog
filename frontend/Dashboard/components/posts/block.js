


// this unction for delete category
async function onBtnChnageStatus(id, action) {



    try {
        let routePromise = await fetch(`${API_BASE_URL}?action=${action}&user_id=${id}`);

        let response = await routePromise.json();
        console.log(response);
        onLoadBuild();

        console.log('blocked')
    } catch (error) {
        console.error(error);
    }

}













