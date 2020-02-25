$(document).ready(function () {
    $('.dropdown-toggle').dropdown()
});

$('.task-body').change(function (event) {
    let body = event.target.value;
    let id = $(this).data('id');
    let self = $(this);
    $.ajax({
        type: "POST",
        url: '/tasks/edit',
        data: {
            'id': id,
            'body': body
        },
        success: function (response) {
            console.log(response);
        }
    });
});

$('.task-checkbox').change(function (event) {
    let checked = $(this).prop("checked");
    let id = event.target.value;

    $.ajax({
        type: "POST",
        url: '/tasks/toggle',
        data: {
            'id': id,
            'checked': checked
        },
        success: function (response) {
            console.log(response);
        }
    });
});