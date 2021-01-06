<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>print member</title>
    <link rel="icon" type="Componentadmin/image/png" sizes="16x16" href="{{asset('Componentadmin/images/favicon.png')}}">
    <link href="{{asset('Componentadmin/css/style.css')}}" rel="stylesheet">
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" rel="stylesheet" /> --}}
    <style>
        #member-card {
            background-image: url("{{asset('images/card.svg')}}");
            background-size: cover;
            background-repeat: no-repeat;
            width: 500px;
        }

    </style>

</head>

<body>

    <div class="card text-white" id="member-card">
        <div class="card-header text-center">
            <h4 class="text-white">Rumah Sakit Harapan Bersama</h4>
            <p>jalan prangtritis km 11,No 25 bantul, yogyakarta</p>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <h4 class="fa-bold text-white mt-4">
                    </h4>
                </div>
                <div class="col-md-4" id="generateBarcode">
                    {!! QrCode::size(100)->generate('aku sayang kamu'); !!}
                </div>
            </div>
        </div>
        <div class="card-footer text-dark text-center">
            <small>mohon untuk menyimpan kartu ini baik-baik, dan selalu dibawa setiap kali melakukan pemeriksaan di
                rumah
                sakit harapan bersama</small>
        </div>
    </div>
</body>

</html>
