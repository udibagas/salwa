var lastPage = false;
var loadMore = function() {
	$.ajax({
		url: url,
		data: {search: search, group_id: group_id, user_id: user_id, q: q},
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
				lastPage = true;
				nextBtn.parent().html('<br /><a href="#" class="back-to-top"><i class="fa fa-arrow-circle-up"></i> BACK TO TOP</a><br /><br />');
			}

			$('.profile').initial({charCount:1, height:50, width:50,fontSize:25});
			url = json.nextPageUrl;
		}
	});
};

$(window).scroll(function() {
	if($(window).scrollTop() + $(window).height() == $(document).height() && lastPage == false && url != '') {
	   loadMore();
	}
});


var nextBtn = $('.next-page');
nextBtn.on('click', function(e) {
	e.preventDefault();
	loadMore();
});

$('body').on("click", ".back-to-top", function(e) {
	e.preventDefault()
	$("html, body").animate({scrollTop: 0}, 700);
});
