@extends('layouts.admin')
@section('content')
            <div class="content">
                <h1 class="title">Igrice</h1>
                <div class="data">
                    <table class="col-12 table-data">
                        <tr>
                            <th>Naziv</th>
                            <th>Opis</th> 
                            <th>Cena</th> 
                            <th>Slika</th> 
                            <th>Naslovna slika</th>
                            <th>Izmena</th> 
                            <th>Brisanje</th> 
                        </tr>

                        @foreach ($games as $game)
                            <tr>
                                <td>{{ $game->title }}</td>
                                <td>{{ $game->description }}</td> 
                                <td>{{ $game->price }} RSD</td>
                                <td><img src="{{ asset('/').$game->picture }}" alt="{{ $game->title }}" width="200px" class="user-pic"></td>
                                <td><img src="{{ asset('/').$game->cover }}" alt="{{ $game->title }}" width="200px" class="user-pic"></td>
                                <td><a href="">Izmeni</a></td>
                                <td><a href="{{ asset('/admin/games/'.$game->id) }}">Obrisi</a></td>
                            </tr>
                        @endforeach

                    </table>
                </div>
                <form action="{{ route('games-store') }}" id="update" class="update col-4" enctype="multipart/form-data" method="POST">
                    {{ csrf_field() }}
                    <h4 class="title-form">Forma za dodavanje igrice</h4>
                    <input type="text" name="title" id="title" class="update-inputs form-control" placeholder="Naziv">
                    <input type="text" name="description" id="description" class="update-inputs form-control" placeholder="Opis">
                    <input type="text" name="price" id="price" class="update-inputs form-control" placeholder="Cena">
                    <label for="picture-profil" class="picture">Profilna slika</label>
                    <input type="file" name="picture-profil" id="picture-profil" class="update-inputs form-control" placeholder="Slika">
                    <label for="picture-cover" class="picture">Naslovna slika</label>
                    <input type="file" name="picture-cover" id="picture-cover" class="update-inputs form-control" placeholder="Slika">
                    <input type="submit" value="Dodaj" class="btn btn-primary">
                </form>
            </div>
        </div>
    </body>
</html>
@endsection