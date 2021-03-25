@extends('layouts.front')
@section('title')
    Galerija
@endsection
@section('content')
<section id="content">
      <div class="main">
        <div class="container_12">
          <div class="wrapper p5">
            <h1 class="title">Galerija</h1>
          </div>
          <div class="container-bot">
            <div class="container-top">
              <div class="container">
                <div class="wrapper">
                    @foreach($pictures as $picture)
                        <div class="pack">
                            <a class="fancybox" rel="group" href="{{ asset('/').$picture->href }}"><img src="{{ asset('/').$picture->href }}" alt="{{ $picture->alt }}" class="img-pack"></a>
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