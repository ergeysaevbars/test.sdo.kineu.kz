$(document).ready(function () {
    $('#spec').on('change', function () {
        $.get(
            '/api/speciality/' + $(this).val() + '/groups',
            function (data) {
                var options = '<option value="0">Выберите группу</option>';

                for (var id in data) {
                    options += '<option value="' + data[id]['spec_id'] + '">' + data[id]['gruppa'] + '</option>';
                }

                $('#group').html(options);
            }
        ).fail(function () {
            $('#group').empty();
        });
    });
});