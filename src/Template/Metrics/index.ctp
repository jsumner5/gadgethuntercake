<?php
/**
 * @var \App\View\AppView $this
 */
?>

<!DOCTYPE html>
<title>Dash.ctp</title>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Return to Dash'), ['controller' => 'pages', 'action' => 'display', 'dash']) ?></li>
    </ul>
</nav>
<div class="items index large-9 medium-8 columns content">
    <h3><?= $this->Html->link(__('Dashboard'), ['controller'=>'pages','action' => 'display', 'dash'])  ?></h3>
    <html>
    <head>
        <!--Load the AJAX API-->
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <!--         load this script into some file-->
        <script type="text/javascript">

            // Load the Visualization API and the piechart package.
            google.charts.load('current', {'packages':['corechart']});

            // Set a callback to run when the Google Visualization API is loaded.
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {

                var  pieChart =   {
                    "cols": [
                        {"id":"","label":"Topping","pattern":"","type":"string"},
                        {"id":"","label":"Slices","pattern":"","type":"number"}
                    ],
                    "rows": [
                        <?php foreach ($this->viewVars['users'] as $user){
                        // change 3 to the number of posts
                        echo ('{"c":[{"v":"'. trim($user['name']).'","f":null},{"v":'.trim($user['item_post_count']).',"f":null}]},');
                    }
                        ?>
                    ]
                }

                // Create our data table out of JSON data loaded from server.
                var data = new google.visualization.DataTable(pieChart);
                // Instantiate and draw our chart, passing in some options.
                var chart = new google.visualization.PieChart(document.getElementById('chart_items_user'));
                chart.draw(data, {width: 400, height: 240});
            }

        </script>
    </head>

    <body>
    <!--Div that will hold the pie chart-->
    <table>
        <thead>
        <th>Item Posts By User</th>
        <th>Visitor Metrics</th>
        </thead>
        <tbody>
        <tr><td id="chart_items_user"></td></tr>
        <tr><td id="chart_visitors"></td></tr>
        </tbody>
    </table>






    <!-- Step 1: Create the containing elements. -->

    <section id="auth-button"></section>
    <section id="view-selector"></section>
    <section id="userSources"></section>
    <section id="dataChart1"></section>
    <section id="userCities"></section>



    <!-- Step 2: Load the library. -->
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>


    <script>
        (function(w,d,s,g,js,fjs){
            g=w.gapi||(w.gapi={});g.analytics={q:[],ready:function(cb){this.q.push(cb)}};
            js=d.createElement(s);fjs=d.getElementsByTagName(s)[0];
            js.src='https://apis.google.com/js/platform.js';
            fjs.parentNode.insertBefore(js,fjs);js.onload=function(){g.load('analytics')};
        }(window,document,'script'));
    </script>

    <script>
        gapi.analytics.ready(function() {

            // Step 3: Authorize the user.

            var CLIENT_ID = '1082994385875-v56jf3jkghmf8dlb5ero1rbq1ivoaf3b.apps.googleusercontent.com';

            gapi.analytics.auth.authorize({
                container: 'auth-button',
                clientid: CLIENT_ID,
            });

            // Step 4: Create the view selector.

            var viewSelector = new gapi.analytics.ViewSelector({
                container: 'view-selector'
            });

            // Step 5: Create the user sources chart.

            var userSources = new gapi.analytics.googleCharts.DataChart({
                reportType: 'ga',
                query: {
                    'dimensions': 'ga:source',
                    'metrics': 'ga:users',
                    'start-date': '14daysAgo',
                    'end-date': 'today',
                    'sort': '-ga:source',
                    'max-results': '10'
                },
                chart: {
                    type: 'PIE',
                    container: 'userSources',
                    options:{
                        title: 'Top Sources (last 14 days)',
                        width: '100%',
                        pieHole: 4/9
                    },
                }

            });

            var userCities = new gapi.analytics.googleCharts.DataChart({
                reportType: 'ga',
                query: {
                    'dimensions': 'ga:city',
                    'metrics': 'ga:sessions',
                    'start-date': '30daysAgo',
                    'end-date': 'today',
                    'sort': '-ga:sessions',
                    'max-results': '10'
                },
                chart: {
                    type: 'PIE',
                    container: 'userCities',
                    options:{
                        title: 'Top Cities (last 30 days)',
                        width: '100%',
                        pieHole: 4/9
                    },
                }

            });

            var dataChart1 = new gapi.analytics.googleCharts.DataChart({
                query: {
                    metrics: 'ga:sessions',
                    dimensions: 'ga:operatingsystem',
                    'start-date': '30daysAgo',
                    'end-date': 'today',
                },
                chart: {
                    container: 'dataChart1',
                    type: 'PIE',
                    options: {
                        width: '100%',
                        pieHole: 4/9,
                        title: 'Top Operating Systems (last 30 days)',
                    }
                }
            });

            // Step 6: Hook up the components to work together.

            gapi.analytics.auth.on('success', function(response) {
                viewSelector.execute();
            });

            viewSelector.on('change', function(ids) {
                var newIds = {
                    query: {
                        ids: ids
                    }
                }
                userSources.set(newIds).execute();
                dataChart1.set(newIds).execute();
                userCities.set(newIds).execute();
            });
        });
    </script>




    </body>
    </html>

