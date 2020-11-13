@extends('layouts.app')

@section('content')
    <h1>{{ $article->title }}</h1>
    <p>
        {{ $article->subject}}
    </p>
    <div class="row mb-1">
    <a href="/artikel/{{$article->id}}/edit" class="ml-1 btn btn-info btn-sm">Edit</a>
        <form action="/artikel/{{$article->id}}"method='post'>
            @csrf
            @method('DELETE')
            <button class="ml-1 btn btn-sm btn-danger">Hapus</button>
        </form>
    </div>
    <a href="/artikel" class="btn btn-sm btn-info">back</a>

    @include('layouts.footer')

@endsection


