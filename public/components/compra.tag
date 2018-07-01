<compra>
    <div class="ocultar">
    <a class="btn btn-primary" target="_blank" href="compra/catalogo" >Catálogo de productos</a>
    <br>
    <br>  
    <select id="catalogo" class="form-control form-control-lg" onfocus="{__tiendas}" >
        <option selected hidden disabled>Tienda a comprar</option>
    </select>
    <h2 class="page-header">
                Nueva compra
    </h2>
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
        Pago con tarjeta de credito
    </h2>
    <div class="row">
        <div class="col-xs-5">
            <input style="width: 430px;" id="tarjeta" class="form-control" type="text"  placeholder="Número de tarjeta"/>
        </div>
        <div class="col-xs-2">
            <input class="form-control" type="text"  placeholder="Banco" value="{banco}" readonly />
        </div>
        <div class="col-xs-2">
            <input class="form-control" type="text"  placeholder="Tipo" value="{tipo}" readonly/>
        </div>
        <div class="col-xs-2">
            <input id="monto" class="form-control" type="number"  placeholder="Monto a pagar"/>
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
            <th>Número de tarjeta</th>
            <th >Banco</th>
            <th >Tipo</th>
            <th style="width:100px;">Monto a pagar</th>
        </tr>
        </thead>
        <tbody>
        <tr each={detail2}>
            <td>
                <button onclick={__removeTarjetaFromDetail} class="btn btn-danger btn-xs btn-block">X</button>
            </td>
            <td>{name}</td>
            <td>{banco}</td>
            <td>{tipo}</td>
            <td class="text-right">$ {monto}</td>
        </tr>
        </tbody>
        <tfoot>
        <tr>
            <td colspan="4" class="text-right"><b>Restante</b></td>
            <td class="text-right">$ {montot.toFixed(2)}</td>
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
        self.client_id = document.getElementById("navbarDropdown").text;
        self.usuario_id;
        self.tienda_id;
        self.detail = [];
        self.detail2 = [];
        self.catalogo = [];
        self.total = 0;
        self.montot = 0;

        self.on('mount', function(){
            __productAutocomplete();
            __tarjetaAutocomplete();
        })

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
                "q" : self.client_id
            }
            self.tienda_id = $("#catalogo").val();
            $.ajax({
                url: baseUrl('compra/encontrarusuario'),
                data: parametros,
                success: function (respuesta) {
                    self.usuario_id = respuesta;
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
                name: self.tarjeta.value,
                banco: self.banco,
                tipo: self.tipo,
                monto: parseFloat(self.monto.value)
            });
            self.tarjeta_id = 0;    
            self.tarjeta.value = '';
            self.banco = '';
            self.tipo = '';
            self.monto.value = '';
            __calculate2();                      
        } 

        __save() {
            $.post(baseUrl('compra/guardar'), {
                tienda_id: self.tienda_id,
                usuario_id: self.usuario_id,
                client_id: self.client_id,
                total: self.total,
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

            self.detail.forEach(function(e){
                total += e.total;
            });

            self.total = total;
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
                    return baseUrl('compra/encontrarproducto?q=' + q);
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
        function __tarjetaAutocomplete(){
            var tarjeta = $("#tarjeta"),
                cliente = self.client_id,
                options = {
                url: function(q) {
                    return baseUrl('compra/encontrarcredito?q=' + q + '&c=' +cliente);
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
    </script>
</compra>