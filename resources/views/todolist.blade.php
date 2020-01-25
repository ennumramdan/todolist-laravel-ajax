@extends('layouts.app')

@section('content')

	<div class="row">

		<div class="col-lg-offset-3 col-lg-6">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">Todo List
						<a href="#" id="addNew" class="pull-right" data-toggle="modal" data-target="#myModal" ><i class="fa fa-plus"></i></a>
					</h4>
				</div>
				<div class="panel-body" id="allItems">
					<ul class="list-group">
						@foreach($todos as $item)
						<li class="list-group-item editItem" data-id="{{ $item->id }}" data-text="{{ $item->title }}">
							<div class="row">
								<div class="col-lg-9">
									{{ $item->title }}
								</div>
								<div class="col-lg-3">
									<div class="btn-group pull-right" role="group">
										<button class="checkItem btn-xs btn btn-success" data-id="{{ $item->id }}" title="Check list" ><i class="fa fa-check"></i></button>
										<button class="btn-xs btn btn-warning" data-toggle="modal" data-target="#myModal" title="Edit list"><i class="fa fa-pencil"></i></button>
										<button class="removeItem btn-xs btn btn-danger" data-id="{{ $item->id }}" title="Remove list"><i class="fa fa-trash"></i></button>
									</div>
								</div>
							</div>
						</li>
						@endforeach
					</ul>
					<ul class="list-group">
						@foreach($dones as $item)
						<li class="list-group-item disabled">
							<div class="row">
								<div class="col-lg-12">
									{{ $item->title }}
									<input type="hidden" id="itemId" value="{{ $item->id }}">
								</div>
							</div>
						</li>
						@endforeach
					</ul>
				</div>
			</div>
		</div>

		<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="title">Add New Item</h4>
					</div>
					<div class="modal-body">
						<input type="hidden" id="id">
						<p><input type="text" placeholder="Write Item Here" id="addItem" class="form-control"></p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary" id="saveItem" data-dismiss="modal" style="display:none">Save changes</button>
						<button type="button" class="btn btn-primary" id="addButton" data-dismiss="modal">Add Item</button>
					</div>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
	</div>

	{{ csrf_field() }}

@endsection

@section('javascript')

	<script src="{{ asset('js/todo.js') }}" type="text/javascript"></script>

@endsection