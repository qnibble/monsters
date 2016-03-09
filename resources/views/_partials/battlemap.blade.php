<!DOCTYPE html>
<html>
    <head>
        <title>Battlemap</title>

        <link href="https://fonts.googleapis.com/css?family=Raleway:100" rel="stylesheet" type="text/css">
        <link href="css/bootstrap.min.css" rel="stylesheet">

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
                /*border-color: blue !important;*/
                /*border-width: 1px !important;*/
                /*border-style: solid !important;*/
                background-color: blue;
            }

            .battleTile {
                width:100px; 
                height:100px;
            }
            .aside-backdrop {
                position: initial !important;
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

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/vue.min.js"></script>
        <script src="js/vue-strap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/0.7.0/vue-resource.min.js"></script>

        @yield('scripts')
        
    </body>
</html>
