<?php
session_start();

include '../app/vendor/autoload.php';

use App\Test\Connection\RequestDB;
use App\Test\Block\Page;
use App\Test\Model\Customer;
use App\Test\Model\Customer\Data as CustomerData;
use App\Test\Model\Message;

$customer = new Customer(new RequestDB, new CustomerData);
$page = new Page;
$message = new Message;
$customer = $customer->getCustomer();
?>
<!DOCTYPE html>
<html>
    <head>
        <title><?= $page->getTitle(); ?></title>
        <?php include 'html/head/meta.html'; ?>
        <?php include 'html/head/js.html'; ?>
        <?php include 'html/head/css.html'; ?>
    </head>
    <body>
        <?php if ($message->isMessageExists()): ?>
            <div class="alert alert-danger" role="alert"><?= $message->getMessage(); ?></div>
        <?php endif; ?>
        <div class="container h-100">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <h1><?= $page->getName(); ?></h1>
                    <?php if ($customer->isLoggedIn()): ?>
                        <div class="col-12 mx-auto mt-5">
                            <?php include 'html/body/account.phtml'; ?>
                            <div class="v-100 d-flex justify-content-center">
                                <?php include 'html/button/update-number.phtml'; ?>
                                <?php include 'html/button/logout.phtml'; ?>
                            </div>
                        </div>
                    <?php else: ?>
                        <?php include 'html/form/login.phtml'; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </body>
</html>
