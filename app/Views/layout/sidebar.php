<aside id="application-sidebar-brand"
    class="hs-overlay hs-overlay-open:translate-x-0 -translate-x-full  transform hidden xl:block xl:translate-x-0 xl:end-auto xl:bottom-0 fixed xl:top-[20px] xl:left-auto top-0 left-0 with-vertical h-screen z-10 shrink-0  w-[270px] shadow-md xl:rounded-md rounded-none bg-white left-sidebar transition-all duration-300">
    <!-- ---------------------------------- -->
    <!-- Start Vertical Layout Sidebar -->
    <!-- ---------------------------------- -->
    <div class="p-4">

        <a href="../" class="text-nowrap">
            <img
                src="<?= base_url() ?>/assets/images/logos/logo-light.svg"
                alt="Logo-Dark" />
        </a>


    </div>
    <div class="scroll-sidebar" data-simplebar="">
        <nav class=" w-full flex flex-col sidebar-nav px-4 mt-5">
            <ul id="sidebarnav" class="text-gray-600 text-sm">
                <li class="text-xs font-bold pb-[5px]">
                    <i class="ti ti-dots nav-small-cap-icon text-lg hidden text-center"></i>
                    <span class="text-xs text-gray-400 font-semibold">HOME</span>
                </li>


                <li class="sidebar-item">
                    <a class="sidebar-link gap-3 py-2.5 my-1 text-base flex items-center justify-between relative rounded-md text-gray-900 w-full"
                        href="<?= base_url('dashboard') ?>">
                        <div class="flex items-center gap-2">
                            <i class="ti ti-chart-bar ps-2 text-2xl"></i> <span>Dashboard</span>
                        </div>

                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link gap-3 py-2.5 my-1 text-base flex items-center justify-between relative rounded-md text-gray-900 w-full"

                        href="<?= base_url('balita') ?>">
                        <div class="flex items-center gap-2">
                            <i class="ti ti-user-circle ps-2 text-2xl"></i> <span>Balita</span>
                        </div>
                    </a>
                </li>

                <li class="text-xs font-bold mb-4 mt-8">
                    <i class="ti ti-dots nav-small-cap-icon  text-lg hidden text-center"></i>
                    <span class="text-xs text-gray-400 font-semibold">ALAT</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link gap-3 py-2.5 my-1 text-base flex items-center justify-between relative rounded-md text-gray-900 w-full"

                        href="#">
                        <div class="flex items-center gap-2">
                            <i class="ti ti-calculator ps-2 text-2xl"></i> <span>Z-Score</span>
                        </div>

                    </a>
                </li>

                <li class="text-xs font-bold mb-4 mt-8">
                    <i class="ti ti-dots nav-small-cap-icon  text-lg hidden text-center"></i>
                    <span class="text-xs text-gray-400 font-semibold">AUTENTIKASI</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link gap-3 py-2.5 my-1 text-base flex items-center justify-between relative rounded-md text-gray-900 w-full"

                        href="<?= base_url('logout') ?>">
                        <div class="flex items-center gap-2">
                            <i class="ti ti-login ps-2 text-2xl"></i> <span>Log Out</span>
                        </div>

                    </a>
                </li>
            </ul>
        </nav>
</div>

</aside>