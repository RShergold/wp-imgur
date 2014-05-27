<?php

namespace WpImgur;

class Credentials extends \Imgur\Credentials {

  protected $didLoad    = false;
  protected $clientId     = '1c354b6654a4a6d';
  protected $clientSecret = '48535b387a4b995b370d3cbbacaffca94b125da2';

  function needs() {
    return array('optionsStore');
  }

  function loaded() {
    return $this->didLoad;
  }

  function load() {
    if ($this->loaded()) {
      return;
    }

    $store = $this->optionsStore;

    $this->setAccessToken($store->getOption('accessToken'));
    $this->accessTokenExpiry = $store->getOption('accessTokenExpiry');
    $this->setRefreshToken($store->getOption('refreshToken'));

    $this->didLoad = true;
  }

  function save() {
    $store = $this->optionsStore;
    $store->setOption('accessToken', $this->getAccessToken());
    $store->setOption('accessTokenExpiry', $this->getAccessTokenExpiry());
    $store->setOption('refreshToken', $this->getRefreshToken());

    $store->save();
  }

}
