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
use_unit("db.inc.php");
use_unit("dbctrls.inc.php");
use_unit("dbtables.inc.php");
require_once("blog_db.php");
use_unit("forms.inc.php");
use_unit("extctrls.inc.php");
use_unit("stdctrls.inc.php");

//Class definition
class Blog extends Page
{
   public $Label9 = null;
   public $Image1 = null;
   public $DBRepeater2 = null;
   public $Label7 = null;
   public $Label1 = null;
   public $Panel7 = null;
   public $Panel6 = null;
   public $Label2 = null;
   public $Label8 = null;
   public $Panel4 = null;
   public $Panel3 = null;
   public $Panel11 = null;
   public $Panel2 = null;

   function BlogBeforeShow($sender, $params)
   {
      global $BlogDB;

      if(!isset($_REQUEST['id']))
         throw new Exception('No ID sent.');

      $id = $_REQUEST['id'];

      $BlogDB->CommentsTable1->Filter = "BlogID = '" . mysql_real_escape_string($id) . "'";
      $BlogDB->CommentsTable1->OrderField = 'ID';
      $BlogDB->CommentsTable1->open();

      $this->Caption = "Viewing blog $id";

      $BlogDB->BlogsTable1->Filter = "ID = '" . mysql_real_escape_string($id) . "'";
      $BlogDB->BlogsTable1->open();

      $this->Label7->link = "addcomment.php?id=$id";

      $this->DBRepeater2->DataSource = $BlogDB->CommentsDatasource1;
   }
}

global $application;

global $Blog;

//Creates the form
$Blog = new Blog($application);

//Read from resource file
$Blog->loadResource(__FILE__);

//Shows the form
$Blog->show();

?>