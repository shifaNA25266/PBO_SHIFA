<?php
require_once 'customer.php';

class CustomerManager {
    private $datafile = 'customers.json';
    private $customerList = [];

    public function __construct() {
        if (file_exists($this->datafile)) {
            $data = file_get_contents($this->datafile);
            $this->customerList = json_decode($data, true) ?? [];
        }
    }

    public function tambahCustomer($nama, $email, $alamat) {
        $id = uniqid();
        $customer = new Customer($id, $nama, $email, $alamat);
        $this->customerList[] = $customer->toArray();
        $this->simpanData();
    }

    public function getCustomer() {
        return $this->customerList;
    }

    private function simpanData() {
        file_put_contents($this->datafile, json_encode($this->customerList, JSON_PRETTY_PRINT));
    }
}
?>
