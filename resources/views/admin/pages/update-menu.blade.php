@extends('layouts.admin')
@section('content')
            <div class="content">
                <form action="{{ asset('/admin/menu/update') }}" id="update" class="update col-4" enctype="multipart/form-data">
                    <h4 class="title-form">Forma za izmenu menia</h4>
                    <input type="text" name="title" id="title" class="update-inputs form-control" placeholder="Naziv">
                    <input type="text" name="href" id="href" class="update-inputs form-control" placeholder="Putanja">
                    <input type="submit" value="Dodaj" class="btn btn-primary">
                </form>
            </div>
        </div>
    </body>
</html>
@endsection