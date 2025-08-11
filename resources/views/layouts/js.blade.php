
<!-- BEGIN: Vendor JS-->
<script src="{{ asset('app-assets/vendors/js/vendors.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<script src="{{ asset('app-assets/vendors/js/charts/apexcharts.min.js') }}"></script>
<script src="{{ asset('app-assets/vendors/js/extensions/tether.min.js') }}"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="{{ asset('app-assets/js/core/app-menu.js') }}"></script>
<script src="{{ asset('app-assets/js/core/app.js') }}"></script>
<script src="{{ asset('app-assets/js/scripts/components.js') }}"></script>
<script src="{{ asset('app-assets/js/core/libraries/jquery.min.js') }}"></script>
<script src="{{ asset('app-assets/js/scripts/datatables/jquery.dataTables.js') }}"></script>
<!-- END: Theme JS-->

<script defer src="https://maps.googleapis.com/maps/api/js?v=3&key={config}&callback=Function.prototype"></script>
<script src="https://unpkg.com/interact.js@1.2.8/dist/interact.min.js"></script>
<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"></script>
<script src="https://unpkg.com/leaflet.gridlayer.googlemutant@0.10.0/Leaflet.GoogleMutant.js">
<script defer src="{{ asset('assets/vendors/leaflet/leaflet.js') }}"></script>

<!-- BEGIN: Page JS-->
@stack('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    var _token = "<?php echo e(csrf_token()); ?>";

    @if (session('error'))
    toastr.error("{{ session('error') }}");
    @endif
    @if (session('success'))
    toastr.success("{{ session('success') }}");
    @endif
    @if ($errors->any())
    @foreach ($errors->all() as $error)
    toastr.error("{{ $error }}");
    @endforeach

    function generateToast(type, heading, message, time=8000, position="top-right") {
        $.toast({
            heading: heading,
            text: message,
            position: position,
            loaderBg: '#ff6849',
            icon: type,
            hideAfter: time,
            stack: 6
        });
    }

</script>
@endif
</script>
<!-- END: Page JS-->
