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
            <div class="row">
                <div class="col-md-7">
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Percent (%)</th>
                            <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="skills">
                            @foreach ($skills as $skill)
                                <tr id="sorts_{{ $skill->id }}">
                                    <td class="handle"><i class="fa fa-arrows-alt"></i></td>
                                    <td>{{ $skill->name }}</td>
                                    <td>{{ $skill->body }}</td>
                                    <td>{{ $skill->percent }}%</td>
                                    <td>
                                        <form action="{{ route('admin.skills.destroy',$skill->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger"><i class="fa fa-trash-alt"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-md-5">
                    <h4>Add New Skill</h4>
                    <form action="{{ route('admin.skills.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            Name <span style="color: red">*</span>
                            <input type="text" name="name" class="form-control" placeholder="Exp: Desginer" >
                        </div>
                        <div class="form-group">
                            Percent (%) <span style="color: red">*</span>
                            <input type="number" name="percent" class="form-control" placeholder="Exp: 79" >
                        </div>
                        <div class="form-group">
                            Description
                            <input type="text" name="body" class="form-control">
                        </div>

                        <button type="submit" class="btn btn-sm btn-block btn-success">Add</button>
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


            $('#skills').sortable({
                handle : '.handle',
                update : function () {

                    let siralama = $('#skills').sortable('serialize');

                    $.get("{{ route('admin.skills.sort') }}?"+siralama, function(response) {});
                }
            });

        </script>

    @endpush


@endsection