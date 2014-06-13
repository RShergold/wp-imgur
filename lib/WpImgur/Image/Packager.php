<?php

namespace WpImgur\Image;

class Packager {

  function onInject($container) {
    $container
      ->factory('image', 'WpImgur\Image\Image')
      ->singleton('imageStore', 'WpImgur\Image\Store')
      ->singleton('imagePostType', 'WpImgur\Image\PostType')
      ->singleton('imageUploader', 'WpImgur\Image\Uploader');
  }

}
