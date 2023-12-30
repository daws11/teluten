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

// Fungsi untuk membuka modal edit produk
function openEditModal(produk) {
    // Isi nilai input form
    document.getElementById('editProductId').value = produk.id;
    document.getElementById('editProductName').value = produk.nama_produk;
    document.getElementById('editProductType').value = produk.jenis_produk;
    document.getElementById('editProductPrice').value = produk.harga_produk;
    document.getElementById('editProductQuantity').value = produk.jumlah_produk;

    // Atur action form
    var form = document.querySelector('#editProductModal form');
    form.action = '/produk/' + produk.id;

    // Tampilkan modal
    document.getElementById('editProductModal').style.display = 'block';
}


// Fungsi untuk menutup modal edit produk
function closeEditModal() {
    document.getElementById('editProductModal').style.display = 'none';
}

// Fungsi untuk membuka modal pembayaran
function openPaymentModal() {
    document.getElementById('paymentModal').style.display = 'block';
}

// Fungsi untuk menutup modal pembayaran
function closePaymentModal() {
    document.getElementById('paymentModal').style.display = 'none';
}

// Fungsi untuk mengonfirmasi pembayaran dan menampilkan modal sukses
function confirmPayment() {
    // Tutup modal pembayaran
    closePaymentModal();
    // Tampilkan modal konfirmasi pembayaran berhasil
    document.getElementById('successModal').style.display = 'block';
}

// Fungsi untuk menutup modal konfirmasi pembayaran berhasil
function closeSuccessModal() {
    document.getElementById('successModal').style.display = 'none';
}

// Fungsi untuk mencetak struk (dummy function, Anda harus implementasikan sendiri)
function printReceipt() {
    console.log('Implementasi fungsi untuk mencetak struk');
}

// Tutup modal jika pengguna mengklik di luar modal
window.onclick = function(event) {
    if (event.target.className === 'modal') {
        closeEditModal();
        closePaymentModal();
        closeSuccessModal();
    }
}

function deleteProduct(id) {
    if (confirm('Apakah Anda yakin ingin menghapus produk ini?')) {
        // Kirim permintaan DELETE ke server
        fetch('/produk/' + id, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ id: id })
        })
        .then(response => response.json())
        .then(data => {
            if(data.success) {
                window.location.reload(); // Reload halaman jika penghapusan berhasil
            } else {
                alert('Gagal menghapus produk.');
            }
        })
        .catch(error => console.error('Error:', error));
    }
}
