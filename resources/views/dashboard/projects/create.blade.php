@extends('dashboard.layouts.layout1')

@section('title', 'Add new Project')

@section('content')
<div class="container-fluid">


<div class="card shadow mb-4">

    <div class="card-body">
        <form action="{{ route('admin.projects.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                Title <span style="color: red">*</span>
                <input type="text" name="title" value="{{ old('title') }}" class="form-control" required>
            </div>

            <div class="form-group">
                Description
                <textarea name="description" rows="5" class="form-control">{{ old('description') }}</textarea>
            </div>

            <div class="form-group">
                Status <span style="color: red">*</span>
                <select name="status" class="form-control" required>
                    <option value="0">Passive</option>
                    <option value="1">Active</option>
                </select>
            </div>
            {{-- Category --}}
            <br>
            <label for="">Categories</label> <span style="color: red">*</span>
            <div class="row d-flex  mt-100">
                <div class="col-md-6">
                    <select name="categories[]" id="choices-multiple-remove-button" placeholder="Minimum 1 eded secin" multiple required>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <br>
            {{-- File --}}
            <div class="files">
                <div class="row">
                    <div class="col-sm-6">
                        <label for="media1" class="btn btn-success w-100">Choose File</label>
                        <input type="file" class="form-controls image-input d-none" id="media1" name="media[]">
                    </div>
                    <div class="col-sm-4">
                        <div id="add-file-input" class="btn btn-primary">+</div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-block btn-md btn-primary">Create</button>
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
let index = 1;
$('#add-file-input').on('click',() => {
    index++;
    $('.files').append(`
                <div class="row">
                    <div class="col-sm-6">
                        <label for="media${index}" class="btn btn-success w-100">Choose File</label>
                        <input type="file" class="form-controls image-input d-none" id="media${index}" name="media[]">
                    </div>
                    <div class="col-sm-4">
                        <div class="remove-file-input btn btn-primary">-</div>
                    </div>
                </div>
    `)
})
$(document).on('click','.remove-file-input',(e) => {
    index--;
    $(e.target).parent().parent().remove()
})
$(document).on('change','.image-input',e => {
    let file = e.target.files[0]
    $(e.target).parent().children('label').text(file.name)
})
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