<script src="{{asset('admin/assets/js/vendor/jquery-2.1.4.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="{{asset('admin/assets/js/plugins.js')}}"></script>
    <script src="{{asset('admin/assets/js/main.js')}}"></script>

    <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('vendor/unisharp/laravel-ckeditor/adapters/jquery.js') }}"></script>
    


    <script src="{{asset('admin/assets/js/lib/chart-js/Chart.bundle.js')}}"></script>
    <script src="{{asset('admin/assets/js/dashboard.js')}}"></script>
    <script src="{{asset('admin/assets/js/widgets.jss')}}"></script>
    <script src="{{asset('admin/assets/js/lib/vector-map/jquery.vmap.js')}}"></script>
    <script src="{{asset('admin/assets/js/lib/vector-map/jquery.vmap.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/lib/vector-map/jquery.vmap.sampledata.js')}}"></script>
    <script src="{{asset('admin/assets/js/lib/vector-map/country/jquery.vmap.world.js')}}"></script>
    <script src="{{asset('admin/assets/js/lib/chosen/chosen.jquery.min.js')}}"></script>

    <script>
        jQuery(document).ready(function(){
            jQuery(".myselect").chosen({
            disable_search_threshold: 10,
            no_results_text: "Oops, nothing found!",
            width: "100%"
            });
        });
      </script>

<script>
    jQuery('textarea.my-editor').ckeditor({
              filebrowserImageBrowseUrl: '{{ url("/public") }}/laravel-filemanager?type=Images',
              filebrowserImageUploadUrl: '{{ url("/public") }}/laravel-filemanager/upload?type=Images&_token={{csrf_token()}}',
              filebrowserBrowseUrl: '{{ url("/public") }}/laravel-filemanager?type=Files',
              filebrowserUploadUrl: '{{ url("/public") }}/laravel-filemanager/upload?type=Files&_token={{csrf_token()}}'
          });
  </script>

    
    <script>
        ( function ( $ ) {
            "use strict";

            jQuery( '#vmap' ).vectorMap( {
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: [ '#1de9b6', '#03a9f5' ],
                normalizeFunction: 'polynomial'
            } );
        } )( jQuery );
</script>

