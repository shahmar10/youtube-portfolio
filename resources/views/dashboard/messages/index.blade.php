@extends('dashboard.layouts.layout1')

@section('content')
<div class="container-fluid">


    <div class="card shadow mb-4">

        <div class="card-body">

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Email</th>
                        <th scope="col">Status</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody id="skills">
                    @foreach ($messages as $message)
                        <tr>
                            <th scope="row"> {{ $loop->index + 1 }} </th>
                            <td>{{ $message->title }}</td>
                            <td>{{ $message->email }}</td>
                            <td>{!! $message->seen_date === null ? '<span class="badge badge-pill badge-success">New Message</span>' : 'Read: '.$message->seen_date !!}</td>
                            <td>
                                <a href="{{ route('admin.message',$message->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></a>
                                <a href="{{ route('admin.message.destroy',$message->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>

    </div>
@endsection