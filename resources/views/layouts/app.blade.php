<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <!-- Kendo -->

    <link rel="stylesheet" href="https://kendo.cdn.telerik.com/themes/6.6.0/default/default-main.css" />

    {{-- <script src="https://kendo.cdn.telerik.com/2023.2.718/js/jquery.min.js"></script> --}}
    {{-- <script src="https://kendo.cdn.telerik.com/2023.2.718/js/jszip.min.js"></script> --}}
    <script src="https://kendo.cdn.telerik.com/2023.2.718/js/kendo.all.min.js"></script>

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">Masuk</a>
                                </li>
                            @endif

                            <!-- @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">Daftar</a>
                                </li>
                            @endif -->
                        @else
                            @if( Auth::user()->role_id == 1 )
                            @else
                            <li class="nav-item">
                                <a class="nav-link {{ request()->segment(1) == 'home' ? 'active' : 'link-dark' }}" href="{{ route('home') }}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->segment(1) == 'data-orang-tua' ? 'active' : 'link-dark' }}" href="{{ route('data-orang-tua') }}">Data Orang Tua</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->segment(1) == 'berkas' ? 'active' : 'link-dark' }}" href="{{ route('berkas') }}">Berkas</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->segment(1) == 'informasi' ? 'active' : 'link-dark' }}" href="{{ route('informasi') }}">Informasi</a>
                            </li>
                            @endif
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Keluar
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="bg-content">
            @yield('content')
        </main>

        <div id="footer-replacer" style="height:50px;">
            &nbsp;
        </div>

    </div>
    <nav class="footer bg-white fixed-bottom">
        <div class="row">
            <div class="col-md-12 text-center">
                Abdil Tegar Arifin © 2023
            </div>
        </div>
    </nav>

    {{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> --}}
    
    {{-- <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script> --}}
    
    <script src="https://kendo.cdn.telerik.com/2023.2.718/js/kendo.all.min.js"></script>

    <script>
        var bulanIndo = ['', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September' , 'Oktober', 'November', 'Desember'];

        const indoDateTime = (datetime) => {
            if (datetime) {
                try {
        
                    var date = datetime.split('T')[0];
                    var time = datetime.split('T')[1];
                    
                    var tanggal = date.split('-')[2];
                    var bulan = date.split('-')[1];
                    var tahun = date.split('-')[0];

                    var jam = time.split(':')[0];
                    var menit = time.split(':')[1];
                    
                    return tanggal+" "+bulanIndo[bulan.replace(/^0+/, '')]+" "+ tahun +" "+ jam +":"+ menit;
                } catch (error) {
                    return '';
                }
            }
            return '';
        }

        const indoDate = (datetime) => {
            if (datetime) {
                try {
        
                    var date = datetime.split('T')[0];
                    
                    var tanggal = date.split('-')[2];
                    var bulan = date.split('-')[1];
                    var tahun = date.split('-')[0];
                    
                    return tanggal+" "+bulanIndo[bulan.replace(/^0+/, '')]+" "+ tahun;
                } catch (error) {
                    return '';
                }
            }
            return '';
        }
    </script>
</body>
</html>
