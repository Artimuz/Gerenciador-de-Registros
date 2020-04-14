<?php
  session_start();
  session_unset();
  session_destroy();
  if (isset($_GET['timeout'])) {
    header ("Location: ../../?timeout=error");
  } else {
  header ("Location: ../../");
}
