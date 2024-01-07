


// this unction for delete category
async function onBtnChnageStatus(id) {



    try {
        let routePromise = await fetch(`${API_BASE_URL}?action=block&user_id=${id}`);

        let response = await routePromise.json();
        console.log(response);
        onLoadBuild();

        console.log('blocked')
    } catch (error) {
        console.error(error);
    }

}













