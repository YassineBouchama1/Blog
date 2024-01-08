const API_BASE_URL = 'http://localhost/blog/backend/auth.php';

document.addEventListener('DOMContentLoaded', function () {
    let avatar = document.getElementById('avatar');
    let loader = document.getElementById('loader')
    let avatarInput = document.getElementById('avatarInput');
    let username = document.getElementById('username');
    let email = document.getElementById('email');
    let error_msg = document.getElementById('error_msg');
    let password = document.getElementById('password');
    const successfully_msg = document.getElementById('successfully_msg');
    avatarInput.addEventListener('change', changeAvatar);

    function changeAvatar() {
        if (avatarInput.files.length !== 0) {
            const file = avatarInput.files[0];
            const reader = new FileReader();

            reader.onload = function (e) {

                avatar.src = e.target.result;
            };


            reader.readAsDataURL(file);
        }
    }


    // on click on btn create  excute funtion <onBtnFormClick>
    btnCreate.addEventListener('click', onBtnFormClick)








    // on click BtnFormCreate
    async function onBtnFormClick() {
        console.log('clicked create')
        error_msg.textContent = ''
        //validation inputs
        if (username.value.trim() === '') {
            return error_msg.textContent = 'username is Required'
        }

        let emailValid = /^[^@\s\r\n]+@[^@\s\r\n]+\.[^@\s\r\n]+$/;

        if (!emailValid.test(email.value.trim())) {
            return error_msg.textContent = 'Email is required';
        }

        if (password.value === '') {
            return error_msg.textContent = 'password is Required'
        }
        if (password.value.length <= 5) {
            return error_msg.textContent = 'password to short'
        }


        if (avatarInput.files.length === 0) {
            return error_msg.textContent = 'image is Required'
        }





        //create formdata to send it to server
        const formData = new FormData();
        formData.append('username', username.value);
        formData.append('email', email.value);
        formData.append('password', password.value);
        formData.append('image', avatarInput.files[0]);
        console.log(password.value)

        //active loader
        loader.classList.remove('hidden')
        try {
            let routePromise = await fetch(`${API_BASE_URL}?action=register`, {
                method: 'POST',
                body: formData,
            });



            let response = await routePromise.json();
            console.log(response);



            //   window.location.replace
            if (response.status === 500) {
                error_msg.textContent = 'Failed to Create Account'
                return;
            }

            console.log('created')
            setInterval(() => {
                window.location.href = './login.php'
                loader.classList.add('hidden')
            }, 2000)

            successfully_msg.textContent = "Post Created"
        } catch (error) {
            console.log(error);
            loader.classList.add('hidden')
        }



    }
});
