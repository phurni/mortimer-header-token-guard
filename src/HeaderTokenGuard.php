<?php namespace Mortimer\HeaderTokenGuard;

use Illuminate\Auth\TokenGuard;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\UserProvider;

class HeaderTokenGuard extends TokenGuard
{
  /**
   * Create a new authentication guard.
   *
   * @param  \Illuminate\Contracts\Auth\UserProvider  $provider
   * @param  \Illuminate\Http\Request  $request
   * @param  string  $inputKey  Key name of the HTTP header to look for the user token
   * @param  string  $storageKey  The name of the token "column" in persistent storage
   * @return void
   */ 
  public function __construct(UserProvider $provider, Request $request, $inputKey, $storageKey)
  {
    $this->request = $request;
    $this->provider = $provider;
    $this->inputKey = $inputKey;
    $this->storageKey = $storageKey;
  }
  
  /**
   * Get the token for the current request.
   *
   * @return string
   */
  public function getTokenForRequest()
  {
    return $this->request->header($this->inputKey);
  }
}
