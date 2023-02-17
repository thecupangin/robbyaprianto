<!-- Pace -->
<script src="{{ asset('assets/js/pace.min.js') }}"></script>

<!-- Tinymce -->
<script src="{{ asset('assets/js/tinymce/tinymce.min.js') }}"></script>

<!-- Toastr -->
<script src="{{ asset('assets/js/toastr.min.js') }}"></script>

<!-- Sweetalert2 -->
<script src="{{ asset('assets/js/sweetalert2.min.js') }}"></script>

<!-- Theme JS -->
<script src="{{ asset('assets/js/main-dashboard.min.js') }}"></script>

<script>
   (function( $ ) {
      "use strict";

          jQuery(".btn-toggle-dir").click(function(){
              jQuery.ajax({
                  type : 'get',
                  url : '{{ url('/') }}/dir/mode',
                  success: function(e) {
                      window.location.reload();
                  }
              });
          });

  })( jQuery );
</script>

<script>
 (function( $ ) {
    "use strict";

        jQuery(".btn-toggle-mode").click(function(){
            jQuery.ajax({
                type : 'get',
                url : '{{ url('/') }}/theme/mode',
                success: function(e) {
                    window.location.reload();
                }
            });
        });

	})( jQuery );
</script>
