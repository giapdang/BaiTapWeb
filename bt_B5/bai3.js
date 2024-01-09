
function ngaunhien(min,max) {
    return Math.floor(Math.random()*(max-min))+min;
}

function ham() {
    var x = document.getElementById("ip1")
    x = Number(x.value)
    // var y = Math.round(Math.random()) // Trả về 0 hoặc 1
    var y = ngaunhien(1,10);
    if (x > 10 || x < 1) {
        document.getElementById("hp1").innerHTML = "Bạn nhập sai số, vui lòng nhập lại";
    } else if (x == y) {
        document.getElementById("hp1").innerHTML = "Bạn đã đoán đúng";
    } else if (x != y) {
        document.getElementById("hp1").innerHTML = "Bạn đã đoán sai , số đúng là " + y;
    }
}