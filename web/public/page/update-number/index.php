<?php
session_start();

include $_SERVER['PWD'] . '/app/vendor/autoload.php';

use App\Test\Connection\RequestDB;
use App\Test\Controller\UpdateNumber;
use App\Test\Model\Request\UpdateNumber as SupportUpdateNumber;
use App\Test\Model\Customer;
use App\Test\Model\Customer\Data as CustomerData;

$data = new UpdateNumber(new SupportUpdateNumber(new Customer(new RequestDB, new CustomerData)));

echo json_encode($data->execute());
