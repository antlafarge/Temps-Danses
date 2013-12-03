<?php

function treatActivePage($page, $current_page)
{
  if ( $page == $current_page )
  {
    echo 'active';
  }
}

?>
