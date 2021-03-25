@extends('layouts.admin')
@section('content')
            <div class="content">
                <h1 class="title">Izvestaji kljucnih aktivnosti na sajtu</h1>
                <div class="data">
                    <table class="col-5 table-data">
                        <tr>
                            <th>Ime</th>
                            <th>Prezime</th>
                            <th>Igrica</th>
                            {{-- <th>Izmena</th> 
                            <th>Brisanje</th>  --}}
                        </tr>

                        @foreach ($carts as $c)
                            <tr>
                                <td>{{ $c->ime }}</td>
                                <td>{{ $c->prezime }}</td>
                                <td>{{ $c->title }}</td>
                                {{-- <td><a href="{{ asset('/admin/update/menu') }}">Izmeni</a></td>
                                <td><a href="{{ asset('/admin/menu/'.$m->id) }}">Obrisi</a></td> --}}
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>
@endsection