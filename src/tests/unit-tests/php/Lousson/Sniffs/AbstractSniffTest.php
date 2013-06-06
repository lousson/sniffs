<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4 textwidth=75: *
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Copyright (c) 2013, The Lousson Project                               *
 *                                                                       *
 * All rights reserved.                                                  *
 *                                                                       *
 * Redistribution and use in source and binary forms, with or without    *
 * modification, are permitted provided that the following conditions    *
 * are met:                                                              *
 *                                                                       *
 * 1) Redistributions of source code must retain the above copyright     *
 *    notice, this list of conditions and the following disclaimer.      *
 * 2) Redistributions in binary form must reproduce the above copyright  *
 *    notice, this list of conditions and the following disclaimer in    *
 *    the documentation and/or other materials provided with the         *
 *    distribution.                                                      *
 *                                                                       *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS   *
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT     *
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS     *
 * FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE        *
 * COPYRIGHT HOLDER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT,            *
 * INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES    *
 * (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR    *
 * SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION)    *
 * HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT,   *
 * STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE)         *
 * ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED   *
 * OF THE POSSIBILITY OF SUCH DAMAGE.                                    *
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

/**
 *  Lousson\Sniffs\ControlStructures\AbstractSniffTest definition
 *
 *  @package    org.lousson.sniffs
 *  @copyright  (c) 2013, The Lousson Project
 *  @license    http://opensource.org/licenses/bsd-license.php New BSD License
 *  @author     Mathias J. Hennig <mhennig at quirkies.org>
 *  @filesource
 */
namespace Lousson\Sniffs;

/** Dependencies: */
use PHPUnit_Framework_TestCase;

/**
 *  An abstract test for sniff classes
 *
 *  The AbstractSniffTest class is an abstract test case for classes that
 *  implement the PHP_CodeSniffer_Sniff interface.
 *
 *  @since      lousson/Lousson_Sniffs-0.4.0
 *  @package    org.lousson.sniffs
 *  @link       http://pear.php.net/package/PHP_CodeSniffer
 *  @link       http://phpunit.de/
 */
abstract class AbstractSniffTest extends PHPUnit_Framework_TestCase
{
    /**
     *  Obtain a sniff instance
     *
     *  The getSniff() method returns an instance of the class the test
     *  shall operate on, which must implement the PHP_CodeSniffer_Sniff
     *  interface.
     *
     *  @return \PHP_CodeSniffer_Sniff
     *          A sniff instance is returned on success
     *
     *  @throws \Exception
     *          Raised in case of an internal error
     */
    abstract public function getSniff();

    /**
     *  Obtain a sniff instance
     *
     *  The getRealSniff() method is used as a proxy for getSniff(). It
     *  verifies that the return value of the latter is an instance of the
     *  PHP_CodeSniffer_Sniff interface before returning.
     *
     *  @return \PHP_CodeSniffer_Sniff
     *          A sniff instance is returned on success
     *
     *  @throws \PHPUnit_Framework_AssertionFailedError
     *          Raised in case getSniff() did not return a sniff instance
     *
     *  @throws \Exception
     *          Raised in case of an internal error
     */
    final public function getRealSniff()
    {
        $sniff = $this->getSniff();
        $class = get_class($this);

        $this->assertInstanceOf(
            "PHP_CodeSniffer_Sniff", $sniff,
            "The $class::getSniff() method must return a sniff instance"
        );

        return $sniff;
    }
}

