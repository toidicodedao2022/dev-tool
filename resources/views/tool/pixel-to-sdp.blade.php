<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Free Web tutorials">
    <meta name="keywords" content="android,sdp, ssp, pixel, convert pixel to sdp,pixel to sdp">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Pixel to sdp android</title>
    <link rel="stylesheet" href="{{mix('css/app.css')}}">
</head>
<body id="convert-pixel">
<div class="container">
    <h1>Convert pixel in design to spd</h1>
    <p class="my-3">For easy mapping of designs to sdp units, one can create designs with 300 pixels screen width - in this case each pixel in the design corresponds to 1 sdp.</p>
    <div class="form-convert">
        <div class="row">
            <div class="form-group col-md-6">
                <label class="form-label">Design on screen width: <span class="text-info">(px)</span></label>
                <input type="number" class="form-control"  value="375" id="width-screen">
            </div>
            <div class="form-group col-md-6">
                <label class="form-label">Pixel:</label>
                <input autofocus type="number" class="form-control" id="inp-pixel">
            </div>
        </div>
        <div class="result text-center mt-5 border-5">
            <p id="result-convert">...</p>
            <button class="btn-primary btn" type="button">
                Copy
            </button>
        </div>
    </div>
</div>
<script src="{{asset('js/pixel-to-sdp.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
