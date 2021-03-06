<?php

/**
 * @file Rss.php
 * RSS feeds and items
 */

/**
 * RSS Feed, identified by a URL
 */
class RssFeed extends Eloquent {
  // Properties:
  // $url
  // $last_visited (set to now() timestamp)
  // $items
  // $subscriptions

  /**
   * @function items()
   * defines one-to-many for RSS items
   */
  public function items() {
    return $this->hasMany('RssItem');
  }

  public function getItems() {
    return RssItem::where('rss_feed_id', '=', $this->id)->get();
  }

  /** 
  * @function fetch()
  * fetches and parses RSS feed items
  **/
  public function fetch() {
    $response = Httpful\Request::get($this->url)->expectsXml()->send();

    foreach ($response->body->channel->item as $item) {
      
      $parsedItem = new RssItem();
      
      $parsedItem->title = (string) $item->title;
      $parsedItem->link = (string) $item->link;
      $parsedItem->description = (string) $item->description;
      $parsedItem->pub_date = (string) $item->pubDate;
      $parsedItem->guid = (string) $item->guid;

      $this->items()->save($parsedItem);
    }
    $this->save();
    
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
  // $guid
  // $last_visited (set to now() timestamp)
  // $rss_feed: foreign key
  // $title
  // $link
  // $description
  // $pubDate

  /**
   * @function feed()
   * defines many-to-one for RSS feed
   */
  public function feed() {
    return $this->belongsTo('RssFeed');
  }
}
