@extends('intranet.app')



@section('content')


@endsection

@section('scripts')

    {!! Html::Script('plugins/jqvmap/dist/jquery.vmap.js')!!}
    {!! Html::Script('plugins/jqvmap/dist/maps/jquery.vmap.world.js')!!}
    {!! Html::Script('plugins/jqvmap/examples/js/jquery.vmap.sampledata.js')!!}

  <script type="text/javascript">
        var unique_id = $.gritter.add({
            // (string | mandatory) the heading of the notification
            title: 'Bienvenido {{Auth::user()->name}}',
            // (string | mandatory) the text inside the notification
            text: 'Hover me to enable the Close Button. You can hide the left sidebar clicking on the button next to the logo. Free version for <a href="http://blacktie.co" target="_blank" style="color:#ffd777">BlackTie.co</a>.',
            // (string | optional) the image to display on the left
            image: ' {{Auth::user()->avatar}}',
            // (bool | optional) if you want it to fade out on its own or just sit there
            sticky: false,
            // (int | optional) the time you want it to be alive for before fading out
            time: 7000,
            // (string | optional) the class name you want to apply to that specific message
            class_name: 'my-sticky-class'
        });
  </script>

    <script>
      jQuery(document).ready(function () {
        jQuery('#vmap').vectorMap({
          map: 'world_en',
          backgroundColor: '#333333',
          color: '#ffffff',
          hoverOpacity: 0.7,
          selectedColor: '#666666',
          enableZoom: true,
          showTooltip: true,
          scaleColors: ['#C8EEFF', '#006491'],
          values: sample_data,
          normalizeFunction: 'polynomial'
        });
      });
    </script>




@endsection

@section('styles')

    {!! Html::Style('plugins/jqvmap/dist/jqvmap.css')!!}


@endsection


