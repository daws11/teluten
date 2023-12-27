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

function openPaymentModal() {
    document.getElementById('paymentModal').style.display = 'block';
}

function closePaymentModal() {
    document.getElementById('paymentModal').style.display = 'none';
}

function confirmPayment() {
    closePaymentModal(); // Close the payment modal
    document.getElementById('successModal').style.display = 'block'; // Open the success modal
}

function closeSuccessModal() {
    document.getElementById('successModal').style.display = 'none';
}

function printReceipt() {
    // Add your printing logic here
    console.log('Printing receipt...');
}

