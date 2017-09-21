<?php

require('model/dashboard.php');
require('model/SessionHandle.php');


class Dashboard {
	public $dbHandler;
	public $sessionHandle;
	public $username;
  public $DashboardModel;

  //Check if the user is still loged on.
  public function __construct() {
    $this->DashboardModel = new DashboardModel();
    $this->sessionHandle = new SessionHandle();

    
    $guid = (!$this->sessionHandle->readSingleItem('GUID')) ? header('location: /') : $this->sessionHandle->readSingleItem('GUID');

     }

  public function standard() {
    require('view/pages/dashboard/dashboard.php');
  }

/* USER SECTION FOR VIEWING, EDITING, CREATING AND DELETING USERS */

  public function users($parameters) {
    if(isset($parameters[0])) {
      switch($parameters[0]) {
        case 'edit':
            $this->DashboardModel->editUser($parameters);
        break;
        default:
          $this->DashboardModel->viewUsers($parameters);
      }
    } else {
      $this->DashboardModel->viewUsers($parameters);
    }
  }

/* END USER SECTION*/  


}
