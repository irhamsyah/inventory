<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <title>test print</title>
    <script>
        $(function()
        {
            $('#button').on('click', function(){
                window.print();
                location.href = "{{route('penjualanbarang')}}";

            });
        });
    </script>
    <style>
        table, td, th 
        {
            border: 1px solid black;
        }
        table 
        {
        border-collapse: collapse;
        }
    </style>
        
</head>
<body>
    <p>
        Nota    : {{$data['nota']}}
        <br>
        Kasir   : {{$data['username']}}
        <br>
        Tanggal : {{$data['tgl_transaksi']}}
        <br>
        <table class="table">

            <thead>

              <tr>
                <th scope="col">Nama Barang</th>
                <th scope="col">harga</th>
                <th scope="col">jumlah</th>
                <th scope="col">Total</th>
              </tr>
            </thead>
            
            <tbody>
                <?php
                $i=count($data['nm_barang']);
                for($j=0;$j<$i;$j++)
                {
                ?>
              <tr >
                <td class="align-baseline">{{$data['nm_barang'][$j]}}</td>
                <td>{{$data['harga'][$j]}}</td>
                <td>{{$data['jumlah'][$j]}}</td>
                <td>{{$data['sub_total_jual'][$j]}}</td>
              </tr>
              <?php
                }
            ?>
   
            </tbody>
          </table>
    
    <br>
    
    <br>
    Total Pembelian : {{$data['totaltransaksi']}}


    </p>
    <button id="button" type="button" name="button">Print</button>
    
</body>
</html>