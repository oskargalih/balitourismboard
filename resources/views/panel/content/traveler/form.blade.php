@extends('layouts.app')

@section('add-style')
<link rel="stylesheet" href="{{ asset('assets/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
<!-- <link rel="stylesheet" href="{{ asset('assets/admin/plugins/tags-input/dist/jquery.tagsinput.min.css') }}"> -->
<style type="text/css">
.bootstrap-wysihtml5-insert-image-modal {
  display: hidden !important;
}
.tagsinput {
  width: 100% !important;
  height: auto !important;
}
</style>
@endsection

@section('content')
<section class="content-header">
  <h1>
    &nbsp;
  </h1>
  <ol class="breadcrumb">
    <li><a href="#">Panel</a></li>
    <li><a href="#">Traveler</a></li>
    <li class="active">{{ Request::is('panel/traveler/new') ? 'Create New' : 'Edit' }}</li>
  </ol>
</section>

<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">{{ Request::is("panel/traveler/edit/*") ? "Form Edit" : "Form Create New" }}</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form class="form-horizontal" action="{{ Request::is("panel/traveler/edit/*") ? route('panelTravelerEditAction', @$traveler->id) : route('panelTravelerNewAction') }}" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}

          @if ($errors->any())
          @foreach ($errors->all() as $error)
          <div class="alert alert-danger fade in">{{ $error }}</div>
          @endforeach
          @endif

          <div class="box-body">

            <div class="form-group">
              <label for="name" class="col-sm-2 control-label">Name</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="name" placeholder="Name" name="name" value="{{ @$traveler->name }}">
              </div>
            </div>

            <div class="form-group">
              <label for="type" class="col-sm-2 control-label">Status</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="status" placeholder="Status" name="status" value="{{ @$traveler->status }}">
              </div>
            </div>

            <div class="form-group">
              <label for="image_file" class="col-sm-2 control-label">Image</label>
              <div class="col-sm-10">
                <input class="form-control" type="file" accept=".jpg,.jpeg,.png,.gif,.svg" name="image_file">
              </div>
            </div>

<!--             <div class="form-group">
              <label for="" class="col-sm-2 control-label">Created Date</label>
              <div class="col-sm-10">
                <input type="text" readonly="" disabled="" class="form-control" placeholder="" name="" value="{{ date('D, d F Y') }}">
              </div>
            </div> -->

          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <div class="pull-right">
              <a href="{{ route('panelTravelerList') }}" class="btn btn-default">Cancel</a>
              <button type="submit" class="btn btn-success">Save Content</button>
            </div>
          </div>
          <!-- /.box-footer -->
        </form>
      </div>
    </div>
  </div>
</section>
@endsection

@section('add-js')
<script src="{{ asset('assets/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
<!-- <script src="{{ asset('assets/admin/plugins/tags-input/dist/jquery.tagsinput.min.js') }}"></script> -->
<script type="text/javascript">
  $(function(){
    // $('#tags').tagsInput()
    $('.textarea').wysihtml5()
    $('#addContent').click(function(){
      $('#blankContent').append('<div class="form-group" id="oldContent" style=""><label for="inputContent" class="col-sm-2 control-label"></label><div class="col-sm-10"><input type="text" class="form-control" id="inputContent" placeholder="Content" name="content[]"></div></div>')
    })
  })
</script>
@endsection