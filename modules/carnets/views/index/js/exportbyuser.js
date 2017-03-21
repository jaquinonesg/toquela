//********************************************************

var ExportJpgUser = function() {
    var base = this;
    this.ispdf = false;
    this.docpdf = null;
    this.zip = null;
    this.imgfolder = null;
    this.isjpg = false;
    this.isprint = false;

    this.init = function() {
        if ($("#isprint").val() == "true") {
            this.isprint = true;
        }
        if ($("#ispdf").val() == "true") {
            this.ispdf = true;
        }
        if ($("#isjpg").val() == "true") {
            this.isjpg = true;
        }
        this.events();
        if (this.validateNumCarnets()) {
            if (!this.isprint) {
                this.renderCarnetsRecursive();
            }
        }
    };

    this.events = function() {
        //------
        $("#btn_generate_zip").on("click", function() {
            if (!base.ispdf) {
                $(".exportloader").show();
                $(".exportloader .cerrar").show();
                base.generateZipImg();
            }
        });
        //-----
        $(".exportloader .cerrar").on("click", function() {
            $(".exportloader .cerrar").hide();
            $(".exportloader").hide();
        });
        //-----
        $("#btn_test").on("click", function() {
            base.renderCarnetsRecursive();
        });
    };

    this.renderCarnetsRecursive = function() {
        var numcarnets = $(".body_carnet").length;
        if (this.ispdf) {
            this.docpdf = new jsPDF();
        } else {
            this.zip = new JSZip();
            this.imgfolder = this.zip.folder("carnets");
        }
        var primerpagina = true;
        var htmlprint = '';
        var contendprint = document.getElementById("_contend_print");
        var idhtmlcarnet = "";
        var idcanvasaux = "";
        var objlateral1 = null;
        var objlateral2 = null;
        var vallateral1 = '';
        var vallateral2 = '';
        var mycanvas = null;
        var canvasctx1 = null;
        var canvasctx2 = null;
        var img = null;
        var index = 0;
        //----
        var iterateCanvas = function() {
            if (index >= numcarnets) {
                if (!base.loadPDF()) {
                    if ($("#btn_generate_zip").length) {
                        $("#btn_generate_zip").removeAttr("disabled");
                    }
                }
                $(".exportloader").hide();
                return;
            }

            idhtmlcarnet = "_carnet_" + index;
            objlateral1 = $("#" + idhtmlcarnet + " .item_in_rotate .distribucion");
            objlateral2 = $("#" + idhtmlcarnet + " .item_in_rotate_ri .distribucion");
            vallateral1 = objlateral1.text();
            vallateral2 = objlateral2.text();
            objlateral1.text("");
            objlateral2.text("");
            htmlprint = document.getElementById(idhtmlcarnet);
            idcanvasaux = "_canvas_" + index;
            //-----
            html2canvas(htmlprint, {
                onrendered: function(canvas) {
                    canvas.id = idcanvasaux;
                    contendprint.appendChild(canvas);

                    mycanvas = document.getElementById(idcanvasaux);
                    $("#" + idhtmlcarnet).remove();

                    canvasctx1 = mycanvas.getContext("2d");
                    canvasctx1.save();
                    canvasctx1.translate(310, 100);
                    canvasctx1.fillStyle = '#FFFFFF';
                    canvasctx1.rotate(-Math.PI / 2);
                    canvasctx1.font = 'bold';
                    canvasctx1.textAlign = "center";
                    canvasctx1.fillText(vallateral1, 0, 0);
                    canvasctx1.restore();

                    canvasctx2 = mycanvas.getContext("2d");
                    canvasctx2.save();
                    canvasctx2.translate(15, 300);
                    canvasctx2.fillStyle = '#FFFFFF';
                    canvasctx2.rotate(-Math.PI / 2);
                    canvasctx2.font = 'bold';
                    canvasctx2.textAlign = "center";
                    canvasctx2.fillText(vallateral2, 0, 0);
                    canvasctx2.restore();

                    if (base.ispdf && (base.docpdf != null)) {
                        img = mycanvas.toDataURL("image/jpeg");
                        if (primerpagina) {
                            base.docpdf.addImage(img, 'JPEG', 10, 10);
                            primerpagina = false;
                        } else {
                            base.docpdf.addPage();
                            base.docpdf.addImage(img, 'JPEG', 10, 10);
                        }
                    } else {
                        if (base.isjpg) {
                            img = mycanvas.toDataURL("image/jpeg");
                            base.imgfolder.file("carnet_" + index + ".jpg", img.substr(img.indexOf(',') + 1), {base64: true});
                        } else {
                            img = mycanvas.toDataURL("image/png");
                            base.imgfolder.file("carnet_" + index + ".png", img.substr(img.indexOf(',') + 1), {base64: true});
                        }
                        $("#_contend_img").append('<img class="img_carnet" index="' + $(this).attr("index") + '" src="' + img + '"/>');
                    }
                    $("#" + idcanvasaux).remove();
                    index++;
                    iterateCanvas();
                }
            });
        };
        //-----
        iterateCanvas();
    };

    this.loadPDF = function() {
        if (base.ispdf && (base.docpdf != null)) {
            base.docpdf.output('datauri');
            //var str = base.docpdf.output('dataurlstring');
            return true;
        }
        return false;
    };

    this.generateZipImg = function() {
        if ((this.zip != null) && (this.imgfolder != null)) {
            var content = this.zip.generate();

            location.href = "data:application/zip;base64," + content;
        }
    };

    this.validateNumCarnets = function() {
        var numcarnets = $(".body_carnet").length;
        console.log("validateNumCarnets");
        if (numcarnets > 0) {
            if(this.isprint){
                $(".exportloader").hide();
            }
            return true;
        }
        $(".preview").html('<p class="text-center" style="margin: 1cm;">No hay carnet(s) para exportar.</p>');
        $(".exportloader").hide();
        return false;
    };

};

