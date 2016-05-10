<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Highcharts Example</title>

        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <style type="text/css">
${demo.css}
        </style>
        <script type="text/javascript">
    $(function () {
        $('#container').highcharts(
            {!! json_encode($yourFirstChart) !!}
        );
    })
        </script>
  </head>
  <body>
<script src="{{ asset('high/js/highcharts.js') }}"></script>
<script src="{{ asset('high/modules/exporting.js') }"></script>

<div id="container" style="min-width: 310px; max-width: 800px; height: 400px; margin: 0 auto"></div>

  </body>
</html>








