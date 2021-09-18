@extends('dashboard.layouts.layout1')

@section('content')

<div class="container-fluid">

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow mb-4">

        <div class="card-body">
            <form action="{{ route('admin.about.update') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            Full name <span style="color: red">*</span>
                            <input type="text" name="name" value="{{ $about->name ?? '' }}" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            Email <span style="color: red">*</span>
                            <input type="text" value="{{ $about->email ?? '' }}" name="email" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            Photo
                            <input type="file" name="photo" class="form-control-file border">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            Birth <span style="color: red">*</span>
                            @php
                                if ( isset($about->birth) ){
                                    $date = $about->birth;
                                    $date = str_replace ( " ", "T", $date );
                                }
                            @endphp
                            <input type="datetime-local" value="{{ $date ?? '' }}" name="birth" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            Adress <span style="color: red">*</span>
                            <input type="text" name="adress" value="{{ $about->adress ?? '' }}" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            Degree <span style="color: red">*</span>
                            <input type="text" value="{{ $about->degree ?? '' }}" name="degree" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            Body
                            <textarea name="body"  class="form-control">{{ $about->body ?? '' }}</textarea>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            CV
                            <input type="file" name="cv" class="form-control-file border">
                        </div>
                    </div>
                </div>

                <hr>
                <!-- Social media -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            Behance <i class="fab fa-behance-square"></i>
                            <input type="text" name="behance" value="{{ $social->behance ?? '' }}" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            Dribbble <i class="fab fab fa-dribbble"></i>
                            <input type="text" name="dribbble" value="{{ $social->dribbble ?? '' }}" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            Facebook <i class="fab fa-facebook-square"></i>
                            <input type="text" name="facebook" value="{{ $social->facebook ?? '' }}" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            Instagram <i class="fab fa-instagram"></i>
                            <input type="text" name="instagram" value="{{ $social->instagram ?? '' }}" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            Linkedin <i class="fab fa-linkedin"></i>
                            <input type="text" name="linkedin" value="{{ $social->linkedin ?? '' }}" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            Github <i class="fab fa-github"></i>
                            <input type="text" name="github" value="{{ $social->github ?? '' }}" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            Twitter <i class="fab fa-twitter"></i>
                            <input type="text" name="twitter" value="{{ $social->twitter ?? '' }}" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            Youtube <i class="fab fa-youtube"></i>
                            <input type="text" name="youtube" value="{{ $social->youtube ?? '' }}" class="form-control">
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