<table>
    <thead>
    <tr>
        <th>No_rekening</th>
        <th>saldo_akhir</th>
    </tr>
    </thead>
    <tbody>
    @foreach($nomin as $key)
        <tr>
            <td>{{ $key->NO_REKENING }}</td>
            <td>{{ $key->SALDO_AKHIR }}</td>
        </tr>
    @endforeach
    </tbody>
</table>