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

  /**
   * @function items()
   * defines one-to-many for RSS items
   */
  public function items() {
    return $this->hasMany('RssItem');
  }

  public function getItems() {
    return RssItem::where('rss_feed_id', '=', $this->_id)->get();
  }

  /** 
  * @function fetch()
  * fetches and parses RSS feed items
  **/
  public function fetch() {
    var_dump($this->url);
    $response = Httpful\Request::get($this->url)->expectsXml()->send();

    foreach ($response->body->channel->item as $item) {
      
      $parsedItem = new RssItem();
      
      $parsedItem->title = (string) $item->title;
      $parsedItem->link = (string) $item->link;
      $parsedItem->description = (string) $item->description;
      $parsedItem->pubDate = (string) $item->pubDate;
      $parsedItem->author = (string) $item->author;
      $parsedItem->guid = (string) $item->guid;

      $this->items()->save($parsedItem);
    }
    $this->save();
    
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
