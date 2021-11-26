require('./bootstrap');

const deleteArr = document.querySelectorAll('.deleteForm');
console.log(deleteArr);

deleteArr.forEach((el) => {
    el.addEventListener('submit', function(e) {
        let res = confirm('Delete Post?');
        if(!res) {
            e.preventDefault();
        }
    }) 
});




