<?

class kirbytextExtended extends kirbytext {
  
  function __construct($text, $markdown=true) {
    
    parent::__construct($text, $markdown);
    
    $this->addTags('resource');
    $this->addAttributes('page');
    $this->addAttributes('text');
                    
  }  

  function resource($params) {
    
    global $site;
  
    // define default values for attributes
    $defaults = array(
      'resource' => '',
      'page' => '',
      'text' => ''
    );
    
    // merge the given parameters with the default values
    $options = array_merge($defaults, $params);
  
    // build the final url
    if ( is_object( $page = $site->pages()->find($options['page']) ) && is_object($file = $page->files()->find($options['resource']) ) ) {

      return '<a class="file" href="' . $file->url() . '">' . html($options['text']) . '</a>';
    } else {
      return $options['text'];
    }
  }

}
