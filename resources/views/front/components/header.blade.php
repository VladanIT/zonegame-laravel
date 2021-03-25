<body id="page1">
    <div class="main-bg">
      <div class="bg">
        <!--==============================header=================================-->
        <header>
          <div class="main">
            <div class="wrapper">
              <h1><a href="{{ asset('/') }}"><img src="{{ asset('images/logo.png') }}" class="logo"></a></h1>
              
            </div>

            
              @include ('front.components.nav')
            
            
            <div class="slider-wrapper">
            <div id="slika">
              <img alt="" class="show" src = "{{ asset('images/games/cover/carbon.png') }}"/>
              <img alt="" src = "{{ asset('images/games/cover/forza4.jpg') }}"/>
              <img alt="" src = "{{ asset('images/games/cover/assc4.jpg') }}"/>
            </div>
          </div>
        </header>