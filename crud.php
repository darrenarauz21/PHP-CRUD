<?php
require 'class/Database.php';
require 'class/Customer.php';

$db = new Database();
$customer = new Customer($db->getConnection());

$customers = $customer->getAllCustomers();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['addCustomer'])) {
        // Procesar el formulario de agregar
        $customerName = $_POST['customerName'];
        $contactLastName = $_POST['contactLastName'];
        $contactFirstName = $_POST['contactFirstName'];
        $phone = $_POST['phone'];
        $addressLine1 = $_POST['addressLine1'];
        $addressLine2 = $_POST['addressLine2'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $postalCode = $_POST['postalCode'];
        $country = $_POST['country'];
        $salesRepEmployeeNumber = $_POST['salesRepEmployeeNumber'];
        $creditLimit = $_POST['creditLimit'];

        $customer->addCustomer($customerName, $contactLastName, $contactFirstName, $phone, $addressLine1, $addressLine2, $city, $state, $postalCode, $country, $salesRepEmployeeNumber, $creditLimit);
    } elseif (isset($_POST['editCustomer'])) {
        // Procesar el formulario de edición
        $customerNumber = $_POST['editCustomerID'];
        $customerName = $_POST['editCustomerName'];
        $contactLastName = $_POST['editContactLastName'];
        $contactFirstName = $_POST['editContactFirstName'];
        $phone = $_POST['editPhone'];
        $addressLine1 = $_POST['editAddressLine1'];
        $addressLine2 = $_POST['editAddressLine2'];
        $city = $_POST['editCity'];
        $state = $_POST['editState'];
        $postalCode = $_POST['editPostalCode'];
        $country = $_POST['editCountry'];
        $salesRepEmployeeNumber = $_POST['editSalesRepEmployeeNumber'];
        $creditLimit = $_POST['editCreditLimit'];

        $customer->updateCustomer($customerNumber, $customerName, $contactLastName, $contactFirstName, $phone, $addressLine1, $addressLine2, $city, $state, $postalCode, $country, $salesRepEmployeeNumber, $creditLimit);
    }
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD de Clientes</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>
<body>
    <div class="container mt-4">
    <?php include 'assets/views/head.html'?>
        <h1>CRUD de Clientes</h1>
        <button class="btn btn-primary" data-toggle="modal" data-target="#addCustomerModal">
            <i class="fas fa-plus"></i> Agregar Cliente
        </button>

        <!-- Tabla para mostrar los clientes -->
        <table class="table table-bordered mt-4">
        <thead>
        <tr>
            <th>Número de Cliente</th>
            <th>Nombre del Cliente</th>
            <th>Apellido del Contacto</th>
            <th>Nombre del Contacto</th>
            <th>Teléfono</th>
            <th>Dirección Línea 1</th>
            <th>Dirección Línea 2</th>
            <th>Ciudad</th>
            <th>Estado</th>
            <th>Código Postal</th>
            <th>País</th>
            <th>Número de Empleado</th>
            <th>Límite de Crédito</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Incluye tu archivo de configuración de base de datos y la clase Customer
 //       require 'class/Database.php';
   //     require 'class/Customer.php';

        // Crea una instancia de la clase Database y Customer
        $db = new Database();
        $customer = new Customer($db->getConnection());

        // Obtén todos los clientes
        $clientes = $customer->getAllCustomers();

        // Itera a través de los clientes y muestra cada fila en la tabla
        foreach ($clientes as $cliente) {
            echo '<tr>';
            echo '<td>' . $cliente['customerNumber'] . '</td>';
            echo '<td>' . $cliente['customerName'] . '</td>';
            echo '<td>' . $cliente['contactLastName'] . '</td>';
            echo '<td>' . $cliente['contactFirstName'] . '</td>';
            echo '<td>' . $cliente['phone'] . '</td>';
            echo '<td>' . $cliente['addressLine1'] . '</td>';
            echo '<td>' . $cliente['addressLine2'] . '</td>';
            echo '<td>' . $cliente['city'] . '</td>';
            echo '<td>' . $cliente['state'] . '</td>';
            echo '<td>' . $cliente['postalCode'] . '</td>';
            echo '<td>' . $cliente['country'] . '</td>';
            echo '<td>' . $cliente['salesRepEmployeeNumber'] . '</td>';
            echo '<td>' . $cliente['creditLimit'] . '</td>';
            echo '<td>';
            echo '<button class="btn btn-primary" data-toggle="modal" data-target="#editCustomerModal" data-customerid="' . $cliente['customerNumber'] . '">Editar</button>';
            echo '<button class="btn btn-danger" data-toggle="modal" data-target="#confirmDeleteModal" data-customerid="' . $cliente['customerNumber'] . '">Eliminar</button>';
            echo '</td>';
            echo '</tr>';
        }
        ?>
    </tbody>
    </table>
    </div>

    <!-- Modal para agregar cliente -->
    <div class="modal fade" id="addCustomerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Agregar Cliente</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Formulario para agregar cliente -->
                    <?php include_once 'assets/views/addForm.html'; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para editar cliente -->
    <div class="modal fade" id="editCustomerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <?php include_once 'assets/views/editForm.html'; ?>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
