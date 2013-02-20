<?php
        ini_set('display_errors',1);
        error_reporting(E_ALL);

        require_once "phpunit/phpunit.php";
        require_once "vcl/vcl.inc.php";
        require_once "test_customtable.inc.php";
        use_unit("db.inc.php");


        class TableTest extends CustomTableTest
        {
                function setup()
                {

                        $this->object=new Table();
                        $this->object->Name="myobject";
                }


                function test_getDatabase()
                {
                        //Tested in test_Property
                }

                function test_setDatabase()
                {
                        //Tested in test_Property 
                }

                function test_Database()
                {
                        $this->assertEquals($this->object->Database,$this->object->defaultDatabase());
                        $Database=new MySQLDatabase();
                        $this->object->Database=$Database;
                        $this->assertEquals($this->object->Database,$Database);
                }
        }

      if ($_SERVER['PHP_SELF']!='') $script=$_SERVER['PHP_SELF'];
        else $script=$_GET['script'];

        if (basename($script)=='test_table.inc.php')
        {
                echo "<html>";
                echo "<head>";
                echo "<title>PHP-Unit Results</title>";
                echo "<STYLE TYPE=\"text/css\">";
                include("phpunit/stylesheet.css");
                echo "</STYLE>";
                echo "</head>";
                echo "<body>";
                $suite = new TestSuite( "TableTest" );
                $testRunner = new TestRunner();
                $testRunner->run( $suite );
        }
?>
