<?php

use Controllers\PagesController\PagesController;
use Controllers\DeliveryController\DeliveryController;

class Call
{
    public static function Action($controller, $action)
    {
        self::call_controller($controller) ;

        switch ($controller) {
            case 'pages':
                self::call_controller('Delivery');
                $controller = new PagesController();
                break;
            case 'Delivery':
                require_once('Models/Delivery.php');
                $controller = new DeliveryController($_POST);
                 break;
        }

        $controller->{ $action }();
    }

    private function call_controller($controller)
    {
        require_once('Controllers/' . $controller . '_controller.php');
    }
}


  // we're adding an entry for the new controller and its actions
  $controllers = array(
      'pages' => ['home', 'error'],
      'Delivery' => ['index']
  );

  if (array_key_exists($controller, $controllers)) {
      if (in_array($action, $controllers[$controller])) {
          Call::Action($controller, $action);
      } else {
          Call::Action('pages', 'error');
      }
  } else {
      Call::Action('pages', 'error');
  }
