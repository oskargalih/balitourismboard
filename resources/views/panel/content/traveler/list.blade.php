@extends('layouts.app')

@section('add-style')
<link rel="stylesheet" href="{{ asset('assets/admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('content')
<section class="content-header">
  <h1>
    &nbsp;
  </h1>
  <ol class="breadcrumb">
    <li><a href="#">Panel</a></li>
    <li class="active"><a href="#">Traveler</a></li>
  </ol>
</section>

<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">List Traveler</h3>

          <div class="box-tools">
            <div class="input-group input-group-sm">
              <a href="{{ route('panelTravelerNew') }}" class="btn btn-primary">Create New</a>
            </div>
          </div>

        </div>

        <br>

        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
          <table class="table table-bordered table-hover" id="tableList">
            <thead>
              <tr>
                <th style="width: 2%">#</th>
                <th style="width: 15%;">Image</th>
                <th style="width: 20%">Name</th>
                <th style="width: 20%">Status</th>
                <th style="width: 10%">Action</th>
              </tr>              
            </thead>
            <tbody style="font-size: 18px">
        	@for ($i=0; $i < count($traveler); $i++)
              <tr>
                <td>{{ ($i+1) }}.</td>
                <td><img class="img-responsive" src="{{ asset("assets/default/img/upload/".$traveler[$i]->img_url) }}" class="image-responsive" style="width: 100%"></td>
                <td>{{ $traveler[$i]->name }}</td>
                <td>{{ $traveler[$i]->status }}</td>
                <td>
                	<a href="{{ route("panelTravelerEdit", $traveler[$i]->id) }}" style="width: 100%" class="btn btn-warning"><i class="fa fa-edit"></i> Edit</a>
                	<p></p>
                	<a href="javascript:" onclick="deleteLnk('{{ route("panelTravelerDeleteAction", $traveler[$i]->id) }}')" style="width: 100%" class="btn btn-danger"><i class="fa fa-remove"></i> Remove</a>
                </td>
              </tr>
        	@endfor
            </tbody>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
  </div>
</section>
@endsection

@section('add-js')
<script src="{{ asset('assets/admin/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>

<script type="text/javascript">
  $(document).ready(function(){
    $('#tableList').DataTable()
  })
</script>
<script type="text/javascript">
	$(document).ready(function(){
		$('.dataTables_filter').hide()
	})
</script>
@endsection