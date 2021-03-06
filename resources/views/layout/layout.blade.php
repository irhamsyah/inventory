<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <!-- {{-- CSS STYLE --}} -->
        <link rel="stylesheet" href="{{URL::asset('css/style.css')}}" />
        {{-- DATEPICKER JQUERY --}}
        <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="/resources/demos/style.css">
        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
        <script>
        $( function() {
        $( "#datepicker" ).datepicker();
        } );
        </script>
        {{-- BATAS DATEPICKER --}}
        <title>Aplikasi Administrasi Inventaris</title>
    </head>
    <body>
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container">
                    <a class="navbar-brand" href="#"
                        >Aplikasi Administrasi Inventaris</a
                    >
                    <button
                        class="navbar-toggler"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent"
                        aria-expanded="false"
                        aria-label="Toggle navigation"
                    >
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div
                        class="collapse navbar-collapse"
                        id="navbarSupportedContent"
                    >
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-auto">
                            <li class="nav-item">
                                <a
                                    class="nav-link active"
                                    aria-current="page"
                                    href="#"
                                    >Home</a
                                >
                            </li>
                            {{-- Menu Aplikasi  --}}
                            <li class="nav-item dropdown">
                                <a
                                    class="nav-link dropdown-toggle"
                                    href="#"
                                    id="navbarDropdown"
                                    role="button"
                                    data-bs-toggle="dropdown"
                                    aria-expanded="false"
                                >
                                    Menu Aplikasi
                                </a>
                                <ul
                                    class="dropdown-menu"
                                    aria-labelledby="navbarDropdown"
                                >
                                    <li>
                                        <a
                                            class="dropdown-item"
                                            href="{{
                                                route('inputdatakomputer')
                                            }}"
                                            >Input Data Komputer</a
                                        >
                                    </li>
                                    <li><hr class="dropdown-divider" /></li>
                                    <li>
                                        <a
                                            class="dropdown-item"
                                            href="{{
                                                route('forminputprinter')
                                            }}"
                                            >Input Data Printer</a
                                        >
                                    </li>
                                    <li><hr class="dropdown-divider" /></li>
                                    <li>
                                        <a
                                            class="dropdown-item"
                                            href="{{
                                                route('forminputhpaompantas')
                                            }}"
                                            >Input Data HP AOM</a
                                        >
                                    </li>
                                    <li><hr class="dropdown-divider" /></li>
                                    <li>
                                        <a
                                            class="dropdown-item"
                                            href="{{
                                                route('forminputpinjampclaptop')
                                            }}"
                                            >Input Data Pinjam Komputer</a
                                        >
                                    </li>

                                </ul>
                            </li>
                            {{-- Menu View melihat data --}}
                            <li class="nav-item dropdown">
                                <a
                                    class="nav-link dropdown-toggle"
                                    href="#"
                                    id="navbarDropdown"
                                    role="button"
                                    data-bs-toggle="dropdown"
                                    aria-expanded="false"
                                >
                                    Menu View Data Input
                                </a>
                                <ul
                                    class="dropdown-menu"
                                    aria-labelledby="navbarDropdown"
                                >
                                    <li>
                                        <a
                                            class="dropdown-item"
                                            href="{{
                                                route('viewdatakomputer')
                                            }}"
                                            >View Data Komputer</a
                                        >
                                    </li>
                                    <li><hr class="dropdown-divider" /></li>
                                    <li>
                                        <a
                                            class="dropdown-item"
                                            href="{{
                                                route('viewdataprinter')
                                            }}"
                                            >View Data Printer</a
                                        >
                                    </li>
                                    <li><hr class="dropdown-divider" /></li>
                                    <li>
                                        <a
                                            class="dropdown-item"
                                            href="{{
                                                route('viewdatahpaom')
                                            }}"
                                            >Viwe Data HP AOM</a
                                        >
                                    </li>
                                </ul>
                            </li>      
                            {{-- Menu Print Report --}}
                            <li class="nav-item dropdown">
                                <a
                                    class="nav-link dropdown-toggle"
                                    href="#"
                                    id="navbarDropdown"
                                    role="button"
                                    data-bs-toggle="dropdown"
                                    aria-expanded="false"
                                >
                                    Menu Report
                                </a>
                                <ul
                                class="dropdown-menu"
                                aria-labelledby="navbarDropdown"
                                >
                                <li>
                                    <a
                                        class="dropdown-item"
                                        href="{{
                                            route('viewdatabakomputer')
                                        }}"
                                        >View BA Pinjam Komputer</a
                                    >
                                </li>
                            </ul>
                            </li>               
                        </ul>
                    </div>
                </div>
            </nav>
            @yield('content')
        </div>
        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
