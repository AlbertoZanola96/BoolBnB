// const inputs = document.querySelectorAll('.form-control');

// let patterns = {
//     'name' : /^\w{5,255}$/,
//     'num_rooms' : /^[1-9]{1,3}$/,
//     'num_beds' : /^[1-9]{1,3}$/,
// }


// inputs.forEach(input => {
//     input.addEventListener('change', (e) => {
//         if(patterns[e.target.name]) {
//             validate(e.target, patterns[e.target.name])
//         }
//         console.log(e.target);
//     });
// });

// function validate(field, regex) {
//     if(regex.test(field.value)) {
//         field.classList.remove('is-invalid');
//         field.classList.add('is-valid');
//     } else {
//         field.classList.remove('is-valid');
//         field.classList.add('is-invalid');
//     }
// }
