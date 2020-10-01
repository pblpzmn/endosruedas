@inject('Constant', 'App\Models\Constant')
@extends('layouts.master')

@section('messages')
@if (Session::has($Constant::MESSAGE_SUCCESS) or Session::has($Constant::MESSAGE_ERROR) or Session::has($Constant::MESSAGE_WARNING) or Session::has($Constant::MESSAGE_INFO)) 
<div class="container">
			<div class="row">
			 <div class="col-sm-3">
			 </div>
			 <div class="col-sm-6">
			 
					@if (Session::has($Constant::MESSAGE_SUCCESS))
					<div class="alert alert-success">
					 <a href="#" class="close" data-dismiss="alert">&times;</a>
						<span>{!! Session::get($Constant::MESSAGE_SUCCESS) !!}</span>
					</div>
					@endif
					@if (Session::has($Constant::MESSAGE_ERROR))
					<div class="alert alert-danger">
					 <a href="#" class="close" data-dismiss="alert">&times;</a>
						<span>{!! Session::get($Constant::MESSAGE_ERROR) !!}</span>
					</div>
					@endif
					@if (Session::has($Constant::MESSAGE_WARNING))
					<div class="alert alert-warning">
					 <a href="#" class="close" data-dismiss="alert">&times;</a>
						<span>{!! Session::get($Constant::MESSAGE_WARNING) !!}</span>
					</div>
					@endif
					@if (Session::has($Constant::MESSAGE_INFO))
					<div class="alert alert-info">
					 <a href="#" class="close" data-dismiss="alert">&times;</a>
						<span>{!! Session::get($Constant::MESSAGE_INFO) !!}</span>
					</div>
					@endif
				</div>
				<div class="col-sm-3">
			 	</div>
			</div>
</div>
@endif
@stop