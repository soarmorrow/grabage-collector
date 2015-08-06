@extends('backend.layouts.default')

@section('title')
    Application Settings
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            System Settings
            <small>Manage application settings</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Settings</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-body">
                        {!! Form::open(['url'=>route('settings'),'method'=>'post']) !!}
                        <div>

                            <button href="{{route('settings.store')}}" class="btn btn-success pull-right"><i class="fa fa-save"></i>&nbsp; Update Changes</button>
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#general" aria-controls="general"
                                                                          role="tab" data-toggle="tab">General</a></li>
                                <li role="presentation"><a href="#about" aria-controls="about" role="tab"
                                                           data-toggle="tab">About</a></li>
                                <li role="presentation"><a href="#legal" aria-controls="legal" role="tab"
                                                           data-toggle="tab">Legal</a></li>
                                <li role="presentation"><a href="#contact" aria-controls="contact" role="tab"
                                                           data-toggle="tab">Contact</a></li>
                            </ul><!-- Nav tabs -->


                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="general">
                                    <div class="row">
                                        <div class="col-md-12">
                                            {!!($errors->has('about')?'<p class="text-danger">'.$errors->first('about').'</p>':'')!!}
                                            {!!($errors->has('about_title')?'<p class="text-danger">'.$errors->first('about_title').'</p>':'')!!}
                                            {!!($errors->has('legal')?'<p class="text-danger">'.$errors->first('legal').'</p>':'')!!}
                                            {!!($errors->has('legal_title')?'<p class="text-danger">'.$errors->first('legal_title').'</p>':'')!!}
                                            {!!($errors->has('contact')?'<p class="text-danger">'.$errors->first('contact').'</p>':'')!!}
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover">
                                                    <tbody>
                                                    <tr class="{{($errors->has('rate'))?'class=has-error text-danger danger':''}}">
                                                        <th>
                                                            Rate
                                                            <small>(including %)</small>
                                                        </th>
                                                        <td>
                                                            <input type="text" value="{{get_option('rate')}}" name="rate" class="form-control"
                                                                   placeholder="Rate for 1 kg"
                                                                   required/>
                                                            {!!($errors->has('rate')?'<span class="text-danger">'.$errors->first('rate').'</span>':'')!!}
                                                        </td>
                                                    </tr>
                                                        <tr class="{{($errors->has('app'))?"has-error text-danger danger":''}}">
                                                        <th>
                                                            Application Name
                                                        </th>
                                                        <td>
                                                            <input type="text" name="app" value="{{get_option('app')}}"  class="form-control"
                                                                   placeholder="Garbage Collector"
                                                                   required/>

                                                            {!!($errors->has('app')?'<span class="text-danger">'.$errors->first('app').'</span>':'')!!}
                                                        </td>
                                                    </tr>
                                                    <tr class="{{($errors->has('language'))?"has-error text-danger danger":''}}">
                                                        <th>
                                                            Language
                                                        </th>
                                                        <td>
                                                            <input type="text" name="language" value="{{get_option('language')}}"  readonly
                                                                   class="form-control" placeholder="English"
                                                                   required/>

                                                            {!!($errors->has('language')?'<span class="text-danger">'.$errors->first('language').'</span>':'')!!}
                                                        </td>
                                                    </tr>
                                                    <tr class="{{($errors->has('sent_from'))?"has-error text-danger danger":''}}">
                                                        <th>
                                                            Sent mail address
                                                        </th>
                                                        <td>
                                                            <input type="text" name="sent_from" value="{{get_option('sent_from')}}"
                                                                   class="form-control" placeholder="no-reply@gac.com"
                                                                   required/>

                                                            {!!($errors->has('sent_from')?'<span class="text-danger">'.$errors->first('sent_from').'</span>':'')!!}
                                                        </td>
                                                    </tr>
                                                    <tr  class="{{($errors->has('facebook'))?"has-error text-danger danger":''}}">
                                                        <th>
                                                            Facebook
                                                        </th>
                                                        <td>
                                                            <input type="text" name="facebook"
                                                                   class="form-control" value="{{get_option('facebook')}}"  placeholder="garbagecollector"
                                                                   required/>

                                                            {!!($errors->has('facebook')?'<span class="text-danger">'.$errors->first('facebook').'</span>':'')!!}
                                                        </td>
                                                    </tr>
                                                    <tr class="{{($errors->has('google_plus'))?"has-error text-danger danger":''}}">
                                                        <th>
                                                            Google+
                                                        </th>
                                                        <td>
                                                            <input type="text" name="google_plus"
                                                                   class="form-control" value="{{get_option('google_plus')}}"  placeholder="+garbagecollector"
                                                                   required/>

                                                            {!!($errors->has('google_plus')?'<span class="text-danger">'.$errors->first('google_plus').'</span>':'')!!}
                                                        </td>
                                                    </tr>
                                                    <tr class="{{($errors->has('twitter'))?"has-error text-danger danger":''}}">
                                                        <th>
                                                            Twitter
                                                        </th>
                                                        <td>
                                                            <input type="text" name="twitter"
                                                                   class="form-control" value="{{get_option('twitter')}}"  placeholder="@garbagecollector"
                                                                   required/>

                                                            {!!($errors->has('twitter')?'<span class="text-danger">'.$errors->first('twitter').'</span>':'')!!}
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="about">

                                    <div class="clearfix"></div>
                                    <br/>

                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-pencil"></i> </span>
                                        <input class="form-control" value="{{get_option('about')['title']}}" name="about_title" placeholder="About title">
                                    </div>
                                    <div class="clearfix"></div>
                                    <br/>
                                    <textarea name="about" id="about_content" class="form-control"
                                              placeholder="About the application">{!! get_option('about')['content'] !!}</textarea>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="legal">

                                    <div class="clearfix"></div>
                                    <br/>

                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-legal"></i> </span>
                                        <input class="form-control" value="{{get_option('legal')['title']}}" name="legal_title" placeholder="Legal title">
                                    </div>

                                    <div class="clearfix"></div>
                                    <br/>

                                    <textarea name="legal" id="legal_content" class="form-control"
                                              placeholder="About the application">{!! get_option('legal')['content'] !!}</textarea>

                                </div>
                                <div role="tabpanel" class="tab-pane" id="contact">

                                    <div class="clearfix"></div>
                                    <br/>

                                    <div class="clearfix"></div>
                                    <br/>

                                    <textarea name="contact" id="contact_content" class="form-control"
                                              placeholder="About the application">{!! get_option('contact') !!}</textarea>
                                </div>
                            </div>

                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
    </section>
@endsection

@section('js')
    <script src="//cdn.ckeditor.com/4.5.2/full/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('about_content', {enterMode: CKEDITOR.ENTER_BR});
        CKEDITOR.replace('legal_content', {enterMode: CKEDITOR.ENTER_BR});
        CKEDITOR.replace('contact_content', {enterMode: CKEDITOR.ENTER_BR});

    </script>
@endsection