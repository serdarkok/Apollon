@extends('admin.layout')

@section('content')

    <div class="col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading">Yeni Kullanıcı</div>
            <div class="panel-body">
                @if(isset($user))
                    {{ Form::model($user, ['route' => ['User_Post', $user->id], 'class' => 'form-horizontal', 'id' => 'edit-user']) }}
                @else
                    {{ Form::open(['class' => 'form-horizontal', 'id' => 'new-user']) }}
                @endif
                    <div class="form-group">
                        {{ Form::label('İsim', null, ['class' => 'col-sm-2 control-label']) }}
                        <div class="col-sm-10">
                            {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'İsim']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('Soyisim', null, ['class' => 'col-sm-2 control-label']) }}
                        <div class="col-sm-10">
                            {{ Form::text('surname', null, ['class' => 'form-control', 'placeholder' => 'Soyisim']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('Şifre', null, ['class' => 'col-sm-2 control-label']) }}
                        <div class="col-sm-10">
                            {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Şifre']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('E-Posta', null, ['class' => 'col-sm-2 control-label']) }}
                        <div class="col-sm-10">
                            {{ Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'E-Posta']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('Telefon', null, ['class' => 'col-sm-2 control-label']) }}
                        <div class="col-sm-10">
                            {{ Form::text('phone', null, ['class' => 'form-control', 'placeholder' => 'Telefon', 'maxlength' => '14']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('Yetki', null, ['class' => 'col-sm-2 control-label']) }}
                        <div class="col-sm-10">
                            {{ Form::select('authority', ['3' => 'Kullanıcı', '2' => 'Editör', '1' => 'Yönetici'], null, ['class' => 'form-control', 'placeholder' => 'Seçiniz...'])}}
                        </div>
                    </div>
                    {{ csrf_field() }}
                    <div class="form-group">
                        <div class="col-sm-8 col-sm-offset-2">
                            <button class="btn btn-primary" type="submit">Kaydet</button>
                            <button class="btn btn-default" type="submit">İptal</button>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>

@endsection