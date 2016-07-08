$('.next-page').on('click', function() {
	var t = this;
	$.ajax({
		url: url,
		dataType: 'json',
		beforeSend: function() {
			$('.loading').removeClass('hidden');
		},
		success: function(json) {
			$('.loading').addClass('hidden');
			$('#post-list').append(json.html);
			// if (json.currentPage == json.lastPage) {
			// 	t.addClass('hidden');
			// }
			url = json.nextPageUrl;
			$('.profile').initial({charCount:1, height:50, width:50,fontSize:25});
		}
	});
	return false;
});
