<?php $this->extend('layout/template') ?>
<?php $this->section('content') ?>

<main class="h-full max-w-full">
    <div class="container full-container p-0 flex flex-col gap-6">
        <div class="grid grid-cols-1 lg:grid-cols-6 lg:gap-x-6 gap-x-0 lg:gap-y-0 gap-y-6">
            <div class="card col-span-2">
                <div class="card-body">
                    <h4 class="text-gray-900 text-lg font-semibold mb-5">Jadwal Posyandu</h4>
                    <ul id="timeline" class="timeline-widget relative">
                        <?php foreach ($monthAttendances as $monthAttendance): ?>
                            <li class="timeline-item flex relative overflow-hidden min-h-[70px]">
                                <div class="timeline-badge-wrap flex flex-col items-center ">
                                    <div
                                        class="timeline-badge w-3 h-3 rounded-full shrink-0 bg-transparent border-2 border-blue-600 my-[10px]">
                                    </div>
                                    <div class="timeline-badge-border block h-full w-[1px] bg-gray-300">
                                    </div>
                                </div>
                                <div class="timeline-desc py-1 px-4">
                                    <p class="text-gray-900 measurement-date font-normal month-attendances"><?= $monthAttendance['x'] ?></p>
                                    <p class="text-gray-500 text-sm ml-1"><?= $monthAttendance['y'] ?> Balita</p>
                                    <a href="<?= base_url('balita/month-detail/' . $monthAttendance['x']) ?>" class="text-blue-600 hover:underline text-sm ml-1">Lihat Detail</a>
                                </div>
                            </li>
                        <?php endforeach ?>
                    </ul>
                </div>
            </div>
            <div class="col-span-4">
                <div class="card h-full">
                    <div class="card-body">
                        <div class="flex justify-between mb-2">
                            <h4 class="text-gray-900 text-lg font-semibold inline-block">Daftar Balita</h4>
                            <button data-modal-target="add-toddler" data-modal-toggle="add-toddler" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center">
                                <i class="ti ti-user-plus text-xl mr-2"></i>
                                Tambah Data
                            </button>
                        </div>

                        <!-- Search Form -->
                        <div class="my-4">
                            <div class="flex flex-col sm:flex-row gap-3">
                                <div class="flex-1">
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                            </svg>
                                        </div>
                                        <input type="text" id="search-input" class="block w-full p-2.5 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500" placeholder="Cari berdasarkan nama balita atau orang tua..." value="<?= isset($search) ? esc($search) : '' ?>">
                                    </div>
                                </div>
                                <button id="search-btn" class="px-4 py-2.5 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                                    <i class="ti ti-search mr-1"></i>
                                    Cari
                                </button>
                                <button id="reset-btn" class="px-4 py-2.5 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-900 focus:ring-4 focus:outline-none focus:ring-gray-200">
                                    <i class="ti ti-refresh mr-1"></i>
                                    Reset
                                </button>
                            </div>
                            <?php if (isset($search) && !empty($search)): ?>
                                <div class="mt-2 text-sm text-blue-600">
                                    <i class="ti ti-info-circle mr-1"></i>
                                    Menampilkan hasil pencarian untuk: "<strong><?= esc($search) ?></strong>"
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="relative overflow-x-auto">
                            <!-- table -->
                            <table class="text-left w-full text-sm text-gray-900">
                                <thead>
                                    <tr class="text-sm">
                                        <th scope="col" class="py-4 px-2 font-semibold max-w-20 sm:max-w-full">Nama</th>
                                        <th scope="col" class="p-4 font-semibold max-w-20 sm:max-w-full">Orang Tua</th>
                                        <th scope="col" class="p-4 font-semibold">Status</th>
                                        <th scope="col" class="p-4 font-semibold">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="toddlers-body">
                                    <?php if (empty($toddlers)): ?>
                                        <tr>
                                            <td colspan="4" class="text-center py-8">
                                                <div class="text-gray-500">
                                                    <?php if (isset($search) && !empty($search)): ?>
                                                        <svg class="w-12 h-12 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                                        </svg>
                                                        <p class="text-lg font-medium">Tidak ada hasil ditemukan</p>
                                                        <p class="text-sm">Tidak ada balita yang sesuai dengan pencarian "<strong><?= esc($search) ?></strong>"</p>
                                                        <button onclick="document.getElementById('reset-btn').click()" class="mt-2 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Tampilkan Semua Data</button>
                                                    <?php else: ?>
                                                        <svg class="w-12 h-12 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z"></path>
                                                        </svg>
                                                        <p class="text-lg font-medium">Belum ada data balita</p>
                                                        <p class="text-sm">Klik tombol "Tambah Data" untuk menambahkan balita pertama</p>
                                                    <?php endif; ?>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php else: ?>
                                        <?php foreach ($toddlers as $toddler) : ?>
                                            <tr>
                                                <td class="py-4 px-2">
                                                    <p class="max-w-20 sm:max-w-full"><?= $toddler['name'] ?></p>
                                                </td>
                                                <td class="p-4">
                                                    <p class="max-w-20 sm:max-w-full"><?= $toddler['parent_name'] ?></p>
                                                </td>
                                                <td class="p-4">
                                                    <p class=""><?= $toddler['status'] ?></p>
                                                </td>
                                                <td class="p-4">
                                                    <a href="<?= base_url('/balita/') . $toddler['id'] ?>" class="cursor-pointer font-medium text-blue-600 hover:underline">Detail</a>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                            <div id="pagination-container" class="mt-3 flex justify-center">
                                <?= $pager ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add modal -->
    <div id="add-toddler" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md sm:max-w-lg max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow-sm">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900">
                        Tambah Data Balita
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-toggle="add-toddler">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form id="add-form" novalidate class="p-4 md:p-5" method="POST" action="<?= base_url('balita/tambah-balita') ?>">
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="col-span-2">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nama Balita</label>
                            <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required>
                            <p class="text-red-500 text-sm hidden">Nama balita harus diisi</p>
                        </div>

                        <div class="sm:col-span-1 col-span-2">
                            <label for="gender" class="block mb-2 text-sm font-medium text-gray-900">Jenis Kelamin</label>
                            <select id="gender" name="jenis-kelamin" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                                <option value="" disabled>Pilih Jenis Kelamin</option>
                                <option value="L">Laki-Laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>

                        <div class="sm:col-span-1 col-span-2">
                            <label for="birth-date" class="block mb-2 text-sm font-medium text-gray-900">Tanggal Lahir</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                    </svg>
                                </div>
                                <input datepicker datepicker-max-date="<?= date('m/d/Y') ?>" id="birth-date" required name="birth-date" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5" placeholder="Select date">
                                <p class="absolute text-red-500 text-sm hidden">Tanggal lahir harus diisi</p>
                            </div>
                        </div>

                        <div class="col-span-2">
                            <label for="parent-name" class="block mb-2 text-sm font-medium text-gray-900">Nama Orang Tua</label>
                            <input type="text" name="parent-name" id="parent-name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required>
                            <p class="text-red-500 text-sm hidden">Nama orang tua harus diisi</p>
                        </div>
                        <div class="col-span-1">
                            <label for="no-telp" class="block mb-2 text-sm font-medium text-gray-900">No Telp Orang Tua</label>
                            <input type="text" name="no-telp" id="no-telp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                            <p class="text-red-500 text-sm hidden">No Telp harus valid</p>
                        </div>
                        <div class="col-span-1">
                            <label for="rt" class="block mb-2 text-sm font-medium text-gray-900">RT</label>
                            <input type="number" min="1" name="rt" id="rt" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                            <p class="text-red-500 text-sm hidden">RT harus diisi</p>
                        </div>
                        <div class="col-span-2">
                            <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Description</label>
                            <textarea id="description" name="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Keterangan atau deskripsi balita"></textarea>
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

</main>

<script type="module">
    const monthAttendances = document.getElementsByClassName('month-attendances');

    for (const monthAttendance of monthAttendances) {
        toLocalDate(monthAttendance, {
            month: "long",
            year: "numeric"
        });
    }

    // Validation for form inputs
    import { validationInput } from '<?= base_url('assets/js/validation.js') ?>';

    const addForm = document.getElementById('add-form');
    addForm.addEventListener('submit', (e) => {
        const telpInput = document.getElementById('no-telp');
        // Validate phone number format
        const validationEl = telpInput.nextElementSibling;
        let isValid = true;
        
        if (telpInput.value && !/^\d{10,15}$/.test(telpInput.value)) {
            validationEl.classList.remove('hidden');
            isValid = false;
        } else {
            validationEl.classList.add('hidden');
            isValid = true;
        }

        if (validationInput(e) && isValid) {
            addForm.submit();
        }
    });

    // Helper functions
    function showLoadingState(toddlersBody) {
        toddlersBody.innerHTML = `
            <tr>
                <td colspan="4" class="text-center py-8">
                    <div class="animate-pulse">
                        <div class="flex justify-center mb-4">
                            <div class="w-8 h-8 border-4 border-blue-200 border-t-blue-600 rounded-full animate-spin"></div>
                        </div>
                        <p class="text-gray-500">Memuat data...</p>
                    </div>
                </td>
            </tr>
        `;
    }

    function showErrorState(toddlersBody, message = 'Gagal memuat data') {
        toddlersBody.innerHTML = `
            <tr>
                <td colspan="4" class="text-center py-8">
                    <div class="text-red-500">
                        <svg class="w-12 h-12 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.268 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                        </svg>
                        <p class="text-lg font-medium">${message}</p>
                        <p class="text-sm">Silakan coba lagi atau refresh halaman</p>
                        <button onclick="location.reload()" class="mt-2 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Refresh Halaman</button>
                    </div>
                </td>
            </tr>
        `;
    }

    // AJAX for pagination
    function attachPaginationListeners() {
        const paginationLinks = document.querySelectorAll('.paginations');

        paginationLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();

                const url = this.href;
                const searchQuery = document.getElementById('search-input').value;

                // Add search parameter to pagination URL if search is active
                if (searchQuery.trim()) {
                    const urlObj = new URL(url, window.location.origin);
                    urlObj.searchParams.set('search', searchQuery);
                    fetchToddlers(urlObj.toString());
                } else {
                    fetchToddlers(url);
                }
            });
        });
    }

    function fetchToddlers(url) {
        const toddlersBody = document.getElementById('toddlers-body');
        const pagerContainer = document.getElementById('pagination-container');

        // Show loading state with skeleton
        showLoadingState(toddlersBody);

        // Add timeout and better error handling
        const controller = new AbortController();
        const timeoutId = setTimeout(() => controller.abort(), 10000); // 10 second timeout

        fetch(url, {
                method: 'GET',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Content-Type': 'application/json'
                },
                signal: controller.signal
            })
            .then(response => {
                clearTimeout(timeoutId);
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                return response.json();
            })
            .then(data => {
                // Use DocumentFragment for better performance
                const fragment = document.createDocumentFragment();

                if (data.toddlers && data.toddlers.length > 0) {
                    data.toddlers.forEach(toddler => {
                        const row = document.createElement('tr');
                        row.innerHTML = `
                            <td class="py-4 px-2">
                                <p class="max-w-20 sm:max-w-full">${toddler.name}</p>
                            </td>
                            <td class="p-4">
                                <p class="max-w-20 sm:max-w-full">${toddler.parent_name}</p>
                            </td>
                            <td class="p-4">
                                <p class="">${toddler.status}</p>
                            </td>
                            <td class="p-4">
                                <a href="<?= base_url('/balita/') ?>${toddler.id}" class="cursor-pointer font-medium text-blue-600 hover:underline">Detail</a>
                            </td>
                        `;
                        fragment.appendChild(row);
                    });
                } else {
                    // No results found
                    const searchQuery = document.getElementById('search-input').value;
                    const emptyRow = document.createElement('tr');
                    emptyRow.innerHTML = `
                        <td colspan="4" class="text-center py-8">
                            <div class="text-gray-500">
                                ${searchQuery ? `
                                    <svg class="w-12 h-12 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                    </svg>
                                    <p class="text-lg font-medium">Tidak ada hasil ditemukan</p>
                                    <p class="text-sm">Tidak ada balita yang sesuai dengan pencarian "<strong>${searchQuery}</strong>"</p>
                                    <button onclick="resetSearch()" class="mt-2 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Tampilkan Semua Data</button>
                                ` : `
                                    <svg class="w-12 h-12 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z"></path>
                                    </svg>
                                    <p class="text-lg font-medium">Belum ada data balita</p>
                                    <p class="text-sm">Klik tombol "Tambah Data" untuk menambahkan balita pertama</p>
                                `}
                            </div>
                        </td>
                    `;
                    fragment.appendChild(emptyRow);
                }

                // Clear and append all at once for better performance
                toddlersBody.innerHTML = '';
                toddlersBody.appendChild(fragment);

                // Update pagination
                pagerContainer.innerHTML = data.pager;

                // Re-attach event listeners for new pagination links
                attachPaginationListeners();
            })
            .catch(error => {
                clearTimeout(timeoutId);
                console.error('Error:', error);

                let errorMessage = 'Gagal memuat data';
                if (error.name === 'AbortError') {
                    errorMessage = 'Koneksi timeout - coba lagi';
                } else if (error.message.includes('HTTP error')) {
                    errorMessage = 'Server error - coba lagi nanti';
                } else if (!navigator.onLine) {
                    errorMessage = 'Tidak ada koneksi internet';
                }

                showErrorState(toddlersBody, errorMessage);
            });
    }

    // Initialize pagination listeners
    attachPaginationListeners();

    // Search functionality
    const searchInput = document.getElementById('search-input');
    const searchBtn = document.getElementById('search-btn');
    const resetBtn = document.getElementById('reset-btn');

    function performSearch() {
        const searchQuery = searchInput.value.trim();
        const baseUrl = '<?= base_url('/balita') ?>';

        if (searchQuery) {
            const searchUrl = `${baseUrl}?search=${encodeURIComponent(searchQuery)}`;
            fetchToddlers(searchUrl);
        } else {
            // If empty search, load first page without search
            fetchToddlers(baseUrl);
        }
    }

    function resetSearch() {
        searchInput.value = '';
        const baseUrl = '<?= base_url('/balita') ?>';
        fetchToddlers(baseUrl);
    }

    // Make resetSearch globally accessible
    window.resetSearch = resetSearch;

    // Event listeners for search
    searchBtn.addEventListener('click', performSearch);
    resetBtn.addEventListener('click', resetSearch);

    // Search on Enter key
    searchInput.addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            e.preventDefault();
            performSearch();
        }
    });

    // Optional: Real-time search with debounce
    let searchTimeout;
    searchInput.addEventListener('input', function() {
        clearTimeout(searchTimeout);
        searchTimeout = setTimeout(function() {
            const searchQuery = searchInput.value.trim();
            if (searchQuery.length >= 3) { // Search after 3 characters
                performSearch();
            } else if (searchQuery.length === 0) {
                resetSearch();
            }
        }, 500);
    });
</script>

<?php $this->endSection() ?>