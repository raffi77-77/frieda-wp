jQuery(document).on('click', ".toggle-tracker-detail", function (e) {
	console.log('toggle-tracker-detail');
	jQuery('.toggle-tracker-tr').hide()
	jQuery(this).closest('tr').toggleClass('active')
	if (jQuery(this).closest('tr').hasClass('active')) {
		jQuery(this).closest('tr').next().show(500)
	}
})
