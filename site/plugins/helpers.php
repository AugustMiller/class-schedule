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
    return ( strtotime($time) === strtotime('today') );
}

function isPast ( $time ) {
    return ( strtotime($time) < time() );
}

function isFuture ( $time ) {
    return ( strtotime($time) > time() );
}