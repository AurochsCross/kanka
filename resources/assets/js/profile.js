var api;

$(document).ready(function() {
    if ($('#newsletter-api').length === 1) {
        init();
    }
});

function init()
{
    api = $('#newsletter-api').val();
    handle($('input[name="mail_release"]'));
    handle($('input[name="mail_newsletter"]'));
    handle($('input[name="mail_vote"]'));
}

function handle(element) {

    $(element).change(function () {
        let name = this.name;
        let data = {};
        data[name] = this.checked ? 1 : 0;

        $.post(api, data);
    });
}
