<html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>

<head>
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
</head>

<body>
    @include('innerFilter')
    <div class="all">
        location : <select name="location" id="location" onchange="sendAll()">
            <option value="">All</option>
            @foreach ($houses->unique('location') as $location)
                <option value="{{ $location->location }}">{{ $location->location }}</option>
            @endforeach
        </select><br><br>
        meter from : <input type="number" name="meterF" id="meterF"> to : <input type="number" name="meterT"
            id="meterT">
        <button name="meter" onclick="sendAll()">set</button> <br><br>
        price from : <input type="number" name="priceF" id="priceF"> to : <input type="number" name="priceT"
            id="priceT">
        <button name="price" onclick="sendAll()">set</button><br><br>
        <label for="photo">photo</label> : <input type="checkbox" id="photo" data-status='off' name="photo"
            onclick="sendAll()">

    </div>
</body>

</html>
<style>
    .tbl {
        position: absolute;
        background: rgb(202, 92, 92);
    }

    .tbl tr {
        width: 500px;
    }

    .tbl td {
        width: 500px;
    }

    .all {
        margin-left: 500px;
        margin-top: 0px;
    }

</style>
<script>
    function sendAll() {
        var checkBox = document.getElementById('photo');
        var location = $('#location').val();
        var meterF = $('#meterF').val();
        var meterT = $('#meterT').val();
        var priceF = $('#priceF').val();
        var priceT = $('#priceT').val();

        if (checkBox.checked == true) {
            var photo = 1;
        } else {
            var photo = 0;
        }
        $.ajax({
            type: 'GET',
            // url: 'filter?loc=' + event.target.value,
            url: 'filter',
            data: ({
                location: location,
                'photo': photo,
                'meterF': meterF,
                'meterT': meterT,
                'priceF': priceF,
                'priceT': priceT
                // _method: 'post'
            }),
            success: function(res) {
                var div_tbl = document.getElementById('div_tbl');
                var tbl = document.getElementById('tbl');
                tbl.remove();
                $('#div_tbl').append(res);
                div_tbl.style.margin = '0px';
                div_tbl.style.backgroundColor = 'red';
                // $(document.body).append(res);
            }
        });
    }
    // $.ajaxSetup({
    //     headers: {
    //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
    //         'Content-Type': 'application/json'
    //     }
    // });
</script>
