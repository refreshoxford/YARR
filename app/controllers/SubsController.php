<?php

/**
 * @file SubsController
 */

class SubsController extends BaseController {
  /**
   * @function getIndex
   * GET subs index
   */
  public function getIndex() {
    return View::make('subs-index', array('user' => Auth::user()));
  }

  /**
   * @function getIndex
   * GET subs index
   */
  public function getView($id) {
    $sub = Sub::find($id);
    $feed = RssFeed::find($sub->rss_feed_id);
    if (!count($feed->items)) {
      $feed->fetch();
      $feed->save();
    }
    return View::make('feed', array('feed' => $feed, 'sub' => $sub));
  }

  /**
   * @function getAdd
   * GET subs add
   */
  public function getAdd() {
    return View::make('subs-add');
  }

  /**
   * @function postAdd
   * POST subs add
   */
  public function postAdd() {
    $url = Input::get('url');

    // First try to find a feed with this URL
    if(!($feed = RssFeed::where('url', '=', $url)->first())) {
      $feed = new RssFeed();
      $feed->url = $url;
      $feed->save();
    }

    $sub = new Sub();
    $sub->rss_feed_id = $feed->id;
    $sub->title = "Title not yet fetched";
    $sub->user_id = Auth::user()->id;
    $sub->save();
    return Redirect::to('/subs');
  }

  /**
   * @function getEdit
   * GET subs edit
   */
  public function getEdit($id) {
    $sub = Sub::find($id);
    return View::make('subs-edit', array('sub' => $sub, 'feed' => RssFeed::find($sub->rss_feed_id)));
  }

  /**
   * @function postEdit
   * POST subs add
   */
  public function postEdit($id) {
    $sub = Sub::find($id);
    $sub->title = Input::get('title');
    // We don't edit $url once someone's successfully subscribed
    $sub->save();
    return Redirect::to('/subs');
  }

  /**
   * @function getDelete
   * GET subs delete
   */
  public function getDelete($id) {
    $sub = Sub::find($id);
    return View::make('subs-delete', array('sub' => $sub, 'feed' => RssFeed::find($sub->rss_feed_id)));
  }

  /**
   * @function postEdit
   * POST subs add
   */
  public function postDelete($id) {
    $sub = Sub::find($id);
    $sub->delete();
    return Redirect::to('/subs');
  }
}
