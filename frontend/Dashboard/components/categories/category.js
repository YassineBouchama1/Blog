


let toggle_category = document.getElementById('toggle_category');
let form_category = document.getElementById('form_category');

toggle_category.addEventListener('click', onToggle);

function onToggle() {
    console.log('hole')
    if (form_category.classList.contains('scale-y-0')) {
        form_category.classList.remove('scale-y-0');
        form_category.classList.add('scale-y-100');
    } else {
        form_category.classList.remove('scale-y-100');
        form_category.classList.add('scale-y-0');
    }
    
}


