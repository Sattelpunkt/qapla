<?php

$this->add('/shop/settings', 'Einkauf\Shop\Controller\MainSettings', 'GET');
$this->add('/shop/settings', 'Einkauf\Shop\Controller\MainSettings@newShop', 'POST');