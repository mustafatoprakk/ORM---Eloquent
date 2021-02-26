@extends('layouts.app')

@section('content')


    <div class="container mt-4">

        <div align="right">
            <a href="{{route('insertGet')}}">
                <button class="btn btn-success">New Add</button>
            </a>
        </div>
        <br>

        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Author</th>
                <th scope="col">Page</th>
                <th scope="col">Publisher</th>
                <th scope="col">Type</th>
                <th scope="col">img</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($data['books'] as $key)
                <tr>
                    <th scope="row">{{$key->id}}</th>
                    <td>{{$key->book_name}}</td>
                    <td>{{$key->book_author}}</td>
                    <td>{{$key->book_page}}</td>
                    <td>{{$key->book_publisher}}</td>
                    <td>{{$key->book_type}}</td>
                    <td><img width="50" src=" {{asset('images/'.$key->book_image) }}" ></td>
                    <td width="10"><a href="{{route('updateGet',['id'=>$key->id])}}">
                            <button class="btn btn-primary">Update</button>
                        </a></td>
                    <td width="10"><a href="{{route('delete',['id'=>$key->id])}}">
                            <button class="btn btn-primary">Delete</button>
                        </a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
