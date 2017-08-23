Simple logging option when you need it.

#Use
Creates a new "Simple Logging" page under the Tools tab.

To record records use

``
$lc_logger = new LC_Logger();
$lc_logger->log( 'This is a string' );
``
or you can also pass objects and arrays

``
$lc_logger = new LC_Logger();
$lc_logger->log( $array );
``
