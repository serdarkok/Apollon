@extends('admin.layout')

@section('content')

    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">Site Ayarları</div>
            <div class="panel-body">

                <table class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Site Adı</th>
                        <th>Açıklama</th>
                        <th>Anahtar Kelimeler</th>
                        <th>Düzenle</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Site Adı</th>
                        <th>Açıklama</th>
                        <th>Anahtar Kelimeler</th>
                        <th>Düzenle</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($setting as $bilgi)
                        <tr>
                            <td>{{ $bilgi->id }}</td>
                            <td>{{ $bilgi->title }}</td>
                            <td>{{ $bilgi->description }}</td>
                            <td>{{ $bilgi->keywords }}</td>
                            <td class="text-center"><a href="settings/edit/{{ $bilgi->id }}" class="btn btn-default btn-xs">Düzenle</a></td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>

            </div>
        </div>
    </div>

@endsection