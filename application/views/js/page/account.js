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

    $('#expansion').editable({
        type: 'select',
        url: '?route=account/changeexpansion',
        title: 'Смена дополнения',
        source: [
            {value: 0, text: 'Classic'},
            {value: 1, text: 'TBC'},
            {value: 2, text: 'WotLK'}
        ]
    });
});