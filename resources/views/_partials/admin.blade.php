<!DOCTYPE html>
<html>
    <head>
        <title>Admin View</title>

        {!! Html::style("css/bootstrap.min.css") !!}
        {!! Html::style("css/select2.min.css") !!}
        @yield('styles')
        
    </head>
    <body>
        <div class="wrapper white-navbar">
            @include('_partials.navbar')
        </div>
        <br><br><br>
        <div class="wrapper-content">
            <ol class="breadcrumb">
                <li><a href="/">Home</a></li>
                <?php
                    $link = '';
                    $segments = Request::segments();
                    $segments_count = count($segments);
                ?>
                @for($i = 1; $i <= $segments_count; $i++)
                    <?php
                        $text = ucwords(str_replace('-', ' ', Request::segment($i)));
                        $link .= Request::segment($i) .'/';
                    ?>
                    @if($i == $segments_count)
                        <li class="active">
                            {{ is_numeric($text) ? "ID #{$text}" : $text }}
                        </li>
                    @else
                        <li>
                            <a href="{{ url("{$link}") }}">
                                {{ is_numeric($text) ? "ID #{$text}" : $text }}
                            </a>
                        </li>
                    @endif
                @endfor
            </ol>
        </div>
        
        <?php // @include('errors.list') ?>

        <div class="main-content container-fluid">
            @yield('content')
        </div>

        {!! Html::script("js/jquery-2.2.1.js") !!}
        {!! Html::script("js/bootstrap.min.js") !!}
        {!! Html::script("js/vue.min.js") !!}
        {!! Html::script("js/jquery.dataTables.min.js") !!}
        {!! Html::script("js/select2.min.js") !!}

        <script type="text/javascript">
            $('.select2').select2({
                minimumResultsForSearch: 5
            });

            // $('.force-number').keydown(function(event) { // Direct Binding (Only catches elements created on page load)
            $('body').on('keydown', 'input.force-number', function(event) { // Delegated Binding (Catch all)
                var key = event.which || event.keyCode;
                // 116 = F5
                // when a keydown event occurs on the 0-9 keys the value
                // of the "which" property is between 48 - 57
                // therefore anything with a value greater than 57 is NOT a numeric key

                if ( key > 57 && key < 96 || key > 105) {
                    event.preventDefault();

                } else if (key < 48) {

                // we don't want to disable left arrow (37), right arrow (39), delete (8) or tab (9)
                // otherwise the user cannot correct their entry or tab into the next field!

                    if (key != 8 && key != 9 && key != 37 && key != 39) {
                        event.preventDefault();
                    }
                }
            });
        </script>

        @yield('scripts')

        <script>
            $("[data-toggle='tooltip']").each(function (index, el) {
                $(el).tooltip({
                    placement: $(this).data("placement") || 'top',
                    html: true
                });
            });
        </script>
        
    </body>
</html>
