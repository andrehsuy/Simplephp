<?php
    $r = new HttpRequest('http://store.apple.com/us/buy-iphone/iphone5s', HttpRequest::METH_GET);

    try {
        echo $r->send()->getBody();
    } catch (HttpException $ex) {
        echo $ex;
    }
    ?>