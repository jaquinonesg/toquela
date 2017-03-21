//********************************************************
$(document).ready(function() {
    var epu = new ExportPDFUser();
    epu.init();
});

var ExportPDFUser = function() {
    var base = this;

    this.init = function() {
        this.events();
        this.renderizarPDFCarnets();
    };

    this.events = function() {
        $("#btn_test").on("click", function() {
            alert("test");
        });
    };

    this.renderizarPDFCarnets = function() {
        //_carnet_0
//        var doc = new jsPDF();
//
//        var specialElementHandlers = {
//            '#_contend_pdf': function(element, renderer) {
//                console.log(element);
//                return true;
//            }
//        };
//
//        doc.fromHTML($('body').get(0), 15, 15, {
//            'width': 170,
//            'elementHandlers': specialElementHandlers
//        });
//        

    };


};

