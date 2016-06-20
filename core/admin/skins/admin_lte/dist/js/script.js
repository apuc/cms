$( document ).ready(function() {
    CKEDITOR.replace('editor1', {
        filebrowserBrowseUrl : '/core/admin/skins/admin_lte/plugins/elFinder/elfinder.html'
    });

    $('#add_thumb').on('click', function(){
        $('<div id="editor" />').dialogelfinder({
            lang: 'ru',
            url : '/core/admin/skins/admin_lte/plugins/elFinder/php/connector.php',
            getFileCallback: function(file) {
                $('#editor').dialogelfinder('close');
                $('#editor').closest('.elfinder').val(file.path);
                console.log(file.url);
                $('#preview_thumb').html('<img src="' + file.url + '" width="100%">');
                $('#photo_input').val(file.url);
            }
        });
    });
});