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

	$('#pagination').on('click', 'a', function(e) {
		e.preventDefault();
		$.ajax({
			url : this.href,
			type: 'GET',
			dataType: 'json',
			success: function(j) {
				$('#table').html(j.table);
				$('#pagination').html(j.pagination);
			}
		});
	});

	$('body').on('click', '.select-all', function() {
		var t = this;
		if(this.checked) {
			$(':checkbox[name="id"]').each(function() {
				this.checked = true;
				var tr = $(this).parent().parent();
				tr.addClass('info');
				if (tr.hasClass('danger')) {
					tr.addClass('dgr').removeClass('danger');
				}
			});
		} else {
			$(':checkbox[name="id"]').each(function() {
				this.checked = false;
				var tr = $(this).parent().parent();
				tr.removeClass('info');
				if (tr.hasClass('dgr')) {
					tr.addClass('danger').removeClass('dgr');
				}
			});
		}
	});

	$('body').keypress(function(e) {
		console.log(e.key);
	});

	// $("tbody tr").shiftKeypress(function() {
	//     $(this).find(':checkbox').checked(true);
	// });

	$('body').on('submit', 'form.action', function(e) {

		e.preventDefault();

		if (!confirm('Apakah Anda yakin?')) {
			return;
		}

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
			data: {selection:selection,page:{{request('page', 1)}}},
			dataType: 'json',
			success: function(j) {
				$('#table').html(j.table);
				$('#pagination').html(j.pagination);
			}
		});

	});

</script>

@endpush
