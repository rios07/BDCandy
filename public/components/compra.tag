<compra>
    <div class="row">
        <div class="col-xs-7">
            <input id="product" class="form-control" type="text" placeholder="Nombre del producto" />
        </div>
        <div class="col-xs-2">
            <input id="quantity" class="form-control" type="number" placeholder="Cantidad" />
        </div>
        <div class="col-xs-2">
            <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">Bs.</span>
                <input class="form-control" type="text" placeholder="Precio" value="{price}" readonly />
            </div>
        </div>
        <div class="col-xs-1">
            <button onclick={__addProductToDetail} class="btn btn-primary form-control" id="btn-agregar">
                <i class="glyphicon glyphicon-plus"></i>
            </button>
        </div>
    </div>

    <hr />

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

    <div class="col-xs-7">
            <input id="credito" class="form-control" type="text" placeholder="Número de tarjeta" />
    </div>

    <button if={detail.length > 0} onclick={__save} class="btn btn-primary btn-lg btn-block">
        Guardar
    </button>

    <script>
        var self = this;

        // Detalle del comprobante
        self.client_id = document.getElementById("navbarDropdown").text;
        self.detail = [];
        self.total = 0;

        self.on('mount', function(){
            __productAutocomplete();
        })

        __removeProductFromDetail(e) {
            var item = e.item,
                index = this.detail.indexOf(item);

            this.detail.splice(index, 1);
            __calculate();
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

        __save() {
            $.post(baseUrl('invoice/save'), {
                client_id: self.client_id,
                total: self.total,
                detail: self.detail
            }, function(r){
                if(r.response) { 
                    window.location.href = baseUrl('invoice');                   
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
        }

        function __productAutocomplete(){
            var product = $("#product"),
                options = {
                url: function(q) {
                    return baseUrl('comprar/encontrarproducto?q=' + q);
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
    </script>
</compra>