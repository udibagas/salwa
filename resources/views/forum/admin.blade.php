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

	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="fa fa-comments-o"></i> MANAGE FORUM</h3>
		</div>
		<div class="panel-body">
			{!! Form::open(['class' => 'form-inline']) !!}

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

				<button type="submit" name="submit" class="btn btn-primary action">SUBMIT</button>
			{!! Form::close() !!}

			<hr>

			<div id="table">
				@include('forum._table')
			</div>
		</div>
		<div class="panel-footer" id="pagination">
			<div class="pull-right">
				Showing {{ $forums->firstItem() }} to {{ $forums->lastItem() }} of {{ $forums->total() }} entries
			</div>
			{!! $forums->appends(['title' => request('title'),'user' => request('user'),'group_id' => request('group_id')])->links() !!}
			<div class="clearfix"></div>
		</div>
	</div>

@stop

@push('script')

<script type="text/javascript">

	var page = {{ $forums->currentPage() }};

	var loadData = function(url, data) {
		$.ajax({
			url : url,
			type: 'GET',
			data: data,
			dataType: 'json',
			success: function(j) {
				$('#table').html(j.table);
				$('#pagination').html(j.pagination);
				page = j.page;
			}
		});
	}

	$('#pagination').on('click', 'a', function(e) {
		e.preventDefault();
		loadData(this.href, null);
	});

	$('body').on('click', '.search', function(e) {
		e.preventDefault();
		var url = '{{url()->current()}}';
		var data = {
			title:$('[name=title]').val(),
			user:$('[name=user]').val(),
			group_id:$('[name=group_id]').val(),
			close:$('[name=close]').val()
		};
		loadData(url, data);
	});

	$('body').on('click', '.refresh', function(e) {
		e.preventDefault();
		loadData('{{url()->current()}}', data);
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

	// $('body').keypress(function(e) {
	// 	console.log(e.key);
	// });

	$('form').on('click', '.action', function(e) {

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

		if (!confirm('Apakah Anda yakin?')) {
			return;
		}

		loadData(action, {selection:selection, page: page});
	});

</script>

@endpush
