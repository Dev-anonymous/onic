<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light"
    data-menu-styles="dark" data-toggled="close">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> Dashboard | {{ config('app.name') }} </title>
    <x-css-file />
</head>

<body>
    <x-switcher />
    <div class="page">
        <x-header />
        <x-aside />

        <div class="main-content app-content">
            <div class="container-fluid">
                <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
                    <h1 class="page-title fw-semibold fs-18 mb-0"></h1>
                    <div class="ms-md-1 ms-0">
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboards</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Home</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="text-center mb-3">
                            <span ldr></i></span>
                        </div>
                    </div>
                    <div class="col-xxl-6 col-xl-12">
                        <div class="row">
                            <div class="col-lg-6 col-sm-6 col-md-6 col-xl-6">
                                <a href="{{ route('admin.healthzone') }}">
                                    <div class="card custom-card">
                                        <div class="card-body d-flex justify-content-between align-items-center">
                                            <div>
                                                <p class="mb-2">Zones de santé</p>
                                                <h4 class="mb-0 fw-semibold mb-2" zonesante></h4>
                                            </div>
                                            <div>
                                                <span class="avatar avatar-md bg-primary p-2">
                                                    <i class="bx bx-globe fs-20 op-7"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-md-6 col-xl-6">
                                <a href="{{ route('admin.healtharea') }}">
                                    <div class="card custom-card">
                                        <div class="card-body d-flex justify-content-between align-items-center">
                                            <div>
                                                <p class="mb-2">Aires de santé</p>
                                                <h4 class="mb-0 fw-semibold mb-2" airesante></h4>
                                            </div>
                                            <div>
                                                <span class="avatar avatar-md bg-secondary p-2">
                                                    <i class="ti ti-map-2 fs-20 op-7"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-md-6 col-xl-6">
                                <a href="{{ route('admin.healthstructure') }}">
                                    <div class="card custom-card">
                                        <div class="card-body d-flex justify-content-between align-items-center">
                                            <div>
                                                <p class="mb-2">Strucutre de santé</p>
                                                <h4 class="mb-0 fw-semibold mb-2" structuresante></h4>
                                            </div>
                                            <div>
                                                <span class="avatar avatar-md bg-success p-2">
                                                    <i class="ti ti-building-hospital fs-20 op-7"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-md-6 col-xl-6">
                                <a href="{{ route('admin.blog') }}">
                                    <div class="card custom-card">
                                        <div class="card-body d-flex justify-content-between align-items-center">
                                            <div>
                                                <p class="mb-2">Blog</p>
                                                <h4 class="mb-0 fw-semibold mb-2" blog></h4>
                                            </div>
                                            <div>
                                                <span class="avatar avatar-md bg-warning p-2">
                                                    <i class="bx bxs-notepad fs-20 op-7"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="col-xl-12">
                                <div class="card custom-card">
                                    <div class="card-header justify-content-between">
                                        <div class="card-title">
                                            Comptes infirmiers Récents
                                        </div>
                                    </div>
                                    <div class="card-body" style="height: 510px; overflow: auto;">
                                        <ul class="list-unstyled mb-0" recent></ul>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-xxl-6 col-xl-12">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card custom-card">
                                    <div class="card-header justify-content-between">
                                        <div class="card-title">Statistiques de transaction</div>
                                    </div>
                                    <div class="card-body">
                                        <div id="chart001"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="card custom-card">
                                    <div class="card-header justify-content-between">
                                        <div class="card-title">
                                            Utilisateurs
                                        </div>
                                    </div>
                                    <div class="card-body p-0 overflow-hidden">
                                        <div
                                            class="leads-source-chart d-flex align-items-center justify-content-center">
                                            <div id="cmptgraph"></div>
                                        </div>
                                        <div class="row row-cols-12 border-top border-block-start-dashed">
                                            {{-- <div class="col p-0">
                                                <a href="('admin.users') }}">
                                                    <div
                                                        class="ps-4 py-3 pe-3 text-center border-end border-inline-end-dashed">
                                                        <span
                                                            class="text-muted fs-12 mb-1 crm-lead-legend mobile d-inline-block">Utilisateurs
                                                        </span>
                                                        <div>
                                                            <span class="fs-16 fw-semibold" nbchauffeurs></span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div> --}}
                                            <div class="col p-0">
                                                <a href="{{ route('admin.nurse') }}">
                                                    <div class="p-3 text-center border-end border-inline-end-dashed">
                                                        <span
                                                            class="text-muted fs-12 mb-1 crm-lead-legend desktop d-inline-block">Infirmiers
                                                        </span>
                                                        <div><span class="fs-16 fw-semibold" nbagents></span></div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col p-0">
                                                <a href="{{ route('admin.admins') }}">
                                                    <div class="p-3 text-center border-end border-inline-end-dashed">
                                                        <span
                                                            class="text-muted fs-12 mb-1 crm-lead-legend laptop d-inline-block">Admins
                                                        </span>
                                                        <div><span class="fs-16 fw-semibold" nbadmins></span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
        <x-footer />
    </div>

    <div id="responsive-overlay"></div>

    <x-js-file />
    <script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>

    <script>
        $(function() {

            var ldr = true;

            function getdata(interval = false) {
                if (ldr) {
                    ldr = false;
                    $('span[ldr]').removeClass().addClass('bx bx-spin bx-loader bx-lg');
                }
                $.ajax({
                    'url': '{{ route('dash.index') }}',
                    success: function(data) {
                        $('[zonesante]').html(data.zonesante);
                        $('[airesante]').html(data.airesante);
                        $('[structuresante]').html(data.structuresante);
                        $('[blog]').html(data.blog);

                        var series = [data.nbinfirmiers, data.nbadmins];

                        cmptgraph.updateSeries(series);
                        chart001.updateSeries(data.chart001);

                        var html = '';
                        var topproject = data.topproject;
                        $(topproject).each(function(i, e) {
                            var cl = 'success';
                            if (e.progress < 50) {
                                cl = 'danger';
                            }
                            if (e.progress >= 50 && e.progress <= 99) {
                                cl = 'warning';
                            }
                            html += `
                                <tr>
                                    <td class='p-2'>
                                        <span class="fw-semibold">${e.name}</span>
                                    </td>
                                    <td class='p-2'>
                                        <span class="fw-semibold">${e.budget}</span>
                                    </td>
                                    <td>
                                        <div class="task-details-progress">
                                            <div class="d-flex align-items-center">
                                                <div class="progress progress-xs progress-animate flex-fill me-2" role="progressbar" aria-valuenow="${e.progress}" aria-valuemin="0" aria-valuemax="100">
                                                    <div class="progress-bar bg-${cl}" style="width: ${e.progress}%"></div>
                                                </div>
                                                <div class="text-muted fs-11">${e.progress}%</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class='p-2'>
                                        <span class="fw-semibold">${e.startdate} ... ${e.enddate}</span>
                                    </td>
                                </tr>
                            `;
                        });
                        $('[table]').find('tbody').html(html);

                        html = '';
                        var recent = data.recent;
                        $(recent).each(function(i, e) {
                            html += `
                            <li class="mb-3" >
                                <a href="{{ route('admin.nurse') }}">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <div class="lh-1">
                                                <img src="${e.image}" alt="img" width="32" height="32" class="rounded-circle">
                                            </div>
                                            <div class="p-2">
                                                <p class="mb-0 fw-semibold">${e.name}</p>
                                                <p class="mb-0 fs-11 text-success fw-semibold">Niveau étude : ${e.niveauetude}</p>
                                            </div>
                                        </div>
                                        <div class="text-end">
                                            <p class="mb-0 fw-semibold">
                                                ${e.phone}
                                            </p>
                                            <p class="mb-0 op-7 text-muted fs-11">
                                                ${e.email}
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            `;
                        });
                        $('[recent]').html(html);
                    },
                    error: function(res) {

                    }
                }).always(function() {
                    $('span[ldr]').removeClass();
                    if (interval) {
                        setTimeout(() => {
                            getdata(true);
                        }, 3000);
                    }
                })
            }
            getdata(true);

            var options = {
                series: [],
                chart: {
                    height: 290,
                    type: "pie",
                },
                labels: ["Utilisateurs", "Infirmiers", "Admins"],
                theme: {
                    monochrome: {
                        enabled: true,
                        color: "#845adf",
                    },
                },
                plotOptions: {
                    pie: {
                        dataLabels: {
                            offset: -5,
                        },
                    },
                },
                dataLabels: {
                    formatter(val, opts) {
                        const name = opts.w.globals.labels[opts.seriesIndex];
                        return [name];
                    },
                    dropShadow: {
                        enabled: false,
                    },
                },
                legend: {
                    show: false,
                },
            };
            var cmptgraph = new ApexCharts(document.querySelector("#cmptgraph"), options);
            cmptgraph.render();

            var options2 = {
                series: [],
                chart: {
                    height: 350,
                    animations: {
                        speed: 500,
                        enabled: false,
                    },
                    dropShadow: {
                        enabled: true,
                        enabledOnSeries: undefined,
                        top: 8,
                        left: 0,
                        blur: 3,
                        color: '#000',
                        opacity: 0.1
                    },
                    zoom: {
                        enabled: false,
                    }
                },
                colors: ["rgba(255, 90, 60, 0.5)", "rgba(35, 183, 229, 0.5)",

                ],
                dataLabels: {
                    enabled: false
                },
                grid: {
                    borderColor: '#f1f1f1',
                    strokeDashArray: 3
                },
                stroke: {
                    curve: 'smooth',
                    width: [2, 2, 2, 2],
                    dashArray: [0, 5, 0],
                },
                xaxis: {
                    axisTicks: {
                        show: false,
                    },
                },
                yaxis: {
                    // labels: {
                    //     formatter: function(value) {
                    //         return "$ " + value;
                    //     }
                    // },
                },
                tooltip: {
                    // y: [{
                    //     formatter: function(e) {
                    //         return void 0 !== e ? "$" + e.toFixed(3) : e
                    //     }
                    // }, ]
                },
                legend: {
                    show: true,
                },
                markers: {
                    hover: {
                        sizeOffset: 5
                    }
                }
            };
            var chart001 = new ApexCharts(document.querySelector("#chart001"), options2);
            chart001.render();
        })
    </script>

</body>

</html>
