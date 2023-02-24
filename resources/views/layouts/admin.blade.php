<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('admin/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/vendors/base/vendor.bundle.base.css') }}">

    <link rel="stylesheet" href="{{ asset('admin/vendors/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/vendors/select2/select2-bootstrap.min.css') }}">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('admin/images/favicon.png') }}" />

    @livewireStyles

    @stack('style')
</head>
<body>
    <div class="container-scroller">
        @include('layouts.includes.admin.navbar')

        <div class="container-fluid page-body-wrapper">
            @include('layouts.includes.admin.sidebar')

            <div class="main-panel">
                <div class="content-wrapper">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- plugins:js -->
    <script src="{{ asset('admin/vendors/base/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('admin/vendors/select2/select2.min.js') }}"></script>
    
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <script src="{{ asset('admin/vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/datatables.net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="{{ asset('admin/js/off-canvas.js') }}"></script>
    <script src="{{ asset('admin/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('admin/js/template.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{{ asset('admin/js/dashboard.js') }}"></script>
    <script src="{{ asset('admin/js/data-table.js') }}"></script>
    <script src="{{ asset('admin/js/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('admin/js/dataTables.bootstrap4.js') }}"></script>
    <!-- End custom js for this page-->
    <script src="{{ asset('admin/vendors/select2/select2.js') }}"></script>

    @livewireScripts
    <script>
        $(function() {
            $('.generate-slug').keyup(function(e) {
                var val = $(this).val();
                var slug = convertToSlug(val);
                $('.name-slug').val(slug);
            })
        })
        /* Encode string to slug */
        function convertToSlug(Text) {
            return Text.toLowerCase()
                    .replace(/ /g, '-')
                    .replace(/[^\w-]+/g, '');
        }

		$(function() {
        //     $('ul.nav .nav-item .collapse').removeClass("show");
		// 	$('ul.nav .nav-item').removeClass("active");
		// 	$('ul.nav .nav-link').removeClass("active");
		// 	$('ul.nav .sub-menu').removeClass("active");

			var url = window.location.href;
            $('ul.nav .nav-item').removeClass("active");
            $('ul.nav .nav-item').find('.collapse').removeClass("show");
			$("ul.nav li.nav-item").each(function(index, e) {
				if($(this).find('.nav-link').attr("href") == url) {
                    console.log(111);
                    $(this).parents('nav-item').addClass("active");
                    $(this).find('.collapse').addClass("show");
		// 			$(this).addClass("show");
		// 			$(this).addClass("active");
		// 			$(this).find('.nav-link').addClass("active");
		// 		}
		// 		$(this).find('li.sub-menu').each(function() {
		// 			if($(this).find('.nav-link').attr("href") == url) {
		// 				$(this).parents('.nav-item').addClass("show")
		// 				$(this).parents('.nav-item').addClass("active")
		// 				$(this).addClass("active");
		// 				$(this).find('.nav-link').addClass("active");
					}
				// })
			})
		})
    </script>
    @stack('script')
</body>
</html>