









let toggle_category = document.getElementById('toggle_category');
let form_category = document.getElementById('form_category');

toggle_category.addEventListener('click', onToggle);


function onToggle() {
    name.value = ''
    image.files.length = 0
    console.log('hole')
    btnForm.textContent = 'Create'
    if (form_category.classList.contains('scale-0')) {
        form_category.classList.remove('scale-0');
        form_category.classList.add('scale-100');
    } else {
        btnForm.textContent = 'Create'

        form_category.classList.remove('scale-100');
        form_category.classList.add('scale-0');
    }

}