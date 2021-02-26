@extends('layouts.app')

@section('content')

    <div class="container mt-4">

        <div align="right">
            <a href="{{route('show')}}">
                <button class="btn btn-success">Back</button>
            </a>
        </div>
        <br>

        <form method="post" action="{{route('updatePost',['id'=>$data->id])}}">
            @csrf
            <div class="mb-3">
                <input type="text" value="{{$data->book_name}}" class="form-control" name="book_name"
                       placeholder="Book Name">
            </div>
            <div class="mb-3">
                <input type="text" value="{{$data->book_author}}" class="form-control" name="book_author"
                       placeholder="Book Author">
            </div>
            <div class="mb-3">
                <input type="number" value="{{$data->book_page}}" class="form-control" name="book_page"
                       placeholder="Book Page">
            </div>
            <div class="mb-3">
                <input type="text" value="{{$data->book_publisher}}" class="form-control" name="book_publisher"
                       placeholder="Book Publisher">
            </div>
            <div class="mb-3">
                <input type="text" value="{{$data->book_type}}" class="form-control" name="book_type"
                       placeholder="Book Type">
            </div>
            <div class="mb-3">
                <input type="file" class="form-control" name="book_image" placeholder="Book Image">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>


@endsection
