<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    @yield('css')
    <title>Angkasa Badminton Centre - @yield('title')</title>
</head>

<body class="bg-gray-100">
    {{-- Navbar --}}
    @include('theme.navbar')
    {{-- End Navbar --}}
    <div class="max-w-3xl mx-auto bg-gray-100 rounded-md min-h-screen overflow-hidden">
        {{-- Content --}}
        <div id="content" class="px-8 py-4 mb-20 relative">
            {{-- Header --}}
            <div class="flex justify-between align-middle items-center relative" style="z-index: 100">
                <div id="logo" class="flex-shrink-0">
                </div>
                @auth
                <div class="flex-1 flex flex-col">
                    <div style="z-index: 100"
                        class="bg-white px-3 py-4 rounded-md shadow-2xl absolute right-0 top-12 w-full transition duration-500 hidden"
                        id="notification-card">
                        <div class="notification-content border-b pb-3">
                                <h1 class="font-medium text-gray-600 py-2">
                                    Welcome to Angkasa Badminton Centre!
                                </h1>
                            {{-- <a href="">
                                <p class="font-medium text-gray-600 py-2">
                                    Booking telah dikonfirmasi!
                                </p>
                                <p class="text-sm text-gray-500">
                                    Pembayaran anda telah dikonfirmasi. Periksa
                                </p>
                                <p class="text-right text-gray-500 text-sm">
                                    1 jam yang lalu
                                </p>
                            </a> --}}
                        </div>
                    </div>

                </div>
                @endauth
            </div>
            {{-- End of Header --}}
            {{-- Content --}}
            @yield('content')
            {{-- End of Content --}}
        </div>
    </div>
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    {{-- Font Awesome --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"
        integrity="sha512-RXf+QSDCUQs5uwRKaDoXt55jygZZm2V++WUZduaU/Ui/9EGp3f/2KZVahFZBKGH0s774sd3HmrhUy+SgOFQLVQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- Sweetalert2 --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        let toastr = (type, msg, btn = null) => {
            Swal.fire({
                icon: type,
                html: msg,
                showConfirmButton: (btn == null ? false : true),
                confirmButtonText: btn,
            })
        }
    </script>
    <script>
        $(document).ready(function () {
            let isNotifOpen = false;
            $('#btn-notification').click(function () {
                if (!isNotifOpen) {
                    $(this).addClass('text-primary').removeClass('text-gray-400');
                    $('#notification-card').removeClass('hidden');
                } else {
                    $(this).removeClass('text-primary').addClass('text-gray-400');
                    $('#notification-card').addClass('hidden');
                }
                isNotifOpen = !isNotifOpen;
            })
        })
    </script>
    @yield('js')
    @if ($msg = session()->get('success'))
    <script>
        toastr('success', `{{ $msg }}`);
    </script>
    @elseif ($msg = session()->get('errors'))
    <script>
        toastr('error', `{!! $msg !!}`, `Saya Paham`);
    </script>
    @endif
</body>

</html>