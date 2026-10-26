$(function () {
    function load() {
        $.get('invites/?q=' + $('#referral-search').val(), function (response) {
            var $list = $('#referral-list').empty();

            $.each(response.data, function (i, inv) {
                $list.append(
                    '<div class="invite">' +
                        '<h3><a href="invite/' + inv.id + '/">' + inv.email + '</a></h3>' +
                        '<p>' + inv.message + '</p>' +
                        '<span class="status">' + inv.status + '</span>' +
                    '</div>'
                );
            });
        }, 'json');
    }

    $('#referral-search').on('input', load);

    $('#referral-invite').on('submit', function (e) {
        e.preventDefault();
        $.post('invite/', $(this).serialize(), function () {
            load();
        }, 'json');
    });

    $('#referral-notify').on('submit', function (e) {
        e.preventDefault();
        $.post('notify/', $(this).serialize(), function (response) {
            alert('Ответ адреса: ' + response.data.body);
        }, 'json');
    });
});
