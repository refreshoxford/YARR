<?php

/**
 * @file SubsController
 */

class SubsController extends BaseController {
  /**
   * @function testAdd
   */
  public function getIndex() {
    return View::make('subs-index', array('user' => Auth::user()));
  }
}
