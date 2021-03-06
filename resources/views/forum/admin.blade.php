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
			{!! Form::open(['class' => 'form-inline pull-right', 'method' => 'GET']) !!}
				{!! Form::text('search', request('search'), ['placeholder' => 'Search Forum', 'class' => 'form-control']) !!}
				<input type="hidden" name="status" value="{{ request('status') }}">
				<button type="submit" name="search" class="search btn btn-primary"><i class="fa fa-search"></i></button>
				<a href="/forum/admin" class="btn btn-primary refresh"><i class="fa fa-refresh"></i></a>
			{!! Form::close() !!}

			{!! Form::open(['class' => 'form-inline']) !!}
				<input type="checkbox" name="select" class="select-all form-control">
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

				@if (request('status') == 'b')
				<a class="btn btn-primary" href="/forum/admin?search={{ request('search') }}">Tampilkan semua forum</a>
				@else
				<a class="btn btn-primary" href="/forum/admin?search={{ request('search') }}&status=b">Hanya tampilkan forum yang belum disetujui</a>
				@endif

			{!! Form::close() !!}
		</div>
		<ul id="table" class="list-group">
			@include('forum._table')
		</ul>
		<div class="panel-footer" id="pagination">
			<div class="pull-right">
				Showing {{ $forums->firstItem() }} to {{ $forums->lastItem() }} of {{ $forums->total() }} entries
			</div>
			{!! $forums->appends(['search' => request('search'),'status' => request('status')])->links() !!}
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
			search:$('[name=search]').val(),
			status:$('[name=status]').val(),
		};
		loadData(url, data);
	});

	$('body').on('click', '.refresh', function(e) {
		e.preventDefault();
		loadData('{{url()->current()}}', null);
		$('[name=search]').val('');
	});

	$('body').on('click', '.select-all', function() {
		var t = this;
		if(this.checked) {
			$(':checkbox[name="id"]').each(function() {
				this.checked = true;
				var li = $(this).parent();
				li.addClass('info');
				if (li.hasClass('disabled')) {
					li.addClass('dgr').removeClass('disabled');
				}
			});
		} else {
			$(':checkbox[name="id"]').each(function() {
				this.checked = false;
				var li = $(this).parent();
				li.removeClass('info');
				if (li.hasClass('dgr')) {
					li.addClass('disabled').removeClass('dgr');
				}
			});
		}
	});

	$('body').on('click', ':checkbox[name="id"]', function() {
		var li = $(this).parent();

		if (this.checked) {
			li.addClass('info');
			if (li.hasClass('disabled')) {
				li.addClass('dgr').removeClass('disabled');
			}
		} else {
			li.removeClass('info');
			if (li.hasClass('dgr')) {
				li.addClass('disabled').removeClass('dgr');
			}
		}
	});

	// $('body').on('click', '.list-group-item', function() {
	// 	var t = $(this);
	// 	t.addClass('info');
	// 	if (t.hasClass('disabled')) {
	// 		t.addClass('dgr').removeClass('disabled');
	// 	}
	// });

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
