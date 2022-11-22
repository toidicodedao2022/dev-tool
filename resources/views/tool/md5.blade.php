@extends('layouts.master')
@section('content')
    <div class="action-tool mt-5">
        <form method="GET" action="{{route('tool.md5')}}" class="card" data-function="md5">
            <div class="card-body">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Recipient's username" name="input" aria-label="Enter the characters to be encrypted here" aria-describedby="button-addon2">
                    <button class="btn btn-primary find-result" type="button" id="button-addon2" >CONVERT</button>
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
                        <label>lowercase:</label>&nbsp;
                        <span class="md5-result text-lowercase bg bg-gradient"></span>
                    </div>
                    <div>
                        <label>UPPERCASE:</label>&nbsp;
                        <span class="md5-result text-uppercase bg bg-gradient"></span>
                    </div>


                </div>
            </div>
        </form>

    </div>
@endsection
@push('scripts')
    <script src="{{mix('js/tool.js')}}"></script>
@endpush
