usingNamespace("Biz.Common")["OpenWindow"] = {
    showbasket: function(A) {
        window.open(A, "basketlist")},
    ShowPicture1: function(A) {
        window.open(A, "", "width=715,height=800,top=60,left=300,resizable=1,scrollbars=1,status=no,toolbar=no,location=no,menu=no")},
    ShowPicture2: function(A) {
        window.open(A, "", "width=1000,height=800,top=60,left=100,resizable=1,scrollbars=1,status=no,toolbar=no,location=no,menu=no")},
    openMemberPriceInfo: function(A) {
        window.open(A, "", "width=410,height=400,top=60,left=300,resizable=1,scrollbars=1,status=no,toolbar=no,location=no,menu=no")
    }
};
usingNamespace("Biz.Common")["TabCtrl"] = {
    tabs: function(A) {
        var B = "." + A;
        var C = $(B);
        if (C.length) {
            B = "." + A;
            $(B + " .tabHead a").click(function() {
                var G = $(this).parents(B).get(0).id;
                var E = $(this).parents(".tabHead").children("*");
                var F = E.length;
                E.removeClass("currentBtn");
                if ($(this).parents(".tabHead").children("a").length > 0) {
                    $(this).addClass("currentBtn")
                } else {
                    $(this).parent().addClass("currentBtn")
                }
                for (var D = 1; D <= F; D++) {
                    $("#" + G + "_" + D).css("display", "none")
                }
                $("#" + G + "_" + this.rel).css("display", "").show();
                $("#" + G).data("currSubName", G + "_" + this.rel);
                return false
            })
        }
    }
};
usingNamespace("Biz.Common")["MoveCtrl"] = {
    iniUnit: function(B, F, A, D) {
        var E = $("#" + F).find(".moveUnit");
        var C = E.length;
        if (C > A) {
            Biz.Common.MoveCtrl.addEvent(B, F, A, "next", D)
        }
    },
    addEvent: function(E, H, C, B, G) {
        var A;
        var D = $("#" + E + " ." + B + "View");
        var F = D.find("a").length;
        D.removeClass(B + "Stop");
        if (F != 0) {
            D = D.find("a")
        }
        A = D.find("span").text();
        D.attr("title", A);
        D.click(function() {
            Biz.Common.MoveCtrl.moveUnit(E, H, C, B, G);
            return false
        })
    },
    moveUnit: function(K, C, B, F, A) {
        if ($("#" + K).data("currSubName") != null) {
            C = $("#" + K).data("currSubName")
        }
        var D = $("#" + C).data("nowUnit");
        if (isNaN(D)) {
            D = 0
        }
        var J = $("#" + K + " ." + F + "View");
        var E = J.find("a").length;
        J.removeClass(F + "Stop");
        if (E != 0) {
            J = J.find("a")
        }
        var I = $("#" + C).find(".moveUnit");
        var G = I.length;
        if (F == "next") {
            for (var H = 0; H < A; H++) {
                $(I[D]).hide("fast");
                if (D == 0) {
                    $("#" + K + " .prevView").removeClass("prevStop");
                    Biz.Common.MoveCtrl.addEvent(K, C, B, "prev", A)
                }
                D = D + 1;
                if (D > (G - B - 1)) {
                    D = G - B;
                    $("#" + K + " .nextView").addClass("nextStop");
                    J.unbind("click").attr("title", "")
                }
            }
        } else {
            for (var H = 0; H < A; H++) {
                D = D - 1;
                $(I[D]).show("fast");
                if (D + B + A == G) {
                    $("#" + K + " .nextView").removeClass("nextStop");
                    Biz.Common.MoveCtrl.addEvent(K, C, B, "next", A)
                }
                if (D <= 0) {
                    D = 0;
                    $("#" + K + " .prevView").addClass("prevStop");
                    J.unbind("click").attr("title", "")
                }
            }
        }
        $("#" + C).data("nowUnit", D)
    }
};
