@extends('layouts.admin')
@section('content')
            <div class="content">
                <h1 class="title">Izvestaji kljucnih aktivnosti na sajtu</h1>
                <div class="data">
                    <table class="col-5 table-data">
                        <tr>
                            <th>Ime</th>
                            <th>Prezime</th>
                            <th>Aktivnost</th>
                            <th>Datum i vreme</th>
                            {{-- <th>Izmena</th> 
                            <th>Brisanje</th>  --}}
                        </tr>

                        @foreach ($reports as $r)
                            <tr>
                                <td>{{ $r->ime }}</td>
                                <td>{{ $r->prezime }}</td>
                                <td>{{ $r->aktivnost }}</td>
                                <td>{{ $r->time }}</td>
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