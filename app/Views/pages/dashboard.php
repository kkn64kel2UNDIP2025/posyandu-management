<?php $this->extend('layout/template') ?>
<?php $this->section('content') ?>

<!-- Main Content -->
<div class="grid grid-cols-1 lg:grid-cols-3 lg:gap-x-6 gap-x-0 lg:gap-y-0 gap-y-6 items-stretch">
    <div class="col-span-2">
        <div class="card">
            <div class="card-body h-full">
                <div class="flex  justify-between mb-5">
                    <h4 class="text-gray-900 text-lg font-semibold sm:mb-0 mb-2">Grafik Kedatangan</h4>
                </div>
                <div id="measurement-total"></div>
            </div>
        </div>
    </div>
    <div class="col-span-1">
        <div class="card h-full card-body">
            <div class="">
                <h4 class="text-gray-900 text-lg font-semibold sm:mb-0 mb-2">Grafik RT</h4>
            </div>
            <div class="card-body flex items-center justify-center">
                    <div id="rt-chart"></div>
            </div>
        </div>
    </div>
</div>

<footer>
    <p class="text-base text-gray-400 font-normal p-3 text-center">
        Design and Developed by <a href="https://www.wrappixel.com/"
            class="text-blue-600 underline hover:text-blue-700">wrappixel.com</a>
    </p>
</footer>
<!-- Main Content End -->
<script src="<?= base_url('assets/js/library/apexcharts.min.js') ?>"></script>
<script>
    const measurementTotal = <?= json_encode($measurementTotal) ?>;
    console.log(measurementTotal);

    const measurementOption = {
        series: [{
            name: "Total",
            data: measurementTotal,
        }, ],
        chart: {
            fontFamily: "Poppins,sans-serif",
            type: "bar",
            height: 370,
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


    // RT Chart
    const perRtTotal = <?= json_encode($perRtTotal) ?>;

    // Konversi jadi array
    const seriesData = perRtTotal.map(item => parseInt(item.total_warga));
    const labelData = perRtTotal.map(item => `RT ${item.rt}`);

    const rtChart = {
        series: seriesData,
        colors: ["#1C64F2", "#16BDCA", "#9061F9", "#F87171"],
        chart: {
            height: 350,
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
                    return value + "%";
                },
            },
        },
        xaxis: {
            labels: {
                formatter: function(value) {
                    return value + "%";
                },
            },
            axisTicks: {
                show: false
            },
            axisBorder: {
                show: false
            },
        },
    };

    if (document.getElementById("rt-chart") && typeof ApexCharts !== 'undefined') {
        const chart = new ApexCharts(document.getElementById("rt-chart"), rtChart);
        chart.render();
    }
</script>
<?php $this->endSection() ?>