@extends('admin.layout')

@section('content')

    <div class="col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading">Yeni Menü</div>
            <div class="panel-body">
                @if(isset($menu))
                    {{ Form::model($menu, ['route' => ['postEditCategory', $menu->id], 'class' => 'form-horizontal', 'id' => 'edit-user']) }}
                @else
                    {{ Form::open(['class' => 'form-horizontal', 'id' => 'new-user']) }}
                @endif
                    <div class="form-group">
                        {{ Form::label('Menü Adı', null, ['class' => 'col-sm-2 control-label']) }}
                        <div class="col-sm-10">
                            {{ Form::text('menu_name', null, ['class' => 'form-control', 'placeholder' => 'Menü Adı']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('Menü Kısa Adı', null, ['class' => 'col-sm-2 control-label']) }}
                        <div class="col-sm-10">
                            {{ Form::text('menu_slug', null, ['class' => 'form-control', 'placeholder' => 'Menü Kısa Adı']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('Menü Linki', null, ['class' => 'col-sm-2 control-label']) }}
                        <div class="col-sm-10">
                            {{ Form::text('menu_link', null, ['class' => 'form-control', 'placeholder' => 'Menü Linki']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('Menü Sıralaması', null, ['class' => 'col-sm-2 control-label']) }}
                        <div class="col-sm-10">
                            {{ Form::text('menu_order', null, ['class' => 'form-control', 'placeholder' => 'Menü Sıralaması']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('Alt Menü', null, ['class' => 'col-sm-2 control-label']) }}
                        <div class="col-sm-10">
                            {{ Form::select('menu_child_id', $menus , null, ['class' => 'form-control', 'placeholder' => 'Seçiniz...'])}}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('Dil', null, ['class' => 'col-sm-2 control-label']) }}
                        <div class="col-sm-10">
                            {{ Form::select('menu_lang_id', $language , null, ['class' => 'form-control', 'placeholder' => 'Seçiniz...'])}}
                        </div>
                    </div>

                    {{ csrf_field() }}
                    <div class="form-group">
                        <div class="col-sm-8 col-sm-offset-2">
                            <button class="btn btn-primary" type="submit">Kaydet</button>
                            <a href="{{ route('usersMainPage') }}" class="btn btn-default">İptal</a>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>

    <script>

        $(document).ready(function () {
            $('#phone').mask("99/99/9999", {placeholder: 'MM/DD/YYYY' });
        });
    </script>

@endsection