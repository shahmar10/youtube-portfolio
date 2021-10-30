@extends('dashboard.layouts.layout1')

@section('title', 'Projects')

@section('content')
<div class="container-fluid">


<div class="card shadow mb-4">

    <div class="card-body">
        <div class="table-responsive">
            <table class="table" id="dataTable">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Views</th>
                        <th scope="col">Categories</th>
                        <th scope="col">Status</th>
                        <th scope="col">Media</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody id="skills">
                    @foreach ($projects as $project)
                        <tr>
                            <th scope="row"> {{ $loop->index + 1 }} </th>
                            <td>{{ $project->title }}</td>
                            <td>{{ $project->views_count ?? 0 }}</td>
                            <td>
                                @foreach ($project->categories as $category)
                                    <ul>
                                        <li>{{ $category->name }}</li>
                                    </ul>
                                @endforeach
                            </td>
                            <td>{!! $project->status == 1 ? '<span class="badge badge-pill badge-success">Active</span>' : '<span class="badge badge-pill badge-secondary">Passive</span>' !!}</td>
                            <td>
                                <a href="{{ route('admin.projects.media',$project->id) }}"><i class="fa fa-paperclip"></i></a>
                            </td>
                            <td class="">
                                <a href="{{ route('admin.projects.edit',$project->id) }}" class="d-inline-block btn btn-sm btn-primary"><i class="fa fa-pen"></i></a>
                                <form action="{{ route('admin.projects.destroy',$project->id) }}" method="post" class="d-inline-block" >
                                    @method('DELETE')
                                    @csrf
                                    <button  class="btn btn-sm btn-danger"><i class="fa fa-trash-alt"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>

@push('js')
    <script src="{{ asset('/adminka/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/adminka/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('/adminka/js/demo/datatables-demo.js') }}"></script>
@endpush

@push('css')
    <link href="{{ asset('/adminka/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush


@endsection
