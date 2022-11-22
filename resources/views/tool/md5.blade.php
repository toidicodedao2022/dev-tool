@extends('layouts.master')
@section('content')
    <div class="action-tool mt-5">
        <form method="GET" action="{{route('tool.md5')}}" class="card">
            <div class="card-body">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Recipient's username" name="input" aria-label="Enter the characters to be encrypted here" aria-describedby="button-addon2">
                    <button class="btn btn-primary find-result" type="button" id="button-addon2" >CONVERT</button>
                </div>
            </div>
            <div class="card-footer result">
                <label>Result:</label>
            </div>
        </form>

    </div>
@endsection
@push('scripts')
    <script src="{{mix('js/tool.js')}}"></script>
@endpush