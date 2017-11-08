@extends('admin.layout')

@section('content')

    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">{{ trans('text.admin.menu.allslides') }}</div>
            <div class="panel-body">

                <table class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Yazı Adı</th>
                        <th>Sıralama</th>
                        <th>Düzenle</th>
                        <th>Slayttan Kaldır</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Yazı Adı</th>
                        <th>Sıralama</th>
                        <th>Düzenle</th>
                        <th>Slayttan Kaldır</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($slides as $bilgi)
                        <tr>
                            <td>{{ $bilgi->_content['id'] }}</td>
                            <td>{{ $bilgi->_content->_content['art_name'] }}</td>
                            <td align="center">
                                @if($bilgi->slider_order == 1)
                                    <a href="/admin/slides/down/{{$bilgi->id}}"><i class="fa fa-arrow-circle-down fa-md"></i></a>
                                @elseif($bilgi->slider_order == $total)
                                    <a href="/admin/slides/up/{{$bilgi->id}}"><i class="fa fa-arrow-circle-up fa-md"></i></a>
                                @else
                                    <a href="/admin/slides/up/{{$bilgi->id}}"><i class="fa fa-arrow-circle-up fa-md"></i></a>&nbsp; <a href="/admin/slides/down/{{$bilgi->id}}"><i class="fa fa-arrow-circle-down fa-md"></i></a>
                                @endif
                            </td>
                            <td class="text-center"><a href="articles/new/{{ $bilgi->art_id }}" class="btn btn-default btn-xs">Düzenle</a></td>
                            <td class="text-center" id="confirm"><a href="slides/remove/{{ $bilgi->art_id }}" class="btn btn-danger btn-xs">Kaldır</a></td>
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