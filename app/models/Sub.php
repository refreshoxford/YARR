<?php

/**
 * @file Sub.php
 * User subscriptions
 */

use Jenssegers\Mongodb\Model as Eloquent;

/**
 * RSS Feed, identified by a URL
 */
class Sub extends Eloquent {
  /**
   * @function subscribers()
   * defines many-to-one for subscriber users
   */
  public function subscribers() {
    return $this->belongsTo('Users');
  }

  /**
   * @function feed()
   * defines many-to-one for feed
   */
  public function feed() {
    return $this->belongsTo('RssFeed');
  }

}
