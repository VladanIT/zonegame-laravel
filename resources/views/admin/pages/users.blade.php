@extends('layouts.admin')
@section('content')
            <div class="content">
                <h1 class="title">Korisnici</h1>
                <div class="data">
                    <table class="col-7 table-data">
                        <tr>
                            <th>Ime</th>
                            <th>Prezime</th> 
                            <th>Email</th> 
                            <th>Lozinka</th> 
                            <th>Korisnicko ime</th>
                            {{-- <th>Slika</th>  --}}
                            <th>Uloga</th>
                            <th>Izmena</th> 
                            <th>Brisanje</th> 
                        </tr>

                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->ime }}</td>
                                <td>{{ $user->prezime }}</td> 
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->pass }}</td>
                                <td>{{ $user->username }}</td>
                                {{-- @if ($user->picture)
                                    <td><img src="{{ asset('/').$user->picture }}" alt="{{ $user->username }}" width="200px" class="user-pic"></td>
                                @else
                                    <td><img src="{{ asset('images/users/user.png') }}" alt="{{ $user->username }}" width="200px" class="user-pic"></td>
                                @endif --}}
                                <td>{{ $user->role }}</td>
                                <td><a href="">Izmeni</a></td>
                                <td><a href="{{ asset('/admin/user/'.$user->id_user) }}">Obrisi</a></td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                <form action="{{ route('user-store') }}" id="update" class="update col-4" method="POST">
                    {{ csrf_field() }}                   
                    <h4 class="title-form">Forma za izmenu i dodavanje korisnika</h4>
                    <input type="text" name="firstname" id="firstname" class="update-inputs form-control" placeholder="Ime">
                    <input type="text" name="lastname" id="lastname" class="update-inputs form-control" placeholder="Prezime">
                    <input type="text" name="email" id="email" class="update-inputs form-control" placeholder="Email">
                    <input type="password" name="password" id="password" class="update-inputs form-control" placeholder="Sifra">
                    <input type="text" name="username" id="username" class="update-inputs form-control" placeholder="Korisnicko ime">
                    {{-- <label for="picture" class="picture">Profilna slika</label>
                    <input type="file" name="picture" id="picture" class="update-inputs form-control" placeholder="Slika"> --}}
                    <select name="role" id="role" class="update-inputs form-control" placeholder="Uloga">
                        <option selected value="0">Izaberi ulogu</option>
                        <option value="2">Korisnik</option>
                        <option value="1">Admin</option>
                    </select>
                    <input type="submit" value="Dodaj" class="btn btn-primary">
                </form>
            </div>
        </div>
    </body>
</html>
@endsection