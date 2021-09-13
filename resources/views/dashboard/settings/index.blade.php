@extends('dashboard.layouts.layout1')

@section('content')

<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Settings</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Sayta geri don</a>
    </div>

    <div class="card shadow mb-4">

        <div class="card-body">
            <form action="{{ route('admin.settings.update') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            Title <span style="color: red">*</span>
                            <input type="text" name="title" value="{{ $settings->title }}" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            Subtitle
                            <input type="text" value="{{ $settings->subtitle }}" name="subtitle" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            Logo (125x42)
                            <input type="file" name="logo" class="form-control-file border">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            Favicon
                            <input type="file" name="favicon" class="form-control-file border">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            Footer
                            <textarea name="footer" rows="1" class="form-control">{{ $settings->footer }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            Site active <span style="color: red">*</span>
                            <select name="active" class="form-control">
                                <option value="1" @if($settings->active == 1) selected @endif>Active</option>
                                <option value="0" @if($settings->active == 0) selected @endif>Passive</option>
                            </select>
                        </div>
                    </div>
                </div>

                <hr>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            Description <span style="color: red">*</span>
                            <input type="text" name="description" value="{{ $settings->description }}" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            Keywords
                            <input type="text" value="{{ $settings->keywords }}" name="keywords" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            Author <span style="color: red">*</span>
                            <input type="text" name="author" value="{{ $settings->author }}" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            Copyright
                            <input type="text" value="{{ $settings->copyright }}" name="copyright" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-block btn-md btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>

    </div>

@endsection