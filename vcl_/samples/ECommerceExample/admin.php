<?php
/**
*  This file is part of the VCL for PHP project
*
*  Copyright (c) 2004-2008 qadram software S.L. <support@qadram.com>
*
*  Checkout AUTHORS file for more information on the developers
*
*  This library is free software; you can redistribute it and/or
*  modify it under the terms of the GNU Lesser General Public
*  License as published by the Free Software Foundation; either
*  version 2.1 of the License, or (at your option) any later version.
*
*  This library is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
*  Lesser General Public License for more details.
*
*  You should have received a copy of the GNU Lesser General Public
*  License along with this library; if not, write to the Free Software
*  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307
*  USA
*
*/


//Includes
require_once("vcl/vcl.inc.php");
require_once("DbModule.php");
use_unit("userlogin.inc.php");
use_unit("rawinclude.inc.php");
use_unit("rawoutput.inc.php");
use_unit("forms.inc.php");
use_unit("extctrls.inc.php");
use_unit("stdctrls.inc.php");
require_once('configure.php');

//Class definition
class Admin extends Page
{
   public $CurrentUserLogin = null;
   public $PageContent = null;

   function AdminTemplate($sender, $params)
   {
      global $SiteName;

      $template = $params['template'];
      $template->_smarty->assign('PageTitleStr', $SiteName);
   }

   function AdminCreate($sender, $params)
   {
      $this->CurrentUserLogin->Database = GetDBModule()->Database1;
      $this->CurrentUserLogin->UserTable = 'admins';

      $page = $_REQUEST['page'];

      if($this->CurrentUserLogin->GetLoggedInUser() === false )
         $page = 'login';

      $page_map = array
      (
       'add' => 'catalog',
       'delete' => 'catalog',
       'catalog' => 'catalog',
       'login' => 'login',
       'orders' => 'orders',
       'view' => 'view'
       );

      if(array_key_exists($page, $page_map))
      {
         $page = $page_map[$page];
      }
      else
      {
         $page = 'home';
      }

      $this->PageContent->Include = 'inc_admin_' . $page . '.php';
   }
}

global $application;

global $Admin;

//Creates the form
$Admin = new Admin($application);

//Read from resource file
$Admin->loadResource(__FILE__ );

//Shows the form
$Admin->show();

?>