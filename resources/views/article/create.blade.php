@extends('layouts.app')

@section('content')
    <h2>Buat Artikel Baru </h2>

    <form action="/artikel" method="post" enctype="multipart/form-data">
        @csrf

        <x-input field="title" label="Judul" type="text"/>

        <x-textarea field="subject" label="Subject" type="text" />

        <x-inputfile />

        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
@endsection

