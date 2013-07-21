$(document).ready(function(){
    $('#locked').editable({
        type: 'select',
        url: '?route=account/locked',
        title: 'Привязан к IP',
        source: [
            {value: 0, text: 'Нет'},
            {value: 1, text: 'Да'}
        ]
    });
});