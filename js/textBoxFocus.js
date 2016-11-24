$(document).ready(function(){
    var editor = $('.textBox');
editor.onfocus = function () {
    window.setTimeout(function () {
        var sel,range;
        if (window.getSelection && document.createRange) {
            range = document.createRange();
            range.selectNodeContents(editor);
            range.collapse(true);
            range.setEnd(editor, editor.childNodes.length);
            range.setStart(editor, editor.childNodes.length);
            sel = window.getSelection();
            sel.removeAllRanges();
            sel.addRange(range);
        } else if (document.body.createTextRange) {
            range = document.body.createTextRange();
            range.moveToElementText(editor);
            range.collapse(true);
            range.select();
        }
    }, 1);
}

textBox.focus()
});