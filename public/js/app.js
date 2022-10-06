$(document).ready(function () {
    $("#logout").click(function (e) {
        e.preventDefault();
        $("#logoutform").submit();
    });
});
