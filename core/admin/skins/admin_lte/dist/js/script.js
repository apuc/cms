$(document).ready(function () {
    var editor = document.getElementById('editor1');
    if (editor) {
        CKEDITOR.replace('editor1', {
            filebrowserBrowseUrl: '/core/admin/skins/admin_lte/plugins/elFinder/elfinder.html'
        });
    }

    $('#add_thumb').on('click', function () {
        $('<div id="editor" />').dialogelfinder({
            lang: 'ru',
            url: '/core/admin/skins/admin_lte/plugins/elFinder/php/connector.php',
            getFileCallback: function (file) {
                $('#editor').dialogelfinder('close');
                $('#editor').closest('.elfinder').val(file.path);
                console.log(file.url);
                $('#preview_thumb').html('<img src="' + file.url + '" width="100%">');
                $('#photo_input').val(file.url);
            }
        });
    });

    $('#add_categ').on('click', function () {
        var form = $('#categ_form').serialize();
        $.ajax({
            type: 'POST',
            url: admin_ajax,
            data: form,
            success: function (data) {
                $('.category_tree').html(data);
            }
        });
        return false;
    });

    $('.del_cat').on('click', function () {
        var catId = $(this).data('id');
        $.ajax({
            type: 'POST',
            url: admin_ajax,
            data: {action: 'del_cat', id: catId},
            success: function (data) {
                console.log(data);
            }
        });
        $(this).parent().remove();
        return false;
    });

    $('.reviews_cats-check').on('change', function () {
        var checkId = '';
        $('.reviews_cats-check:checked').each(function () {
            checkId += $(this).val() + ',';
        });
        $('#check_id').val(checkId);
    });

});