<style>
    table,
    table tr,
    table td {
        border-color: black !important;
    }

    table td {
        color: black;
        vertical-align: middle;
        text-align: center;
    }
</style>
<div class="row">
    <div class="col-6">
        <div id="chart_lokasi" style="height: 40dvh;width: 100%">

        </div>
    </div>
    <div class="col-6"></div>
    <div class="col-6"></div>
</div>

<div id="table_show" class="d-none">
    <div class="bg-white rounded m-3 w-100 h-100 p-5">
        <div class="row">
            <div class="col-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <td rowspan="2">Sub</td>
                            <td rowspan="3">Lokasi</td>
                            <td colspan="3">Pre Nursery</td>
                            <td colspan="26">Main Nursery</td>
                            <td rowspan="2">Jumlah</td>
                        </tr>
                        <tr>
                            <td colspan="3">Bulan</td>
                            <td colspan="26">Bulan</td>
                        </tr>
                        <tr>
                            <td rowspan="4">Palmco</td>
                            <td>1</td>
                            <td>2</td>
                            <td>3</td>
                            <td>4</td>
                            <td>5</td>
                            <td>6</td>
                            <td>7</td>
                            <td>8</td>
                            <td>9</td>
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
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>PN</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>MN</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Jlh</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-6"></div>
        </div>
    </div>
</div>

<script>
    var chartData = new Map();
    chartData.set('pn', JSON.parse('<?php echo json_encode($pn) ?>'));
    chartData.set('mn', JSON.parse('<?php echo json_encode($mn) ?>'));

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
                    formatter: function() {
                        if (this.point.y > 5) { // Menampilkan persentase di dalam potongan pie
                            return this.point.percentage.toFixed(1) + ' %';
                        } else { // Menampilkan nama label di luar potongan pie
                            return this.point.name;
                        }
                    },
                    distance: -50,
                    style: {
                        color: 'white',
                        textOutline: 'black',
                        fontSize: '20px'
                    },
                    connectorColor: 'silver',
                    connectorWidth: 1
                },
                showInLegend: true,
                point: {
                    events: {
                        click: function() {
                            let data_lokasi_bibitan = chartData.get(this.datalabel).data;
                            let body = $('#table_show').html();
                            let canvas = offCanvas('<h4 class="text-dark">Rekapitulasi Lokasi Bibitan</h4>', body, false).then(function(c) {
                                return c[0];
                            });
                            console.log(canvas);
                            let row1 = canvas.find('table tbody tr:nth-child(1) td');
                            row1.each(function(el) {
                                console.log(el);
                            })
                            let row2 = canvas.find('table tbody tr:nth-child(2)');
                            let row3 = canvas.find('table tbody tr:nth-child(3)');
                        }
                    }
                }
            },
        },
        series: [{
            name: 'Persentase',
            colorByPoint: true,
            data: [{
                name: 'PN',
                datalabel: 'pn',
                y: Number(chartData.get('pn').sum || 0),
                sliced: true,
                selected: true,
            }, {
                name: 'MN',
                datalabel: 'mn',
                y: Number(chartData.get('mn').sum || 0),
            }]
        }]
    });
</script>