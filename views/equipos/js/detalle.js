var Detail = (function() {
    var _this = null;
    function Detail() {
        _this = this;
        _this.eventos2();
        return;
    }
    Detail.prototype.eventos2 = function() {
        _this.eventos();
        return;
    };
    Detail.prototype.eventos = function() {
        console.log('hey');

    };

    return Detail;
})();