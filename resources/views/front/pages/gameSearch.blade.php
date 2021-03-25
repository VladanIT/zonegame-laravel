@extends('layouts.front')
@section('title')
    Igrice
@endsection
@section('content')
<section id="content">
      <div class="main">
        <div class="container_12">
          <div class="wrapper p5">
            <h1 class="title">Lista Igrica</h1>
            <form action="{{ route('search') }}" class="col-3 search">
              <input type="text" class="form-control" name="search" id="search" placeholder="Igrica">
              <input type="submit" class="btn btn-primary submit" value="Trazi">
            </form>
          </div>
          <div class="container-bot">
            <div class="container-top">
              <div class="container">
                <div class="wrapper">
                    @foreach($game as $g)
                        <div class="article">
                          <a class="fancybox" rel="group" href="{{ asset('/').$g->picture }}"><img src="{{ asset('/').$g->picture }}" alt="{{ $g->title }}" class="game-img"/></a>
                          <div class="article-dsc">
                            <h4 class="article-title">{{ $g->title }}</h4>
                            <p class="price"><b>{{ $g->price }} Dinara</b></p>
                            <a href="{{ asset('/game/'.$g->id) }}" class="btn btn-primary">Download</a>
                          </div>
                        </div>
                    @endforeach
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection