<?php
include 'Customer.php';
include 'Database.php';

if (isset($_POST['action'])) {
    $db = new Database();
    $customer = new Customer($db->getConnection());

    if ($_POST['action'] == 'getAllCustomers') {
        $customers = $customer->getAllCustomers();
        if ($customers) {
            foreach ($customers as $row) {
                echo "<tr>";
                echo "<td>" . $row['customerNumber'] . "</td>";
                echo "<td>" . $row['customerName'] . "</td>";
                echo "<td>" . $row['contactLastName'] . ' ' . $row['contactFirstName'] . "</td>";
                echo "<td>" . $row['phone'] . "</td>";
                echo "<td>" . $row['addressLine1'] . ' ' . $row['addressLine2'] . "</td>";
                echo "<td>" . $row['city'] . "</td>";
                echo "<td>" . $row['state'] . "</td>";
                echo "<td>" . $row['postalCode'] . "</td>";
                echo "<td>" . $row['country'] . "</td>";
                echo "<td>
                        <button class='btn btn-primary edit-customer' data-id='" . $row['customerNumber'] . "'>Editar</button>
                        <button class='btn btn-danger delete-customer' data-id='" . $row['customerNumber'] . "'>Eliminar</button>
                      </td>";
                echo "</tr>";
            }
        }
    } elseif ($_POST['action'] == 'addCustomer') {
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

        $result = $customer->addCustomer($customerName, $contactLastName, $contactFirstName, $phone, $addressLine1, $addressLine2, $city, $state, $postalCode, $country, $salesRepEmployeeNumber, $creditLimit);
        if ($result) {
            echo 'success';
        }
    } elseif ($_POST['action'] == 'updateCustomer') {
        $customerNumber = $_POST['customerNumber'];
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

        $result = $customer->updateCustomer($customerNumber, $customerName, $contactLastName, $contactFirstName, $phone, $addressLine1, $addressLine2, $city, $state, $postalCode, $country, $salesRepEmployeeNumber, $creditLimit);
        if ($result) {
            echo 'success';
        }
    } elseif ($_POST['action'] == 'deleteCustomer') {
        $customerNumber = $_POST['customerNumber'];
        $result = $customer->deleteCustomer($customerNumber);
        if ($result) {
            echo 'success';
        }
    } elseif ($_POST['action'] == 'getCustomer') {
        $customerNumber = $_POST['customerNumber'];
        $customerData = $customer->getCustomer($customerNumber);
        echo json_encode($customerData);
    } elseif ($_POST['action'] == 'getTopCustomersWithMostOrders') {
        $topCustomers = $customer->getTopCustomersWithMostOrders();
        echo json_encode($topCustomers);
    } elseif ($_POST['action'] == 'getTopCustomersWithLeastPayments') {
        $topCustomers = $customer->getTopCustomersWithLeastPayments();
        echo json_encode($topCustomers);
    }
}
?>
