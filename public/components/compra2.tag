<compra2>
    <div class="ocultar">
    <a class="btn btn-primary" target="_blank" href="catalogo" >Catálogo de productos</a>
    <br>
    <br>  
    <h2 class="page-header">
                Nueva compra en tienda
    </h2>
    <div class="well well-sm">
        <div class="row">
            <div class="col-xs-3">
                <input id="cliente" class="form-control" type="text" placeholder="Rif del cliente" />
            </div>
            <div class="col-xs-6">
                <input class="form-control" type="text" placeholder="Nombre completo" value="{nombre}" readonly />
            </div>
            <div class="col-xs-2">
                    <input class="form-control" type="text" placeholder="Cedula del cliente" value="{ci}" readonly />
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-7">
            <input id="product" class="form-control" type="text" placeholder="Nombre del producto" />
        </div>
        <div class="col-xs-2">
            <input id="quantity" class="form-control" type="number" placeholder="Cantidad" />
        </div>
        <div class="col-xs-2">
            <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">BsF.</span>
                <input class="form-control" type="text" placeholder="Precio" value="{price}" readonly />
            </div>
        </div>
        <div class="col-xs-1">
            <button onclick={__addProductToDetail} class="btn btn-primary form-control" id="btn-agregar">
                <i class="glyphicon glyphicon-plus"></i>
            </button>
        </div>
    </div>

    <hr>

    <table class="table table-striped">
        <thead>
        <tr>
            <th style="width:40px;"></th>
            <th>Producto</th>
            <th style="width:100px;">Cantidad</th>
            <th style="width:100px;">Precio Unitario</th>
            <th style="width:100px;">Total</th>
        </tr>
        </thead>
        <tbody>
        <tr each={detail}>
            <td>
                <button onclick={__removeProductFromDetail} class="btn btn-danger btn-xs btn-block">X</button>
            </td>
            <td>{name}</td>
            <td class="text-right">{quantity}</td>
            <td class="text-right">$ {price}</td>
            <td class="text-right">$ {total}</td>
        </tr>
        </tbody>
        <tfoot>
        <tr>
            <td colspan="4" class="text-right"><b>Total</b></td>
            <td class="text-right">$ {total.toFixed(2)}</td>
        </tr>
        </tfoot>
    </table>
    <button if={detail.length > 0 && total > 0} onclick={__pagar}  class="btn btn-primary btn-lg btn-block">
        Pagar
    </button>
    </div>  
    <div class="mostrar" hidden>
    <h2 class="page-header">
        Pago
    </h2>
    <input type="text" id="pupu" hidden>
    <select id="tipoPago" class="form-control form-control-lg" onchange={__prueba}>
        <option value="0" selected hidden disabled>Método de pago</option>
        <option value="Tarjeta de credito">Tarjeta de credito</option>
        <option value="Tarjeta de debito">Tarjeta de debito</option>
        <option value="Cheque">Cheque</option>
    </select>

    <br>
    <br>
    <div id="cheque" class="row" hidden>
        <div class="col-xs-5">
            <input style="width: 430px;" id="cheq" class="form-control" type="text"  placeholder="Cuenta Bancaria"/>
        </div>
        <div class="col-xs-2">
            <input class="form-control" type="text"  placeholder="Banco" value="{banco}" readonly />
        </div>
        <div class="col-xs-2">
            <input id="monto3" class="form-control" type="number"  placeholder="Monto a pagar"/>
        </div>
        <div class="col-xs-1">
            <button onclick={__addChequeToDetail} class="btn btn-primary form-control" id="btn-agregar">
                <i class="glyphicon glyphicon-plus"></i>
            </button>
        </div>
    </div>

    <div id="tardebito" class="row" hidden>
        <div class="col-xs-5">
            <input style="width: 430px;" id="tarjetadeb" class="form-control" type="text"  placeholder="Número de tarjeta"/>
        </div>
        <div class="col-xs-2">
            <input class="form-control" type="text"  placeholder="Banco" value="{banco}" readonly />
        </div>
        <div class="col-xs-2">
            <input class="form-control" type="text"  placeholder="Tipo" value="{tipo}" readonly/>
        </div>
        <div class="col-xs-2">
            <input id="monto2" class="form-control" type="number"  placeholder="Monto a pagar"/>
        </div>
        <div class="col-xs-1">
            <button onclick={__addDebitoToDetail} class="btn btn-primary form-control" id="btn-agregar">
                <i class="glyphicon glyphicon-plus"></i>
            </button>
        </div>
    </div>

    <div id="tarcredito" class="row" hidden>
        <div class="col-xs-5">
            <input style="width: 430px;" id="tarjetacred" class="form-control" type="text"  placeholder="Número de tarjeta"/>
        </div>
        <div class="col-xs-2">
            <input class="form-control" type="text"  placeholder="Banco" value="{banco}" readonly />
        </div>
        <div class="col-xs-2">
            <input class="form-control" type="text"  placeholder="Tipo" value="{tipo}" readonly/>
        </div>
        <div class="col-xs-2">
            <input id="monto1" class="form-control" type="number"  placeholder="Monto a pagar"/>
        </div>
        <div class="col-xs-1">
            <button onclick={__addCreditoToDetail} class="btn btn-primary form-control" id="btn-agregar">
                <i class="glyphicon glyphicon-plus"></i>
            </button>
        </div>
    </div>

    <table class="table table-striped">
        <thead>
        <tr>
            <th style="width:40px;"></th>
            <th>Metodo de pago</th>
            <th >Información de pago </th>
            <th style="width:100px;">Monto a pagar</th>
        </tr>
        </thead>
        <tbody>
        <tr each={detail2}>
            <td>
                <button onclick={__removeTarjetaFromDetail} class="btn btn-danger btn-xs btn-block">X</button>
            </td>
            <td>{metodo}</td>
            <td if={metodo == "Tarjeta de credito" || metodo == "Tarjeta de debito"}"Tarjeta de debito"}>Número de tarjeta: {name} - Banco: {banco} - Tipo: {tipo}</td>
            <td if={metodo == "Cheque"}>Cuenta Bancaria: {name} - Banco: {banco}</td>
            <td class="text-right">$ {monto}</td>
        </tr>
        </tbody>
        <tfoot>
        <tr>            
            <td colspan="3" class="text-right"><b>Restante</b></td>
            <td class="text-right">$ {montot.toFixed(2)}</td>
        </tr> 
        <tr>
            <td colspan="3" class="text-right"><b>Puntos ganados</b></td>
            <td class="text-right">{puntos}</td>
        </tr>       
        </tfoot>
    </table>

    <button if={detail.length > 0 && montot == 0} onclick={__save} class="btn btn-primary btn-lg btn-block">
        Generar compra
    </button>
    </div>

    <script>
        var self = this;

        // Detalle del comprobante
        self.client_id;
        self.usuario_id = document.getElementById("navbarDropdown").text;
        self.tienda_id;
        self.detail = [];
        self.detail2 = [];
        self.catalogo = [];
        self.total = 0;
        self.montot = 0;
        self.puntos = 0;

        self.on('mount', function(){
            __productAutocomplete();
            __creditoAutocomplete();
            __debitoAutocomplete();
            __chequeAutocomplete();
            __clienteAutocomplete();
        })

        __prueba(){
            switch($("#tipoPago").val()){
            case "Cheque":
                $("#cheque").removeAttr("hidden");
                break;
            case "Tarjeta de credito":
                $("#tarcredito").removeAttr("hidden");
                break;
            case "Tarjeta de debito":
                $("#tardebito").removeAttr("hidden");
                break;
            }
        }

        __tiendas(){
            $.getJSON(baseUrl('compra/tiendas'), function (respuesta) {
                    $.each(respuesta, function (clave, valor) {
                        $("#catalogo").append('<option value="' + valor['tie_codigo'] + '">Rif: '+valor['tie_rif']+' Nombre: '+valor['tie_nombre']+'</option>');
                    });
                });
            $("#catalogo").attr("onfocus", "null");
        }

        __pagar(){
            $(".mostrar").removeAttr("hidden");
            $(".ocultar").attr("hidden", "true");
            var parametros = {
                "q" : self.usuario_id
            }
            $.ajax({
                url: baseUrl('compratienda/encontrartienda'),
                data: parametros,
                success: function (respuesta) {
                    self.tienda_id = respuesta;
                }
            })
        }

        __removeProductFromDetail(e) {
            var item = e.item,
                index = this.detail.indexOf(item);

            this.detail.splice(index, 1);
            __calculate();
        }

        __removeTarjetaFromDetail(e) {
            var item = e.item,
                index = this.detail2.indexOf(item);

            this.detail2.splice(index, 1);
            __calculate3();
        }

        __addProductToDetail() {
            if ((document.getElementById("quantity").value > 0) && (document.getElementById("product").value != ''))
            {
                self.detail.push({
                id: self.product_id,
                name: self.product.value,
                quantity: parseFloat(self.quantity.value),
                price: parseFloat(self.price),
                total: parseFloat(self.price * self.quantity.value)
            });
            self.product_id = 0;    
            self.product.value = '';
            self.quantity.value = '';
            self.price = '';

            __calculate();
            }
            else{
                alert("Debe llenar los campos de producto");
            }   
        }

        __addCreditoToDetail() {
                self.detail2.push({
                id: self.tarjeta_id,
                metodo: "Tarjeta de credito",
                name: self.tarjetacred.value,
                banco: self.banco,
                tipo: self.tipo,
                monto: parseFloat(self.monto1.value)
            });
            self.tarjeta_id = 0;    
            self.tarjetacred.value = '';
            self.banco = '';
            self.tipo = '';
            self.monto1.value = '';
            __calculate2();
            $("#tarcredito").attr("hidden", "true");
            $("#tipoPago").val(0);
        }

        __addDebitoToDetail() {
                self.detail2.push({
                id: self.tarjeta_id,
                metodo: "Tarjeta de debito",
                name: self.tarjetadeb.value,
                banco: self.banco,
                tipo: self.tipo,
                monto: parseFloat(self.monto2.value)
            });
            self.tarjeta_id = 0;    
            self.tarjetadeb.value = '';
            self.banco = '';
            self.tipo = '';
            self.monto2.value = '';
            __calculate2();
            $("#tardebito").attr("hidden", "true");
            $("#tipoPago").val(0);
        }

        __addChequeToDetail() {
                self.detail2.push({
                id: self.tarjeta_id,
                metodo: "Cheque",
                name: self.cheq.value,
                banco: self.banco,
                monto: parseFloat(self.monto3.value)
            });
            self.tarjeta_id = 0;    
            self.tarjetacred.value = '';
            self.banco = '';
            self.monto3.value = '';
            __calculate2();
            $("#cheque").attr("hidden", "true");
            $("#tipoPago").val(0);
        }  

        __save() {
            $.post(baseUrl('compratienda/facturar'), {
                tienda_id: self.tienda_id,
                usuario_id: self.usuario_id,
                client_id: self.client_id,
                total: self.total,
                puntos: self.puntos,
                detail: self.detail,
                detail2: self.detail2
            }, function(r){
                if(r.response) { 
                    window.location.href = baseUrl('');                   
                } else {                    
                }
            }, 'json')
        }

        function __calculate() {
            var total = 0;
            var punto = 0;

            self.detail.forEach(function(e){
                total += e.total;
                punto += e.quantity;
            });

            self.total = total;
            self.puntos = punto;
            self.montot = total;
        }

        function __calculate2() {
            var monto = 0;
            self.detail2.forEach(function(e){
                monto = e.monto;
            });
            self.montot -= monto;
        }

        function __calculate3() {
            var monto = 0;
            self.detail2.forEach(function(e){
                monto += e.monto;
            });
            self.montot = self.total - monto;
        }

        function __productAutocomplete(){
            var product = $("#product"),                
                options = {
                url: function(q) {
                    return baseUrl('compratienda/encontrarproducto?q=' + q);
                },
                getValue: 'pro_nombre',
                list: {
                    onClickEvent: function() {
                        var e = product.getSelectedItemData();
                        self.product_id = e.pro_codigo;
                        self.price = e.pro_precio;
                        self.update();
                    }
                }
            };

            product.easyAutocomplete(options);
        }

        function __creditoAutocomplete(){
            var tarjeta = $("#tarjetacred"),
                options = {
                url: function(q) {
                    return baseUrl('compratienda/encontrarcredito?q=' + q + '&c=' +self.client_id);
                },
                getValue: 'med_pag_tar_cred_numero',
                list: {
                    onClickEvent: function() {
                        var e = tarjeta.getSelectedItemData();
                        self.tarjeta_id = e.med_pag_tar_cred_codigo;
                        self.banco = e.med_pag_tar_cred_banco;
                        self.tipo = e.med_pag_tar_cred_tipo;
                        self.update();
                    }
                }
            };
            tarjeta.easyAutocomplete(options);
        }

        function __debitoAutocomplete(){
            var tarjeta = $("#tarjetadeb"),
                options = {
                url: function(q) {
                    return baseUrl('compratienda/encontrardebito?q=' + q + '&c=' +self.client_id);
                },
                getValue: 'med_pag_tar_deb_numero',
                list: {
                    onClickEvent: function() {
                        var e = tarjeta.getSelectedItemData();
                        self.tarjeta_id = e.med_pag_tar_deb_codigo;
                        self.banco = e.med_pag_tar_deb_banco;
                        self.tipo = e.med_pag_tar_deb_tipo;
                        self.update();
                    }
                }
            };
            tarjeta.easyAutocomplete(options);
        }

        function __chequeAutocomplete(){
            var tarjeta = $("#cheq"),
                options = {
                url: function(q) {
                    return baseUrl('compratienda/encontrarcheque?q=' + q + '&c=' +self.client_id);
                },
                getValue: 'med_pag_che_cuenta',
                list: {
                    onClickEvent: function() {
                        var e = tarjeta.getSelectedItemData();
                        self.tarjeta_id = e.med_pag_che_codigo;
                        self.banco = e.med_pag_che_banco;
                        self.update();
                    }
                }
            };
            tarjeta.easyAutocomplete(options);
        }

        function __clienteAutocomplete(){
            var cliente = $("#cliente"),
                options = {
                url: function(q) {
                    return baseUrl('compratienda/encontrarcliente?q='+q);
                },
                getValue: 'cli_nat_rif',
                list: {
                    onClickEvent: function() {
                        var e = cliente.getSelectedItemData();
                        self.nombre = e.clie_nat_primer_nombre+' '+e.cli_nat_segundo_nombre+' '+e.cli_nat_primer_apellido+' '+e.cli_nat_segundo_apellido;
                        self.ci = e.cli_nat_ci;
                        self.client_id = e.cli_nat_rif;
                        self.update();
                    }
                }
            };
            cliente.easyAutocomplete(options);
        }
    </script>
</compra2>