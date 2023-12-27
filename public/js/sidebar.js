// resources/js/sidebar.js

document.addEventListener('DOMContentLoaded', function() {
    var dropdowns = document.querySelectorAll('.nav-dropdown > a');
    dropdowns.forEach(function(dropdown) {
        dropdown.addEventListener('click', function(event) {
            event.preventDefault();
            var parent = this.parentElement;
            parent.classList.toggle('active');
        });
    });
});
