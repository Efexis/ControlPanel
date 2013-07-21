$(document).ready(function(){
	$('#name').editable({
		type: 'text',
		url: '?route=team/changename',
		title: 'Название',
		clear: false,
		tpl: '<input type="text" maxlength="24" pattern="^([a-zA-Z\\s]{2,24}|[а-яА-ЯёЁ\\s]{2,24})$">',
		validate: function(value) {
			var text = $.trim(value);
			if(text == '') {
				return 'Название не может быть пустым';
			} else if(text.length < 2 || text.length > 24) {
				return 'Название должно содержать от 2 до 24 символов';
			}
		},
		success: function(response) {
			jQuery(response).insertAfter('#content-header');
		}
	});
});