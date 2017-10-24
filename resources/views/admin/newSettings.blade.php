@extends('admin.layout')

@section('header')

    <link rel="stylesheet" href="/admin-sources/css/jquery.tagsinput.css">

@endsection

@section('content')

    <div class="col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading">Site Ayarları</div>
            <div class="panel-body">
                @if(isset($setting))
                    {{ Form::model($setting, ['route' => ['postEditSettings', $setting->id], 'class' => 'form-horizontal', 'id' => 'edit-user']) }}
                @else
                    {{ Form::open(['class' => 'form-horizontal', 'id' => 'new-user']) }}
                @endif

                    <div class="form-group">
                        {{ Form::label('Site Başlığı', null, ['class' => 'col-sm-2 control-label']) }}
                        <div class="col-sm-10">
                            {{ Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Site Başlığı']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('Açıklama', null, ['class' => 'col-sm-2 control-label']) }}
                        <div class="col-sm-10">
                            {{ Form::text('description', null, ['class' => 'form-control', 'placeholder' => 'Açıklama']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('Anahtar Kelimeler', null, ['class' => 'col-sm-2 control-label']) }}
                        <div class="col-sm-10">
                            {{ Form::text('keywords', null, ['class' => 'form-control content_keywords', 'placeholder' => 'Anahtar Kelimeler', 'id' => 'keywords']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('Google Analytics', null, ['class' => 'col-sm-2 control-label']) }}
                        <div class="col-sm-10">
                            {{ Form::textarea('analytics', null, ['class' => 'form-control', 'placeholder' => 'Google Analytics Kodları', 'rows' => '5']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('Facebook', null, ['class' => 'col-sm-2 control-label']) }}
                        <div class="col-sm-10">
                            {{ Form::text('facebook', null, ['class' => 'form-control', 'placeholder' => 'Facebook']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('Twitter', null, ['class' => 'col-sm-2 control-label']) }}
                        <div class="col-sm-10">
                            {{ Form::text('twitter', null, ['class' => 'form-control', 'placeholder' => 'Twitter']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('Instagram', null, ['class' => 'col-sm-2 control-label']) }}
                        <div class="col-sm-10">
                            {{ Form::text('instagram', null, ['class' => 'form-control', 'placeholder' => 'Instagram']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('Youtube', null, ['class' => 'col-sm-2 control-label']) }}
                        <div class="col-sm-10">
                            {{ Form::text('youtube', null, ['class' => 'form-control', 'placeholder' => 'Youtube']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('Site Dili', null, ['class' => 'col-sm-2 control-label']) }}
                        <div class="col-sm-10">
                            {{ Form::select('language', ['tr' => 'tr', 'en' => 'en'], null, ['class' => 'form-control', 'placeholder' => 'Lütfen Seçiniz...'] ) }}
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-8 col-sm-offset-2">
                            <div class="checkbox checkbox-primary">
                                {{ Form::hidden('status', 0) }}
                                {{ Form::checkbox('status', '1', null, ['id' => 'status']) }}
                                <label for="status">Site Aktif</label>
                            </div>
                        </div>
                    </div>

                    {{ csrf_field() }}

                    <div class="form-group">
                        <div class="col-sm-8 col-sm-offset-2">
                            <button class="btn btn-primary" type="submit">Kaydet</button>
                            <a href="{{ route('settingsMainPage') }}" class="btn btn-default">İptal</a>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>

@endsection

@section('footer')

    <script src="/admin-sources/js/jquery.tagsinput.js"></script>

    <script>

        $('#keywords').tagsInput();

        $(document).ready(function () {
            $('#phone').mask("99/99/9999", {placeholder: 'MM/DD/YYYY' });
        });
    </script>

@endsection