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

function toggleSidebar() {
    var sidebar = document.getElementById("sidebar");
    var mainContent = document.getElementById("main-content");

    sidebar.classList.toggle("active");
    mainContent.classList.toggle("active");
}
