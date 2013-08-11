<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml&quot;" >

<head>

    <title>Graphing JS</title>

    <script src="js/jquery-1.10.2.js"></script>

    <script src="js/canvasjs.js"></script>


    <script type="text/javascript">

        $(document).ready(function () {

            $.getJSON("selectUser3.php", function (result) {

                var chart = new CanvasJS.Chart("chartContainer", {

                    data: [

                        {

                            dataPoints: result

                        }

                    ]

                });

                chart.render();

            });

        });

    </script>

</head>

<body>

    <div id="chartContainer" style="width: 800px; height: 380px;"></div>

</body>

</html>