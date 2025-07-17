<?php $this->extend('layout/template') ?>
<?php $this->section('content') ?>

<div class="card p-2">
    <div class="card-body">
        <h6 class="text-lg text-gray-900 font-semibold">Informasi Balita</h6>
        <p class="mt-2 text-gray-800">Waktu: <span id="time"><?= $monthYear ?></span></p>
        <table class="mt-4 w-full text-sm text-left rtl:text-right text-gray-800">
            <thead class="text-xs text-gray-900 uppercase bg-gray-50">
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
                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b border-gray-200">
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
    </div>
</div>
<script>
    // Mengubah format tanggal ke lokal
    const time = document.getElementById('time');
    toLocalDate(time, {
            month: "long",
            year: "numeric"
        });
</script>


<?php $this->endSection() ?>