<?php
/**
 * This file is part of PHPPresentation - A pure PHP library for reading and writing
 * presentations documents.
 *
 * PHPPresentation is free software distributed under the terms of the GNU Lesser
 * General Public License version 3 as published by the Free Software Foundation.
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code. For the full list of
 * contributors, visit https://github.com/PHPOffice/PHPPresentation/contributors.
 *
 * @see        https://github.com/PHPOffice/PHPPresentation
 *
 * @copyright   2009-2015 PHPPresentation contributors
 * @license     http://www.gnu.org/licenses/lgpl.txt LGPL version 3
 */

declare(strict_types=1);

namespace PhpOffice\PhpPresentation\Slide;

use IteratorIterator;
use PhpOffice\PhpPresentation\PhpPresentation;

// @phpstan-ignore-next-line
class Iterator extends IteratorIterator
{
    /**
     * Presentation to iterate.
     *
     * @var PhpPresentation
     */
    private $subject;

    /**
     * Current iterator position.
     *
     * @var int
     */
    private $position = 0;

    /**
     * Create a new slide iterator.
     */
    public function __construct(PhpPresentation $subject)
    {
        $this->subject = $subject;
    }

    /**
     * Destructor.
     */
    public function __destruct()
    {
        unset($this->subject);
    }

    /**
     * Rewind iterator.
     */
    public function rewind()
    {
        $this->position = 0;
    }

    /**
     * Current \PhpOffice\PhpPresentation\Slide.
     *
     * @return \PhpOffice\PhpPresentation\Slide
     */
    public function current()
    {
        return $this->subject->getSlide($this->position);
    }

    /**
     * Current key.
     *
     * @return int
     */
    public function key()
    {
        return $this->position;
    }

    /**
     * Next value.
     */
    public function next()
    {
        ++$this->position;
    }

    /**
     * More \PhpOffice\PhpPresentation\Slide instances available?
     *
     * @return bool
     */
    public function valid()
    {
        return $this->position < $this->subject->getSlideCount();
    }
}