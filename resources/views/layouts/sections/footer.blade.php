<!-- BEGIN: Footer-->
<footer class="footer footer-static footer-light">
    <p class="clearfix mb-0"><span class="float-md-left d-block d-md-inline-block mt-25">COPYRIGHT  &copy; 2021<a class="ml-25" href="{{ route ('home')}} " target="_blank">Autodidacta</a></p>
  </footer>
  <!-- END: Footer-->

  <!-- BEGIN: Vendor JS-->
  <script src="{{ asset('app-assets/vendors/js/vendors.min.js') }}"></script>
  <!-- BEGIN Vendor JS-->

  <!-- BEGIN: Page Vendor JS-->
  <script src="{{ asset('app-assets/vendors/js/ui/jquery.sticky.js') }}"></script>
  <!-- END: Page Vendor JS-->

  <!-- BEGIN: Theme JS-->
  <script src="{{ asset('app-assets/js/core/app-menu.min.js') }}"></script>
  <script src="{{ asset('app-assets/js/core/app.min.js') }}"></script>
  <script src="{{ asset('app-assets/js/scripts/customizer.min.js') }}"></script>
  <!-- END: Theme JS-->

  <!-- BEGIN: Page JS-->
  <!-- END: Page JS-->
  <script>
    $(window).on('load',  function(){
      if (feather) {
        feather.replace({ width: 14, height: 14 });
      }
    })
  </script>
  <script>
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove(); 
        });
    }, 4000);
</script>