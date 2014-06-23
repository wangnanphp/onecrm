define(function(require, explode) {
    explode.addUser = function() {
        $('#form-add-user').click(function() {
            var submitForm = $(this).parents('form');
            submitForm.submit();
        });
    };
});