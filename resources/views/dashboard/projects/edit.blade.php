@extends('dashboard.layouts.layout1')

@section('title', 'Add new Project')

@section('content')
<div class="container-fluid">


<div class="card shadow mb-4">

    <div class="card-body">
        <form action="{{ route('admin.projects.update',$project->id) }}" method="post" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                Title <span style="color: red">*</span>
                <input type="text" name="title" value="{{ $project->title }}" class="form-control" required>
            </div>

            <div class="form-group">
                Description
                <textarea name="description" rows="5" class="form-control">{{ $project->description }}</textarea>
            </div>

            <div class="form-group">
                Status <span style="color: red">*</span>
                <select name="status" class="form-control" required>
                    <option value="0" @if($project->status == 0) selected @endif>Passive</option>
                    <option value="1" @if($project->status == 1) selected @endif>Active</option>
                </select>
            </div>
            {{-- Category --}}
            <br>
            <label for="">Categories</label> <span style="color: red">*</span>
            <div class="row d-flex  mt-100">
                <div class="col-md-6">
                    <select name="categories[]" id="choices-multiple-remove-button" placeholder="Minimum 1 eded secin" multiple required>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @if( in_array($category->id,$project->categories_ids) ) selected @endif>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <br>

            <div class="form-group">
                <button type="submit" class="btn btn-block btn-md btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>

</div>

@push('js')

    <script>
        $(document).ready(function(){
            let multipleCancelButton = new Choices('#choices-multiple-remove-button', {
            removeItemButton: true,
            maxItemCount:5,
            searchResultLimit:5,
            renderChoiceLimit:5
            });

        });
    </script>
@endpush

@push('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
    <script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>
    <style>
        body {
            background: #00B4DB;
            background: -webkit-linear-gradient(to right, #0083B0, #00B4DB);
            background: linear-gradient(to right, #0083B0, #00B4DB);
            color: #514B64;
            min-height: 100vh
        }
    </style>
@endpush

@endsection