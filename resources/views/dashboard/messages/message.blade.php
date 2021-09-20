@extends('dashboard.layouts.layout1')

@section('content')

<div class="container-fluid">


    <div class="row">

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('admin.messages') }}" class="btn btn-secondary btn-sm font-weight-bold text-light"> <i class="fa fa-arrow-left"></i> Geri </a>
                </div>

                <div class="card-body">
                    <table class="table">

                        <tbody>
                            <tr>

                                <th scope="row">Title</th>
                                <td>{{$message->title}}</td>

                            </tr>
                            <tr>

                                <th scope="row">Email</th>
                                <td>{{$message->email}}</td>

                            </tr>
                            <tr>

                                <th scope="row">Tarix</th>
                                <td>{{$message->created_at}}</td>

                            </tr>
                            <tr>

                                <th scope="row">Messsage</th>
                                <td>{{$message->body}}</td>

                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Mesaja cavab:
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('admin.message.send') }}" method="post">
                        @csrf
                        <div class="form-group">
                            Email:
                            <input type="email" name="email" class="form-control" value="{{$message->email}}" required>
                        </div>
                        <div class="form-group">
                            Başlıq:
                            <input type="text" name="title" class="form-control" value="" required>
                        </div>
                        <div class="form-group">
                            Mesaj:
                            <textarea name="body" class="form-control" rows="7" placeholder="Cavab..." required></textarea>
                        </div>

                        <button type="submit" class="btn btn-sm btn-success btn-block" >Göndər</button>
                    </form>
                </div>
            </div>
        </div>


        </div>

</div>

@endsection