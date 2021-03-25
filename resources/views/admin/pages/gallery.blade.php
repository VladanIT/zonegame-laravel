@extends('layouts.admin')
@section('content')
            <div class="content">
                <h1 class="title">Galerija</h1>
                <div class="data">
                    <table class="col-5 table-data">
                        <tr>
                            <th>Naziv</th>
                            <th>Slika</th>
                            <th>Izmena</th> 
                            <th>Brisanje</th> 
                        </tr>

                        @foreach ($pictures as $p)
                            <tr>
                                <td>{{ $p->alt }}</td>
                                <td><img src="{{ asset('/').$p->href }}" alt="{{ $p->alt }}" width="200px" class="user-pic"></td>
                                <td><a href="">Izmeni</a></td>
                                <td><a href="{{ asset('/admin/gallery/'.$p->id) }}">Obrisi</a></td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                <form action="{{ route('gallery-store') }}" id="update" class="update col-4" enctype="multipart/form-data" method="POST">
                    {{ csrf_field() }}
                    <h4 class="title-form">Forma za izmenu i dodavanje slike</h4>
                    <input type="text" name="title" id="title" class="update-inputs form-control" placeholder="Naziv">
                    <label for="picture" class="picture">Slika</label>
                    <input type="file" name="picture" id="picture" class="update-inputs form-control" placeholder="Slika">
                    <input type="submit" value="Promeni" class="btn btn-primary" disabled>
                    <input type="submit" value="Dodaj" class="btn btn-primary">
                </form>
            </div>
        </div>
    </body>
</html>
@endsection