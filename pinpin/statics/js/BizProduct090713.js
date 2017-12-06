usingNamespace("Biz.Product")["Product"] = {
    ChangePic: function(A) {
        $("#midImg").attr("src", $(A).attr("ref1"));
        $("#bigImg").attr("href", $(A).attr("ref2"));
        $("#thumList").find("a").removeClass("currentItem");
        $(A).parent().addClass("currentItem")
    }
};
