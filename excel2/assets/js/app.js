function accessibility_chart(sheetname){
        var url_data_x = '<?=site_url("admin/get_chart_index_by_name/Fail_CS"); ?>'+'/'+sheetname;
        var url_data_y = '<?=site_url("admin/get_data_by_option/3"); ?>'+'/'+sheetname;
        $.getJSON(url_data_y, function(data_y){
            //alert(data);
            $.getJSON(url_data_x, function(data_x){
            //alert(data);
            var chart_1 = new Highcharts.Chart({
                chart: {
                    renderTo: 'chart_1',
                    zoomType: 'xy'
                },
                title: {
                    text: 'CSSR CS(%)'
                },
                xAxis: [{

                }],
                yAxis: [{
                    title: {
                        text: 'CSSR CS(%)'
                    }
                }, {
                    title: {
                        text: 'CS FAIL'
                    },
                    opposite: true
                }],
                legend: {
                    shadow: false
                },
                tooltip: {
                    shared: true
                },
                plotOptions: {
                    column: {
                        grouping: false
                    }
                },
                series: [{
                    name: 'CSSR CS(%)',
                    data: data_y
                },
                 {
                    name: 'CS Fail',
                    type: 'column',
                    data: data_x,
                     yAxis: 1
                         }]
            });

        });

        });
    

    var url_data_x = '<?=site_url("admin/get_chart_index_by_name/Fail_CS"); ?>'+'/'+sheetname;
    var url_data_y = '<?=site_url("admin/get_data_by_option/3"); ?>'+'/'+sheetname;
        $.getJSON(url_data_y, function(data_y){
            //alert(data);
            $.getJSON(url_data_x, function(data_x){
            //alert(data);
            var chart_2 = new Highcharts.Chart({
                chart: {
                    renderTo: 'chart_2',
                    zoomType: 'xy'
                },
                title: {
                    text: 'CSSR PS(%)'
                },
                xAxis: [{

                }],
                yAxis: [{
                    title: {
                        text: 'CSSR PS(%)'
                    }
                }, {
                    title: {
                        text: 'CSSR FAIL'
                    },
                    opposite: true
                }],
                legend: {
                    shadow: false
                },
                tooltip: {
                    shared: true
                },
                plotOptions: {
                    column: {
                        grouping: false
                    }
                },
                series: [{
                    name: 'CSSR PS(%)',
                    data: data_y
                },
                 {
                    name: 'CS Fail',
                    type: 'column',
                    data: data_x,
                     yAxis: 1
                         }]
            });

        });

        });
    

    var url_data_x = '<?=site_url("admin/get_chart_index_by_name/Fail_CS"); ?>'+'/'+sheetname;
    var url_data_y = '<?=site_url("admin/get_data_by_option/3"); ?>'+'/'+sheetname;
        $.getJSON(url_data_y, function(data_y){
            //alert(data);
            $.getJSON(url_data_x, function(data_x){
            //alert(data);
            var chart_3 = new Highcharts.Chart({
                chart: {
                    renderTo: 'chart_3',
                    zoomType: 'xy'
                },
                title: {
                    text: 'CSSR HSDPA(%)'
                },
                xAxis: [{

                }],
                yAxis: [{
                    title: {
                        text: 'CSSR HSDPA(%)'
                    }
                }, {
                    title: {
                        text: 'CSSR HSDPA'
                    },
                    opposite: true
                }],
                legend: {
                    shadow: false
                },
                tooltip: {
                    shared: true
                },
                plotOptions: {
                    column: {
                        grouping: false
                    }
                },
                series: [{
                    name: 'CSSR HSDPA(%)',
                    data: data_y
                },
                 {
                    name: 'CS Fail',
                    type: 'column',
                    data: data_x,
                     yAxis: 1
                         }]
            });
                //$(".loading-data").fadeOut(1500).hide();
                
        });
    
    });
    }