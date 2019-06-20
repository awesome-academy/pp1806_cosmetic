$(document).ready(function() {
    $("#order").change(function () {
        var selectValue = $(this).val();
        var redirectUrl = '?orderBy=created_at&type=desc#huongntt';

        if (selectValue == 2) {
            redirectUrl = '?orderBy=price&type=asc#huongntt';
        } else if (selectValue == 3) {
            redirectUrl = '?orderBy=price&type=desc#huongntt';
        }
        window.location.replace(redirectUrl);
    })
});