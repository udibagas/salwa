@extends('layouts.cms')

@section('title') Aktual @stop

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/forum/admin' => 'FORUM'
		]
	])

@stop

@section('cms-content')

	<div class="" style="margin-bottom:10px;">

	</div>

	<div class="panel panel-blue">
		<div class="panel-heading">
			<h3 class="panel-title">MANAGE FORUM</h3>
		</div>
		<div class="panel-body">
			{!! Form::open(['class' => 'form-inline action']) !!}

				{!! Form::select('action', [
						'/forum/activate' 	=> 'Activate',
						'/forum/deactivate' => 'Deactivate',
						'/forum/close' 		=> 'Close',
						'/forum/open' 		=> 'Open',
						'/forum/delete' 	=> 'Delete',
					],
					request('action'),
					['class' => 'form-control', 'placeholder' => '--Select Action--']
				) !!}

				<button type="submit" name="submit" class="btn btn-info">SUBMIT</button>
				<div class="pull-right text-bold">
					Showing {{ $forums->firstItem() }} to {{ $forums->lastItem() }} of {{ $forums->total() }} entries
				</div>
			{!! Form::close() !!}
		</div>
		<div id="table">
			@include('forum._table')
		</div>
	</div>

	<div class="text-center" id="pagination">
		{!! $forums->appends(['title' => request('title'),'user' => request('user'),'group_id' => request('group_id')])->links() !!}
	</div>

@stop

@push('script')

<script type="text/javascript">
	$('.select-all').click(function() {
		if(this.checked) {
			$(':checkbox').each(function() {
				this.checked = true;
			});
		} else {
			$(':checkbox').each(function() {
				this.checked = false;
			});
		}
	});

	$('body').on('submit', 'form.action', function(e) {
		e.preventDefault();
		var action = $('select[name="action"]').val();
		var selection = [];

		$('[name="id"]:checked').each(function() {
			selection.push(this.value);
		});

		if (action == '') {
			alert('Pilih aksi!');
			return;
		}

		if (selection.length == 0) {
			alert('Pilih data!');
			return;
		}

		$.ajax({
			url : action,
			type: 'GET',
			data: {selection:selection,page:{{request('page')}}},
			dataType: 'json',
			success: function(j) {
				$('#table').html(j.table);
				$('#pagination').html(j.pagination);
			}
		});
	});

</script>

@endpush
