<?php
/**
 * This file is part of CaptainHook.
 *
 * (c) Sebastian Feldmann <sf@sebastian.feldmann.info>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace CaptainHook\App\Storage;

use PHPUnit\Framework\TestCase;

class UtilTest extends TestCase
{
    /**
     * Tests Util::pathToArray
     */
    public function testAbsolutePathToArray()
    {
        $path = Util::pathToArray('/foo/bar/baz');

        $this->assertCount(3, $path);
        $this->assertEquals('bar', $path[1]);
    }

    /**
     * Tests Util::pathToArray
     */
    public function testRelativePathToArray()
    {
        $path = Util::pathToArray('foo/bar/baz');

        $this->assertCount(3, $path);
        $this->assertEquals('bar', $path[1]);
    }

    /**
     * Tests Util::isSubDirectoryOf
     */
    public function testIsSubdirectory()
    {
        $this->assertTrue(Util::isSubDirectoryOf(Util::pathToArray('/foo/bar/baz'), Util::pathToArray('/foo/bar')));
        $this->assertTrue(Util::isSubDirectoryOf(Util::pathToArray('/foo/bar'), Util::pathToArray('/foo')));
        $this->assertFalse(Util::isSubDirectoryOf(Util::pathToArray('/foo/bar/baz'), Util::pathToArray('/fiz/baz')));
        $this->assertFalse(Util::isSubDirectoryOf(Util::pathToArray('/foo'), Util::pathToArray('/bar')));
    }

    /**
     * Tests Util::isSubDirectoryOf
     */
    public function testGetSubPathOfNoSubDirectory()
    {
        $this->expectException(\Exception::class);

        Util::getSubPathOf(Util::pathToArray('/foo/bar/baz'), Util::pathToArray('/fiz/baz'));
    }
}
