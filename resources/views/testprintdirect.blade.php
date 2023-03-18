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
            });
        });
    </script>
</head>
<body>
    <p>
        ---------------------------
        harga | jml   | total     |
        ----------------------------
        20000 | 12    | 240000    |
    </p>
    <button id="button" type="button" name="button">Print</button>
    
</body>
</html>