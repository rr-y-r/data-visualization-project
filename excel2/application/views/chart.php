
<? $this->load->view('includes/header');?>
<? $this->load->view('includes/navbar');?>

	<body>
        <div class="loading-data" hidden>
            <div class="col-md-offset-5 align-center">
                <span class="load-screen center glyphicon glyphicon-cog gly-spin"></span><br>
            </div>
                <span class="load-text"><center>LOADING..</center></span>
            </div>
            <!-- 
        <a class="glyphicon glyphicon-cog menu-toggle pull-right" data-toggle="modal" data-target="#apps_option"></a>
                
         
    
-->
    <div class="container">
    
    <div class="content">
        
	   <div class="row clearfix">
           
            <div id="wrapper">
                <? $this->load->view('includes/sidebar');?>
                <div id="chart_0_0"></div>
                <div id="chart_1_0"></div>
                <div id="chart_2_0"></div>
                <br>
                <div id="chart_0_1"></div>
                <div id="chart_1_1"></div>
                <div id="chart_2_1"></div>
                <br>
                <div id="chart_0_2"></div>
                <div id="chart_1_2"></div>
                <div id="chart_2_2"></div>
                <br>
                <div id="chart_0_3"></div>
                <div id="chart_1_3"></div>
                <div id="chart_2_3"></div>
                <br>
                <div id="chart_0_4"></div>
                <div id="chart_1_4"></div>
                <div id="chart_2_4"></div>
                <br>
                <div id="chart_0_5"></div>
                <div id="chart_1_5"></div>
                <div id="chart_2_5"></div>
                <br>
        
           </div>
        </div>
    </div>
</div>    
    
        
<script src="<?=base_url('assets/chart_api/js/highcharts.js'); ?>"></script>
<!--<script src="<? //=base_url('assets/chart_api/js/modules/exporting.js');?>"></script>-->
<script type="text/javascript">
        
        $(function () {
            /*
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

            function visualisation(sheetname,chart_type){
                //var chart_type = ['accessibility','retainability','mobility','traffic','throughput','hsupa','extra'];

                switch (chart_type) {
                    case 'accessibility':
                        do_visualisation();
                        break;
                    case 'retainability':
                        do_visualisation();
                        break;
                    case 'mobility':
                        do_visualisation();
                        break;
                    case 'traffic':
                        do_visualisation();
                        break;
                    case 'throughput':
                        do_visualisation();
                        break;
                    case 'hsupa':
                        do_visualisation();
                        break;
                    case 'extra':
                        do_visualisation();
                        break;
                }
            }

*/
            function get_data_date(sheetname){

                var url_getDate = '<?=site_url("admin/get_sheet_date"); ?>'+'/'+sheetname;
                $.getJSON(url_getDate).always(function(data_date){
                    console.log(data_date);
                });
            }

            function get_data_time(sheetname){
                //on rnc hourly
                var url_chartName_y = '<?=site_url("admin/get_col_name"); ?>'+'/'+idx_y[i]+'/'+sheetname;

                $.getJSON(url_data_x).always(function(data_y){
                    
                });
            }

            function get_time_by_range(start,end,date,time){
                $.getJSON(url_data_x).always(function(data_y){
                    
                });
            }

            function visualisation_by_sheetname(sheetname){

                var chart_type = ['accessibility','retainability','mobility','traffic','throughput','hsupa'];

                //alert(chart_type.length);

                switch(sheetname){
                    case 'regional_daily':
                        $.each(chart_type, function(key,val){                            
                            do_visualisation(sheetname,val,key);
                        });

                        break;

                    case 'rnc_daily':
                        break;

                    case 'rnc_hourly':
                        break;
                }

            }
            
            function do_visualisation(sheetname,chart_title,chart_idx){
                
                switch (chart_title) {
                    case 'accessibility':
                        idx_x=[51,52,53];
                        idx_y=[3,4,5];
                        draw_chart(chart_title,idx_x,idx_y,sheetname,chart_idx);
                        break;
                    case 'retainability':
                        idx_x=[27,29,31];
                        idx_y=[3,4,5];
                        draw_chart(chart_title,idx_x,idx_y,sheetname,chart_idx);
                        break;
                    case 'mobility':
                        idx_x=[56,55,57];
                        idx_y=[12,11,13];
                        draw_chart(chart_title,idx_x,idx_y,sheetname,chart_idx);
                        break;
                    case 'traffic':
                        //chart_title=[20,'PS DL payload(Mbytes) vs PS UL payload(Mbytes)',21];
                        idx_x=[0,20,0];
                        //trafic voice, ps dl payload, hsdpa payload
                        idx_y=[49,19,21];
                        draw_chart(chart_title,idx_x,idx_y,sheetname,chart_idx);
                        break;
                    case 'throughput':
                        //idx_x;
                        //chart_title=[15,17,18];
                        idx_y=[0,0,0,]
                        idx_x=[15,17,18];
                        draw_chart(chart_title,idx_x,idx_y,sheetname,chart_idx);
                        break;
                    case 'hsupa':
                        idx_x=[54,33,0];
                        idx_y=[6,6,22];
                        draw_chart(chart_title,idx_x,idx_y,sheetname,chart_idx);
                        break;
                        /*
                    case 'extra':
                        idx_x=;
                        idx_y=0;
                        break;
                        */
                    }
            }    
            
            function draw_chart(chart_title,idx_x,idx_y,sheetname,chart_idx){
                //alert(chart_title);
                for(i=0;i<3;i++){
                    /*
                    if(idx_x[i] == 0){
                        var url_data_x= null;
                        var url_chartName_x= null;
                        
                    }if(idx_y[i] == 0){
                        var url_data_y = null;
                        var url_chartName_y = null;

                    }else{

                        var url_data_x = '<?=site_url("admin/get_data_by_option"); ?>'+'/'+idx_x[i]+'/'+sheetname;
                        var url_data_y = '<?=site_url("admin/get_data_by_option"); ?>'+'/'+idx_y[i]+'/'+sheetname;
                        var url_chartName_x = '<?=site_url("admin/get_col_name"); ?>'+'/'+idx_x[i]+'/'+sheetname;
                        var url_chartName_y = '<?=site_url("admin/get_col_name"); ?>'+'/'+idx_y[i]+'/'+sheetname;

                    }*/
                    var url_data_x = '<?=site_url("admin/get_data_by_option"); ?>'+'/'+idx_x[i]+'/'+sheetname;
                    var url_data_y = '<?=site_url("admin/get_data_by_option"); ?>'+'/'+idx_y[i]+'/'+sheetname;
                    var url_chartName_x = '<?=site_url("admin/get_col_name"); ?>'+'/'+idx_x[i]+'/'+sheetname;
                    var url_chartName_y = '<?=site_url("admin/get_col_name"); ?>'+'/'+idx_y[i]+'/'+sheetname;
                    var chart_html = 'chart_'+i+'_'+chart_idx;
                    retrieving_data(url_data_x,url_data_y,url_chartName_x,url_chartName_y,chart_html);

                }
            }

            function retrieving_data(url_data_x,url_data_y,url_chartName_x,url_chartName_y,chart_html){

                $.getJSON(url_data_x).always(function(data_y){
                        $.getJSON(url_data_y).always(function(data_x){
                            $.getJSON(url_chartName_x).always(function(name_x){
                                //alert(name_x);
                                $.getJSON(url_chartName_y).always(function(name_y){

                                    //console.log(name_y);        
                                    if(name_y == 'Regional'){
                                        name_y = '';
                                    }
                                    if(name_x == 'Regional'){
                                        name_x = '';


                                    }

                                    chart_html = new Highcharts.Chart({
                                        chart: {
                                            renderTo: chart_html,
                                            zoomType: 'xy'
                                        },

                                        title: {
                                            text: name_x
                                        },
                                        xAxis: [{
                                            //floor: 0,
                                            //ceiling : 4500000000

                                        }],
                                        yAxis: [{
                                            title: {
                                                text: name_y
                                                
                                                
                                            }

                                        }, {
                                            //floor: 0,
                                            //max : 4500000000,
                                            
                                            title: {
                                                text: name_x
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
                                        series: [

                                         {
                                            name: name_x,
                                            type: 'column',
                                            data: data_y,
                                             yAxis: 1
                                                 },
                                        {
                                            name: name_y,
                                            data: data_x
                                        }]
                                    });
                                    $(".loading-data").fadeOut(1500).hide();
                                
                                });
                            });
                        });
                    });
            }
            

            
            
            //accessibility_chart('regional_daily');
            //alert(loadTable());
            //do_visualisation('regional_daily','accessibility');

            get_data_date('regional_daily');

            // this one is working
            //visualisation_by_sheetname('regional_daily');
            $("#menu-toggle").click(function(e) {
                 e.preventDefault();
                $("#wrapper").toggleClass("toggled");
            });
            $("#menu-toggle").click();
            
            
        });

        $( ".sheet_option" )
          .change(function () {
            var str = "";
            $( "select option:selected" ).each(function() {
              
              str += $( this ).text() + " ";
            });

            //console.log($( this ).val());
            
            if($( this ).val() != 'regional daily'){
                $(".sheet_conf").removeClass('hidden');
            }else{
                $(".sheet_conf").addClass('hidden');
            }

            //$( "div" ).text( str );

            
          })
          .change();

          function cb(start, end) {
                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            }
            cb(moment().subtract(29, 'days'), moment());

            $('#reportrange').daterangepicker({
                ranges: {
                   'Today': [moment(), moment()],
                   'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                   'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                   'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                   'This Month': [moment().startOf('month'), moment().endOf('month')],
                   'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                }
            }, cb);


		</script>


	</body>
</html>
