@each('comment._list', $comments, 'c')

@if (session('success'))
	<div class="alert alert-success text-bold text-center">
		{{ session('success') }}
	</div>
@endif
