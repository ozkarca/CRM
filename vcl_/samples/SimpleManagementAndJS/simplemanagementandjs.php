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
use_unit("dbctrls.inc.php");
use_unit("dbgrids.inc.php");
use_unit("db.inc.php");
use_unit("dbtables.inc.php");
use_unit("forms.inc.php");
use_unit("extctrls.inc.php");
use_unit("stdctrls.inc.php");

//Class definition
class SimpleManagementandjs extends Page
{
   public $Label17 = null;
   public $Edit9 = null;
   public $Label16 = null;
   public $Edit8 = null;
   public $Label15 = null;
   public $lbMessages = null;
   public $btnAdd = null;
   public $Label14 = null;
   public $Label13 = null;
   public $Label12 = null;
   public $Label11 = null;
   public $Label10 = null;
   public $Label9 = null;
   public $Label8 = null;
   public $Label7 = null;
   public $Label6 = null;
   public $Label5 = null;
   public $Label4 = null;
   public $Label3 = null;
   public $dsRepeater = null;
   public $tbRepeater = null;
   public $Label2 = null;
   public $fdproducts1 = null;
   public $DBRepeater1 = null;
   public $Edit7 = null;
   public $Edit6 = null;
   public $Edit5 = null;
   public $Edit4 = null;
   public $Edit3 = null;
   public $Edit2 = null;
   public $Edit1 = null;
   public $Label1 = null;
   public $Panel1 = null;
   public $btnPost = null;
   public $fdproducts11 = null;
   public $fdproducts10 = null;
   public $fdproducts9 = null;
   public $dsproducts1 = null;
   public $dboscommerce1 = null;
   public $tbproducts1 = null;
   function SimpleManagementandjsJSSubmit($sender, $params)
   {
?>
      msg="";
      result=true;
      //Simple JS validation
      if ((document.SimpleManagementandjs.Edit1) && (document.SimpleManagementandjs.Edit1.value==""))
      {
        result=false;
        msg+="-Products Quantity is a required field\n";
      }

      if ((document.SimpleManagementandjs.Edit8) && (document.SimpleManagementandjs.Edit8.value==""))
      {
        result=false;
        msg+="-Product Price is a required field\n";
      }

      if (!result)
      {
        alert(msg);
      }
      return(result);
<?php
   }

   function Label17JSClick($sender, $params)
   {
?>
    //Add your javascript code here
    return(confirm("Are you sure you want to delete this product?"));
<?php
   }

   function Label17BeforeShow($sender, $params)
   {
      //Setup a link to delete registers
      $this->Label17->Link = "simplemanagementandjs.php?action=delete&edit_id=" . $this->tbRepeater->products_id;
   }

   function lbMessagesAfterShow($sender, $params)
   {
      //This is a simple message label, so must show and be hidden for next operations
      $sender->Visible = false;
   }

   function btnAddClick($sender, $params)
   {
      //Cancel any pending change
      $this->tbproducts1->Cancel();

      //Append a new record
      $this->tbproducts1->Append();

      $this->Label14->Caption = "Add new product";

      //Prompt the user for info
      $this->Panel1->Visible = true;
   }

   function fdproducts1BeforeShow($sender, $params)
   {
      //Before showing the label, set the Link property to the URL we want
      $this->fdproducts1->Link = "simplemanagementandjs.php?action=edit&edit_id=" . $this->tbRepeater->products_id;
   }

   function Panel1AfterShow($sender, $params)
   {
      //This way, the panel is hidden so it's only shown when editing
      $sender->Visible = false;
   }

   function SimpleManagementandjsBeforeShow($sender, $params)
   {
      //Get the action to perform
      $action = $this->input->action;
      if (is_object($action))
      {
         //If there is any edit_id on the input
         $edit_id = $this->input->edit_id;
         if (is_object($edit_id))
         {
            //Filter the table
            $this->tbproducts1->Filter = "products_id=" . $edit_id->asInteger();
            $this->tbproducts1->Refresh();

            //If the user wants to edit a register
            if ($action->asString() == 'edit')
            {
               $this->Label14->Caption = "Modify product";

               //Make the panel visible
               $this->Panel1->Visible = true;
            }
            else if ($action->asString() == 'delete')
               {
                  //Delete the register and refresh the repeater table
                  $this->tbproducts1->Delete();
                  $this->tbRepeater->Refresh();
               }
         }
      }
   }

   function btnPostClick($sender, $params)
   {
      //Just post the modified contents so get stored
      try
      {
         $this->tbproducts1->Post();
         $this->tbRepeater->Refresh();
         $this->lbMessages->Caption = "Record saved succesfully";
         $this->lbMessages->Visible = true;

      }
      catch (Exception $e)
      {
         $this->lbMessages->Caption = "Error saving the record, please, check required fields";
         $this->lbMessages->Visible = true;
         $this->Panel1->Visible = true;
      }
   }
}

global $application;

global $SimpleManagementandjs;

//Creates the form
$SimpleManagementandjs = new SimpleManagementandjs($application);

//Read from resource file
$SimpleManagementandjs->loadResource(__FILE__);

//Shows the form
$SimpleManagementandjs->show();

?>