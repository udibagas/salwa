var nextBtn = $('.next-page');
nextBtn.on('click', function() {
	$.ajax({
		url: url,
		dataType: 'json',
		beforeSend: function() {
			nextBtn.hide();
			$('.loading').removeClass('hidden');
		},
		success: function(json) {
			$('.loading').addClass('hidden');
			$('#post-list').append(json.html);

			if (json.currentPage < json.lastPage) {
				nextBtn.show();
			} else {
				nextBtn.parent().html('<br /><a href="#" class="back-to-top">BACK TO TOP</a><br /><br />');

				$('body').on("click", ".back-to-top", function() {
					$("html, body").animate({scrollTop: 0}, 700);
					return false;
				});
			}

			url = json.nextPageUrl;
			$('.profile').initial({charCount:1, height:50, width:50,fontSize:25});
		}
	});
	return false;
});
