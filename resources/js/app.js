/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

// confirm delete buttons 
const deleteArr = document.querySelectorAll('.deleteForm');
console.log(deleteArr);

deleteArr.forEach(function (el) {
  el.addEventListener('submit', function (e) {
    var res = confirm('Sei sicuro di voler eliminare?');

    if (!res) {
      e.preventDefault();
    }
  });
});

// reset modals 
$('#leads').on('hidden.bs.modal', function () {
  $(this).find('form').trigger('reset');
})

// toggle view msgs 
const showMsgs = document.querySelectorAll('.show-msg');

showMsgs.forEach((el) => {
  el.addEventListener('click', (e) => {
    const msg = e.target.previousElementSibling;
    msg.classList.toggle('text-truncate');
    e.target.classList.toggle('fa-chevron-down');
    e.target.classList.toggle('fa-chevron-up');
  });
});