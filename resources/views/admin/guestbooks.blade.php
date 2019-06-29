@extends('admin.layout')
@section('content')
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                {{ trans('text.admin.menu.allguestbooks') }}
            </div>
            <div class="panel-body">
                <table class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>İsim Soyisim</th>
                        <th>E-Posta</th>
                        <th>Soru</th>
                        <th>Gönderim Tarihi</th>
                        <th>Cevapla / Düzenle</th>
                        <th>Onayla</th>
                        <th>Sil</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>İsim Soyisim</th>
                        <th>E-Posta</th>
                        <th>Soru</th>
                        <th>Gönderim Tarihi</th>
                        <th>Cevapla / Düzenle</th>
                        <th>Onayla</th>
                        <th>Sil</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($guestbooks as $bilgi)
                        <tr>
                            <td>{{ $bilgi->id }}</td>
                            <td>{{ $bilgi->guest_fullname }}</td>
                            <td>{{ $bilgi->guest_email }}</td>
                            <td>{{ str_limit($bilgi->guest_text, $limit= 100, $end= '...') }}</td>
                            <td>{{ $bilgi->created_at }}</td>
                            <td class="text-center"><a href="guestbooks/new/{{ $bilgi->id }}" class="btn btn-default btn-xs">Cevapla/Düzenle</a></td>
                            <td class="text-center"><a href="guestbooks/confirm/{{ $bilgi->id }}" class="btn btn-default btn-xs">Onayla</a></td>
                            <td class="text-center" id="confirm"><a href="guestbooks/delete/{{ $bilgi->id }}" class="btn btn-danger btn-xs">Sil</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $('#confirm a').click(function(event) {
            event.preventDefault();
            var r=confirm("Geri dönüşü olmayacak şekilde silinecektir, devam etmek istediğinize emin misiniz?");
            if (r==true)   {
                window.location = $(this).attr('href');
            }
        });
    </script>
@endsection