$(document).ready(function () {
    $('#speciality').change(function () {
        $.get(
            '/groups/' + $(this).val(),
            function (data) {
                $('#table-groups').html(data);
            }
        );
    });
});