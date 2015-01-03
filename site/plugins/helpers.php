<? /* Custom Helpers */

# Output Variable to Preformatted Tag in HTML
function pp ( $var ) {
  echo '<pre>';
  print_r( $var );
  echo '</pre>';
}

# Log Variable to JavaScript Console
function cc ( $var ) {
  echo '<script type="text/javascript">console.log(';
  print_r( json_encode($var) );
  echo ');</script>';
}

# Crude Slugging
function sluggify ( $str ) {
  return preg_replace(['/\s/'], ['-'], strtolower($str));
}

# Date Comparisons
function isToday ( $time )  {
    return ( $time == strtotime('today') );
}

function isPast ( $time ) {
    return ( $time < strtotime('today') );
}

function isFuture ( $time ) {
    return ( $time > strtotime('today') );
}

function getDayClasses ( $time, $always = array('day') ) {
  $day_classes = $always;

  if ( isFuture( $time ) ) array_push($day_classes, 'future');
  if ( isPast( $time ) ) array_push($day_classes, 'past');
  if ( isToday( $time ) ) array_push($day_classes, 'today');

  return implode(' ', $day_classes);
}

# Body Template Classes
function bodyClass ( $page ) {
  $classes = array($page->template());
  if ( $page->hasChildren() ) array_push($classes, 'has-children');

  return join($classes, ' ');
}