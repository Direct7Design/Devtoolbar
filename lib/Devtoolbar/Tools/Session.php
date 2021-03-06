<?php

/**
 * Dev Toolbar - A nifty universal and extensible development toolbar for PHP apps
 *
 * @package Devtoolbar
 * @author  Casey McLaughlin
 * @link    http://github.com/caseyamcl/Devtoolbar
 * @license MIT License
 */

namespace Devtoolbar\Tools;

/**
 * Session Class for reporting session information
 *
 * Your app should disable this and implement a custom tool if it do not use
 * the standard $_SESSION array
 */
class Session extends Tool {

  /**
   * @var string
   */
  protected static $description = 'Session Values and Statistics';

  // --------------------------------------------------------------

  public function __construct() {

    $this->indicator = isset($_SESSION) ? count($_SESSION) : 'Off';
    $this->caption   = 'Session Values';
    $this->details   = $this->getDetails();

  }

  // --------------------------------------------------------------

  private function getDetails() {
    
    $html = '<h6>Session Values</h6>';
    $session_values = array_merge(array('session_id' => session_id()), $_SESSION);
    $html .= $this->tableize($session_values);
    return $html;
  }
}

/* EOF: Session.php */