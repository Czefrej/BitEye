$("#settingsFilterData").change(function () {
    if(this.checked){
        Cookies.set('deleteInaccurateData', true, {expires: 7});
    }else{
        Cookies.set('deleteInaccurateData', false, {expires: 7});
    }


    var pathname = window.location.pathname;
    if ($("#customSwitch1").length) {
        if (pathname.indexOf("offer") > -1) {
            if (Cookies.get('deleteInaccurateData') == 'true') {
                $("#customSwitch1").attr("checked", true);
            }else{
                $("#customSwitch1").attr("checked", false);
            }
            reloadTransactionData();
        }
    }
});
$(document).ready(function() {
    if (Cookies.get('deleteInaccurateData') == 'true') {
        $("#settingsFilterData").attr("checked", true);
    }

});
