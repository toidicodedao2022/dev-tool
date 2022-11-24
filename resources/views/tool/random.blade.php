@extends('layouts.master')
@section('content')
    <div class="action-tool mt-5">
        <form method="POST" action="{{route('tool.random.post')}}" class="card" data-function="random" data-type="form-data">
            <div class="card-body">
                <div class="options">
                    <div class="custom-control custom-checkbox">
                        <input checked name="chars[]" type="checkbox" class="custom-control-input" value="0_9" id="0_9">
                        <label class="custom-control-label fw-bold" for="0_9">0-9</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input checked name="chars[]" type="checkbox" class="custom-control-input" id="A_Z" value="A_Z">
                        <label class="custom-control-label fw-bold" for="A_Z">A-Z</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input checked name="chars[]" type="checkbox" class="custom-control-input" id="a_z" value="a_z">
                        <label class="custom-control-label fw-bold" for="a_z">a-z</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input checked name="chars[]" type="checkbox" class="custom-control-input" id="symbols" value="symbols">
                        <label class="custom-control-label fw-bold" for="symbols">!@#$%^&*()+</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input name="same" value="not_duplicate" checked type="checkbox" class="custom-control-input" id="customCheck1">
                        <label class="custom-control-label fw-bold" for="customCheck1">Not duplicate</label>
                    </div>
                </div>
                <div class="mt-3">
                    <label class="d-block mb-1" for="random-range">Length:</label>
                    <div class="row d-flex justify-content-start">
                        <div class="col-md-1">
                            <input class="form-control random-range" type="number" name="length" min="2" value="10" max="50">
                        </div>
                        <div class="col-md-4">
                            <input step="1" type="range" min="2" value="10" max="50" class="custom-range" id="random-range">
                        </div>
                    </div>
                    <button type="button" class="btn btn-danger find-result mt-4">Generate</button>
                </div>
            </div>
            <div class="card-footer result">

                <h3>Result:
                    <div class="spinner-border spinner-border-sm mb-2 d-none" id="loading-result" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </h3>
                <div>
                    <div class="my-4">

                        <div class="d-flex">
                            <label>password:</label>&nbsp;
                            <input type="text" class="random-result form-control" readonly>
                        </div>

                    </div>
                    <div>
                        <label>length:</label>&nbsp;
                        <span class="random-length-result text-uppercase bg bg-gradient"></span>
                    </div>


                </div>
            </div>
        </form>

    </div>
@endsection
@push('scripts')
    <script src="{{mix('js/tool.js')}}"></script>
@endpush
