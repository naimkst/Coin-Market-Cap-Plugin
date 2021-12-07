"use strict";

jQuery(document).ready(function () {


    //API DATA CALL
    const settings = {
        "async": true,
        "crossDomain": true,
        "url": "https://coingecko.p.rapidapi.com/coins/markets?vs_currency=usd&page=1&per_page=10&order=market_cap_desc",
        "method": "GET",
        "headers": {
            "x-rapidapi-host": "coingecko.p.rapidapi.com",
            "x-rapidapi-key": "17d60d1a08msh7e3b64d98189c2fp168cf4jsn2b39c1f283f9"
        }
    };

    jQuery.ajax(settings).done(function (response) {

        const table1 = jQuery(".cryptocurrencies-table").DataTable();

        jQuery.each(response, function (i, data) {

            var html = '<tr>' +
                '<td>' +
                '<a href="#" class="coin-info">' +
                '<div class="coin-info-top">' +
                '<div class="coin_logo"><img src="' + data.image + '" alt="bitcoin" /></div>' +
                '<span class="coin_symbol">(' + data.symbol + ')</span>' +
                '</div>' +
                '<span class="coin_name">' + data.name + '</span>' +
                '</a>' +
                '</td>' +
                '<td><span class="price">$' + data.current_price + '</span></td>' +
                '<td><div class="changes down"><i class="fas fa-long-arrow-alt-down"></i>' + data.low_24h + '%</div></td>' +
                '<td><div class="changes up"><i class="fas fa-long-arrow-alt-up"></i>' + data.high_24h + '%</div></td>' +
                '<td><span class="market-cap">$' + data.market_cap + '</span></td>' +
                '<td><span class="vol">$' + data.total_volume + '</span></td>' +
                '<td><span class="supply">' + data.max_supply + '</span></td>' +
                '<td><div class="price-graph"><div id="' + data.symbol + '" class="chart ' + data.symbol + '"></div></div></td>' +
                '</tr>'
                
                
            



            const tr = jQuery(html);
            table1.row.add(tr[0]).draw();


            if (data.symbol == data.symbol) {
                // chart-one 
                var options = {
                    series: [{
                        data: []
                    }],
                    chart: {
                        type: 'area',
                        height: '85px',
                        id: data.symbol,
                        toolbar: {
                            show: false,
                        },

                    },
                    dataLabels: {
                        enabled: false
                    },
                    stroke: {
                        curve: 'smooth',
                        colors: ["#E07B6D"],
                        width: .5,
                        dashArray: 0,
                    },
                    fill: {
                        colors: '#FCB0A7',
                        type: 'gradient',
                        gradient: {
                            shade: 'light',
                            gradientToColors: ['#F7DDC1'],
                            type: "horizontal",
                            shadeIntensity: 0.5,
                            inverseColors: true,
                            opacityFrom: .6,
                            opacityTo: .8,
                            stops: [0, 50, 100],
                        },
                    },
                    tooltip: {
                        custom: function ({ series, seriesIndex, dataPointIndex, w }) {
                            return '<div class="arrow_box">' +
                                '<span>' + series[seriesIndex][dataPointIndex] + '</span>' +
                                '</div>'
                        }
                    },
                    grid: {
                        show: false,
                        padding: {
                            top: 0,
                            bottom: 0,
                        },
                    },
                    noData: {
                        text: "Loading...",
                        align: 'center',
                        verticalAlign: 'middle',
                        offsetX: 0,
                        offsetY: 0,
                        style: {
                            color: "#000000",
                            fontSize: '14px',
                            fontFamily: "Helvetica"
                        }
                    },
                    xaxis: {
                        labels: {
                            show: false,
                        },
                        axisBorder: {
                            show: false,
                        },
                        axisTicks: {
                            show: false,
                        },
                        tooltip: {
                            enabled: false,
                        },
                    },
                    yaxis: {
                        show: false,
                        labels: {
                            show: false,
                        },
                        axisBorder: {
                            show: false,
                        },
                        axisTicks: {
                            show: false,
                        },
                        tooltip: {
                            enabled: false,
                        },
                    },

                };

                var test='.'+data.symbol;

                var chart = new ApexCharts(document.querySelector(test), options);
                chart.render();
               
                try {
                    ApexCharts.exec(data.symbol, 'updateSeries', [{
                        data: [data.low_24h, data.high_24h]
                    }]);
                }
                catch (e) {
                }

            };


        });


    });

    jQuery('.cryptocurrencies-table').DataTable({
        responsive: true,
        paging: true,
        searching: true,
        ordering: true,
        select: true,
        bDestroy: true,
    });

});


