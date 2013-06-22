<?php

/**
 * @file SubsController
 */

class SubsController extends BaseController {
  /**
   * @function testAdd
   */
  public function testAdd() {
    // Add a user if it doesn't exist
    if (!($user = User::find('jp.stacey@gmail.com'))) {
      $user = new User();
      $user->email = 'jp.stacey@gmail.com';
      $user->save();
    }

    // Add a feed
    if (!($feed = RssFeed::find('http://www.jpstacey.info/blog/feed'))) {
      $feed = new RssFeed();
      $feed->url = 'http://www.jpstacey.info/blog/feed';
      $feed->save();
    }

    // Add a subscription to that feed
    if (!($user->subs)) {
      $sub = new Sub();
      $sub->title = 'My subscription to feed';
      $user->subscriptions()->save($sub);
      $feed->subscriptions()->save($sub);
    }
  }
}
