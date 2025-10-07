/**
 * ===================================
 * CUSTOM JS - SISTEM MANAJEMEN SISWA
 * ===================================
 */

// Check if Swal is loaded
if (typeof Swal === "undefined") {
    console.error("SweetAlert2 not loaded!");
}

/**
 * Konfirmasi Delete dengan SweetAlert2
 * @param {number} id - ID siswa
 * @param {string} nisn - NISN siswa
 */
function confirmDelete(id, nisn) {
    Swal.fire({
        title: "Konfirmasi Hapus",
        text: `Apakah Anda yakin ingin menghapus data siswa "${nisn}"?`,
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#6c757d",
        confirmButtonText: "Hapus",
        cancelButtonText: "Batal",
        reverseButtons: true,
        backdrop: true,
        allowOutsideClick: false,
        customClass: {
            container: "my-swal-container",
            popup: "my-swal-popup",
        },
    }).then((result) => {
        if (result.isConfirmed) {
            const form = document.getElementById("delete-form");
            form.action = `/siswa/${id}`;
            form.submit();
        }
    });
}

/**
 * Initialize Event Listeners
 */
document.addEventListener("DOMContentLoaded", function () {
    // Auto submit search form dengan Enter key
    const searchInput = document.querySelector('input[name="search"]');
    if (searchInput) {
        searchInput.addEventListener("keypress", function (e) {
            if (e.key === "Enter") {
                e.preventDefault();
                this.form.submit();
            }
        });
    }

    // Highlight search results
    highlightSearchResults();

    // Initialize tooltips (jika menggunakan Bootstrap tooltips)
    initializeTooltips();

    // Auto dismiss alerts
    autoDismissAlerts();

    // Smooth scroll untuk anchor links
    smoothScrollLinks();
});

/**
 * Highlight kata kunci pencarian di tabel
 */
function highlightSearchResults() {
    const searchTerm = new URLSearchParams(window.location.search).get(
        "search"
    );

    if (searchTerm) {
        const tableBody = document.querySelector("tbody");
        if (tableBody) {
            const regex = new RegExp(`(${escapeRegex(searchTerm)})`, "gi");
            tableBody.innerHTML = tableBody.innerHTML.replace(
                regex,
                "<mark>$1</mark>"
            );
        }
    }
}

/**
 * Escape special characters untuk regex
 * @param {string} string - String yang akan di-escape
 * @returns {string} - String yang sudah di-escape
 */
function escapeRegex(string) {
    return string.replace(/[.*+?^${}()|[\]\\]/g, "\\$&");
}

/**
 * Initialize Bootstrap Tooltips
 */
function initializeTooltips() {
    const tooltipTriggerList = [].slice.call(
        document.querySelectorAll('[data-bs-toggle="tooltip"]')
    );
    tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });
}

/**
 * Auto dismiss alerts setelah beberapa detik
 */
function autoDismissAlerts() {
    const alerts = document.querySelectorAll(".alert-dismissible");
    alerts.forEach(function (alert) {
        setTimeout(function () {
            const bsAlert = new bootstrap.Alert(alert);
            bsAlert.close();
        }, 5000); // 5 detik
    });
}

/**
 * Smooth scroll untuk anchor links
 */
function smoothScrollLinks() {
    document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
        anchor.addEventListener("click", function (e) {
            const href = this.getAttribute("href");
            if (href !== "#" && href !== "#!") {
                e.preventDefault();
                const target = document.querySelector(href);
                if (target) {
                    target.scrollIntoView({
                        behavior: "smooth",
                        block: "start",
                    });
                }
            }
        });
    });
}

/**
 * Show loading spinner
 */
function showLoading() {
    const loadingHtml = `
        <div id="loading-overlay" style="
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 99999;
        ">
            <div class="loading-spinner"></div>
        </div>
    `;
    document.body.insertAdjacentHTML("beforeend", loadingHtml);
}

/**
 * Hide loading spinner
 */
function hideLoading() {
    const loadingOverlay = document.getElementById("loading-overlay");
    if (loadingOverlay) {
        loadingOverlay.remove();
    }
}

/**
 * Format nomor telepon
 * @param {string} phoneNumber - Nomor telepon
 * @returns {string} - Nomor telepon yang sudah diformat
 */
function formatPhoneNumber(phoneNumber) {
    // Hapus semua karakter non-digit
    const cleaned = ("" + phoneNumber).replace(/\D/g, "");

    // Format: 0812-3456-7890
    const match = cleaned.match(/^(\d{4})(\d{4})(\d{4})$/);
    if (match) {
        return match[1] + "-" + match[2] + "-" + match[3];
    }
    return phoneNumber;
}

/**
 * Validasi form sebelum submit
 * @param {HTMLFormElement} form - Form element
 * @returns {boolean} - True jika valid, false jika tidak
 */
function validateForm(form) {
    let isValid = true;
    const requiredFields = form.querySelectorAll("[required]");

    requiredFields.forEach(function (field) {
        if (!field.value.trim()) {
            isValid = false;
            field.classList.add("is-invalid");
        } else {
            field.classList.remove("is-invalid");
        }
    });

    return isValid;
}

/**
 * Copy text ke clipboard
 * @param {string} text - Text yang akan dicopy
 */
function copyToClipboard(text) {
    navigator.clipboard
        .writeText(text)
        .then(function () {
            Swal.fire({
                icon: "success",
                title: "Berhasil!",
                text: "Text berhasil dicopy ke clipboard",
                timer: 1500,
                showConfirmButton: false,
            });
        })
        .catch(function (err) {
            console.error("Failed to copy: ", err);
        });
}

/**
 * Print current page
 */
function printPage() {
    window.print();
}

/**
 * Export table to CSV
 * @param {string} tableId - ID dari table yang akan di-export
 * @param {string} filename - Nama file CSV
 */
function exportTableToCSV(tableId, filename) {
    const table = document.getElementById(tableId);
    if (!table) return;

    let csv = [];
    const rows = table.querySelectorAll("tr");

    for (let i = 0; i < rows.length; i++) {
        const row = [];
        const cols = rows[i].querySelectorAll("td, th");

        for (let j = 0; j < cols.length; j++) {
            row.push(cols[j].innerText);
        }

        csv.push(row.join(","));
    }

    // Download CSV
    downloadCSV(csv.join("\n"), filename);
}

/**
 * Download CSV file
 * @param {string} csv - CSV content
 * @param {string} filename - Nama file
 */
function downloadCSV(csv, filename) {
    const csvFile = new Blob([csv], { type: "text/csv" });
    const downloadLink = document.createElement("a");
    downloadLink.download = filename;
    downloadLink.href = window.URL.createObjectURL(csvFile);
    downloadLink.style.display = "none";
    document.body.appendChild(downloadLink);
    downloadLink.click();
    document.body.removeChild(downloadLink);
}

// Export functions untuk digunakan di file lain
window.customFunctions = {
    confirmDelete,
    highlightSearchResults,
    showLoading,
    hideLoading,
    formatPhoneNumber,
    validateForm,
    copyToClipboard,
    printPage,
    exportTableToCSV,
};
