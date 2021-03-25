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
                    @foreach($games as $game)
                        <div class="article">
                          <a class="fancybox" rel="group" href="{{ asset('/').$game->picture }}"><img src="{{ asset('/').$game->picture }}" alt="{{ $game->title }}" class="game-img"/></a>
                          <div class="article-dsc">
                            <h4 class="article-title">{{ $game->title }}</h4>
                            <p class="price"><b>{{ $game->price }} Dinara</b></p>
                            <a href="{{ asset('/game/'.$game->id) }}" class="btn btn-primary">Download</a>
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