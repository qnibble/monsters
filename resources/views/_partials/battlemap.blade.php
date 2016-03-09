<!DOCTYPE html>
<html>
    <head>
        <title>Battlemap</title>

        <link href="https://fonts.googleapis.com/css?family=Raleway:100" rel="stylesheet" type="text/css">
        {!! Html::style("css/bootstrap.min.css") !!}

        <style>
            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .selectedCell {
                border-color: red !important;
                border-width: 5px !important;
                border-style: solid !important;
            }

            .inMovementRange {
                background-color: blue;
            }

            .battleTile {
                width:100px; 
                height:100px;
            }
        </style>
    </head>
    <body>
        <div class="wrapper white-navbar">
        </div>
        
        <?php // @include('errors.list') ?>

        <div class="main-content">
            @yield('content')
        </div>

        {!! Html::script("js/jquery-2.2.1.js") !!}
        {!! Html::script("js/vue.min.js") !!}
        {!! Html::script("js/vue-strap.min.js") !!}
        {!! Html::script("js/vue-resource.min.js") !!}

        @yield('scripts')
        
    </body>
</html>
