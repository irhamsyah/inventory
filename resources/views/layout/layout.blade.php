<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <!-- {{-- CSS STYLE --}} -->
        <link rel="stylesheet" href="{{asset('css/style.css')}}" />
        {{-- DATEPICKER JQUERY --}}
        <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="/resources/demos/style.css">
        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
        {{-- <script src="{{asset('js/jquery-3.6.1.min.js')}}"></script> --}}

        {{-- DATA TABLE STUFF --}}
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
        {{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> --}}
        <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
        {{-- batas DATA TABLE STUFF--}}
        
        <script type="text/javascript">
                var n=1;

            $(document).ready(function() {  
                $('#example').DataTable();
            } );
// Tanggalan
        $( function() {
        $( "#datepicker" ).datepicker();
        } );

        $( function() {
        $( "#datepicker2" ).datepicker();
        } );

// 
        function yesnoCheck(that) {
            if (that.value == "Kepala Cabang") {
        // alert("check");
            document.getElementById("ifYes").style.display = "flex";
            } 
            else 
            {
                document.getElementById("ifYes").style.display = "none";
            }
            }

        function checkTypePC(that) 
        {
            if(that.value=="PC")
            {
                document.getElementById("ifYes").style.display = "flex";
            }else{
                document.getElementById("ifYes").style.display = "none";

            }
        }
        // MEMUNCULKAN VALUE SELECT PADA TEXT BOX 
        function showname() {
            var text = document.getElementById("item").value;
            document.getElementById("kodebrg").value=text.substring(0,text.indexOf("-"));;
            document.getElementById("nmbrg").value=text.substring(text.indexOf("+")+1);;

            document.getElementById("kodesatuan").value=text.substring((text.indexOf('-')+1),(text.indexOf('+')));
        }
        //Fungsi mengalikan Harga Barang dengan jumlah Item barang yang dibeli
        function kali(){
            let jml = document.getElementById("jml").value;
            let harga = document.getElementById("harga").value;
            document.getElementById("total").value=jml*harga;
        }

        function kembalianuang(){
            
                // ---------------
            let number;
            let totbeli = document.getElementById("totbeli").value;
            let uang = document.getElementById("uang").value;
            number=uang-totbeli;
            document.getElementById("kembalian").value=number.toLocaleString('in-ID');
        }


        // MODUL UNTUK MENNGUNAKAN TOMBOL PLUS DAN MINUS
        function kliktambah(){
            n=n+1;
            if(document.getElementById("sisastok").value<n)
            {
                document.getElementById("input").value = document.getElementById("sisastok").value;

            }
            else{
                document.getElementById("input").value=n;

            }
        }

        function klikkurang(){

            if(n>1)
            {
                n=n-1;
                document.getElementById("input").value=n;
            }
            else
            {
                document.getElementById("input").value=1;
            }
        }

        // 
        // MEMFORMAT ANGKA SETIAP KETIKAN
        </script>
        {{-- BATAS DATEPICKER --}}
        <title>Aplikasi POS Minimarket</title>
    </head>
    <body>
        {{-- <div class="container"> --}}
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container">

                    {{-- Judul Dashboard --}}
                    <a class="navbar-brand" href="#"
                        >Aplikasi POS Minimarket</a
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
                                    href="{{route('home2')}}"
                                    >Home</a
                                >
                            </li>
                            {{-- Menu Inisiasi ----}}
                            <li class="nav-item dropdown">
                                <a
                                    class="nav-link dropdown-toggle"
                                    href="#"
                                    id="navbarDropdown"
                                    role="button"
                                    data-bs-toggle="dropdown"
                                    aria-expanded="false"
                                >
                                    Menu Inisiasi
                                </a>
                                <ul
                                    class="dropdown-menu"
                                    aria-labelledby="navbarDropdown"
                                >
                                    <li>
                                        <a
                                            class="dropdown-item"
                                            href="{{
                                                route('inputdatakategori')
                                            }}"
                                            >Input Kategori</a
                                        >
                                    </li>
                                    <li><hr class="dropdown-divider" /></li>
                                    <li>
                                        <a
                                            class="dropdown-item"
                                            href="{{
                                                route('inputsatuanbarang')
                                            }}"
                                            >Input Satuan Barang</a
                                        >
                                    </li>
                                    <li><hr class="dropdown-divider" /></li>
                                    <li>
                                        <a
                                            class="dropdown-item"
                                            href="{{
                                                route('inputsupplierbarang')
                                            }}"
                                            >Input Supplier Barang</a
                                        >
                                    </li>

                                </ul>
                            </li>
                            {{-- Batas Menu Inisiasi ----}}

                            {{-- Menu Dasar Barang -->--}}
                            <li class="nav-item dropdown">
                                <a
                                    class="nav-link dropdown-toggle"
                                    href="#"
                                    id="navbarDropdown"
                                    role="button"
                                    data-bs-toggle="dropdown"
                                    aria-expanded="false"
                                >
                                    Menu Barang
                                </a>
                                <ul
                                    class="dropdown-menu"
                                    aria-labelledby="navbarDropdown"
                                >
                                    <li>
                                        <a
                                            class="dropdown-item"
                                            href="{{
                                                route('inputdatabarang')
                                            }}"
                                            >Input Data Barang</a
                                        >
                                    </li>
                                    <li><hr class="dropdown-divider" /></li>
                                    <li>
                                        <a
                                            class="dropdown-item"
                                            href="{{
                                                route('inputbelibarang')
                                            }}"
                                            >Input Pembelian Barang</a
                                        >
                                    </li>
                                    <li><hr class="dropdown-divider" /></li>
                                    <li>
                                        <a
                                            class="dropdown-item"
                                            href="{{
                                                route('inputsupplierbarang')
                                            }}"
                                            >Input Supplier Barang</a
                                        >
                                    </li>

                                </ul>
                            </li>
                            {{-- MENU VIEW INPUTAN BARANG --}}
                            <li class="nav-item dropdown">
                                <a
                                    class="nav-link dropdown-toggle"
                                    href="#"
                                    id="navbarDropdown"
                                    role="button"
                                    data-bs-toggle="dropdown"
                                    aria-expanded="false"
                                >
                                    Menu View Barang
                                </a>
                                <ul
                                    class="dropdown-menu"
                                    aria-labelledby="navbarDropdown"
                                    >
                                    <li>
                                        <a
                                            class="dropdown-item"
                                            href="{{
                                                route('viewinputdatabarang')
                                            }}"
                                            >View Data Barang</a
                                        >
                                    </li>
                                    <li><hr class="dropdown-divider" /></li>
                                    <li>
                                        <a
                                            class="dropdown-item"
                                            href="{{
                                                route('viewbelibarang')
                                            }}"
                                            >View Data beli Barang</a
                                        >
                                    </li>

                                </ul>
                            </li>
                            {{-- BATAS MENU VIEW INPUTAN BARANG --}}
                            {{-- TRANSAKSI --}}
                            <li class="nav-item dropdown">
                                <a
                                    class="nav-link dropdown-toggle"
                                    href="#"
                                    id="navbarDropdown"
                                    role="button"
                                    data-bs-toggle="dropdown"
                                    aria-expanded="false"
                                >
                                    Menu Penjualan Barang
                                </a>
                                <ul
                                    class="dropdown-menu"
                                    aria-labelledby="navbarDropdown"
                                    >
                                    <li>
                                        <a
                                            class="dropdown-item"
                                            href="{{
                                                route('penjualanbarang')
                                            }}"
                                            >Form Penjualan</a
                                        >
                                    </li>
                                    <li><hr class="dropdown-divider" /></li>
                                    <li>
                                        <a
                                            class="dropdown-item"
                                            href="{{
                                                route('keranjang.checkout')
                                            }}"
                                            >Lihat Keranjang</a
                                        >
                                    </li>

                                </ul>
                            </li>
                            {{-- BATAS  MENU TRANSAKSI--}}
                            {{-- MENU REPORT TRANSAKSI --}}
                            <li class="nav-item dropdown">
                                <a
                                    class="nav-link dropdown-toggle"
                                    href="#"
                                    id="navbarDropdown"
                                    role="button"
                                    data-bs-toggle="dropdown"
                                    aria-expanded="false"
                                >
                                    Menu Lpaoran
                                </a>
                                <ul
                                    class="dropdown-menu"
                                    aria-labelledby="navbarDropdown"
                                    >
                                    <li>
                                        <a
                                            class="dropdown-item"
                                            href="{{
                                                route('frmreportdetail')
                                            }}"
                                            >Laporan Penjualan Detail</a
                                        >
                                    </li>
                                    <li><hr class="dropdown-divider" /></li>
                                    <li>
                                        <a
                                            class="dropdown-item"
                                            href="{{
                                                route('frmreportpembelian')
                                            }}"
                                            >Laporan Pembelian</a
                                        >
                                    </li>
                                    <li><hr class="dropdown-divider" /></li>
                                    <li>
                                        <a
                                            class="dropdown-item"
                                            href="{{
                                                route('viewreportstok')
                                            }}"
                                            >Laporan STOK</a
                                        >
                                    </li>

                                </ul>
                            </li>
                            {{-- BATAS MENU REPORT --}}
                            {{-- <a href="{{ url('/logout') }}"> logout </a> --}}
                            <li class="nav-item">
                                <a
                                    class="nav-link active"
                                    aria-current="page"
                                    href="{{url('/logout')}}">
                                    @if(isset(Auth::user()['name']))
                                    logout({{Auth::user()['name']}})
                                    @endif
                                    </a>
                            </li>

                        </ul>
                    </div>
                </div>
            </nav>
            @yield('content')
        {{-- </div> --}}
        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"
        ></script>
        <script type="text/javascript">
      
            $(document).ready(function () {
               
               /* When click show user */
                $('body').on('click', '#show-user', function () {
                  var userURL = $(this).data('url');
                  $.get(userURL, function (data) {
                      $('#userShowModal').modal('show');
                      $('#user-id').text(data.id);
                      $('#user-name').text(data.name);
                      $('#user-email').text(data.email);
                  })
               });
               
            });
          
        </script>
        
    </body>
</html>
