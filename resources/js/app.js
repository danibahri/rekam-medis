import "./bootstrap";
import "flowbite";
import Swal from "sweetalert2";
window.Swal = Swal;

import { DataTable } from "simple-datatables";
import { Dropdown, initFlowbite } from "flowbite";

document.addEventListener("DOMContentLoaded", () => {
    // Initialize Flowbite
    initFlowbite();

    // Handle the export table
    const exportTable = document.querySelector("#export-table");
    // Handle the search table separately
    const searchTable = document.querySelector("#search-table");

    // Custom CSV export function
    const exportCustomCSV = function (dataTable, userOptions = {}) {
        // A modified CSV export that includes a row of plus signs at the start and end
        const clonedUserOptions = {
            ...userOptions,
        };
        clonedUserOptions.download = false;

        // Get CSV data without downloading
        const csv = dataTable.export({
            type: "csv",
            download: false,
            lineDelimiter: "\n",
            columnDelimiter: ";",
        });

        // If CSV didn't work, exit
        if (!csv) {
            return false;
        }

        const defaults = {
            download: true,
            lineDelimiter: "\n",
            columnDelimiter: ";",
            filename: "rekam_medis_export",
        };

        const options = {
            ...defaults,
            ...userOptions,
        };

        // Create separator row with plus signs
        const headingsCount = dataTable.headings.filter(
            (heading, index) => !dataTable.columns.settings[index]?.hidden
        ).length;
        const separatorRow = Array(headingsCount).fill("+").join("+");

        // Combine with separator rows
        const str =
            separatorRow +
            options.lineDelimiter +
            csv +
            options.lineDelimiter +
            separatorRow;

        if (options.download) {
            // Create a link to trigger the download
            const link = document.createElement("a");
            link.href = encodeURI("data:text/csv;charset=utf-8," + str);
            link.download = (options.filename || "rekam_medis_export") + ".txt";
            // Append the link
            document.body.appendChild(link);
            // Trigger the download
            link.click();
            // Remove the link
            document.body.removeChild(link);
        }

        return str;
    };

    // Initialize export table if it exists
    if (exportTable) {
        // Initialize the Export DataTable
        const exportDataTable = new DataTable("#export-table", {
            perPageSelect: [10, 25, 50, 100],
            searchable: true,
            labels: {
                placeholder: "Cari data...",
                perPage: "data per halaman",
                noRows: "Tidak ada data yang ditemukan",
                info: "Menampilkan {start} sampai {end} dari {rows} data",
            },
            template: (options, dom) => {
                return `<div class="${options.classes.top}">
                    <div class="flex flex-col sm:flex-row sm:items-center space-y-4 sm:space-y-0 sm:space-x-3 rtl:space-x-reverse w-full sm:w-auto">
                        ${
                            options.paging && options.perPageSelect
                                ? `<div class="${options.classes.dropdown}">
                                <label>
                                    <select class="${options.classes.selector}"></select> ${options.labels.perPage}
                                </label>
                            </div>`
                                : ""
                        }
                        <button id="exportCsvButton" type="button" class="flex w-full items-center justify-center cursor-pointer rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100 sm:w-auto">
                            Export CSV
                        </button>
                    </div>
                    ${
                        options.searchable
                            ? `<div class="${options.classes.search}">
                            <input class="${
                                options.classes.input
                            }" placeholder="${
                                  options.labels.placeholder
                              }" type="search" title="${
                                  options.labels.searchTitle
                              }"${dom.id ? ` aria-controls="${dom.id}"` : ""}>
                        </div>`
                            : ""
                    }
                </div>
                <div class="${options.classes.container}"${
                    options.scrollY.length
                        ? ` style="height: ${options.scrollY}; overflow-Y: auto;"`
                        : ""
                }></div>
                <div class="${options.classes.bottom}">
                    ${
                        options.paging
                            ? `<div class="${options.classes.info}"></div>`
                            : ""
                    }
                    <nav class="${options.classes.pagination}"></nav>
                </div>`;
            },
        });

        // Add event listener for CSV export button on the export table
        document.addEventListener("click", function (e) {
            if (e.target && e.target.id === "exportCsvButton") {
                exportCustomCSV(exportDataTable, {
                    download: true,
                    lineDelimiter: "\n",
                    columnDelimiter: ";",
                    filename: "rekam_medis_export",
                });
            }
        });
    }

    // Initialize search table if it exists
    if (searchTable) {
        const searchDataTable = new DataTable("#search-table", {
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
