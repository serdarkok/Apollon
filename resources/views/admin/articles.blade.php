@extends('admin.layout')
@section('content')
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <a href="{{ route('getNewArticle') }}" class="btn btn-danger btn-sm">Yeni Ekle</a>
                {{ trans('text.admin.menu.allarticles') }}
            </div>
            <div class="panel-body">
                <table class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Yazı Adı</th>
                        <th>Kategorisi</th>
                        <th>Ana Sayfa</th>
                        <th>Düzenle</th>
                        <th>Sil</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Yazı Adı</th>
                        <th>Kategorisi</th>
                        <th>Ana Sayfa</th>
                        <th>Düzenle</th>
                        <th>Sil</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($articles as $bilgi)
                        <tr>
                            <td>{{ $bilgi->id }}</td>
                            <td>{{ $bilgi->_content['art_name'] }}</td>
                            <td>{{ $bilgi->_categories['category_name'] }}</td>
                            <td class="text-center">@if($bilgi->home_page) <i class="fa fa-circle"></i> @else <i class="fa fa-circle-o"></i> @endif</td>
                            <td class="text-center"><a href="articles/new/{{ $bilgi->id }}" class="btn btn-default btn-xs">Düzenle</a></td>
                            <td class="text-center" id="confirm"><a href="articles/delete/{{ $bilgi->id }}" class="btn btn-danger btn-xs">Sil</a></td>
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