<?

class kirbytextExtended extends kirbytext {
  
  function __construct($text, $markdown=true) {
    
    parent::__construct($text, $markdown);
    
    # A "Resource" as we're calling it needs a filename, scope and link text:
    $this->addTags('resource');
    $this->addAttributes('page');
    $this->addAttributes('text');
                    
  }  
 
  function resource($params) {
    
    # We need to traverse the content tree, so we reference the global $site object
    global $site;
  
    # Defaults, in case one or more params are not specified
    $defaults = array(
      'resource' => '',
      'page' => '',
      'text' => ''
    );
    
    # Make our calls failsafe, through the $options associative array
    $options = array_merge($defaults, $params);
  
    # Make sure that both the page and filename resolve cleanly with the Kirby API:
    if ( is_object( $page = $site->pages()->find($options['page']) ) && is_object($file = $page->files()->find($options['resource']) ) ) {
 
      # If we're good to go, return (not print) the HTML for a link.
      return '<a class="file" href="' . $file->url() . '" download>' . html($options['text']) . '</a>';
    } else {
      # Otherwise, output just the text that was provided in the short-tag
      return $options['text'];
    }
  }
 
}