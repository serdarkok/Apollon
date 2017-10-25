@extends('admin.layout')

@section('content')

    <div class="col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading">Yeni Kullanıcı</div>
            <div class="panel-body">
                @if(isset($user))
                    {{ Form::model($user, ['route' => ['postEditCategory', $user->id], 'class' => 'form-horizontal', 'id' => 'edit-user']) }}
                @else
                    {{ Form::open(['class' => 'form-horizontal', 'id' => 'new-user']) }}
                @endif
                    <div class="form-group">
                        {{ Form::label('Kategori Adı', null, ['class' => 'col-sm-2 control-label']) }}
                        <div class="col-sm-10">
                            {{ Form::text('category_name', null, ['class' => 'form-control', 'placeholder' => 'Kategori Adı']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('Kategori Kısa Adı', null, ['class' => 'col-sm-2 control-label']) }}
                        <div class="col-sm-10">
                            {{ Form::text('category_slug', null, ['class' => 'form-control', 'placeholder' => 'Kategori Kısa Adı']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('Alt Kategori', null, ['class' => 'col-sm-2 control-label']) }}
                        <div class="col-sm-10">
                            {{ Form::select('child_id', $categories , null, ['class' => 'form-control', 'placeholder' => 'Seçiniz...'])}}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('Dil', null, ['class' => 'col-sm-2 control-label']) }}
                        <div class="col-sm-10">
                            {{ Form::select('category_lang_id', $language , null, ['class' => 'form-control', 'placeholder' => 'Seçiniz...'])}}
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