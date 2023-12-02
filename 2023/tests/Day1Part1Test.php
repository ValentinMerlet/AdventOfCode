<?php

declare(strict_types=1);

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use ValentinMerlet\AdventOfCode2023\Day1Part1;

/**
 * TODO
 * -
 *
 * WIP
 * -
 *
 * DONE
 * - Detect the first figure of a given string
 * - Detect the last figure of a given string
 * - Fetch a line of the file in the directory
 * - Resolve the puzzle
 */
final class Day1Part1Test extends TestCase
{
    #[DataProvider('detectFirstFigureDataProvider')]
    public function testDetectTheFirstFigureOfAGivenString(string $input, ?int $expected): void
    {
        $day1 = new Day1Part1();
        $firstFigure = $day1->getFirstFigure($input);

        $this->assertEquals($expected, $firstFigure);
    }

    public static function detectFirstFigureDataProvider(): array
    {
        return [
            'Start with a letter and end with a figure' => ['aze1razjgfze4', 1],
            'Start with a figure and end with a letter' => ['123jifaji23aze', 1],
            'Figures only' => ['222222221', 2],
            'Letters only' => ['azeaijzieja', null],
        ];
    }

    #[DataProvider('detectLastFigureDataProvider')]
    public function testDetectTheLastFigureOfAGivenString(string $input, ?int $expected): void
    {
        $day1 = new Day1Part1();
        $firstFigure = $day1->getLastFigure($input);

        $this->assertEquals($expected, $firstFigure);
    }

    public static function detectLastFigureDataProvider(): array
    {
        return [
            'Start with a letter and end with a figure' => ['aze1razjgfze4', 4],
            'Start with a figure and end with a letter' => ['123jifaji23aze', 3],
            'Figures only' => ['222222221', 1],
            'Letters only' => ['azeaijzieja', null],
        ];
    }

    public function testReadLinesInAFile(): void
    {
        $day1 = new Day1Part1();
        $lines = $day1->readAllLines();

        self::assertEquals('9eightone', $lines[0]);
    }

    public function testResolvePuzzle(): void
    {
        $day1 = new Day1Part1();

        $result = $day1->resolvePuzzle();

        self::assertEquals(55477, $result);
    }
}
