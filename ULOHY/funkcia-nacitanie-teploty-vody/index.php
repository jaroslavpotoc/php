<?php
function voda ($teplotaVody){
  switch ($teplotaVody){
      case  $teplotaVody <= 0:
          echo "Mega studena";
          break;
      case  $teplotaVody > 0 && $teplotaVody < 15:
          echo "Studena";
          break;
      case  $teplotaVody >= 15 && $teplotaVody < 25:
          echo "Akurat";
          break;
      case  $teplotaVody >= 25:
          echo "Horuca";
          break;
  }
}

voda(32);