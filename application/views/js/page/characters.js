$(document).ready(function(){
	$('#name').editable({
		type: 'text',
		url: '?route=characters/changename',
		title: 'Имя',
		clear: false,
		tpl: '<input type="text" maxlength="12" pattern="^([a-zA-Z]{2,12}|[а-яА-ЯёЁ]{2,12})$">',
		validate: function(value) {
			var text = $.trim(value);
			if(text == '') {
				return 'Имя не может быть пустым';
			} else if(text.length < 2 || text.length > 12) {
				return 'Имя должно содержать от 2 до 12 символов';
			}
		},
		success: function(response) {
			jQuery(response).insertAfter('#content-header');
		}
	});

	$('#race').editable({
		type: 'select',
		url: '?route=characters/changerace',
		title: 'Раса',
		success: function(response) {
			jQuery(response).insertAfter('#content-header');
		},
		source: [
			{value: 1, text: 'Человек'},
			{value: 2, text: 'Орк'},
			{value: 3, text: 'Дворф'},
			{value: 4, text: 'Ночной эльф'},
			{value: 5, text: 'Нежить'},
			{value: 6, text: 'Таурен'},
			{value: 7, text: 'Гном'},
			{value: 8, text: 'Тролль'}
		]
	});

	$('#class').editable({
		type: 'select',
		url: '?route=characters/changeclass',
		title: 'Класс',
		source: [
			{value: 1, text: 'Воин'},
			{value: 2, text: 'Паладин'},
			{value: 3, text: 'Охотник'},
			{value: 4, text: 'Разбойник'},
			{value: 5, text: 'Жрец'},
			{value: 6, text: 'Рыцарь смерти'},
			{value: 7, text: 'Шаман'},
			{value: 8, text: 'Маг'},
			{value: 9, text: 'Чернокнижник'},
			{value: 11, text: 'Друид'}
		]
	});

	$('#level').editable({
		type: 'text',
		url: '?route=characters/changelevel',
		title: 'уровень',
		clear: false,
		tpl: '<input type="text" maxlength="3" pattern="[0-9]{1,3}">',
		validate: function(value) {
			if(value == '') {
				return 'Уровень не может быть пустым';
			}
			if(value.search("[^0-9]") != -1) {
				return 'Уровень может состоять только из цифр';
			}
			if(value < 1 || value > 255) {
				return 'Уровень должен быть от 1 до 255';
			}
		}
	});
});