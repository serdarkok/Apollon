@extends('admin.layout')

@section('content')

    <div class="col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading">Soru</div>
            <div class="panel-body">
                @if(isset($guestbooks))
                    {{ Form::model($guestbooks, ['route' => ['postEditGuestBooks', $guestbooks->id], 'class' => 'form-horizontal', 'id' => 'edit-guestbook']) }}
                @else
                    {{ Form::open(['class' => 'form-horizontal', 'id' => 'new-user']) }}
                @endif
                    <div class="form-group">
                        {{ Form::label('İsim Soyisim', null, ['class' => 'col-sm-2 control-label']) }}
                        <div class="col-sm-10">
                            {{ Form::text('guest_fullname', null, ['class' => 'form-control', 'placeholder' => 'İsim Soyisim']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('E-Posta', null, ['class' => 'col-sm-2 control-label']) }}
                        <div class="col-sm-10">
                            {{ Form::text('guest_email', null, ['class' => 'form-control', 'placeholder' => 'E-Posta']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('Telefon', null, ['class' => 'col-sm-2 control-label']) }}
                        <div class="col-sm-10">
                            {{ Form::text('guest_phone', null, ['class' => 'form-control', 'placeholder' => 'Telefon']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('Yazı', null, ['class' => 'col-sm-2 control-label']) }}
                        <div class="col-sm-10">
                            {{ Form::textarea('guest_text', null, ['class' => 'form-control']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('Cevap Yaz', null, ['class' => 'col-sm-2 control-label']) }}
                        <div class="col-sm-10">
                            {{ Form::textarea('guest_answer', null, ['class' => 'form-control']) }}
                        </div>
                    </div>

                    {{ csrf_field() }}
                    <div class="form-group">
                        <div class="col-sm-8 col-sm-offset-2">
                            <button class="btn btn-primary" type="submit">Kaydet</button>
                            <a href="{{ route('guestbookMainPage') }}" class="btn btn-default">İptal</a>
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