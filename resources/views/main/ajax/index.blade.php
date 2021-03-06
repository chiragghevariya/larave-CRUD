@extends('layout.master')

@section('title')
	Ajax|curd
	@endsection


@section('content')

	<br>
	<div class="panel panel-default  col-md-6 col-md-offset-3">
		<div class="panel-heading">
			<h4 class="panel-title">Ajax Example
			<span class="pull-right"><a id="addnew" 
			data-toggle="modal" data-target="#mymodal"><i class="fa fa-plus" aria-hidden="true"></i></a></span>
			</h4>			
		</div>
		<div class="panel-body" id="item-body">
	
				@forelse($data as $data)
			
			<div class="list-group">
				<li data-toggle="modal" data-target="#mymodal" class="list-group-item ouritem" data-toggle="modal" data-target="#mymodal">{{$data->name}}
				<input type="hidden" id="hiddenid" value="{{$data->id}}">
				</li>
				
			</div>
			

			@empty

				<p style="text-align:center;text-shadow: 1px 2px 3px black;font-size: 20px ">No data fount</p>
			
			@endforelse
			
		</div>
		
	</div>	

	<div class="modal fade" id="mymodal" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					
					<button type="button" class="close" data-dismiss="modal" aria-label="close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title" id="title">Add new item</h4>
					
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-lg-6 col-lg-offset-3">
							<input type="hidden" id="id">
							<input type="text" id="name" class="form-control" placeholder="Enter name">

						</div>
					</div>
					
				</div>

				<div class="modal-footer">

					<button type="button" class="btn btn-danger" data-dismiss="modal" style="display: none;" id="delete">Delete
					</button>

					<button type="button" class="btn btn-default" data-dismiss="modal" id="save">save
					</button>
					
					<button type="button" class="btn btn-primary" style="display: none;" data-dismiss="modal" id="update">Save changes
					</button>

				</div>

			</div>		
		</div>
		
	</div>
	{{csrf_field()}}
	<script type="text/javascript" charset="utf-8" >
		
		$(document).ready(function() {
			$(document).on('click', '.ouritem', function(event) {
				event.preventDefault();
				/* Act on the event */
					var text=$(this).text();
					var text=$.trim(text);
					var id =$(this).find('#hiddenid').val();
					$('#delete').show();
					$('#update').show();
					$('#save').hide();
					$('#title').text('Edit Item');
					$('#name').val(text);
					$('#id').val(id);
					console.log(text);
			
			});
			
				

			$(document).on('click', '#addnew', function(event) {
				event.preventDefault();
				/* Act on the event */
					$('#delete').hide();
					$('#update').hide();
					$('#save').show();
					$('#title').text('Add new item');
					$('#name').val('');
			});
			

			$("#save").click(function(event) {

					var text=$('#name').val();
					if(text ==""){
						alert('input field can not empty');
					}

					else{

					$.post('ajax', 
						{'text': text,'_token':$('input[name=_token]').val()}, function(data) {
						/*optional stuff to do after success */
						$('#item-body').load(location.href +' #item-body');
						console.log(data);
					});
					
					}
			});

			$('#delete').click(function(event) {
				/* Act on the event */
				var idd=$('#id').val();
				$.post('delete', {'id':idd,'_token':$('input[name=_token]').val()}, function(data) {
					/*optional stuff to do after success */
					$('#item-body').load(location.href +' #item-body');
					console.log(data);
				});
			});

			$('#update').click(function(event) {
				/* Act on the event */
				var idd=$('#id').val();
				var updated_name=$('#name').val();
				$.post('update', {'id':idd,'new_name':updated_name,'_token':$('input[name=_token]').val()}, function(data) {
					/*optional stuff to do after success */
					$('#item-body').load(location.href +' #item-body');
					console.log(data);
				});
			});
				
		});

	</script>

@endsection


