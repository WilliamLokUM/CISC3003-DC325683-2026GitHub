<?php

function readCustomers($filename) {
    $customers = array();
    $file = fopen($filename, "r");
    if ($file) {
        while (($line = fgets($file)) !== false) {
            $line = trim($line);
            if (!empty($line)) {
                $data = explode(";", $line);
                $customers[$data[0]] = array(
                    'id' => $data[0],
                    'firstName' => $data[1],
                    'lastName' => $data[2],
                    'email' => $data[3],
                    'university' => $data[4],
                    'address' => $data[5],
                    'city' => $data[6],
                    'state' => $data[7],
                    'country' => $data[8],
                    'zip' => $data[9],
                    'phone' => $data[10],
                    'sales' => $data[11]
                );
            }
        }
        fclose($file);
    }
    return $customers;
}

function readOrders($customer, $filename) {
    $orders = array();
    $file = fopen($filename, "r");
    if ($file) {
        while (($line = fgets($file)) !== false) {
            $line = trim($line);
            if (!empty($line)) {
                $data = explode(",", $line);
                if ($data[1] == $customer) {
                    $orders[] = array(
                        'orderId' => $data[0],
                        'customerId' => $data[1],
                        'isbn' => $data[2],
                        'title' => $data[3],
                        'category' => $data[4]
                    );
                }
            }
        }
        fclose($file);
    }
    return $orders;
}

?>