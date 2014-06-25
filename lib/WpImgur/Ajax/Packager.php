<?php

namespace WpImgur\Ajax;

class Packager {

  function onInject($container) {
    $container
      ->singleton('configController', 'WpImgur\Ajax\ConfigController')
      ->singleton('syncPreparer', 'WpImgur\Ajax\SyncPreparer')
      ->singleton('authController' ,  'WpImgur\Ajax\AuthController')
      ->singleton('syncController'   ,  'WpImgur\Ajax\SyncController');
  }

}
