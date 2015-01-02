<?php

kirbytext::$tags['resource'] = array(
  'attr' => array('page', 'text'),
  'html' => function($tag) {

    if ( is_object( $page = page($tag->attr('page')) ) && is_object( $file = $page->file($tag->attr('resource')) ) ) {
 
      # If we're good to go, return (not print) the HTML for a link.
      return html::a($file->url(), $tag->attr('text', $file->filename()), array(
        'class' => 'file'
      ));
    } else {
      # Otherwise, output just the text that was provided in the short-tag
      return $tag->attr('text', 'Unknown Resource');
    }
  }
);