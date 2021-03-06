<?php

/**
 * Zend Framework
 *
 * LICENSE
 *
 * This source file is subject to the new BSD license that is bundled
 * with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://framework.zend.com/license/new-bsd
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@zend.com so we can send you a copy immediately.
 *
 * @category   Zend
 * @package    Zend_Validate
 * @subpackage UnitTests
 * @copyright  Copyright (c) 2005-2008 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 * @version    $Id: BarcodeTest.php 8211 2008-02-20 14:29:24Z darby $
 */

/**
 * Test helper
 */
require_once dirname(__FILE__) . '/../../TestHelper.php';

/** Zend_Validate_Barcode */
require_once 'Zend/Validate/Barcode.php';

/**
 * Zend_Validate_Barcode
 *
 * @category   Zend
 * @package    Zend_Validate
 * @subpackage UnitTests
 * @uses       Zend_Validate_Barcode
 * @copyright  Copyright (c) 2005-2008 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
class Zend_Validate_BarcodeTest extends PHPUnit_Framework_TestCase
{
    public function testUpcA()
    {
        $barcode = new Zend_Validate_Barcode('upc-a');

        $this->assertTrue($barcode->isValid('065100004327'));
        $this->assertFalse($barcode->isValid('123'));
        $this->assertFalse($barcode->isValid('065100004328'));
    }

    public function testEan13()
    {
        $barcode = new Zend_Validate_Barcode('ean-13');

        $this->assertTrue($barcode->isValid('0075678164125'));
        $this->assertFalse($barcode->isValid('123'));
        $this->assertFalse($barcode->isValid('0075678164124'));
    }

    public function testNoneExisting()
    {
        try {
            $barcode = new Zend_Validate_Barcode('Zend');
            $this->fail("'Zend' is not a valid barcode type'");
        } catch (Exception $e) {
            // success
        }
    }

    public function testSetType()
    {
        $barcode = new Zend_Validate_Barcode('upc-a');
        $this->assertTrue($barcode->isValid('065100004327'));

        $barcode->setType('ean-13');
        $this->assertTrue($barcode->isValid('0075678164125'));
    }
}
