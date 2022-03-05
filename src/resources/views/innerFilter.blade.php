<div class="tbl" id="div_tbl" style="margin:180px">
    <table border='3px' id='tbl'>
        <tr>
            <th>number</th>
            <th>location</th>
            <th>price</th>
            <th>photo</th>
            <th>meter</th>
        </tr>
        @foreach ($houses as $house)
            <tr>
                <td>{{ $house->id }}</td>
                <td>{{ $house->location }}</td>
                <td>{{ $house->price }}</td>
                <td>{{ $house->photo }}</td>
                <td>{{ $house->meter }}</td>
            </tr>
        @endforeach
    </table>
</div>
