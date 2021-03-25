@extends('layouts.front')
@section('title')
    Igrica
@endsection
@section('content')
<section id="content">
      <div class="main">
        <div class="container_12">
          <div class="wrapper p5">
            <h1 class="title">Igrica</h1>
          </div>
          <div class="container-bot">
            <div class="container-top">
              <div class="container">
                <div class="wrapper">
                    
                    {{-- {{ var_dump($games) }} --}}
                    <img src="{{ asset($games->cover) }}" alt="{{ $games->title }}" class="game-cover">
                    <div class="article-dsc">
                        <h3 class="game-title">{{ $games->title }}</h3>
                        <p class="game-description">{{ $games->description }}</p>
                        <p class="game-price">{{ $games->price }} Dinara</p>
                        @if(!session()->has('user'))
                          <a href="{{ asset('/login') }}" class="btn btn-warning">Uloguj se da bi narucio.</a>
                        @endif  
                        @if(session()->has('user'))
                          <a href="" class="btn btn-primary">Kupi</a>
                        @endif
                    </div>
                    
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection