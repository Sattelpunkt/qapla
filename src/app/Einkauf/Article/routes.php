<?php

$this->add('/', 'Einkauf\Article\Controller\Home', 'GET');

$this->add('/article/new', 'Einkauf\Article\Controller\New', 'GET');

$this->add('/article/new', 'Einkauf\Article\Controller\New@insert', 'POST');

$this->add('/article/edit/:id', 'Einkauf\Article\Controller\Edit', 'GET');

$this->add('/article/edit/:id', 'Einkauf\Article\Controller\Edit@update', 'POST');

$this->add('/article/archiv/:id/:callback', 'Einkauf\Article\Controller\Archiv', 'GET');

$this->add('/article/bought/:id', 'Einkauf\Article\Controller\Bought', 'GET');

$this->add('/article/bought', 'Einkauf\Article\Controller\Bought@print', 'GET');

$this->add('/article/archiv', 'Einkauf\Article\Controller\Archiv@print', 'GET');

$this->add('/bought/archiv', 'Einkauf\Article\Controller\Bought@allToArchiv', 'GET');

$this->add('/archiv/delete', 'Einkauf\Article\Controller\Archiv@deleteAll', 'GET');

$this->add('/article/print', 'Einkauf\Article\Controller\Print', 'GET');

