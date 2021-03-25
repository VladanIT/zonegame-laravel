@extends('layouts.admin')
@section('content')
            <div class="content">
                <h1 class="title">Meni</h1>
                <div class="data">
                    <table class="col-5 table-data">
                        <tr>
                            <th>Naziv</th>
                            <th>Putanja</th>
                            <th>Izmena</th> 
                            <th>Brisanje</th> 
                        </tr>

                        @foreach ($menus as $m)
                            <tr>
                                <td>{{ $m->title }}</td>
                                <td>{{ $m->href }}</td>
                                <td><a href="{{ asset('/admin/update/menu') }}">Izmeni</a></td>
                                <td><a href="{{ asset('/admin/menu/'.$m->id) }}">Obrisi</a></td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                <form action="{{ asset('/admin/menu/store') }}" id="update" class="update col-4" enctype="multipart/form-data">
                    <h4 class="title-form">Forma za dodavanje menia</h4>
                    <input type="text" name="title" id="title" class="update-inputs form-control" placeholder="Naziv">
                    <input type="text" name="href" id="href" class="update-inputs form-control" placeholder="Putanja">
                    <input type="submit" value="Dodaj" class="btn btn-primary">
                </form>
            </div>
        </div>
    </body>
</html>
@endsection