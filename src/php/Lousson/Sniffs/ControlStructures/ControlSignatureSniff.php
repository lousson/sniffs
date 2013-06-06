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
 *  Lousson\Sniffs\ControlStructures\ControlSignatureSniff definition
 *
 *  @package    org.lousson.sniffs
 *  @copyright  (c) 2013, The Lousson Project
 *  @license    http://opensource.org/licenses/bsd-license.php New BSD License
 *  @author     Mathias J. Hennig <mhennig at quirkies.org>
 *  @filesource
 */
namespace Lousson\Sniffs\ControlStructures;

/** Dependencies: */
use PHP_CodeSniffer_Standards_AbstractPatternSniff;

/**
 *  Sniff for various control structures
 *
 *  The ControlSignatureSniff class extends the abstract pattern sniffer
 *  that comes with the PHP_CodeSniffer. It provides the implementation of
 *  the base class with a white-list of control structure patterns.
 *
 *  @since      lousson/Lousson_Sniffs-0.4.0
 *  @package    org.lousson.sniffs
 *  @link       http://pear.php.net/package/PHP_CodeSniffer
 */
class ControlSignatureSniff
    extends PHP_CodeSniffer_Standards_AbstractPatternSniff
{
    /**
     *  A list of supported tokenizers
     *
     *  @var array
     */
    public $supportedTokenizers = array("PHP", "JS");

    /**
     *  Obtain the patterns that this test wishes to verify
     *
     *  The getPatterns() method is used internally to obtain a list
     *  of patterns to describe white-listed control structures and the
     *  indentation that must be used within.
     *
     *  @return array
     *          A list of structure patterns is returned on success
     */
    protected function getPatterns()
    {
        return array(
            "try {EOL...}EOL",
            "}EOLcatch (...) {EOL...}EOL",
            "do {EOL...}EOL",
            "while (...);EOL",
            "while (...) {EOL...}EOL",
            "while (...) try {EOL...}EOL",
            "for (...) {EOL",
            "for (...) try {EOL",
            "if (...) {EOL",
            "if (...) throw ",
            "if (...) try {EOL",
            "foreach (...) {EOL...}EOL",
            "foreach (...) try {EOL...}EOL",
            "}EOLelse {EOL...}EOL",
            "}EOLelse if (...) {EOL...}EOL",
            "}EOLelseif (...) {EOL...}EOL",
            "}EOLelse try {EOL...}EOL",
            "}EOLelse if (...) try {EOL...}EOL",
            "}EOLelseif (...) try {EOL...}EOL",
            "}EOLelse throw ",
        );
    }
}

