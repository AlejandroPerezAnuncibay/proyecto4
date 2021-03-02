document.getElementById('customFile').onchange = function () {
    var x = this.value;
    var y = x.split("\\");
    $("label[for=customFile]").text(y[y.length - 1]);

};

document.getElementById('cambiar').onchange = function () {
    var x = this.value;
    var y = x.split("\\");
    $("label[for=cambiar]").text(y[y.length - 1]);

};
