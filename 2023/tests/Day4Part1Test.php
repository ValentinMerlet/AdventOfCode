<?php

declare(strict_types=1);

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use ValentinMerlet\AdventOfCode2023\Day4Part1;

/**
 * TODO
 *
 * WIP
 *
 * DONE
 * - Compute points
 * - Found the elements in common between two arrays
 * - Extract number lists from line
 * - Resolve the puzzle
 */
final class Day4Part1Test extends TestCase
{
    #[DataProvider('detectFindWinningNumbers')]
    public function testFindWinningNumbers(array $input, array $expected): void
    {
        $day4 = new Day4Part1();
        $winningNumbers = $day4->findWinningNumbers($input[0], $input[1]);

        $this->assertEquals($expected, $winningNumbers);
    }

    public static function detectFindWinningNumbers(): array
    {
        return [
            '2 winning numbers' => [[[1, 2, 3], [2, 3, 4]], [2, 3]],
            'No winning numbers' => [[[0, 1, 5], [2, 3, 4]], []],
            'All winning numbers' => [[[1, 1, 1], [1, 1, 1]], [1, 1, 1]],
        ];
    }

    #[DataProvider('detectComputePoints')]

    public function testComputePoints(array $input, int $expected): void
    {
        $day4 = new Day4Part1();
        $points = $day4->computePoints($input);

        $this->assertEquals($expected, $points);
    }

    public static function detectComputePoints(): array
    {
        return [
            '2 winning numbers' => [[1, 2], 2],
            '3 winning numbers' => [[1, 2, 3], 4],
            '4 winning numbers' => [[1, 2, 3, 4], 8],
            '0 winning numbers' => [[], 0],
        ];
    }

    public function testExtractNumberListsFromLine(): void
    {
        $day4 = new Day4Part1();
        $line = 'Card 1: 58 68 1 21 63 | 63 95 45 43 79';
        $numberLists = $day4->extractNumberListsFromLine($line);

        $this->assertEquals([[58, 68, 1, 21, 63], [63, 95, 45, 43, 79]], $numberLists);
    }

    public function testResolvePuzzle(): void
    {
        $day4 = new Day4Part1();
        $sum = $day4->resolvePuzzle();

        $this->assertEquals(26478, $sum);
    }
}
