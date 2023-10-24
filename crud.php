<!DOCTYPE html>
<html>
<head>
    <title>CRUD de Clientes</title>
    <link rel="stylesheet" href="assets/styles/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    
    <div class="container">
    <?php include 'assets/views/head.html'?>
        <h2>CRUD de Clientes</h2>
        <button class="btn btn-success" data-toggle="modal" data-target="#addCustomerModal">Agregar Cliente</button>
        <!-- Agregar botones para las consultas -->
        <button class="btn btn-primary" id="topCustomersMostOrdersButton">Clientes con más ordenes</button>
        <button class="btn btn-primary" id="topCustomersLeastPaymentsButton">Clientes con menos pagos</button>

        <!-- Modal para mostrar los resultados -->
        <div class="modal fade" id="topCustomersModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Resultados de la Consulta</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div id="topCustomersResults"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
        <br><br>
        <table class="table">
            <thead>
                <tr>
                    <th>Número de Cliente</th>
                    <th>Nombre del Cliente</th>
                    <th>Contacto</th>
                    <th>Teléfono</th>
                    <th>Dirección</th>
                    <th>Ciudad</th>
                    <th>Estado</th>
                    <th>Código Postal</th>
                    <th>País</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="customerTable">
            </tbody>
        </table>
    </div>

    <!-- Modal para agregar cliente -->
    <div class="modal fade" id="addCustomerModal" tabindex="-1" role="dialog" aria-labelledby="addCustomerModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addCustomerModalLabel">Agregar Cliente</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Formulario para agregar cliente -->
                                <form id="addCustomerForm">
                                    <div class="form-group">
                                        <label for="customerName">Nombre del Cliente:</label>
                                        <input type="text" class="form-control" name="customerName" id="customerName" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="contactLastName">Apellido del Contacto:</label>
                                        <input type="text" class="form-control" name="contactLastName" id="contactLastName" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="contactFirstName">Nombre del Contacto:</label>
                                        <input type="text" class="form-control" name="contactFirstName" id="contactFirstName" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="phone">Teléfono:</label>
                                        <input type="text" class="form-control" name="phone" id="phone">
                                    </div>

                                    <div class="form-group">
                                        <label for="addressLine1">Dirección Línea 1:</label>
                                        <input type="text" class="form-control" name="addressLine1" id="addressLine1">
                                    </div>

                                    <div class="form-group">
                                        <label for="addressLine2">Dirección Línea 2:</label>
                                        <input type="text" class="form-control" name="addressLine2" id="addressLine2">
                                    </div>

                                    <div class="form-group">
                                        <label for="city">Ciudad:</label>
                                        <input type="text" class="form-control" name="city" id="city">
                                    </div>

                                    <div class="form-group">
                                        <label for="state">Estado:</label>
                                        <input type="text" class="form-control" name="state" id="state">
                                    </div>

                                    <div class="form-group">
                                        <label for="postalCode">Código Postal:</label>
                                        <input type="text" class="form-control" name="postalCode" id="postalCode">
                                    </div>

                                    <div class="form-group">
                                        <label for="country">País:</label>
                                        <input type="text" class="form-control" name="country" id="country">
                                    </div>

                                    <div class="form-group">
                                        <label for="salesRepEmployeeNumber">Número de Empleado de Ventas:</label>
                                        <input type="text" class="form-control" name="salesRepEmployeeNumber" id="salesRepEmployeeNumber">
                                    </div>

                                    

                                    <div class="form-group">
                                        <label for="creditLimit">Límite de Crédito:</label>
                                        <input type="text" class="form-control" name="creditLimit" id="creditLimit">
                                    </div>

                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <button type="button" class="btn btn-primary" id="addCustomerButton">Agregar</button>

                                <div id="confirmationMessage" style="display: none;" class="alert alert-success"></div>
                            </div>
                        </div>
                    </div>
                </div>
    <!-- Modal para editar cliente -->
    <div class="modal fade" id="editCustomerModal" tabindex="-1" role="dialog" aria-labelledby="editCustomerModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editCustomerModalLabel">Editar Cliente</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form id="editCustomerForm">
                    <input type="hidden" name="customerNumber" id="editCustomerNumber">
                    <div class="form-group">
                        <label for="customerName">Nombre del Cliente:</label>
                        <input type="text" class="form-control" name="customerName" id="editCustomerName" required>
                    </div>
                    <div class="form-group">
                        <label for="contactLastName">Apellido del Contacto:</label>
                        <input type="text" class="form-control" name="contactLastName" id="contactLastName" required>
                    </div>

                    <div class="form-group">
                        <label for="contactFirstName">Nombre del Contacto:</label>
                        <input type="text" class="form-control" name="contactFirstName" id="contactFirstName" required>
                    </div>

                    <div class="form-group">
                        <label for="phone">Teléfono:</label>
                        <input type="text" class="form-control" name="phone" id="phone">
                    </div>

                    <div class="form-group">
                        <label for="addressLine1">Dirección Línea 1:</label>
                        <input type="text" class="form-control" name="addressLine1" id="addressLine1">
                    </div>

                    <div class="form-group">
                        <label for="addressLine2">Dirección Línea 2:</label>
                        <input type="text" class="form-control" name="addressLine2" id="addressLine2">
                    </div>

                    <div class="form-group">
                        <label for="city">Ciudad:</label>
                        <input type="text" class="form-control" name="city" id="city">
                    </div>

                    <div class="form-group">
                        <label for="state">Estado:</label>
                        <input type="text" class="form-control" name="state" id="state">
                    </div>

                    <div class="form-group">
                        <label for="postalCode">Código Postal:</label>
                        <input type="text" class="form-control" name="postalCode" id="postalCode">
                    </div>

                    <div class="form-group">
                        <label for="country">País:</label>
                        <input type="text" class="form-control" name="country" id="country">
                    </div>

                    <div class="form-group">
                        <label for="salesRepEmployeeNumber">Número de Empleado de Ventas:</label>
                        <input type="text" class="form-control" name="salesRepEmployeeNumber" id="salesRepEmployeeNumber">
                    </div>

                    <div class="form-group">
                        <label for="creditLimit">Límite de Crédito:</label>
                        <input type="text" class="form-control" name="creditLimit" id="creditLimit">
                    </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="editCustomerButton">Guardar Cambios</button>
                    <div id="confirmationMessage" style="display: none;" class="alert alert-success"></div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            // Función para cargar la tabla de clientes
            function loadCustomerTable() {
                $.ajax({
                    url: "class/ajax.php",
                    type: "POST",
                    data: { action: "getAllCustomers" },
                    success: function(response) {
                        $("#customerTable").html(response);
                    }
                });
            }

            loadCustomerTable();

            // Agregar cliente
            $("#addCustomerButton").on("click", function() {
            var formData = {
                action: "addCustomer",
                customerName: $("#addCustomerForm input[name='customerName']").val(), // Obtener el valor del campo customerName
                contactLastName: $("#addCustomerForm input[name='contactLastName']").val(),
                contactFirstName: $("#addCustomerForm input[name='contactFirstName']").val(),
                phone: $("#addCustomerForm input[name='phone']").val(),
                addressLine1: $("#addCustomerForm input[name='addressLine1']").val(),
                addressLine2: $("#addCustomerForm input[name='addressLine2']").val(),
                city: $("#addCustomerForm input[name='city']").val(),
                state: $("#addCustomerForm input[name='state']").val(),
                postalCode: $("#addCustomerForm input[name='postalCode']").val(),
                country: $("#addCustomerForm input[name='country']").val(),
                salesRepEmployeeNumber: $("#addCustomerForm input[name='salesRepEmployeeNumber']").val(),
                creditLimit: $("#addCustomerForm input[name='creditLimit']").val()
            };

            $.ajax({
                url: "class/ajax.php",
                type: "POST",
                data: $("#addCustomerForm").serialize() + "&action=addCustomer",
                success: function(response) {
                    if (response === "success") {
                        $("#confirmationMessage").text("Cliente agregado exitosamente.").removeClass("alert-danger").addClass("alert-success").show();
                        loadCustomerTable();
                        $("#addCustomerModal").modal("hide");
                        
                        // Ocultar el mensaje después de 3 segundos (3000 ms)
                        setTimeout(function() {
                            $("#confirmationMessage").hide();
                        }, 3000);
                    } else {
                        $("#confirmationMessage").text("Hubo un error al agregar el cliente.").removeClass("alert-success").addClass("alert-danger").show();
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    // Aquí puedes manejar el error, por ejemplo, mostrando un mensaje de error o registrando el error en la consola.
                    console.log("Error en la solicitud AJAX: " + errorThrown);
                }
            });
        });

             // Editar cliente
  /*           $("#editCustomerButton").on("click", function() {
                $.ajax({
                    url: "class/ajax.php",
                    type: "POST",
                    data: $("#editCustomerForm").serialize() + "&action=updateCustomer",
                    success: function(response) {
                        if (response === "success") {
                            loadCustomerTable();
                            $("#editCustomerModal").modal("hide");
                        }
                    }
                });
            });*/
            // Consulta para obtener los 5 clientes con más órdenes
            $("#topCustomersMostOrdersButton").on("click", function() {
                $.ajax({
                    url: "class/ajax.php",
                    type: "POST",
                    data: { action: "getTopCustomersWithMostOrders" },
                    success: function(response) {
                        $("#topCustomersResults").html(response);
                        $("#topCustomersModal").modal("show");
                    }
                });
            });

            // Consulta para obtener los 5 clientes con menos pagos
            $("#topCustomersLeastPaymentsButton").on("click", function() {
                $.ajax({
                    url: "class/ajax.php",
                    type: "POST",
                    data: { action: "getTopCustomersWithLeastPayments" },
                    success: function(response) {
                        $("#topCustomersResults").html(response);
                        $("#topCustomersModal").modal("show");
                    }
                });
            });


            $("#editCustomerButton").on("click", function() {
            var formData = {
                action: "updateCustomer",
                customerNumber: $("#editCustomerForm input[name='customerNumber']").val(),
                customerName: $("#editCustomerForm input[name='customerName']").val(),
                contactLastName: $("#editCustomerForm input[name='contactLastName']").val(),
                contactFirstName: $("#editCustomerForm input[name='contactFirstName']").val(),
                phone: $("#editCustomerForm input[name='phone']").val(),
                addressLine1: $("#editCustomerForm input[name='addressLine1']").val(),
                addressLine2: $("#editCustomerForm input[name='addressLine2']").val(),
                city: $("#editCustomerForm input[name='city']").val(),
                state: $("#editCustomerForm input[name='state']").val(),
                postalCode: $("#editCustomerForm input[name='postalCode']").val(),
                country: $("#editCustomerForm input[name='country']").val(),
                salesRepEmployeeNumber: $("#editCustomerForm input[name='salesRepEmployeeNumber']").val(),
                creditLimit: $("#editCustomerForm input[name='creditLimit']").val()
            };

            $.ajax({
                url: "class/ajax.php",
                type: "POST",
                data: formData,
                success: function(response) {
                    if (response === "success") {
                        $("#confirmationMessage").text("Cliente actualizado exitosamente.").removeClass("alert-danger").addClass("alert-success").show();
                        loadCustomerTable();
                        $("#editCustomerModal").modal("hide");
                        
                        // Ocultar el mensaje después de 3 segundos (3000 ms)
                        setTimeout(function() {
                            $("#confirmationMessage").hide();
                        }, 3000);
                    } else {
                        $("#confirmationMessage").text("Hubo un error al actualizar el cliente.").removeClass("alert-success").addClass("alert-danger").show();
                    }
                }
            });
        });


            // Eliminar cliente
            $(document).on("click", ".delete-customer", function() {
                if (confirm("¿Seguro que desea eliminar este cliente?")) {
                    var customerNumber = $(this).data("id");
                    $.ajax({
                        url: "class/ajax.php",
                        type: "POST",
                        data: { action: "deleteCustomer", customerNumber: customerNumber },
                        success: function(response) {
                            if (response === "success") {
                                loadCustomerTable();
                            }
                        }
                    });
                }
            });

            // Cargar datos del cliente en el formulario de edición
            $(document).on("click", ".edit-customer", function() {
                var customerNumber = $(this).data("id");
                $.ajax({
                    url: "class/ajax.php",
                    type: "POST",
                    data: { action: "getCustomer", customerNumber: customerNumber },
                    success: function(response) {
                        var customerData = JSON.parse(response);
                        $("#editCustomerForm input[name='customerNumber']").val(customerData.customerNumber);
                        $("#editCustomerForm input[name='customerName']").val(customerData.customerName);
                        $("#editCustomerForm input[name='contactLastName']").val(customerData.contactLastName);
                        $("#editCustomerForm input[name='contactFirstName']").val(customerData.contactFirstName);
                        $("#editCustomerForm input[name='phone']").val(customerData.phone);
                        $("#editCustomerForm input[name='addressLine1']").val(customerData.addressLine1);
                        $("#editCustomerForm input[name='addressLine2']").val(customerData.addressLine2);
                        $("#editCustomerForm input[name='city']").val(customerData.city);
                        $("#editCustomerForm input[name='state']").val(customerData.state);
                        $("#editCustomerForm input[name='postalCode']").val(customerData.postalCode);
                        $("#editCustomerForm input[name='country']").val(customerData.country);
                        $("#editCustomerModal").modal("show");
                    }
                });
            });
        });
    </script>
</body>
</html>
