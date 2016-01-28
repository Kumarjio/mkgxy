<?php
/**
 * @file
 * A Google Auth module
 */

/**
 * Implements hook_block_info()
 */
function mkGoogleAuth_block_info() {
  $blocks['googleAuth'] = array(
    'info' => t('Google Login'),
  );

  return $blocks;
}

/**
 * Implements hook_block_view()
 */
function mkGoogleAuth_block_view($delta = '') {
  global $user;
  // This example is adapted from node.module.
  $block = array();

  switch ($delta) {
    case 'googleAuth':
      if (!empty($user->uid)) {
        continue;
      }
      $block['subject'] = t('Google Login');
      $block['content'] = "<a class='login' href='#'><img src=\"http://mkgalaxy.com/api/googleauth/google-login-button-asif18.png\" alt=\"Google login\" title=\"login with google\" style='width:100%;' /></a>";
      break;
  }
  return $block;
}