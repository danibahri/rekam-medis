import "./bootstrap";
import "flowbite";
import Swal from "sweetalert2";
window.Swal = Swal;

import { DataTable } from "simple-datatables";
document.addEventListener("DOMContentLoaded", () => {
    const table = document.querySelector("#search-table");
    if (table) {
        new DataTable(table, {
            searchable: true,
            labels: {
                placeholder: "Cari data...",
                perPage: "data per halaman",
                noRows: "Tidak ada data yang ditemukan",
                info: "Menampilkan {start} sampai {end} dari {rows} data",
            },
        });
    }
});
