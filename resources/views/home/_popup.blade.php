<?php if ($popup) : ?>
<div class="gal-item">
	<div class="box">
		<div class="modal fade" id="popup" tabindex="-1" role="dialog">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
					<div class="modal-body">
						<img id="popup" src="/{{ $popup->img }}" class="img-responsive" alt="{{ $popup->title }}" />
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@push('script')

<script type="text/javascript">
	// $('#popup').click(function() {
	// 	window.location = '{{ $popup->url }}';
	// });
</script>

@endpush

<?php endif; ?>
