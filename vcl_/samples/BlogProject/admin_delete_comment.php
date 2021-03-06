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
require_once("admin_login.php");
use_unit("dbtables.inc.php");
require_once("blog_db.php");
use_unit("forms.inc.php");
use_unit("extctrls.inc.php");
use_unit("stdctrls.inc.php");
use_unit("rtl.inc.php");

//Class definition
class AdminDeleteComment extends Page
{
   public $Query1 = null;

   function AdminDeleteCommentCreate($sender, $params)
   {
      global $BlogDB;

      // Make sure that the user is a logged in administrator.
      GetAdminLogin()->EnsureLogin();

      // Make sure that a valid comment ID was sent.
      if(!isset($_REQUEST['id']) || !strlen($_REQUEST['id']))
         throw new Exception("ID not specified");

      // Retrieve the comment and blog post ID's.
      $id = $_REQUEST['id'];
      $BlogID = $_REQUEST['bid'];

      // Delete the blog comment.
      $BlogDB->CommentsTable1->Filter = "ID = '" . mysql_real_escape_string($id) . "'";
      $BlogDB->CommentsTable1->open();
      $BlogDB->CommentsTable1->delete();

      // Redirect back to the comments page.
      redirect("admin_comments.php?id=" . $BlogID);
   }
}

global $application;

global $AdminDeleteComment;

//Creates the form
$AdminDeleteComment = new AdminDeleteComment($application);

//Read from resource file
$AdminDeleteComment->loadResource(__FILE__);

//Shows the form
$AdminDeleteComment->show();

?>