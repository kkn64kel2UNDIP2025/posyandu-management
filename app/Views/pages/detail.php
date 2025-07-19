<?php $this->extend('layout/template') ?>
<?php $this->section('content') ?>

<div class="card p-2">
    <div class="card-body">
        <div class="flex items-center mb-4">
            <h6 class="text-lg text-gray-900 font-semibold">Informasi Balita</h6>
            <i data-modal-target="edit-balita" data-modal-toggle="edit-balita" class="ti ti-edit text-2xl ml-3 text-gray-500 hover:text-gray-700 cursor-pointer"></i>
        </div>
        <div class="grid grid-cols-2 gap-4 w-full mb-8">
            <div class="col-span-2">
                <p class="mb-2 text-gray-500">Nama:</p>
                <p id="name-toddler"><?= $data['name'] ?></p>
            </div>
            <div class="">
                <p class="mb-2 text-gray-500">Jenis Kelamin</p>
                <p class="text-gray-900" id="gender"></p>
            </div>
            <div class="">
                <p class="mb-2 text-gray-500">Tanggal Lahir: </p>
                <p class="text-gray-900" id="birth-date"><?= ($data['birth_date']) ? $data['birth_date'] : ''  ?></p>
            </div>
            <div class="">
                <p class="mb-2 text-gray-500">Status: </p>
                <p class="text-gray-900"><?= $data['status'] ?></p>
            </div>
            <div class="">
                <p class="mb-2 text-gray-500">Masih Balita: </p>
                <p id="is-toddler" class="text-gray-900"></p>
            </div>
            <div class="col-span-2">
                <p class="mb-2 text-gray-500">Deskripsi:</p>
                <p class="text-gray-900"><?= $data['description'] ?></p>
            </div>
        </div>

        <div class="flex items-center mb-4">
            <h6 class="text-lg text-gray-900 font-semibold inline-block">Informasi Orang Tua</h6>
            <i data-modal-target="edit-parent" data-modal-toggle="edit-parent" class="ti ti-edit text-2xl ml-3 text-gray-500 hover:text-gray-700 cursor-pointer"></i>
        </div>
        <div class="grid grid-cols-2 gap-4 mb-4 w-full">
            <div class="col-span-2">
                <p class="mb-2 text-gray-500">Nama:</p>
                <p><?= $data['parent_name'] ?></p>
            </div>
            <div class="">
                <p class="mb-2 text-gray-500">No Telepon: </p>
                <p class="text-gray-900"><?= $data['no_telp'] ?></p>
            </div>
            <div class="">
                <p class="mb-2 text-gray-500">RT: </p>
                <p class="text-gray-900"><?= $data['rt'] ?></p>
            </div>
        </div>
    </div>
</div>

<div class="card p-2">
    <div class="card-body">
        <div class="flex sm:flex-row flex-col sm:gap-0 gap-3 justify-between mb-4">
            <h6 class="text-lg text-gray-900 font-semibold">Tabel Pengukuran</h6>
            <div class="flex gap-4">
                <button data-modal-target="add-data" data-modal-toggle="add-data" class="gap-1.5 text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-xl text-sm px-3 py-2 text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-table-plus">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M12.5 21h-7.5a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v7.5" />
                        <path d="M3 10h18" />
                        <path d="M10 3v18" />
                        <path d="M16 19h6" />
                        <path d="M19 16v6" />
                    </svg>
                    <span class="text-sm font-semibold my-auto">Tambah</span>
                </button>
                <button type="button" id="export-button" class="cursor-pointer bg-green-600 text-white px-3 py-2 rounded-xl flex gap-1 hover:bg-green-700">
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
        </div>
        <?php if ($measurements) :  ?>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table id="measurements-table" class="w-full text-sm rtl:text-right text-gray-900 text-center">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Umur (bulan)
                            </th>
                            <th scope="col" class="px-6 py-3">
                                TB (cm)
                            </th>
                            <th scope="col" class="px-6 py-3">
                                BB (kg)
                            </th>
                            <th scope="col" class="px-6 py-3">
                                LK (cm)
                            </th>
                            <th scope="col" class="px-6 py-3">
                                LD (cm)
                            </th>
                            <th scope="col" class="px-6 py-3">
                                LL (cm)
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $lastIndex = count($measurements) - 1 ?>
                        <?php for ($i = $lastIndex; $i >= 0; $i--) : ?>
                            <tr class="odd:bg-white even:bg-gray-50 border-b border-gray-200">
                                <td scope="row" class="px-6 py-4 font-medium whitespace-nowrap">
                                    <?= $measurements[$i]['age'] ?>
                                </td>
                                <td class="px-6 py-4">
                                    <?= $measurements[$i]['height'] ?>
                                </td>
                                <td class="px-6 py-4">
                                    <?= $measurements[$i]['weight'] ?>
                                </td>
                                <td class="px-6 py-4">
                                    <?= $measurements[$i]['head_circum'] ?>
                                </td>
                                <td class="px-6 py-4">
                                    <?= $measurements[$i]['chest_size'] ?>
                                </td>
                                <td class="px-6 py-4">
                                    <?= $measurements[$i]['arm_circum'] ?>
                                </td>
                                <td class="px-6 py-4">
                                    <a data-modal-target="edit-data" data-modal-toggle="edit-data" data-id="<?= $measurements[$i]['id'] ?>" class="sm:mr-1 edit-btn cursor-pointer font-medium text-blue-600 hover:underline">Edit</a>
                                    <a data-modal-target="delete-measurement" data-modal-toggle="delete-measurement" data-id="<?= $measurements[$i]['id'] ?>" class="delete-btn cursor-pointer font-medium text-red-600 hover:underline">Hapus</a>
                                </td>
                            </tr>
                        <?php endfor ?>
                    </tbody>
                </table>
            </div>

        <?php else : ?>
            <p class="text-gray-500 text-sm mt-2">Tidak ada data kedatangan yang tersedia.</p>
        <?php endif; ?>

    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 lg:gap-x-6 gap-x-0 lg:gap-y-0 gap-y-6">
    <div class="card col-span-2 sm:col-span-1">
        <div class="card-body">
            <h6 class="text-lg text-gray-900 font-semibold mb-4">Grafik Badan</h6>
            <?php if ($measurements) : ?>
                <div class="max-w-full w-full bg-white rounded-lg shadow-sm">
                    <div id="weight-chart" class="px-1 py-4"></div>
                </div>
            <?php else : ?>
                <p class="text-gray-500 text-sm mt-2">Tidak ada data badan yang tersedia.</p>
            <?php endif; ?>
        </div>
    </div>
    <div class="card col-span-2 sm:col-span-1">
        <div class="card-body">
            <h6 class="text-lg text-gray-900 font-semibold mb-4">Grafik Lingkar Badan</h6>
            <?php if ($measurements) : ?>
                <div class="max-w-full w-full bg-white rounded-lg shadow-sm">
                    <div id="circumference-chart" class="px-1 py-4"></div>
                </div>
            <?php else : ?>
                <p class="text-gray-500 text-sm mt-2">Tidak ada data lingkar badan yang tersedia.</p>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- Edit Data Balita -->
<div id="edit-balita" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow-sm">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900">
                    Edit Data Balita
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-toggle="edit-balita">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form novalidate id="edit-toddler-form" class="p-4 md:p-5" method="POST" action="<?= base_url('balita/edit-balita') ?>">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" value="<?= $data['id'] ?>" name="id">
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <div class="col-span-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nama Balita</label>
                        <input value="<?= $data['name'] ?>" type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required>
                        <p class="text-red-500 text-sm hidden">Nama balita harus diisi.</p>
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="birth-date" class="block mb-2 text-sm font-medium text-gray-900">Tanggal Lahir</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                </svg>
                            </div>
                            <input datepicker datepicker-max-date="<?= date('m/d/Y') ?>" required id="birth-date-edit" name="birth-date" value="" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5" placeholder="Select date">
                            <p class="text-red-500 text-sm hidden">Tanggal lahir harus diisi.</p>
                        </div>
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="gender" class="block mb-2 text-sm font-medium text-gray-900">Jenis Kelamin</label>
                        <select id="gender" name="jenis-kelamin" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                            <option value="" disabled>Pilih Jenis Kelamin</option>
                            <option value="L" <?= ($data['jenis_kelamin'] == 'L') ? 'selected' : '' ?>>Laki-Laki</option>
                            <option value="P" <?= ($data['jenis_kelamin'] == 'P') ? 'selected' : '' ?>>Perempuan</option>
                        </select>
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="status" class="block mb-2 text-sm font-medium text-gray-900">Status</label>
                        <select id="status" name="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                            <option value="" disabled>Pilih Jenis Kelamin</option>
                            <option value="normal" <?= ($data['status'] == 'normal') ? 'selected' : '' ?>>Normal</option>
                            <option value="pendek" <?= ($data['status'] == 'pendek') ? 'selected' : '' ?>>Pendek</option>
                            <option value="stunting" <?= ($data['status'] == 'stunting') ? 'selected' : '' ?>>Stunting</option>
                        </select>
                    </div>
                    <div class="col-span-2 sm:col-span-1 flex items-center space-x-2 sm:justify-center">
                        <input <?= ($data['still_toddler'] == 't' ? 'checked' : '') ?> type="checkbox" name="is-toddler" id="is-toddler" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                        <label for="is-toddler" class="text-sm font-medium text-gray-900">Masih Balita</label>
                    </div>
                    <div class="col-span-2">
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Description</label>
                        <textarea id="description" name="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Keterangan atau deskripsi balita"><?= $data['description'] ?></textarea>
                    </div>
                </div>
                <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center">
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
        <div class="relative bg-white rounded-lg shadow-sm">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900">
                    Edit Data Orang Tua
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-toggle="edit-parent">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form novalidate id="edit-parent-form" class="p-4 md:p-5" method="POST" action="<?= base_url('balita/edit-ortu') ?>">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" value="<?= $data['id'] ?>" name="id">
                <div class="grid gap-4 mb-4 grid-cols-1 sm:grid-cols-2">
                    <div class="col-span-1 sm:col-span-2">
                        <label for="parent-name" class="block mb-2 text-sm font-medium text-gray-900">Nama Orang Tua</label>
                        <input value="<?= $data['parent_name'] ?>" type="text" name="parent-name" id="parent-name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required>
                        <p class="text-red-500 text-sm hidden">Nama orang tua harus diisi.</p>
                    </div>
                    <div>
                        <label for="no-telp" class="block mb-2 text-sm font-medium text-gray-900">No Telp Orang Tua</label>
                        <input value="<?= $data['no_telp'] ?>" type="text" name="no-telp" id="no-telp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                        <p class="text-red-500 text-sm hidden">No telp harus valid.</p>
                    </div>
                    <div>
                        <label for="rt" class="block mb-2 text-sm font-medium text-gray-900">RT</label>
                        <input value="<?= $data['rt'] ?>" type="number" min="1" name="rt" id="rt" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required>
                        <p class="text-red-500 text-sm hidden">RT harus diisi.</p>
                    </div>
                </div>
                <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center">
                    <i class="ti ti-edit text-xl mr-2"></i>
                    Edit Data
                </button>
            </form>
        </div>
    </div>
</div>


<!-- Add Measurement Data -->
<div id="add-data" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md sm:max-w-lg max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow-sm">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900">
                    Tambah Data Pengukuran
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-toggle="add-data">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form id="add-form" class="p-4 md:p-5" method="POST" action="<?= base_url('balita/tambah-pengukuran') ?>">
                <input type="hidden" name="toddler-id" id="toddler-id" value="<?= $data['id'] ?>">
                <div class="grid gap-4 mb-4 grid-cols-1 sm:grid-cols-6">
                    <div class="sm:col-span-6">
                        <label for="age" class="block mb-2 text-sm font-medium text-gray-900">Umur (bulan)</label>
                        <input value="" type="number" name="age" id="age" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                        <p class="hidden mt-2 text-xs text-red-600">Umur harus diisi</p>

                    </div>
                    <div class="sm:col-span-3">
                        <label for="height" class="block mb-2 text-sm font-medium text-gray-900">Tinggi (cm)</label>
                        <input value="<?= ($measurements) ? end($measurements)['height'] : '' ?>" type="number" name="height" id="height" step="0.1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                        <p class="hidden mt-2 text-xs text-red-600">Tinggi badan harus diisi</p>
                    </div>
                    <div class="sm:col-span-3">
                        <label for="weight" class="block mb-2 text-sm font-medium text-gray-900">Berat (kg)</label>
                        <input value="<?= ($measurements) ? end($measurements)['weight'] : '' ?>" type="number" name="weight" step="0.1" id="weight" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                        <p class="hidden mt-2 text-xs text-red-600">Berat badan harus diisi</p>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="head_circum" class="block mb-2 text-sm font-medium text-gray-900">Lingkar Kepala (cm)</label>
                        <input value="<?= ($measurements) ? end($measurements)['head_circum'] : '' ?>" type="number" name="head_circum" step="0.1" id="head_circum" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                        <p class="hidden mt-2 text-xs text-red-600">Lingkar kepala harus diisi</p>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="chest_size" class="block mb-2 text-sm font-medium text-gray-900">Lingkar Dada (cm)</label>
                        <input value="<?= ($measurements) ? end($measurements)['chest_size'] : '' ?>" type="number" name="chest_size" step="0.1" id="chest_size" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                        <p class="hidden mt-2 text-xs text-red-600">Lingkar dada harus diisi</p>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="arm_circum" class="block mb-2 text-sm font-medium text-gray-900">Lingkar Lengan (kg)</label>
                        <input value="<?= ($measurements) ? end($measurements)['arm_circum'] : '' ?>" type="number" name="arm_circum" step="0.1" id="arm_circum" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                        <p class="hidden mt-2 text-xs text-red-600">Lingkar lengan harus diisi</p>
                    </div>
                </div>
                <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                    </svg>
                    Tambah Data
                </button>
            </form>
        </div>
    </div>
</div>


<!-- Edit Measurement Data -->
<div id="edit-data" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md sm:max-w-lg max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow-sm">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                <h3 class="text-lg font-semibold text-gray-900">
                    Edit Data Pengukuran
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-toggle="edit-data">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form id="edit-measurement-form" class="p-4 md:p-5" method="POST" action="<?= base_url('balita/edit-pengukuran') ?>">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="id" id="id" value="">
                <div class="grid gap-4 mb-4 grid-cols-1 sm:grid-cols-6">
                    <div class="sm:col-span-6">
                        <label for="age" class="block mb-2 text-sm font-medium text-gray-900">Umur (bulan)</label>
                        <input value="" disabled type="number" name="age" id="age" aria-label="disabled input" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed">
                        <p class="hidden mt-2 text-xs text-red-600">Umur harus diisi</p>
                    </div>
                    <div class="sm:col-span-3">
                        <label for="height" class="block mb-2 text-sm font-medium text-gray-900">Tinggi (cm)</label>
                        <input value="" type="number" name="height" id="height" step="0.1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                        <p class="hidden mt-2 text-xs text-red-600">Tinggi badan harus diisi</p>
                    </div>
                    <div class="sm:col-span-3">
                        <label for="weight" class="block mb-2 text-sm font-medium text-gray-900">Berat Badan (kg)</label>
                        <input value="" type="number" name="weight" step="0.1" id="weight" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                        <p class="hidden mt-2 text-xs text-red-600">Berat badan harus diisi</p>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="head_circum" class="block mb-2 text-sm font-medium text-gray-900">Lingkar Kepala (cm)</label>
                        <input value="" type="number" name="head_circum" step="0.1" id="head_circum" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                        <p class="hidden mt-2 text-xs text-red-600">Lingkar kepala harus diisi</p>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="chest_size" class="block mb-2 text-sm font-medium text-gray-900">Lingkar Dada (cm)</label>
                        <input value="" type="number" name="chest_size" step="0.1" id="chest_size" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                        <p class="hidden mt-2 text-xs text-red-600">Lingkar dada harus diisi</p>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="arm_circum" class="block mb-2 text-sm font-medium text-gray-900">Lingkar Lengan (cm)</label>
                        <input value="" type="number" name="arm_circum" step="0.1" id="arm_circum" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                        <p class="hidden mt-2 text-xs text-red-600">Lingkar lengan harus diisi</p>
                    </div>
                </div>
                <button type="submit" class="text-white inline-flex gap-2 items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-edit">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                        <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                        <path d="M16 5l3 3" />
                    </svg>
                    Edit Data
                </button>
            </form>
        </div>
    </div>
</div>

<!-- Delete Measurement Data -->
<div id="delete-measurement" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow-sm">
            <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="delete-measurement">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <form id="delete-form" action="<?= base_url('balita/hapus-pengukuran') ?>" method="POST">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="id" id="id" value="">
                <div class="p-4 md:p-5 text-center">
                    <svg class="mx-auto mb-4 text-gray-400 w-12 h-12" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    <h3 class="mb-5 text-lg font-normal text-gray-500">Apakah Anda yakin ingin menghapus data untuk umur <span id="age-delete"></span>?</h3>
                    <button type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                        Iya, saya yakin
                    </button>
                    <button data-modal-hide="delete-measurement" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100">Tidak</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script src="<?= base_url('assets/js/library/apexcharts.min.js') ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
<script type="module">
    // FUngsi Pembulatan
    const roundToFixed = (value, decimalPlaces) => {
            return parseFloat(value).toFixed(decimalPlaces);
        }
    
    // Mengubah format tanggal lahir
    const date = document.getElementById('birth-date');

    if (date.innerText != '') {
        const birthDate = new Date(date.innerText);
        const nowDate = new Date();

        // Mengubah ke bentuk mm/dd/yy untuk datepicker
        const year = birthDate.getFullYear().toString().slice(-4); // Ambil 2 digit terakhir tahun
        const month = (birthDate.getMonth() + 1).toString().padStart(2, '0'); // getMonth() dimulai dari 0
        const day = birthDate.getDate().toString().padStart(2, '0');

        const tanggalTerformat = `${month}/${day}/${year}`;
        document.getElementById('birth-date-edit').value = tanggalTerformat;

        // Default value untuk umur saat ini
        let yearAge = nowDate.getFullYear() - birthDate.getFullYear();
        let monthAge = nowDate.getMonth() - birthDate.getMonth();

        if (nowDate.getDate() < birthDate.getDate()) {
            monthAge--;
        }

        const totalBulan = (yearAge * 12) + monthAge;
        document.querySelector('#add-data #age').value = totalBulan;

        // Mengubah ke bentuk lokal
        toLocalDate(date);
    } else {
        date.innerText = '-';
    }


    // Mengubah data gender dan isToddler supaya terbaca
    const gender = document.getElementById('gender');
    const isToddler = document.getElementById('is-toddler');

    if ('<?= $data['jenis_kelamin'] ?>' == 'P') {
        gender.innerText = 'Perempuan';
    } else {
        gender.innerText = 'Laki-laki';
    }

    if ('<?= $data['still_toddler'] ?>' == 't') {
        isToddler.innerText = 'iya';
    } else {
        isToddler.innerText = 'tidak';
    }
    // Validasi
    import {
        validationInput
    } from '<?= base_url('assets/js/validation.js') ?>';

    // Validasi Edit Balita
    const editToddlerForm = document.getElementById('edit-toddler-form');
    editToddlerForm.addEventListener('submit', function(e) {
        if(validationInput(e)) {
            this.submit();
        }
    });

    // Validasi Edit Orang Tua
    const editParentForm = document.getElementById('edit-parent-form');
    editParentForm.addEventListener('submit', function(e) {
        // Validate phone number format
        const telpInput = document.getElementById('no-telp');
        const validationEl = telpInput.nextElementSibling;
        let isValid = true;

        isValid = validationInput(e);

        if (telpInput.value && !/^\d{10,15}$/.test(telpInput.value)) {
            validationEl.classList.remove('hidden');
            isValid = false;
        } else {
            validationEl.classList.add('hidden');
        }

        if (isValid) {
            editParentForm.submit();
        }
    });

    <?php if ($measurements) : ?>
        // Fungsi untuk mengunduh data sebagai file XLSX
        const nameToddler = document.getElementById('name-toddler');

        function exportToExcel() {
            const table = document.getElementById("measurements-table");
            let clonedTable = table.cloneNode(true);

            // Hapus kolom "Action" dari setiap row
            [...clonedTable.rows].forEach(row => row.deleteCell(6));
            const wb = XLSX.utils.table_to_book(clonedTable, {
                sheet: "Data Pengukuran Balita"
            });
            XLSX.writeFile(wb, "data_balita_" + nameToddler.innerText.replace(/\s+/g, "_").toLowerCase() + ".xlsx");
        }

        document.getElementById("export-button").addEventListener("click", exportToExcel);

        const measurements = <?= json_encode($measurements) ?>;
        const lastMeasurements = measurements[measurements.length - 1];

        // Function
        const getFirstAge = () => {
            return measurements[0];
        }

        const getLastAge = () => {
            return measurements[measurements.length - 1].age;
        }

        const getLastWeight = () => {
            return measurements[measurements.length - 1].weight;
        }

        const getYAxis = (column) => {
            const maxAge = getLastAge();

            const yAxisData = [];

            for (let i = 1; i <= maxAge; i++) {
                const entry = measurements.find(d => parseInt(d.age) === i);
                const value = entry ? parseFloat(entry[column]) : NaN;
                yAxisData.push(isNaN(value) ? null : value);
            }

            return yAxisData;
        }

        const getXAxis = () => {
            const months = [];
            for (let i = getFirstAge(); i <= getLastAge(); i++) {
                months.push(i);
            }
            return months;
        }

        const getAllAges = () => {
            return measurements.map(item => parseInt(item.age));
        }

        // Validasi input tambah data
        function validationInput2(e) {
            e.preventDefault();
            const dataInput = {};
            const form = e.target;
            const inputForm = form.querySelectorAll('input');
            inputForm.forEach((input) => {
                dataInput[input.name] = input;
            });

            // Fungsi untuk validasi
            const showMessage = ((name, message) => {
                const validation = dataInput[name].nextElementSibling;
                validation.classList.remove('hidden');
                if (message) {
                    validation.innerText = message;
                }
            })

            const unshowMessage = ((name) => {
                dataInput[name].nextElementSibling.classList.add('hidden');
            })

            const allAges = getAllAges();

            if (dataInput['age'].disabled) {

            } else if (dataInput['age'].value == '') { // Mengatasi umur kosong
                showMessage('age', 'Umur harus diisi');
                return false;
            } else if (allAges.includes(parseInt(dataInput['age'].value))) { // Mengatasi duplikat umur
                showMessage('age', 'Umur tidak boleh duplikat');
                return false;
            } else {
                unshowMessage('age');
            }

            const valKey = ['height', 'weight', 'head_circum', 'chest_size', 'arm_circum'];
            for (const key of valKey) {
                if (dataInput[key].value == '') {
                    showMessage(key);
                    return false;
                } else {
                    unshowMessage(key);
                }
            }

            return true;
        }

        const addForm = document.getElementById('add-form');
        addForm.addEventListener('submit', function(e) {
            if (validationInput2(e)) {
                this.submit();
            }
        });

        // Edit Validation
        const editMeasurementForm = document.getElementById("edit-measurement-form");
        const editButtons = document.querySelectorAll(".edit-btn");

        // Auto fill input data
        editButtons.forEach(button => {
            button.addEventListener("click", function() {
                const row = this.parentElement.parentElement;
                const cells = row.querySelectorAll("td");

                // Ambil nilai dari kolom
                const age = cells[0].innerText;
                const height = cells[1].innerText;
                const weight = cells[2].innerText;
                const headCircum = cells[3].innerText;
                const chestSize = cells[4].innerText;
                const armCircum = cells[5].innerText;
                const id = this.dataset.id;

                editMeasurementForm.querySelector("#id").value = id;
                editMeasurementForm.querySelector("#age").value = age;
                editMeasurementForm.querySelector("#height").value = height;
                editMeasurementForm.querySelector("#weight").value = weight;
                editMeasurementForm.querySelector("#head_circum").value = headCircum;
                editMeasurementForm.querySelector("#chest_size").value = chestSize;
                editMeasurementForm.querySelector("#arm_circum").value = armCircum;

            });
        });

        editMeasurementForm.addEventListener('submit', function(e) {
            if (validationInput2(e)) {
                this.querySelector("#age").disabled = false;
                this.submit();
            }
        });

        // Delete Measurement
        const deleteButtons = document.querySelectorAll(".delete-btn");
        const deleteForm = document.getElementById("delete-form");
        const ageDelete = document.getElementById("age-delete");

        deleteButtons.forEach(button => {
            button.addEventListener("click", function() {
                const row = this.parentElement.parentElement;
                const ageCell = row.querySelector("td:first-child");

                ageDelete.innerText = ageCell.innerText;
                deleteForm.querySelector("#id").value = this.dataset.id;
            });
        })


        const bodyOptions = {
            xaxis: {
                title: {
                    text: 'Umur (bulan)',
                    style: {
                        fontFamily: "Inter, sans-serif",
                        cssClass: 'text-sm font-normal fill-gray-500'
                    }
                },
                show: true,
                categories: getXAxis(),
                labels: {
                    show: true,
                    style: {
                        fontFamily: "Inter, sans-serif",
                        cssClass: 'text-xs font-normal fill-gray-500'
                    }
                },
                axisBorder: {
                    show: false,
                },
                axisTicks: {
                    show: false,
                },
            },
            yaxis: [{
                    show: false,
                    title: "Berat Badan (kg)",
                    labels: {
                        formatter: (value) => value + " kg"
                    }
                },
                {
                    show: false,
                    title: "Tinggi Badan (cm)",
                    labels: {
                        formatter: (value) => value + " cm"
                    }
                }
            ],
            series: [{
                    name: "Berat Badan",
                    data: getYAxis('weight'),
                    color: "#1A56DB",
                    connectNulls: true
                },
                {
                    name: "Tinggi Badan",
                    data: getYAxis('height'),
                    color: "#10B981",
                    connectNulls: true
                }
            ],
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
                    enabled: true
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
            const chart = new ApexCharts(document.getElementById("weight-chart"), bodyOptions);
            chart.render();
        }

        const circumferenceOptions = {
            xaxis: {
                title: {
                    text: 'Umur (bulan)',
                    style: {
                        fontFamily: "Inter, sans-serif",
                        cssClass: 'text-sm font-normal fill-gray-500'
                    }
                },
                show: true,
                categories: getXAxis(),
                labels: {
                    show: true,
                    style: {
                        fontFamily: "Inter, sans-serif",
                        cssClass: 'text-xs font-normal fill-gray-500'
                    }
                },
                axisBorder: {
                    show: false,
                },
                axisTicks: {
                    show: false,
                },
            },
            yaxis: [{
                    show: false,
                    title: "Lingkar Kepala (cm)",
                    labels: {
                        formatter: (value) => value + " cm"
                    }
                },
                {
                    show: false,
                    title: "Lingkar Dada (cm)",
                    labels: {
                        formatter: (value) => value + " cm"
                    }
                },
                {
                    show: false,
                    title: "Lingkar Lengan (cm)",
                    labels: {
                        formatter: (value) => value + " cm"
                    }
                }
            ],
            series: [{
                    name: "Lingkar Kepala",
                    data: getYAxis('head_circum'),
                    color: "#1A56DB",
                    connectNulls: true
                },
                {
                    name: "Lingkar Dada",
                    data: getYAxis('chest_size'),
                    color: "#10B981",
                    connectNulls: true
                },
                {
                    name: "Lingkar Lengan",
                    data: getYAxis('arm_circum'),
                    color: "#F59E0B",
                    connectNulls: true
                }
            ],
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
                    enabled: true
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

        const chart = new ApexCharts(document.getElementById("circumference-chart"), circumferenceOptions);
        chart.render();

    <?php endif ?>
</script>

<?php $this->endSection() ?>