<?php
class Customer {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    // Mostrar (Mostrar clientes)
    public function getAllCustomers() {
        try {
            $query = "SELECT * FROM customers";
            $stmt = $this->db->query($query);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Handle exceptions here (e.g., error logging)
            return false;
        }
    }
    
    // Create (Agregar un cliente)
    public function addCustomer($customerName, $contactLastName, $contactFirstName, $phone, $addressLine1, $addressLine2, $city, $state, $postalCode, $country, $salesRepEmployeeNumber, $creditLimit) {
        try {
            $query = "INSERT INTO customers (customerName, contactLastName, contactFirstName, phone, addressLine1, addressLine2, city, state, postalCode, country, salesRepEmployeeNumber, creditLimit) VALUES (:customerName, :contactLastName, :contactFirstName, :phone, :addressLine1, :addressLine2, :city, :state, :postalCode, :country, :salesRepEmployeeNumber, :creditLimit)";
            
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':customerName', $customerName);
            $stmt->bindParam(':contactLastName', $contactLastName);
            $stmt->bindParam(':contactFirstName', $contactFirstName);
            $stmt->bindParam(':phone', $phone);
            $stmt->bindParam(':addressLine1', $addressLine1);
            $stmt->bindParam(':addressLine2', $addressLine2);
            $stmt->bindParam(':city', $city);
            $stmt->bindParam(':state', $state);
            $stmt->bindParam(':postalCode', $postalCode);
            $stmt->bindParam(':country', $country);
            $stmt->bindParam(':salesRepEmployeeNumber', $salesRepEmployeeNumber);
            $stmt->bindParam(':creditLimit', $creditLimit);

            return $stmt->execute();
        } catch (PDOException $e) {
            // Manejar excepciones aquí (por ejemplo, registro de errores)
            return false;
        }
    }

    // Read (Obtener un cliente por ID)
    public function getCustomer($customerNumber) {
        try {
            $query = "SELECT * FROM customers WHERE customerNumber = :customerNumber";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':customerNumber', $customerNumber);
            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Manejar excepciones aquí (por ejemplo, registro de errores)
            return false;
        }
    }

    // Update (Actualizar información de un cliente por ID)
    public function updateCustomer($customerNumber, $customerName, $contactLastName, $contactFirstName, $phone, $addressLine1, $addressLine2, $city, $state, $postalCode, $country, $salesRepEmployeeNumber, $creditLimit) {
        try {
            $query = "UPDATE customers SET customerName = :customerName, contactLastName = :contactLastName, contactFirstName = :contactFirstName, phone = :phone, addressLine1 = :addressLine1, addressLine2 = :addressLine2, city = :city, state = :state, postalCode = :postalCode, country = :country, salesRepEmployeeNumber = :salesRepEmployeeNumber, creditLimit = :creditLimit WHERE customerNumber = :customerNumber";
            
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':customerNumber', $customerNumber);
            $stmt->bindParam(':customerName', $customerName);
            $stmt->bindParam(':contactLastName', $contactLastName);
            $stmt->bindParam(':contactFirstName', $contactFirstName);
            $stmt->bindParam(':phone', $phone);
            $stmt->bindParam(':addressLine1', $addressLine1);
            $stmt->bindParam(':addressLine2', $addressLine2);
            $stmt->bindParam(':city', $city);
            $stmt->bindParam(':state', $state);
            $stmt->bindParam(':postalCode', $postalCode);
            $stmt->bindParam(':country', $country);
            $stmt->bindParam(':salesRepEmployeeNumber', $salesRepEmployeeNumber);
            $stmt->bindParam(':creditLimit', $creditLimit);

            return $stmt->execute();
        } catch (PDOException $e) {
            // Manejar excepciones
            return false;
        }
    }

    // Delete (Eliminar un cliente por ID)
    public function deleteCustomer($customerNumber) {
        try {
            $query = "DELETE FROM customers WHERE customerNumber = :customerNumber";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':customerNumber', $customerNumber);

            return $stmt->execute();
        } catch (PDOException $e) {
            // Manejar excepciones 
            return false;
        }
    }
}
?>
