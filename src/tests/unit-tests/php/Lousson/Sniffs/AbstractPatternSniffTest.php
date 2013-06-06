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
 *  Lousson\Sniffs\AbstractPatternSniffTest definition
 *
 *  @package    org.lousson.sniffs
 *  @copyright  (c) 2013, The Lousson Project
 *  @license    http://opensource.org/licenses/bsd-license.php New BSD License
 *  @author     Mathias J. Hennig <mhennig at quirkies.org>
 *  @filesource
 */
namespace Lousson\Sniffs;

/** Dependencies: */
use Lousson\Sniffs\AbstractSniffTest;
use ReflectionMethod;

/**
 *  An abstract test for pattern sniff classes
 *
 *  The AbstractPatternSniffTest class is an abstract test case for classes
 *  that extend the PHP_CodeSniffer_Standards_AbstractPatternSniff class.
 *
 *  @since      lousson/Lousson_Sniffs-0.4.0
 *  @package    org.lousson.sniffs
 */
abstract class AbstractPatternSniffTest extends AbstractSniffTest
{
    /**
     *  Obtain a pattern sniff instance
     *
     *  The getPatternSniff() method invokes getSniff(), verifies that
     *  the returned value is not only an instance of the sniff interface
     *  but also the PHP_CodeSniffer_Standards_AbstractPatternSniff class,
     *  and returns the object received.
     *
     *  @return \PHP_CodeSniffer_Standards_AbstractPatternSniff
     *          A pattern sniff instance is returned on success
     *
     *  @throws \PHPUnit_Framework_AssertionFailedError
     *          Raised in case getSniff() did not return a pattern
     *          sniff instance
     *
     *  @throws \Exception
     *          Raised in case of an internal error
     */
    final public function getPatternSniff()
    {
        $sniff = $this->getRealSniff();
        $testClass = get_class($this);

        $this->assertInstanceOf(
            "PHP_CodeSniffer_Standards_AbstractPatternSniff", $sniff,
            "The $testClass::getSniff() method must return a pattern ".
            "sniff instance"
        );

        return $sniff;
    }

    /**
     *  Test the getPatterns() method
     *
     *  The testGetPatterns() method is a test case for the getPatterns()
     *  method required by the abstract pattern sniff class.
     *
     *  @throws \PHPUnit_Framework_AssertionFailedError
     *          Raised in case getSniff() did not return a pattern
     *          sniff instance or the sniff's getPatterns() method did
     *          not fulfill the requirements
     *
     *  @throws \Exception
     *          Raised in case of an internal error
     */
    public function testGetPatterns()
    {
        $sniff = $this->getPatternSniff();

        $reflection = new ReflectionMethod($sniff, "getPatterns");
        $reflection->setAccessible(true);

        $value = $reflection->invoke($sniff);
        $class = get_class($sniff);

        $this->assertInternalType(
            "array", $value,
            "The $class:getPatterns() method must return an array"
        );

        $this->assertNotEmpty(
            $value,
            "The $class::getPatterns() method must not return an empty ".
            "array"
        );

        $this->assertContainsOnly(
            "string", $value, true,
            "All array items returned by $class::getPatterns() must ".
            "be string values"
        );
    }
}

