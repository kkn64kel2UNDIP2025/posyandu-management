<?php $this->extend('layout/template') ?>
<?php $this->section('content') ?>

<div class="card p-2">
    <div class="card-body">
        <div class="flex items-center mb-4">
            <h6 class="text-lg text-gray-900 font-semibold">Informasi Balita</h6>
            <i data-modal-target="edit-balita" data-modal-toggle="edit-balita" class="ti ti-edit text-2xl ml-3 text-gray-500 hover:text-gray-700 cursor-pointer"></i>
        </div>
        <div class="grid grid-cols-2 gap-4 w-full mb-8">
            <div class="col-span-1">
                <p class="mb-2 text-gray-500">Nama:</p>
                <p><?= $data['name'] ?></p>
            </div>
            <div class="col-span-1">
                <p class="mb-2 text-gray-500">Jenis Kelamin</p>
                <p class="text-gray-900" id="gender"><?= $data['jenis_kelamin'] ?></p>
            </div>
            <div class="col-span-1">
                <p class="mb-2 text-gray-500">Tanggal Lahir: </p>
                <p class="text-gray-900"><?= $data['birth_date'] ?></p>
            </div>
            <div class="col-span-1">
                <p class="mb-2 text-gray-500">Status: </p>
                <p class="text-gray-900"><?= $data['status'] ?></p>
            </div>
            <div class="col-span-1">
                <p class="mb-2 text-gray-500">Masih Balita: </p>
                <p id="is-toddler" class="text-gray-900"><?= $data['still_toddler'] ?></p>
            </div>
            <div class="col-span-1">
                <p class="mb-2 text-gray-500">Deskripsi:</p>
                <p class="text-gray-900"><?= $data['description'] ?></p>
            </div>
        </div>

        <div class="flex items-center mb-4">
            <h6 class="text-lg text-gray-900 font-semibold inline-block">Informasi Orang Tua</h6>
            <i data-modal-target="edit-parent" data-modal-toggle="edit-parent" class="ti ti-edit text-2xl ml-3 text-gray-500 hover:text-gray-700 cursor-pointer"></i>
        </div>
        <div class="grid gap-4 mb-4 grid-cols-2 w-full">
            <div class="col-span-1">
                <p class="mb-2 text-gray-500">Nama:</p>
                <p><?= $data['parent_name'] ?></p>
            </div>
            <div class="col-span-1">
                <p class="mb-2 text-gray-500">No Telepon: </p>
                <p class="text-gray-900"><?= $data['no_telp'] ?></p>
            </div>
        </div>
    </div>
</div>

<div class="card p-2">
    <div class="card-body">
        <h6 class="text-lg text-gray-900 font-semibold">Tabel Kedatangan</h6>
        <table class="text-left w-full whitespace-nowrap text-sm text-gray-900">
            <thead>
                <tr class="text-sm">
                    <th scope="col" class="p-4 font-semibold">Umur (bulan)</th>
                    <th scope="col" class="p-4 font-semibold">Tinggi (cm)</th>
                    <th scope="col" class="p-4 font-semibold">Berat (kg)</th>
                    <th scope="col" class="p-4 font-semibold">Terakhir Diubah</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($measurements as $measurement) : ?>
                    <tr>
                        <td class="p-4">
                            <h3 class="font-medium"><?= $measurement['age'] ?></h3>
                        </td>
                        <td class="p-4">
                            <h3 class="font-medium"><?= $measurement['height'] ?></h3>
                        </td>
                        <td class="p-4">
                            <h3 class="font-medium text-teal-500"><?= $measurement['weight'] ?></h3>
                        </td>
                        <td class="p-4">
                            <h3 class="font-medium text-teal-500"><?= $measurement['email'] ?></h3>
                        </td>

                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 lg:gap-x-6 gap-x-0 lg:gap-y-0 gap-y-6">
    <div class="card p-2 col-span-2 sm:col-span-1">
        <div class="card-body">
            <h6 class="text-lg text-gray-900 font-semibold">Grafik Berat Badan</h6>

            <div class="max-w-full w-full bg-white rounded-lg shadow-sm dark:bg-gray-800">
                <div class="flex justify-between p-4 md:p-6 pb-0 md:pb-0">
                    <div>
                        <h5 id="last-measurement" class="leading-none text-3xl font-bold text-gray-900 dark:text-white pb-2"></h5>
                        <p class="text-base font-normal text-gray-500 dark:text-gray-400">Berat Badan Terakhir</p>
                    </div>
                    <div
                        class="flex items-center px-2.5 py-0.5 text-base font-semibold text-green-500 dark:text-green-500 text-center">
                        23%
                        <svg class="w-3 h-3 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13V1m0 0L1 5m4-4 4 4" />
                        </svg>
                    </div>
                </div>
                <div id="weight-chart" class="px-2.5"></div>
                <div class="grid grid-cols-1 items-center border-gray-200 border-t dark:border-gray-700 justify-between mt-5 p-4 md:p-6 pt-0 md:pt-0">
                    <div class="flex justify-between items-center pt-5">
                        <!-- Button -->
                        <button
                            id="dropdownDefaultButton"
                            data-dropdown-toggle="lastDaysdropdown"
                            data-dropdown-placement="bottom"
                            class="text-sm font-medium text-gray-500 dark:text-gray-400 hover:text-gray-900 text-center inline-flex items-center dark:hover:text-white"
                            type="button">
                            Last 7 days
                            <svg class="w-2.5 m-2.5 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg>
                        </button>
                        <!-- Dropdown menu -->
                        <div id="lastDaysdropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44 dark:bg-gray-700">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                                <li>
                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Yesterday</a>
                                </li>
                                <li>
                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Today</a>
                                </li>
                                <li>
                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last 7 days</a>
                                </li>
                                <li>
                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last 30 days</a>
                                </li>
                                <li>
                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last 90 days</a>
                                </li>
                            </ul>
                        </div>
                        <a
                            href="#"
                            class="uppercase text-sm font-semibold inline-flex items-center rounded-lg text-blue-600 hover:text-blue-700 dark:hover:text-blue-500  hover:bg-gray-100 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700 px-3 py-2">
                            Sales Report
                            <svg class="w-2.5 h-2.5 ms-1.5 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="card p-2 col-span-2 sm:col-span-1">
        <div class="card-body">
            <h6 class="text-lg text-gray-900 font-semibold">Grafik Tinggi Badan</h6>
        </div>
    </div>
</div>

<!-- Edit Data Balita -->
<div id="edit-balita" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Edit Data Balita
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="edit-balita">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form class="p-4 md:p-5" method="POST" action="<?= base_url('balita/edit-balita') ?>">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" value="<?= $data['id'] ?>" name="id">
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <div class="col-span-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Balita</label>
                        <input value="<?= $data['name'] ?>" type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                    </div>
                    <div class="col-span-2">
                        <label for="gender" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis Kelamin</label>
                        <select id="gender" name="jenis-kelamin" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option value="" disabled>Pilih Jenis Kelamin</option>
                            <option value="L" <?= ($data['jenis_kelamin'] == 'L') ? 'selected' : '' ?>>Laki-Laki</option>
                            <option value="P" <?= ($data['jenis_kelamin'] == 'P') ? 'selected' : '' ?>>Perempuan</option>
                        </select>
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="birth-date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Lahir</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                </svg>
                            </div>
                            <input datepicker id="birth-date" name="birth-date" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date">
                        </div>
                    </div>
                    <div class="col-span-2 sm:col-span-1 flex items-center space-x-2 justify-center">
                        <input <?= ($data['still_toddler'] == 't' ? 'checked' : '') ?> type="checkbox" name="is-toddler" id="is-toddler" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                        <label for="is-toddler" class="text-sm font-medium text-gray-900">Masih Balita</label>
                    </div>

                    <div class="col-span-2">
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                        <textarea id="description" name="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Keterangan atau deskripsi balita"><?= $data['description'] ?></textarea>
                    </div>
                </div>
                <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <i class="ti ti-edit text-xl mr-2"></i>

                    Edit Data
                </button>
            </form>
        </div>
    </div>
</div>

<!-- Edit Parent Data Modal -->
<div id="edit-parent" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Edit Data Orang Tua
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="edit-parent">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form class="p-4 md:p-5" method="POST" action="<?= base_url('balita/edit-ortu') ?>">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" value="<?= $data['id'] ?>" name="id">
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <div class="col-span-2">
                        <label for="parent-name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Orang Tua</label>
                        <input value="<?= $data['parent_name'] ?>" type="text" name="parent-name" id="parent-name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                    </div>
                    <div class="col-span-2">
                        <label for="no-telp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No Telp Orang Tua</label>
                        <input value="<?= $data['no_telp'] ?>" type="text" name="no-telp" id="no-telp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                    </div>
                </div>
                <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <i class="ti ti-edit text-xl mr-2"></i>
                    Edit Data
                </button>
            </form>
        </div>
    </div>
</div>

<script src="<?= base_url('assets/js/library/apexcharts.min.js') ?>"></script>

<script>
    // Mengubah data gender dan isToddler supaya terbaca
    const gender = document.getElementById('gender');
    const isToddler = document.getElementById('is-toddler');

    if (gender.innerText == 'P') {
        gender.innerText = 'Perempuan';
    } else {
        gender.innerText = 'Laki-laki';
    }

    if (isToddler.innerText == 't') {
        isToddler.innerText = 'iya';
    } else {
        isToddler.innerText = 'tidak';
    }

    const measurements = <?= json_encode($measurements) ?>;

    const getFirstAge = () => {
        return measurements[0];
    }

    const getLastAge = () => {
        return measurements[measurements.length - 1].age;
    }

    const getLastWeight = () => {
        return measurements[measurements.length - 1].weight;
    }

    const getYAxis = () => {
        const maxAge = getLastAge();

        const weightData = [];

        for (let i = 1; i <= maxAge; i++) {
            const entry = measurements.find(d => parseInt(d.age) === i);
            weightData.push(entry ? parseFloat(entry.weight) : null);
        }

        return weightData;
    }

    const getXAxis = () => {
        const months = [];
        for (let i = getFirstAge(); i <= getLastAge(); i++) {
            months.push(i);
        }
        return months;
    }

    document.getElementById('last-measurement').innerText = getLastWeight() + ' kg';

    const options = {
        // set the labels option to true to show the labels on the X and Y axis
        xaxis: {
            title: {
                text: 'Umur (bulan)',
                style: {
                    fontFamily: "Inter, sans-serif",
                    cssClass: 'text-sm font-normal fill-gray-500 dark:fill-gray-400'
                }
            },
            show: true,
            categories: getXAxis(),
            labels: {
                show: true,
                style: {
                    fontFamily: "Inter, sans-serif",
                    cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400'
                }
            },
            axisBorder: {
                show: false,
            },
            axisTicks: {
                show: false,
            },
        },
        yaxis: {
            show: true,
            labels: {
                show: true,
                style: {
                    fontFamily: "Inter, sans-serif",
                    cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400'
                },
                formatter: function(value) {
                    return value + ' kg';
                }
            }
        },
        series: [{
            name: "Berat Badan",
            data: getYAxis(),
            color: "#1A56DB",
            connectNulls: true
        }],
        chart: {
            sparkline: {
                enabled: false
            },
            height: "100%",
            width: "100%",
            type: "line",
            fontFamily: "Inter, sans-serif",
            dropShadow: {
                enabled: false,
            },
            toolbar: {
                show: false,
            },
            zoom: {
                enabled: false
            },
        },
        tooltip: {
            enabled: true,
            x: {
                show: false,
            },
        },
        dataLabels: {
            enabled: false,
        },
        stroke: {
            width: 2,
            curve: 'smooth'
        },
        legend: {
            show: false
        },
        grid: {
            show: false,
        },
        plotOptions: {
            line: {
                connectNulls: true
            }
        }
    }

    if (document.getElementById("weight-chart") && typeof ApexCharts !== 'undefined') {
        const chart = new ApexCharts(document.getElementById("weight-chart"), options);
        chart.render();
    }
</script>

<?php $this->endSection() ?>