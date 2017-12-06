(function() {
    $.extend($.fn, {
        mask: function(msg, maskDivClass) {
            // 参数 
            var op = {
                opacity: 0.8,
                z: 10000,
                bgcolor: '#ccc'
            };
            var original = $(document.body);
            var position = {
                top: 0,
                left: 0
            };
            if (this[0] && this[0] !== window.document) {
                original = this;
                position = original.position();
            }
            // 创建一个 Mask 层，追加到对象中 
            var maskDiv = $('<div class="maskdivgen"> </div>');
            maskDiv.appendTo(original);
            var maskWidth = original.clientWidth;

            if (!maskWidth) {
                maskWidth = original.width();
            }
            var maskHeight = original.clientHeight;
            if (!maskHeight) {
                maskHeight = original.height();
            }

            maskDiv.css({
                position: 'absolute',
                top: position.top,
                left: position.left,
                'z-index': op.z,
                width: maskWidth,
                height: maskHeight,
                'background-color': op.bgcolor,
                opacity: 0
            });
            if (maskDivClass) {
                maskDiv.addClass(maskDivClass);
            }
            if (msg) {
                var msgDiv = $('<div style="position:absolute;border:#6593cf 1px solid; padding:2px;background:#ccca"><div style="line-height:24px;border:#a3bad9 1px solid;background:white;padding:2px 10px 2px 10px">' + msg + '</div></div>');
                msgDiv.appendTo(maskDiv);
                var widthspace = (maskDiv.width() - msgDiv.width());
                var heightspace = (maskDiv.height() - msgDiv.height());
                msgDiv.css({
                    cursor: 'wait',
                    top: (heightspace / 2 - 2),
                    left: (widthspace / 2 - 2)
                });
            }
            maskDiv.fadeIn('fast', function() {
                // 淡入淡出效果
                $(this).fadeTo('fast', op.opacity);
            })
            return maskDiv;
        },
        unmask: function() {
            var original = $(document.body);
            if (this[0] && this[0] !== window.document) {
                original = $(this[0]);
            }
            original.find("> div.maskdivgen").fadeOut('fast', 0, function() {
                $(this).remove();
            });
        }
    });
})();

function DisplayLoginMsgBox() {
    $(document).mask(''); //全屏幕遮罩
    var xScroll;
    var yScroll;
    if (self.pageYOffset) {
        yScroll = self.pageYOffset;
        xScroll = self.pageXOffset;
    }
    else
        if (document.documentElement && document.documentElement.scrollTop) { // Explorer 6 Strict   
        yScroll = document.documentElement.scrollTop;
        xScroll = document.documentElement.scrollLeft;
    }
    else
        if (document.body) {   // all other Explorers   
        yScroll = document.body.scrollTop;
        xScroll = document.body.scrollLeft;
    }
    var windowWidth = document.documentElement.clientWidth;
    var windowHeight = document.documentElement.clientHeight;
    var popupHeight = $("#popupContact").height();
    var popupWidth = $("#popupContact").width();
    $("#msgboxLogin").css({
        "position": "absolute",

        "top": (windowHeight / 2 - popupHeight / 2 - 300 + yScroll) + "px",
        "left": (windowWidth / 2 - popupWidth / 2 - 200) + "px"
    });
    $("#msgboxLogin").show();
}

function DisplayLoginMsgBox(id) {
    $(document).mask(''); //全屏幕遮罩
    var xScroll;
    var yScroll;
    if (self.pageYOffset) {
        yScroll = self.pageYOffset;
        xScroll = self.pageXOffset;
    }
    else
        if (document.documentElement && document.documentElement.scrollTop) { // Explorer 6 Strict   
        yScroll = document.documentElement.scrollTop;
        xScroll = document.documentElement.scrollLeft;
    }
    else
        if (document.body) {   // all other Explorers   
        yScroll = document.body.scrollTop;
        xScroll = document.body.scrollLeft;
    }
    var windowWidth = document.documentElement.clientWidth;
    var windowHeight = document.documentElement.clientHeight;
    var popupHeight = $("#popupContact").height();
    var popupWidth = $("#popupContact").width();

    $("#" + id).css({
        "position": "absolute",

        "top": (windowHeight / 2 - popupHeight / 2 - 300 + yScroll) + "px",
        "left": (windowWidth / 2 - popupWidth / 2 - 200) + "px"
    });
    $("#" + id).show();
}

function CloseDiv() {
    $(document).unmask();
    $("#msgboxLogin").hide();
}

function CloseDiv(id) {
    $(document).unmask();
    $("#" + id).hide();
}

function setTab(name, cursel, n) {
    for (i = 1; i <= n; i++) {
        var menu = document.getElementById(name + i);
        var con = document.getElementById("con_" + name + "_" + i);
        menu.className = i == cursel ? "hover" : "";
        con.style.display = i == cursel ? "block" : "none";
    }
}
