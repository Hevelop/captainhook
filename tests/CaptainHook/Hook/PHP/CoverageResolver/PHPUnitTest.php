<?php
/**
 * This file is part of CaptainHook.
 *
 * (c) Sebastian Feldmann <sf@sebastian.feldmann.info>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace CaptainHook\App\Hook\PHP\CoverageResolver;

use PHPUnit\Framework\TestCase;

class PHPUnitTest extends TestCase
{
    /**
     * Tests PHPUnit::getCoverage
     */
    public function testValid()
    {
        $resolver = new PHPUnit(CH_PATH_FILES . '/bin/phpunit');
        $coverage = $resolver->getCoverage();

        $this->assertEquals(95.0, $coverage);
    }

    /**
     * Tests PHPUnit::getCoverage
     */
    public function testPHPUnitError()
    {
        $this->expectException(\Exception::class);

        $resolver = new PHPUnit(CH_PATH_FILES . '/bin/failure');
        $resolver->getCoverage();
    }
}
