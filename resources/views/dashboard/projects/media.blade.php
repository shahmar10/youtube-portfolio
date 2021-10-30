@extends('dashboard.layouts.layout1')

@section('title', 'Edit Media')

@section('content')
<div class="container-fluid">


<div class="card shadow mb-4">

    <div class="card-body">
        <div class="row">
            <div class="col-md-7">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Media</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody id="medias">
                        @foreach ($project->media as $media)
                            <tr id="medias_{{$media->id}}">
                                <th scope="row" class="handle"><i class="fa fa-arrows-alt handle" style="cursor: move;"></i></th>
                                <th scope="row">
                                    @if($media->type == "video")
                                        <video width="320" height="320" controls>
                                            <source src="/{{ $media->media }}" type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video>
                                    @elseif($media->type == "image")
                                        <a href="/{{ $media->media }}" target="_blank">
                                            <img width="220" height="220" src="/{{ $media->media }}">
                                        </a>
                                    @endif
                                </th>
                                <td>
                                    <a href="{{ route('admin.projects.media.destroy',$media->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-md-5">
                <h3>Add new media</h3>
                <form action="{{ route('admin.projects.media.add',$project->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="files">
                        <div class="row">
                            <div class="col-sm-10">
                                <label for="media1" class="btn btn-success w-100">Choose File</label>
                                <input type="file" class="form-controls image-input d-none" id="media1" name="media[]">
                            </div>
                            <div class="col-sm-2">
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
</div>

</div>

@push('js')

    <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>

    <script>
        $(document).ready(function(){

        $('#medias').sortable({
            handle : '.handle',
            update : function (){
                let siralama = $('#medias').sortable('serialize');

                $.get("{{ route('admin.projects.media.sort',$project->id) }}?"+siralama,function (response){});
            }
        });

        let index = 1;
        $('#add-file-input').on('click',() => {
            index++;
            $('.files').append(`
                        <div class="row">
                            <div class="col-sm-10">
                                <label for="media${index}" class="btn btn-success w-100">Choose File</label>
                                <input type="file" class="form-controls image-input d-none" id="media${index}" name="media[]">
                            </div>
                            <div class="col-sm-2">
                                <div class="remove-file-input btn btn-primary">-</div>
                            </div>
                        </div>
            `)
        })
        $(document).on('click','.remove-file-input',(e) => {
            index--;
            $(e.target).parent().parent().remove()
        });
        $(document).on('change','.image-input',e => {
            let file = e.target.files[0]
            $(e.target).parent().children('label').text(file.name)
        });
        });
    </script>
@endpush

@push('css')

@endpush

@endsection
