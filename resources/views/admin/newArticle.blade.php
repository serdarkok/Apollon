@extends('admin.layout')

@section('header')
    <link rel="stylesheet" href="/admin-sources/css/jquery.tagsinput.css">
    <link rel="stylesheet" href="/admin-sources/css/bootstrap-datepicker3.min.css">
    <link rel="stylesheet" href="/admin-sources/css/bootstrap-datepicker3.standalone.min.css">
@endsection

@section('content')

    <div class="col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading">Yeni Yazı</div>
            <div class="panel-body">
                @if(isset($article))
                    {{ Form::model($article, ['route' => ['postEditArticle', $article->art_id], 'class' => 'form-horizontal', 'id' => 'edit-article', 'files' => true]) }}
                @else
                    {{ Form::open(['class' => 'form-horizontal', 'id' => 'new-user', 'files' => true]) }}
                @endif
                    <div class="form-group">
                        {{ Form::label('Yazı Adı', null, ['class' => 'col-sm-2 control-label']) }}
                        <div class="col-sm-10">
                            {{ Form::text('art_name', null, ['class' => 'form-control', 'placeholder' => 'Yazı Adı', 'id' => 'art_name']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('Yazı Kısa Adı', null, ['class' => 'col-sm-2 control-label']) }}
                        <div class="col-sm-10">
                            {{ Form::text('art_slug', null, ['class' => 'form-control', 'placeholder' => 'Yazı Kısa Adı', 'id' => 'art_slug']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Yazı Resmi</label>
                        <div class="col-sm-10">
                            {{ Form::file('art_image', ['id' => 'input-44']) }}
                            <div id="errorBlock43" class="help-block"></div>
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('Yazı Özeti', null, ['class' => 'col-sm-2 control-label']) }}
                        <div class="col-sm-10">
                            {{ Form::textarea('art_abstract', null, ['class' => 'form-control', 'rows' => '4']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('Yazı İçeriği', null, ['class' => 'col-sm-2 control-label']) }}
                        <div class="col-sm-10">
                            {{ Form::textarea('art_content', null, ['class' => 'form-control', 'id' => 'art_content']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('Kategorisi', null, ['class' => 'col-sm-2 control-label']) }}
                        <div class="col-sm-10">
                            {{ Form::select('cat_id', $categories , null, ['class' => 'form-control', 'placeholder' => 'Seçiniz...'])}}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('Dil', null, ['class' => 'col-sm-2 control-label']) }}
                        <div class="col-sm-10">
                            {{ Form::select('art_lang_id', $languages , null, ['class' => 'form-control', 'placeholder' => 'Seçiniz...'])}}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Yazı Son Tarihi</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                {{ Form::text('end_date', null, ['class' => 'form-control', 'id' => 'end_date']) }}
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            </div>
                            <span class="help-block m-b-none">Tarih eğer boş bırakılırsa yazı her zaman sitede kalır</span>
                        </div>
                    </div>
                    <hr />
                    <div class="form-group">
                        {{ Form::label('Anahtar Kelimeler', null, ['class' => 'col-sm-2 control-label']) }}
                        <div class="col-sm-10">
                            {{ Form::text('art_keywords', null, ['class' => 'form-control content_keywords', 'placeholder' => 'Anahtar Kelimeler', 'id' => 'keywords']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('Yazı Açıklaması', null, ['class' => 'col-sm-2 control-label']) }}
                        <div class="col-sm-10">
                            {{ Form::text('art_description', null, ['class' => 'form-control', 'placeholder' => 'Yazı Açıklaması']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-8 col-sm-offset-2">
                            <div class="checkbox checkbox-primary">
                                {{ Form::hidden('home_page', 0) }}
                                {{ Form::checkbox('home_page', '1', null, ['id' => 'home_page']) }}
                                <label for="home_page">Ana Sayfada Olsun</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-8 col-sm-offset-2">
                            <div class="checkbox checkbox-primary">
                                {{ Form::hidden('status', 0) }}
                                {{ Form::checkbox('status', '1', null, ['id' => 'status']) }}
                                <label for="status">Aktif</label>
                            </div>
                        </div>
                    </div>
                    <hr/>

                    <div class="form-group">
                        <div class="col-sm-8 col-sm-offset-2">
                            <div class="checkbox checkbox-primary">
                                {{ Form::hidden('slider', 0) }}
                                {{ Form::checkbox('slider', '1', null, ['id' => 'slider']) }}
                                <label for="slider">Slaytta Görünsün</label>
                            </div>
                        </div>
                    </div>
                    <div id="hidden">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Slayt Başlangıç Tarihi</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                {{ Form::text('slider_start_date', null, ['class' => 'form-control', 'id' => 'slider_start_date']) }}
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Slayt Bitiş Tarihi</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                {{ Form::text('slider_end_date', null, ['class' => 'form-control', 'id' => 'slider_end_date']) }}
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('Slayt Linki', null, ['class' => 'col-sm-2 control-label']) }}
                        <div class="col-sm-10">
                            {{ Form::text('slider_link', null, ['class' => 'form-control', 'placeholder' => 'Slayt Linki', 'id' => 'slider_link']) }}
                            <span class="help-block m-b-none">Eğer boş bırakılırsa slayta basılınca herhangi bir yere gitmez.</span>
                        </div>
                    </div>
                    </div>
                    {{ csrf_field() }}
                    <div class="form-group">
                        <div class="col-sm-8 col-sm-offset-2">
                            <button class="btn btn-primary" type="submit">Kaydet</button>
                            <a href="{{ route('articlesMainPage') }}" class="btn btn-default">İptal</a>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection

@section('footer')
    <script type="text/javascript" src="/admin-sources/js/ckeditor.js"></script>
    <script type="text/javascript" src="/admin-sources/js/config.js"></script>
    <script src="/admin-sources/js/jquery.tagsinput.js"></script>
    <script src="/admin-sources/js/bootstrap-datepicker.min.js"></script>
    <script src="/admin-sources/js/locales/bootstrap-datepicker.tr.min.js"></script>
    <script>
    $("#input-44").fileinput({
        showPreview : false,
        language: "tr",
        showUpload: false,
        allowedFileExtensions: ["jpg", "png", "jpeg", "gif"]
    });
    $('#keywords').tagsInput();

    $('#end_date').datepicker({
        format: "dd.mm.yyyy",
        orientation: "top auto",
        todayBtn: "linked",
        language: "tr",
        autoclose: true
    });

    $('#slider_end_date').datepicker({
        format: "dd.mm.yyyy",
        orientation: "top auto",
        todayBtn: "linked",
        language: "tr",
        autoclose: true
    });

    $('#slider_start_date').datepicker({
        format: "dd.mm.yyyy",
        orientation: "top auto",
        todayBtn: "linked",
        language: "tr",
        autoclose: true
    });
    CKEDITOR.replace( 'art_content', {
        height: 320
    });


    $('#slider').click(function() {
        $("#hidden").toggle("fast", function () {
        });
    });

    $("#hidden").css('display','none');

    $(document).ready( function(){
        // $("#hidden").css('display','none');
        if ($('#slider').is(':checked'))
        {
            console.log("Evet işaretli");
            $("#hidden").css('display','block');
        }
    });

    $('#art_name').blur(function () {
        $('#art_slug').val(string_to_slug($('#art_name').val()));
    })
</script>
@endsection