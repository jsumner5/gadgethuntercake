<?php
/**
  * @var \App\View\AppView $this
  */
?>
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
                            echo ('{"c":[{"v":"'.trim($user['name']).'","f":null},{"v":'.trim($user['item_post_count']).',"f":null}]},');

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
            <th> Item Posts By User</th>
            <th> Visitor Metrics</th>
        </thead>
        <tbody>
            <tr><td id="chart_items_user"></td></tr>
            <tr><td id="chart_visitors"></td></tr>
        </tbody>

    </table>
    </body>
    </html>

