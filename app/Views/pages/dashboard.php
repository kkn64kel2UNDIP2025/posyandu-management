<?php $this->extend('layout/template') ?>
<?php $this->section('content') ?>

<!-- Main Content -->
<div class="grid grid-cols-1 lg:grid-cols-3 lg:gap-x-6 gap-x-0 lg:gap-y-0 gap-y-6 items-stretch">
    <div class="lg:col-span-2 space-y-6">
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
            <div class="card card-body">
                <div class="text-gray-900">
                    <h4 class="text-lg font-semibold sm:mb-0 mb-2">Total Balita</h4>
                    <p class="text-3xl font-bold mt-2" id="total-toddlers"><?= $genderGroupTotal[0]['toddler_count'] + $genderGroupTotal[1]['toddler_count'] ?></p>
                </div>
            </div>
            <div class="card card-body">
                <div class="text-gray-900">
                    <h4 class="text-lg font-semibold sm:mb-0 mb-2">Balita Laki-laki</h4>
                    <p class="text-3xl font-bold mt-2" id="male-toddlers"><?= $genderGroupTotal[1]['toddler_count'] ?></p>
                </div>
            </div>
            <div class="card card-body">
                <div class="text-gray-900">
                    <h4 class="text-lg font-semibold sm:mb-0 mb-2">Balita Perempuan</h4>
                    <p class="text-3xl font-bold mt-2" id="female-toddlers"><?= $genderGroupTotal[0]['toddler_count'] ?></p>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div>
                    <h4 class="text-gray-900 text-lg font-semibold sm:mb-0 mb-2">Grafik Kedatangan</h4>
                </div>
                <div id="measurement-total"></div>
            </div>
        </div>
    </div>

    <div class="space-y-6 col-span-1">
        <div class="card card-body">
            <h4 class="text-gray-900 text-lg font-semibold sm:mb-0 mb-2">Status Balita</h4>
            <div class="flex items-center justify-center">
                <div id="status-chart" class="p-0"></div>
            </div>
        </div>
        <div class="card card-body">
            <h4 class="text-gray-900 text-lg font-semibold sm:mb-0 mb-2">Balita per RT</h4>
            <div class="flex items-center justify-center">
                <div id="rt-chart" class="p-0"></div>
            </div>
        </div>
    </div>
</div>

<footer>
    <p class="text-gray-400 font-normal my-3 text-center text-sm">
        Dibuat dan dikembangkan oleh <a href="https://www.instagram.com/storyofkaligawe_/" target="_blank"
            class="block text-blue-600 underline hover:text-blue-700">KKN Tim 64 Kelompok 2 UNDIP 2025</a>
    </p>
</footer>
<!-- Main Content End -->
<script src="<?= base_url('assets/js/library/apexcharts.min.js') ?>"></script>
<script>
    const measurementTotal = <?= json_encode($measurementTotal) ?>;

    const measurementOption = {
        series: [{
            name: "Total",
            data: measurementTotal,
        }, ],
        chart: {
            fontFamily: "Poppins,sans-serif",
            type: "bar",
            height: 442,
            offsetY: 10,
            toolbar: {
                show: false,
            },
        },
        grid: {
            show: true,
            strokeDashArray: 3,
            borderColor: "rgba(0,0,0,.1)",
        },
        colors: ["#1e88e5", "#21c1d6"],
        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: "30%",
                endingShape: "flat",
            },
        },
        dataLabels: {
            enabled: false,
        },
        stroke: {
            show: true,
            width: 5,
            colors: ["transparent"],
        },
        xaxis: {
            type: "category",
            axisTicks: {
                show: false,
            },
            axisBorder: {
                show: false,
            },
            labels: {
                style: {
                    colors: "#a1aab2",
                },
            },
        },
        yaxis: {
            labels: {
                style: {
                    colors: "#a1aab2",
                },
            },
        },
        fill: {
            opacity: 1,
            colors: ["#0085db", "#fb977d"],
        },
        tooltip: {
            theme: "light",
        },
        legend: {
            show: false,
        },
        responsive: [{
            breakpoint: 767,
            options: {
                stroke: {
                    show: false,
                    width: 5,
                    colors: ["transparent"],
                },
            },
        }, ],
    };

    const chart_column_basic = new ApexCharts(document.querySelector("#measurement-total"), measurementOption);
    chart_column_basic.render();

    // Function to get pie chart options
    const getPieChartOptions = (seriesData, labelData, colors = ["#1C64F2", "#16BDCA", "#9061F9", "#F87171"]) => ({
        series: seriesData,
        colors: colors,
        chart: {
            height: 250,
            width: "100%",
            type: "pie",
        },
        stroke: {
            colors: ["white"],
            lineCap: "",
        },
        plotOptions: {
            pie: {
                labels: {
                    show: true,
                },
                size: "100%",
                dataLabels: {
                    offset: -25
                }
            },
        },
        labels: labelData,
        dataLabels: {
            enabled: true,
            style: {
                fontFamily: "Inter, sans-serif",
            },
        },
        legend: {
            position: "bottom",
            fontFamily: "Inter, sans-serif",
        },
        yaxis: {
            labels: {
                formatter: function(value) {
                    return value + " balita";
                },
            },
        },
        xaxis: {
            axisTicks: {
                show: false
            },
            axisBorder: {
                show: false
            },
        },
    });

    // Status Chart
    const statusGroupTotal = <?= json_encode($statusGroupTotal) ?>;
    const statusSeriesData = statusGroupTotal.map(item => parseInt(item.toddler_count));
    const statusLabelData = statusGroupTotal.map(item => item.status);

    if (document.getElementById("status-chart") && typeof ApexCharts !== 'undefined') {
        const chart = new ApexCharts(document.getElementById("status-chart"), getPieChartOptions(statusSeriesData, statusLabelData, ["#3BB143", "#f87171", "#ff9800"]));
        chart.render();
    }

    // RT Chart
    const perRtTotal = <?= json_encode($perRtTotal) ?>;

    const seriesData = perRtTotal.map(item => parseInt(item.total_warga));
    const labelData = perRtTotal.map(item => `RT ${item.rt}`);

    if (document.getElementById("rt-chart") && typeof ApexCharts !== 'undefined') {
        const chart = new ApexCharts(document.getElementById("rt-chart"), getPieChartOptions(seriesData, labelData));
        chart.render();
    }
</script>
<?php $this->endSection() ?>