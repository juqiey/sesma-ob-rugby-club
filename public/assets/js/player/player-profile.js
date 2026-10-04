document.addEventListener("DOMContentLoaded", function () {

    var options = {
        series: [{
            name: 'Weight',
            data: [110, 108, 106.5, 105, 103]
        }],

        chart: {
            type: 'line',
            height: 320,
            toolbar: {
                show: false
            },
            zoom: {
                enabled: false
            }
        },

        stroke: {
            curve: 'smooth',
            width: 3
        },

        markers: {
            size: 5,
            strokeWidth: 2,
            hover: {
                size: 7
            }
        },

        xaxis: {
            categories: [
                'Jan 2026',
                'Mar 2026',
                'May 2026',
                'Jul 2026',
                'Aug 2026'
            ]
        },

        yaxis: {
            title: {
                text: 'Weight (kg)'
            },

            labels: {
                formatter: function (value) {
                    return value.toFixed(1);
                }
            }
        },

        tooltip: {
            y: {
                formatter: function (value) {
                    return value.toFixed(1) + ' kg';
                }
            }
        },

        grid: {
            strokeDashArray: 4
        },

        legend: {
            show: false
        }
    };

    var chart = new ApexCharts(
        document.querySelector("#physicalProgressChart"),
        options
    );

    chart.render();

});
