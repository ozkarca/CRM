<?php
        ini_set('display_errors',1);
        error_reporting(E_ALL);

        require_once "phpunit/phpunit.php";
        require_once "vcl/vcl.inc.php";
        require_once "test_customquery.inc.php";
        use_unit("interbase.inc.php");


        class QueryTest extends CustomQueryTest
        {
                function setup()
                {

                        $this->object=new Query();
                        $this->object->Name="myobject";
                }

                function test_getParams()
                {
                        //Checked in Customquery
                }
                function test_setParams()
                {
                        //Checked in Customquery
                }
                function test_getDatabase()
                {
                       //Checked in DataSet
                }
                function test_setDatabase()
                {
                        //Checked in Customquery
                }
          }

      if ($_SERVER['PHP_SELF']!='') $script=$_SERVER['PHP_SELF'];
        else $script=$_GET['script'];

        if (basename($script)=='test_query.inc.php')
        {
                echo "<html>";
                echo "<head>";
                echo "<title>PHP-Unit Results</title>";
                echo "<STYLE TYPE=\"text/css\">";
                include("phpunit/stylesheet.css");
                echo "</STYLE>";
                echo "</head>";
                echo "<body>";
                $suite = new TestSuite( "QueryTest" );
                $testRunner = new TestRunner();
                $testRunner->run( $suite );
        }
?>
