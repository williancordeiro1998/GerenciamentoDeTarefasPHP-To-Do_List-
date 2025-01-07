<?php

namespace Src\controller;

class HomeController {
    public function index() {
        include __DIR__ . '/../views/welcome.php';
    }

    public function welcome() {
        include __DIR__ . '/../views/welcome.php';
    }
}
