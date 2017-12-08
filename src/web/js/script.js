// Declare namespace
var GoVelo = GoVelo || {};

GoVelo.General = function () {
};

GoVelo.General.prototype = {
    init: function () {
        menu.init();
        /*PAGE home*/
        if ($(".page-home")) {
            home.init();
        }
    }
};

$(document).ready(function () {
    var g = new GoVelo.General();
    g.init();
});
