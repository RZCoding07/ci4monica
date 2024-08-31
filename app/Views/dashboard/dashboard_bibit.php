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

    table tr:nth-child(4) td {
        text-align: right;
    }

    table tr:nth-child(5) td {
        text-align: right;
    }

    table tr:nth-child(6) td {
        text-align: right;
    }

    tr.bg-success td {
        background-color: rgb(84, 130, 53);
        color: white;
    }

    table td {
        color: black;
        vertical-align: middle;
        text-align: center;
    }
</style>
<div class="row">
    <div class="col-6 mb-4">
        <div id="chart_lokasi" style="height: 50dvh;width: 100%">

        </div>
    </div>
    <div class="col-6 mb-4">
        <div id="chart_varietas" style="height: 50dvh;width: 100%">

        </div>
    </div>
    <div class="col-6 mb-4">
        <div id="chart_regional" style="height: 50dvh;width: 100%">

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
                            <tr class="bg-success">
                                <td>1</td>
                                <td>2</td>
                                <td>3</td>
                                <td>4</td>
                                <td>5</td>
                                <td>6</td>
                                <td>7</td>
                                <td>8</td>
                                <td>9</td>
                                <td>10</td>
                                <td>11</td>
                                <td>12</td>
                                <td>13</td>
                                <td>14</td>
                                <td>15</td>
                                <td>16</td>
                                <td>17</td>
                                <td>18</td>
                                <td>19</td>
                                <td>20</td>
                                <td>21</td>
                                <td>22</td>
                                <td>23</td>
                                <td>24</td>
                                <td>25</td>
                                <td>26</td>
                                <td>27</td>
                                <td>28</td>
                                <td>29</td>
                                <td>&gt;=30</td>
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
    chartData.set('lokasi', JSON.parse('<?php echo json_encode($locs_res) ?>'));
    chartData.set('varietas', JSON.parse('<?php echo json_encode($vars_res) ?>'));
    chartData.set('regional', JSON.parse('<?php echo json_encode($reg_res) ?>'));
    var lokasi = []
    chartData.get('lokasi')['keys'].forEach((element, index) => {
        let el = {}
        if (index == 0) {
            el = {
                name: element,
                y: chartData.get('lokasi')['sum'][index],
                sliced: true,
                selected: true,
                color: 'rgb(108, 168, 68)',
            }
        } else {
            el = {
                name: element,
                y: chartData.get('lokasi')['sum'][index],
                color: 'rgb(84, 130, 53)'
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
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'

        },
        accessibility: {
            point: {
                valueSuffix: '%'
            }
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '{point.percentage:.1f} %',
                },
                showInLegend: true,
                point: {
                    events: {
                        click: function() {
                            let data = chartData.get('lokasi').data;
                            let sums = chartData.get('lokasi').sum;
                            let rowspan = sums.length+1
                            let j_col = [];
                            let gt_j_col = 0;
                            let rows = chartData.get('lokasi').keys.map((e, i) => {
                                let total_column = sums[i]
                                let td = Object.values(data[i]).map((e, i) => {
                                    if (j_col[i] == undefined) {
                                        j_col[i] = 0
                                    }
                                    j_col[i] += Number(e)
                                    return `<td>${e}</td>`
                                })
                                gt_j_col += Number(total_column)
                                return `<tr><td>${e}</td></td>${td}<td>${total_column.toLocaleString('id-ID')}</td></tr>`
                            })
                            j_col.push(gt_j_col)
                            let j_col_td = j_col.map(e => `<td>${e.toLocaleString('id-ID')}</td>`)
                            let jumlah = chartData.get('lokasi').sum.map((e, i) => {
                                return `<td>${e}</td></td>`
                            })
                            let body = $('#table_show').html();
                            offCanvas('<h4 class="text-dark">Rekapitulasi Lokasi Bibitan</h4>', body, false)
                            let canvas = $("#offcanvas_full_screen")
                            canvas.find('table tbody').append(`
                            <tr>
                                <td rowspan="${rowspan}">Palmco</td>
                            </tr>
                            ${rows}
                            <tr class="bg-success">
                                <td></td>
                                <td>Jlh</td>${j_col_td}
                            </tr>
                            `)
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
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'

        },
        accessibility: {
            point: {
                valueSuffix: '%'
            }
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '{point.percentage:.1f} %',
                },
                showInLegend: true,
                point: {
                    events: {
                        click: function() {
                            let data = chartData.get('varietas').data;
                            let sums = chartData.get('varietas').sum;
                            let rowspan = sums.length+1
                            let j_col = [];
                            let gt_j_col = 0;
                            let rows = chartData.get('varietas').keys.map((e, i) => {
                                let total_column = sums[i]
                                let td = Object.values(data[i]).map((e, i) => {
                                    if (j_col[i] == undefined) {
                                        j_col[i] = 0
                                    }
                                    j_col[i] += Number(e)
                                    return `<td>${e}</td>`
                                })
                                gt_j_col += Number(total_column)
                                return `<tr><td>${e}</td></td>${td}<td>${total_column.toLocaleString('id-ID')}</td></tr>`
                            })
                            j_col.push(gt_j_col)
                            let j_col_td = j_col.map(e => `<td>${e.toLocaleString('id-ID')}</td>`)
                            let jumlah = chartData.get('varietas').sum.map((e, i) => {
                                return `<td>${e}</td></td>`
                            })
                            let body = $('#table_show').html();
                            offCanvas('<h4 class="text-dark">Rekapitulasi Lokasi Bibitan</h4>', body, false)
                            let canvas = $("#offcanvas_full_screen")
                            canvas.find('table tbody').append(`
                            <tr>
                                <td rowspan="${rowspan}">Palmco</td>
                            </tr>
                            ${rows}
                            <tr class="bg-success">
                                <td></td>
                                <td>Jlh</td>${j_col_td}
                            </tr>
                            `)
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
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'

        },
        accessibility: {
            point: {
                valueSuffix: '%'
            }
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '{point.percentage:.1f} %',
                },
                showInLegend: true,
                point: {
                    events: {
                        click: function() {
                            let data = chartData.get('regional').data;
                            let sums = chartData.get('regional').sum;
                            let rowspan = sums.length+1
                            let j_col = [];
                            let gt_j_col = 0;
                            let rows = chartData.get('regional').keys.map((e, i) => {
                                let total_column = sums[i]
                                let td = Object.values(data[i]).map((e, i) => {
                                    if (j_col[i] == undefined) {
                                        j_col[i] = 0
                                    }
                                    j_col[i] += Number(e)
                                    return `<td>${e}</td>`
                                })
                                gt_j_col += Number(total_column)
                                return `<tr><td>${e}</td></td>${td}<td>${total_column.toLocaleString('id-ID')}</td></tr>`
                            })
                            j_col.push(gt_j_col)
                            let j_col_td = j_col.map(e => `<td>${e.toLocaleString('id-ID')}</td>`)
                            let jumlah = chartData.get('regional').sum.map((e, i) => {
                                return `<td>${e}</td></td>`
                            })
                            let body = $('#table_show').html();
                            offCanvas('<h4 class="text-dark">Rekapitulasi Lokasi Bibitan</h4>', body, false)
                            let canvas = $("#offcanvas_full_screen")
                            canvas.find('table tbody').append(`
                            <tr>
                                <td rowspan="${rowspan}">Palmco</td>
                            </tr>
                            ${rows}
                            <tr class="bg-success">
                                <td></td>
                                <td>Jlh</td>${j_col_td}
                            </tr>
                            `)
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
</script>