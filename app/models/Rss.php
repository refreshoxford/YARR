<?php

/**
 * @file Rss.php
 * RSS feeds and items
 */

/**
 * RSS Feed, identified by a URL
 */
class RssFeed extends Eloquent {
  /**
   * @function items()
   * defines one-to-many for RSS items
   */
  public function items() {
    return $this->hasMany('RssItem');
  }

  /**
   * @function subscribers()
   * defines many-to-one for subscriber users
   */
  public function subscribers() {
    return $this->belongsToMany('Users');
  }
}

/**
 * RSS item, identified by... MD5 hash?
 */
class RssItem extends Eloquent {
  /**
   * @function feed()
   * defines many-to-one for RSS feed
   */
  public function feed() {
    return $this->belongsTo('RssFeed');
  }
}
