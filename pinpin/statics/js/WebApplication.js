window.usingNamespace = function(A) {
    var C = window;
    if (! (typeof(A) === "string" && A.length != 0)) {
        return C
    }
    var F = C;
    var D = A.split(".");
    for (var B = 0; B < D.length; B++) {
        var E = D[B];
        if (!C[E]) {
            C[E] = {}
        }
        F = C = C[E]
    }
    return F
};
var MessageType = {
    Info: "0",
    Warning: "1",
    Error: "2"
};
