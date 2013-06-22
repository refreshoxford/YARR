<?php

/**
 * @file Rss.php
 * RSS feeds and items
 */

use Jenssegers\Mongodb\Model as Eloquent;

/**
 * RSS Feed, identified by a URL
 */
class RssFeed extends Eloquent {
  // Properties:
  // $url: primaryKey
  // $last_visited (set to now() timestamp)
  // $items
  // $subscriptions

  // Use url as the primary key - it's the unique identifier for an RSS Feed
  protected $primaryKey = "url";

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
  public function subscriptions() {
    return $this->hasMany('Sub');
  }
}

/**
 * RSS item, identified by... MD5 hash?
 */
class RssItem extends Eloquent {
  // Properties:
  // $guid: primaryKey
  // $last_visited (set to now() timestamp)
  // $feed: foreign key
  // $title
  // $link
  // $description
  // $pubDate

  protected $primaryKey = $guid;

  /**
   * @function feed()
   * defines many-to-one for RSS feed
   */
  public function feed() {
    return $this->belongsTo('RssFeed');
  }
}
