$(document).ready(function() {
    var isclick = "";
    $(".social_nav5").children("ul").children("li").bind("click", function() {
        $(".social_nav5").find(".erji").hide();
        //$(".social_nav5").children("ul").children("li").removeClass("cur");
        if (isclick != $(this).text()) {
            //$(this).addClass("cur");
            $(this).children(".erji").show();
            isclick = $(this).text();
        } else {
            //$(this).removeClass("cur");
            $(this).children(".erji").hide();
            isclick = "";
        }
    });
});

var ke1 = 0;
var ke2 = 0;
var ke3 = 0;
var ke4 = 0;
function getColor1() {
    ke1++;
    switch (ke1) {
        case 1: return "#F08300";
        case 2: return "#FFFFFF";
        case 3: return "#FFFFFF";
        case 4: return "#FFFFFF";
        default: return "#FFFFFF";
    }
}
function getColor2() {
    ke2++;
    switch (ke2) {
        case 1: return "#FFFFFF";
        case 2: return "#F08300";
        case 3: return "#FFFFFF";
        case 4: return "#FFFFFF";
        default: return "#FFFFFF";
    }
}
function getColor3() {
    ke3++;
    switch (ke3) {
        case 1: return "#FFFFFF";
        case 2: return "#FFFFFF";
        case 3: return "#F08300";
        case 4: return "#FFFFFF";
        default: return "#FFFFFF";
    }
}
function getColor4() {
    ke4++;
    switch (ke4) {
        case 1: return "#FFFFFF";
        case 2: return "#FFFFFF";
        case 3: return "#FFFFFF";
        case 4: return "#F08300";
        default: return "#FFFFFF";
    }
}
function colorful1() {
    var o = document.getElementById('asn1')
    o.style.color = getColor1();
    if (ke1 == 4) { ke1 = 0; }
    setTimeout("colorful1()", 1500);
}
function colorful2() {
    var o2 = document.getElementById('asn2')
    o2.style.color = getColor2();
    if (ke2 == 4) { ke2 = 0; }
    setTimeout("colorful2()", 1500);
}
function colorful3() {
    var o3 = document.getElementById('asn3')
    o3.style.color = getColor3();
    if (ke3 == 4) { ke3 = 0; }
    setTimeout("colorful3()", 1500);
}
function colorful4() {
    var o4 = document.getElementById('asn4')
    o4.style.color = getColor4();
    if (ke4 == 4) { ke4 = 0; }
    setTimeout("colorful4()", 1500);
}
colorful1();
colorful2();
colorful3();
colorful4();