@extends('dashboard.layouts.layout1')

@section('title', 'Categories')

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
                                <th scope="col">Name</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ( $categories as $category )
                                <tr id="">
                                    <th scope="row"> {{ $loop->index+1 }} </th>
                                    <td>{{ $category->name }}</td>
                                    <td><a href="" class="btn btn-sm btn-danger"><i class="fa fa-trash-alt"></i></a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-5">
                        <h4>Add New category</h4>
                        <form action="{{ route('admin.categories.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                Name <span style="color: red">*</span>
                                <input type="text" name="name" class="form-control" placeholder="Exp: App" required>
                            </div>

                            <button type="submit" class="btn btn-sm btn-block btn-success">Add</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>

    </div>



@endsection
