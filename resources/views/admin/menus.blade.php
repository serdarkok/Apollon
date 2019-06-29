@extends('admin.layout')

@section('content')

    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">{{ trans('text.admin.menu.allmenus') }}</div>
            <div class="panel-body">
                <table class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Menü Adı</th>
                        <th>Menü Linki</th>
                        <th>Düzenle</th>
                        <th>Sil</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Menü Adı</th>
                        <th>Menü Linki</th>
                        <th>Düzenle</th>
                        <th>Sil</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    Pasif olan menüler sitede görünmez ve aşağıda <span style="background-color: rgba(255,49,49,0.11); display: inline-block; height: 20px; width: 20px; border: 1px solid #DFDFDF; margin-bottom: -4px;"></span> renkte görülmektedir.
                    @foreach($menus as $bilgi)
                        <tr @if($bilgi->status == 0) style="background-color: rgba(255,49,49,0.11);" @endif>
                            <td>{{ $bilgi->id }}</td>
                            <td>{{ $bilgi->_content['menu_name'] }}</td>
                            <td>{{ $bilgi->_content['menu_link'] }}</td>
                            <td class="text-center"><a href="menus/new/{{ $bilgi->id }}" class="btn btn-default btn-xs">Düzenle</a></td>
                            <td class="text-center" id="confirm"><a href="menus/delete/{{ $bilgi->id }}" class="btn btn-danger btn-xs">Sil</a></td>
                        </tr>
                        @foreach($bilgi->child_menus as $item)
                            <tr @if($item->status == 0) style="background-color: rgba(255,49,49,0.11);" @endif>
                                <td>{{ $item->id }}</td>
                                <td><i class="fa fa-long-arrow-right"></i> {{ $item->_content['menu_name'] }}</td>
                                <td>{{ $item->_content['menu_link'] }}</td>
                                <td class="text-center"><a href="menus/new/{{ $item->id }}" class="btn btn-default btn-xs">Düzenle</a></td>
                                <td class="text-center" id="confirm"><a href="menus/delete/{{ $item->id }}" class="btn btn-danger btn-xs">Sil</a></td>
                            </tr>
                        @endforeach
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