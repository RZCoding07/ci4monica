<style>
    table {
        table-layout: auto;
    }

    table,
    table tbody,
    table tr,
    table td {
        border-color: black !important;
        font-family: 'Times New Roman', Times, serif;
    }

    #offcanvas_full_screen table tr:nth-child(4) td {
        text-align: right;
    }

    #offcanvas_full_screen table tr:nth-child(5) td {
        text-align: right;
    }

    #offcanvas_full_screen table tr:nth-child(6) td {
        text-align: right;
    }

    tr.bg-success td {
        background-color: rgb(84, 130, 53);
        color: white;
    }

    tr.bg-active td {
        background-color: rgba(143, 255, 103, 0.2);
        color: black;
    }

    table td {
        color: black;
        vertical-align: middle;
        text-align: center;
    }
</style>
<div class="row flex-fill">
    <div class="col-12 col-lg-4 mb-4">
        <div class="h-100" id="chart_lokasi" style="height: 60dvh;width: 100%">

        </div>
    </div>
    <div class="col-12 col-lg-8 mb-4">
        <div class="h-100" id="chart_varietas" style="height: 60dvh;width: 100%">

        </div>
    </div>
    <div class="col-12 col-lg-6 mb-4">
        <div class="h-100" id="chart_regional" style="height: 80dvh;width: 100%">

        </div>
    </div>
    <?php extract($tbl) ?>
    <div class="col-12 col-lg-6 mb-4">
        <div class="table-responsive h-100" style="width: 100%">
            <table class="table table-bordered h-100">
                <tbody>
                    <tr class="bg-success">
                        <td rowspan="2" class="text-center">Sub</td>
                        <td rowspan="2" class="text-center">Regional</td>
                        <td colspan="2" class="text-center">Stock Bibit</td>
                    </tr>
                    <tr class="bg-success">
                        <td class="text-center">PN</td>
                        <td class="text-center">MN</td>
                    </tr>
                    <?php
                    $mnt = 0;
                    $pnt = 0;
                    $first = true;
                    foreach ($tbl_keys as $key => $v): ?>
                        <tr>
                            <?php if ($first) {
                                $first = false;
                                echo ' <td rowspan="9">Palmco</td>';
                            } ?>
                            <td class="text-center"><?= $v ?></td>
                            <td class="text-end"><?php $pnt += $tbl[$v]['PN'];
                                echo $tbl[$v]['PN'] ?></td>
                            <td class="text-end"><?php $mnt += $tbl[$v]['MN'];
                                echo $tbl[$v]['MN'] ?></td>
                        </tr
                            <?php endforeach; ?>>
                        <!-- <tr>
                            <td class="text-center">II</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td class="text-center">III</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td class="text-center">IV</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td class="text-center">V</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>VI</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>VII</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>KSO Eks N2</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>KSO Eks N14</td>
                            <td></td>
                            <td></td>
                        </tr> -->
                        <tr class="bg-success">
                            <td colspan="2" rowspan="2">Palmco</td>
                            <td class="text-end"><?= $pnt ?></td>
                            <td class="text-end"><?= $mnt ?></td>
                        </tr>
                        <tr class="bg-success">
                            <td class="text-end" colspan="2">
                                <?= $pnt + $mnt ?>
                            </td>
                        </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div id="table_show" class="d-none">
    <div class="bg-white rounded m-3 w-100 h-100 p-5">
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table style="max-width: 100%;" class="table table-bordered">
                        <tbody>
                            <tr class="bg-success">
                                <td rowspan="3">Sub</td>
                                <td rowspan="3">Lokasi</td>
                                <td colspan="3">Pre Nursery</td>
                                <td colspan="27">Main Nursery</td>
                                <td rowspan="3" class="text-center">Jumlah</td>
                            </tr>
                            <tr class="bg-success">
                                <td colspan="3" class="text-center">Bulan</td>
                                <td colspan="27" class="text-center">Bulan</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-6"></div>
        </div>
    </div>
</div>

<script>
    var chartData = new Map();
    chartData.set('lokasi', JSON.parse('<?php echo json_encode($lokasi) ?>'));
    chartData.set('varietas', JSON.parse('<?php echo json_encode($varietas) ?>'));
    chartData.set('regional', JSON.parse('<?php echo json_encode($regional) ?>'));
    var lokasi = []
    chartData.get('lokasi')['keys'].forEach((element, index) => {
        let el = {}
        if (index == 0) {
            el = {
                name: element,
                y: chartData.get('lokasi')['sum'][index],
                sliced: true,
                selected: true,
                // color: 'rgb(108, 168, 68)',
            }
        } else {
            el = {
                name: element,
                y: chartData.get('lokasi')['sum'][index],
                // color: 'rgb(84, 130, 53)'
            }
        }
        lokasi.push(el)
    })

    var chart_lokasi = Highcharts.chart('chart_lokasi', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Lokasi Bibitan',
            align: 'center'
        },
        tooltip: {
            pointFormat: '{point.name}: <b>{point.y}</b>'

        },
        accessibility: {
            point: {
                valueSuffix: '%'
            }
        },
        plotOptions: {
            pie: {
                innerSize: '50%',
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '{point.name}: {point.percentage:.1f} %',
                },
                showInLegend: true,
                point: {
                    events: {
                        click: function() {
                            createTable('lokasi', this.name)
                        }
                    }
                }
            },
        },
        series: [{
            name: 'Persentase',
            colorByPoint: true,
            data: lokasi
        }]
    });
    var varietas = []
    chartData.get('varietas')['keys'].forEach((element, index) => {
        let el = {}
        if (index == 0) {
            el = {
                name: element,
                y: chartData.get('varietas')['sum'][index],
                sliced: true,
                selected: true,
            }
        } else {
            el = {
                name: element,
                y: chartData.get('varietas')['sum'][index]
            }
        }
        varietas.push(el)
    })
    var chart_varietas = Highcharts.chart('chart_varietas', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Varietas Bibit',
            align: 'center'
        },
        tooltip: {
            pointFormat: '{point.name}: <b>{point.y}</b>'

        },
        accessibility: {
            point: {
                valueSuffix: '%'
            }
        },
        plotOptions: {
            pie: {
                innerSize: '50%',
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '{point.name}: {point.percentage:.1f} %',
                },
                showInLegend: true,
                point: {
                    events: {
                        click: function() {
                            createTable('varietas', this.name)
                        }
                    }
                }
            },
        },
        series: [{
            name: 'Persentase',
            colorByPoint: true,
            data: varietas
        }]
    });

    var regional = []
    chartData.get('regional')['keys'].forEach((element, index) => {
        let el = {}
        if (index == 0) {
            el = {
                name: element,
                y: chartData.get('regional')['sum'][index],
                sliced: true,
                selected: true,
            }
        } else {
            el = {
                name: element,
                y: chartData.get('regional')['sum'][index]
            }
        }
        regional.push(el)
    })
    var chart_regional = Highcharts.chart('chart_regional', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Stock Bibit Regional',
            align: 'center'
        },
        tooltip: {
            pointFormat: '{point.name}: <b>{point.y}</b>'

        },
        accessibility: {
            point: {
                valueSuffix: '%'
            }
        },
        plotOptions: {
            pie: {
                innerSize: '50%',
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '{point.name}: {point.percentage:.1f} %',
                },
                showInLegend: true,
                point: {
                    events: {
                        click: function() {
                            createTable('regional', this.name)
                        }
                    }
                }
            },
        },
        series: [{
            name: 'Persentase',
            colorByPoint: true,
            data: regional
        }]
    });

    function createTable(key, name) {
        let data = chartData.get(key).data;
        let keys = chartData.get(key).keys
        let sums = chartData.get(key).sum;
        let rowspan = sums.length + 1
        let j_col = [];
        let gt_j_col = 0;
        let rows = keys.map((e, i) => {
            let total_column = sums[i]
            let td = Object.values(data[i]).map((e, i) => {
                if (j_col[i] == undefined) {
                    j_col[i] = 0
                }
                j_col[i] += Number(e)
                return `<td>${e}</td>`
            })
            gt_j_col += Number(total_column)
            return `<tr ${name==e? 'class="bg-active"':''}><td>${e}</td></td>${td}<td>${total_column.toLocaleString('id-ID')}</td></tr>`
        })
        j_col.push(gt_j_col)
        let j_col_td = j_col.map(e => `<td>${e.toLocaleString('id-ID')}</td>`)
        let jumlah = sums.map((e, i) => {
            return `<td>${e}</td></td>`
        })
        let body = $('#table_show').html();
        offCanvas('<h4 class="text-dark">Rekapitulasi Lokasi Bibitan</h4>', body, false)
        let canvas = $("#offcanvas_full_screen")
        let bulan = '';
        for (let i = 1; i <= 30; i++) {
            bulan += i == 30 ? `<td>>=${i}</td>` : `<td>${i}</td>`
        }
        canvas.find('table tbody').append(`
                            <tr class="bg-success">
                            ${bulan}
                            </tr>
                            <tr>
                                <td rowspan="${rowspan}">Palmco</td>
                            </tr>
                            ${rows}
                            <tr class="bg-success">
                                <td></td>
                                <td>Jlh</td>${j_col_td}
                            </tr>
                            `)
    };
</script>