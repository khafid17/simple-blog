@extends('layouts.app')

@section('content')
    <h2>Edit Artikel</h2>

    <form action="/artikel/{{$article->id}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <x-input field="title" label="Judul" type="text" value="{{$article->title}}"/>

        <x-textarea field="subject" label="Subject" type="text" value="{{$article->subject}}"/>

        @if ($article->thumbline)
            <img src="/image/{{$article->thumbnail}}" width="150">
        @else 
            <p>Kamu belum memiliki gambar</p>
        @endif
        <x-inputfile />

        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
@endsection

