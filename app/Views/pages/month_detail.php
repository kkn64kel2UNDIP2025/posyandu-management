<?php $this->extend('layout/template') ?>
<?php $this->section('content') ?>

<div class="card p-2">
    <div class="card-body">
        <div class="flex items-start justify-between">
            <div>
                <h6 class="text-lg text-gray-900 font-semibold">Informasi Balita</h6>
                <p class="mt-2 text-gray-800">Waktu: <span id="time"><?= $monthYear ?></span></p>
            </div>
            <button onclick="exportToExcel()" type="button" class="cursor-pointer bg-green-600 text-white px-3 py-2 rounded-xl flex gap-1 hover:bg-green-700">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-file-type-xls">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                    <path d="M5 12v-7a2 2 0 0 1 2 -2h7l5 5v4" />
                    <path d="M4 15l4 6" />
                    <path d="M4 21l4 -6" />
                    <path d="M17 20.25c0 .414 .336 .75 .75 .75h1.25a1 1 0 0 0 1 -1v-1a1 1 0 0 0 -1 -1h-1a1 1 0 0 1 -1 -1v-1a1 1 0 0 1 1 -1h1.25a.75 .75 0 0 1 .75 .75" />
                    <path d="M11 15v6h3" />
                </svg>
                <span class="text-sm font-semibold my-auto">Unduh</span>
            </button>
        </div>
        <?php if (count($measurements) > 0) : ?>
            <table id="measurements-table" class="mt-4 w-full text-sm text-left rtl:text-right text-gray-800">
                <thead class="text-xs text-gray-900 uppercase bg-gray-100">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Nama
                        </th>
                        <th scope="col" class="px-6 py-3">
                            RT
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Jenis Kelamin
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Umur
                        </th>
                        <th scope="col" class="px-6 py-3">
                            TB
                        </th>
                        <th scope="col" class="px-6 py-3">
                            BB
                        </th>
                        <th scope="col" class="px-6 py-3">
                            LK
                        </th>
                        <th scope="col" class="px-6 py-3">
                            LD
                        </th>
                        <th scope="col" class="px-6 py-3">
                            LL
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($measurements as $measurement) : ?>
                        <tr class="odd:bg-white even:bg-gray-50 border-b border-gray-200">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                <?= $measurement['name'] ?>
                            </th>
                            <td class="px-6 py-4">
                                <?= $measurement['rt'] ?>
                            </td>
                            <td class="px-6 py-4">
                                <?= $measurement['jenis_kelamin'] ?>
                            </td>
                            <td class="px-6 py-4">
                                <?= $measurement['age'] ?>
                            </td>
                            <td class="px-6 py-4">
                                <?= $measurement['height'] ?>
                            </td>
                            <td class="px-6 py-4">
                                <?= $measurement['weight'] ?>
                            </td>
                            <td class="px-6 py-4">
                                <?= $measurement['head_circum'] ?>
                            </td>
                            <td class="px-6 py-4">
                                <?= $measurement['chest_size'] ?>
                            </td>
                            <td class="px-6 py-4">
                                <?= $measurement['arm_circum'] ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else : ?>
            <p class="mt-4 text-gray-500">Tidak ada data pengukuran untuk bulan ini.</p>
        <?php endif; ?>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
<script>
    // Mengubah format tanggal ke lokal
    const time = document.getElementById('time');
    toLocalDate(time, {
        month: "long",
        year: "numeric"
    });

    // Fungsi untuk mengunduh data sebagai file XLSX
    function exportToExcel() {
        const table = document.getElementById("measurements-table");
        const wb = XLSX.utils.table_to_book(table, {
            sheet: "Data Pengukuran Balita"
        });
        XLSX.writeFile(wb, "data_balita_" + time.innerText.replace(/\s+/g, "_").toLowerCase() + ".xlsx");
    }
</script>


<?php $this->endSection() ?>