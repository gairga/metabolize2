function get_data() {
    $.getJSON("http://tour-pedia.org/api/getPlacesStatistics", function(data) {
        build_donut_chart(data);
    });
}

function build_donut_chart(data) {
    var tot = 0;
    var tot_city = [];
    var cities = [];
    var city_values = [];
    var cat = ["accommodation", "attraction", "poi", "restaurant"];

    $.each(data, function(city, value1) {
        var tc = 0;

        cities.push(city);
        city_values.push([]);

        $.each(value1, function(category, value2) {
            tc += value2;
            tot += value2;
            city_values[city_values.length - 1].push(value2);
        });

        tot_city.push(tc);
    });

    $.each(city_values, function(index1, value1) {
        $.each(value1, function(index2, value2) {
            city_values[index1][index2] = value2/tot*100;
        });
    });

    var colors = Highcharts.getOptions().colors,
            categories = cities,
            name = 'Cities/Categories',
            data = [{
                    y: tot_city[0]/tot*100,
                    color: colors[0],
                    drilldown: {
                        categories: cat,
                        data: city_values[0],
                        color: colors[0]
                    }
                }, {
                    y: tot_city[1]/tot*100,
                    color: colors[1],
                    drilldown: {
                        categories: cat,
                        data: city_values[1],
                        color: colors[1]
                    }
                }, {
                    y: tot_city[2]/tot*100,
                    color: colors[2],
                    drilldown: {
                        categories: cat,
                        data: city_values[2],
                        color: colors[2]
                    }
                }, {
                    y: tot_city[3]/tot*100,
                    color: colors[3],
                    drilldown: {
                        categories: cat,
                        data: city_values[3],
                        color: colors[3]
                    }
                }, {
                    y: tot_city[4]/tot*100,
                    color: colors[4],
                    drilldown: {
                        categories: cat,
                        data: city_values[4],
                        color: colors[4]
                    }
                }, {
                    y: tot_city[5]/tot*100,
                    color: colors[5],
                    drilldown: {
                        categories: cat,
                        data: city_values[5],
                        color: colors[5]
                    }
                }, {
                    y: tot_city[6]/tot*100,
                    color: colors[6],
                    drilldown: {
                        categories: cat,
                        data: city_values[6],
                        color: colors[6]
                    }
                }, {
                    y: tot_city[7]/tot*100,
                    color: colors[8],
                    drilldown: {
                        categories: cat,
                        data: city_values[7],
                        color: colors[7]
                    }
                }];
    
    
        // Build the data arrays
        var cityData = [];
        var versionsData = [];
        for (var i = 0; i < data.length; i++) {
    
            // add browser data
            cityData.push({
                name: cities[i],
                y: data[i].y,
                color: data[i].color
            });
    
            // add version data
            for (var j = 0; j < data[i].drilldown.data.length; j++) {
                var brightness = 0.2 - (j / data[i].drilldown.data.length) / 5 ;
                versionsData.push({
                    name: data[i].drilldown.categories[j],
                    y: data[i].drilldown.data[j],
                    color: Highcharts.Color(data[i].color).brighten(brightness).get()
                });
            }
        }
    
        // Create the chart
        $('#donut_chart').highcharts({
            chart: {
                type: 'pie'
            },
            title: {
                text: ''
            },
            plotOptions: {
                pie: {
                    shadow: false,
                    center: ['50%', '50%']
                }
            },
            tooltip: {
                valueSuffix: '%'
            },
            series: [{
                name: 'Cities',
                data: cityData,
                size: '50%',
                dataLabels: {
                    formatter: function() {
                        return this.y > 5 ? this.point.name : null;
                    },
                    color: 'white',
                    distance: -50
                }
            }, {
                name: 'Categories',
                data: versionsData,
                size: '65%',
                innerSize: '55%',
                dataLabels: {
                    formatter: function() {
                        // display only if larger than 1
                        return this.y > 1 ? '<b>'+ this.point.name +':</b><br>'+ this.y.toFixed(2) +'%'  : null;
                    }
                }
            }]
        });
}
