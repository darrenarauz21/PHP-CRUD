<?php
class Customer {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

        // Consulta que obtiene los cinco clientes con más órdenes realizadas
        public function getTopCustomersWithMostOrders() {
            try {
                $query = "SELECT c.customerNumber, c.customerName, COUNT(o.orderNumber) AS orderCount
                          FROM customers c
                          LEFT JOIN orders o ON c.customerNumber = o.customerNumber
                          GROUP BY c.customerNumber
                          ORDER BY orderCount DESC
                          LIMIT 5";
                $stmt = $this->db->prepare($query);
                $stmt->execute();
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                // Manejar excepciones aquí (por ejemplo, registro de errores)
                return false;
            }
        }
    
        // Consulta que obtiene los cinco clientes con menos pagos realizados
        public function getTopCustomersWithLeastPayments() {
            try {
                $query = "SELECT c.customerNumber, c.customerName, SUM(p.amount) AS totalPayments
                          FROM customers c
                          LEFT JOIN payments p ON c.customerNumber = p.customerNumber
                          GROUP BY c.customerNumber
                          ORDER BY totalPayments ASC
                          LIMIT 5";
                $stmt = $this->db->prepare($query);
                $stmt->execute();
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                // Manejar excepciones aquí (por ejemplo, registro de errores)
                return false;
            }
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
            // Obtener el número de cliente más alto existente en la base de datos
            $query = "SELECT MAX(customerNumber) as maxCustomerNumber FROM customers";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
            // Generar un nuevo número de cliente incrementando el valor máximo en uno
            $customerNumber = intval($result['maxCustomerNumber']) + 1;
            $query = "INSERT INTO customers (customerNumber, customerName, contactLastName, contactFirstName, phone, addressLine1, addressLine2, city, state, postalCode, country, salesRepEmployeeNumber, creditLimit) VALUES (:customerNumber, :customerName, :contactLastName, :contactFirstName, :phone, :addressLine1, :addressLine2, :city, :state, :postalCode, :country, :salesRepEmployeeNumber, :creditLimit)";
            
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
