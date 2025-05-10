
let paymentdataTable;

$(document).ready(function () {
    // Initialize DataTable
    paymentdataTable = $('#addPaymentTable').DataTable({
        "pageLength": 8,
        "lengthChange": false,
        "ordering": true,
        "searching": true,
        "paging": true
    });

    const filterBtn = document.getElementById("filterBtn");
    const clearBtn = document.getElementById("clearBtn");

    filterBtn.addEventListener("click", function (e) {
        e.preventDefault();

        const visitorname = document.getElementById("visitorname").value;
        const payment_date = document.getElementById("reportPaymentDate").value;
        const visitortype = document.getElementById("visitortype").value;

        const xhr = new XMLHttpRequest();
        xhr.open("POST", "action/paymentReport.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        xhr.onload = function () {
            if (xhr.status === 200) {
                const tbody = document.querySelector("#addPaymentTable tbody");

                if ($.fn.DataTable.isDataTable('#addPaymentTable')) {
                    paymentdataTable.destroy();
                }

                tbody.innerHTML = xhr.responseText;

                // Re-initialize
                paymentdataTable = $('#addPaymentTable').DataTable({
                    "pageLength": 8,
                    "lengthChange": false,
                    "ordering": true,
                    "searching": true,
                    "paging": true
                });
            } else {
                alert("Failed to fetch data");
            }
        };

        const params = `visitorname=${encodeURIComponent(visitorname)}&payment_date=${encodeURIComponent(payment_date)}&visitortype=${encodeURIComponent(visitortype)}`;
        xhr.send(params);
    });

    clearBtn.addEventListener("click", function (e) {
        e.preventDefault();
        document.getElementById("visitorname").value = "";
        document.getElementById("reportPaymentDate").value = "";
        document.getElementById("visitortype").value = "";
        filterBtn.click(); // Reload all
    });
});

