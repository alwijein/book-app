

<!DOCTYPE html>
<html lang="en">

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        {{-- Is requiret because i want use ajax --}}
        <meta name="csrf-token" content="{{ csrf_token() }}">


        <link rel="apple-touch-icon" sizes="76x76" href={{ asset('assets/img/apple-icon.png') }}>
        <link rel="icon" type="image/png" href={{ asset('assets/img/favicon.png') }}>
        <title>
            Tugas MID
        </title>
        <!--     Fonts and icons     -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
        <!-- Nucleo Icons -->
        <link href={{ asset('assets/css/nucleo-icons.css') }} rel="stylesheet" />
        <link href={{ asset('assets/css/nucleo-svg.css') }} rel="stylesheet" />
        <!-- Font Awesome Icons -->
        <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>

        <link href={{ asset('assets/css/nucleo-svg.css') }} rel="stylesheet" />
        <!-- CSS Files -->
        <link id="pagestyle" href={{ asset('assets/css/soft-ui-dashboard.css?v=1.0.9') }} rel="stylesheet" />
</head>

<body class="g-sidenav-show  bg-gray-100">

        {{-- Start Content --}}
        <div class="container-fluid py-4">

            @yield('content')

        </div>
        {{-- End Content --}}
    </main>

    <!--   Core JS Files   -->
    <script src={{ asset('assets/js/core/popper.min.js') }}></script>
    <script src={{ asset('assets/js/core/bootstrap.min.js') }}></script>
    <script src={{ asset('assets/js/plugins/perfect-scrollbar.min.js') }}></script>
    <script src={{ asset('assets/js/plugins/smooth-scrollbar.min.js') }}></script>
    <script src={{ asset('assets/js/plugins/choices.min.js') }}></script>
    <script src={{ asset('assets/js/plugins/quill.min.js') }}></script>
    <script src={{ asset('assets/js/plugins/flatpickr.min.js') }}></script>
    <script src={{ asset('assets/js/plugins/dropzone.min.js') }}></script>

    <script src={{ asset('assets/js/plugins/fullcalendar.min.js') }}></script>

    <!-- Kanban scripts -->
    <script src={{ asset('assets/js/plugins/dragula/dragula.min.js') }}></script>
    <script src={{ asset('assets/js/plugins/jkanban/jkanban.js') }}></script>
    <script src={{ asset('assets/js/plugins/chartjs.min.js') }}></script>
    <script src={{ asset('assets/js/plugins/threejs.js') }}></script>
    <script src={{ asset('assets/js/plugins/orbit-controls.js') }}></script>



    @yield('additional-script')


    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>

    {{-- Start Script for Choice --}}
    <script>
        if (document.getElementById('choices-multiple-remove-button')) {
            var element = document.getElementById('choices-multiple-remove-button');
            const example = new Choices(element, {
                removeItemButton: true
            });
        }
    </script>
    {{-- End Script for Choice --}}

    {{-- Start Script for Datetimepicker --}}
    <script>
        if (document.querySelector('.datetimepicker')) {
            flatpickr('.datetimepicker', {
                allowInput: true,
            }); // flatpickr
        }

        if (document.querySelector('.timepicker')) {
            flatpickr('.timepicker', {
                allowInput: true,
                enableTime: true,
                noCalendar: true,
                dateFormat: "H:i",
            });
        }
    </script>
    {{-- End Script for Datetimepicker --}}


    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src={{ asset('assets/js/soft-ui-dashboard.min.js?v=1.0.9') }}></script>
</body>

</html>
