@extends('admin.layouts.master')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>NEW TOOL</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">General Form</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <form class="card" method="POST" action="{{route('admin.tools.store')}}">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter name tool">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Router name</label>
                        <select class="form-control" name="router_name">
                            <option></option>
                            @foreach($names as $item)
                                <option value="{{\Illuminate\Support\Arr::get($item,'name')}}">{{\Illuminate\Support\Arr::get($item,'name')}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mt-4">
                        <div class="preview">
                            <img src="...">
                        </div>
                        <input type="hidden" name="attachment_oid">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFile">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail2">Keywords (,)</label>
                        <input type="text" name="tags" class="form-control" id="exampleInputEmail2" placeholder="keywords">
                    </div>
                    <div class="form-group">
                        <label>Textarea</label>
                        <textarea class="form-control" rows="3" name="short_content" placeholder="Enter ..."></textarea>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Lưu</button>
                </div>
            </form>
        </div>
    </section>
@endsection
@push('scripts')
    <script src="{{mix('js/admin-tool.js')}}"></script>
@endpush
