function actionFormatterItem(value, row, index) {
    return [
        '<a class="edit ml10 editItem" title="Ändern">',
        '<i class="glyphicon glyphicon-edit"></i>',
        '</a>',
    ].join('');
};
function actionFormatterDefaultStyle(value, row, index) {
    return [
        '<a class="edit ml10 editDefaultStyle" title="Ändern">',
        '<i class="glyphicon glyphicon-edit"></i>',
        '</a>',
    ].join('');
};
function actionFormatterStyle(value, row, index) {
    return [
        '<a class="edit ml10 editStyle" title="Ändern">',
        '<i class="glyphicon glyphicon-edit"></i>',
        '</a>',
    ].join('');
};




