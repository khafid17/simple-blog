@extends('layouts.app')

@section('title', 'halaman artikel')

@section('content')
    <h1>ini halaman artikel</h1>

     @foreach ($articles->chunk(3) as $articleChunk)
     <div class="row">
         @foreach ($articleChunk as $article)
         <div class="col card md-1 ml-1 mr-1 mb-1 mt-1">
            <img class="card-img-top" src="/image/{{$article->thumbnail}}" alt="Card image cap">
            
            <div class="card-body">
                <p><strong>{{ ucfirst ($article->title)}}</strong></p> 
                <p>{{ $article->subject}}</p>
                <a href="/artikel/{{$article->slug}}" class="btn btn-info btn-sm stretched-link">Read</a>
                
            </div>
        </div>
         @endforeach
</div>
     @endforeach

     <div>
         {{$articles->links()}}
     </div>

     @include('layouts.footer')
@endsection