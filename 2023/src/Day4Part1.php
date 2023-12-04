<?php

declare(strict_types=1);

namespace ValentinMerlet\AdventOfCode2023;

final class Day4Part1
{
    private const INPUT_FILE = __DIR__ . '/../input/day4_part1.txt';

    public function findWinningNumbers(array $needle, array $haystack): array
    {
        return array_values(array_intersect($needle, $haystack));
    }

    public function computePoints(array $input): int
    {
        if (empty($input)) {
            return 0;
        }

        if (count($input) === 1) {
            return 1;
        }

        return 2 ** (count($input) - 1);
    }

    public function readAllLines(): array
    {
        $content = file_get_contents(self::INPUT_FILE);
        $lines = explode("\n", $content);

        return $lines;
    }

    public function extractNumberListsFromLine(string $line): array
    {
        $line = preg_replace('/Card \d+: /', '', $line);
        $line = trim($line);

        $parts = explode("|", $line);

        if (\count($parts) !== 2) {
            return [];
        }

        $firstList = array_map(
            static fn (string $number) => (int) $number,
            array_filter(explode(" ", $parts[0]))
        );
        $secondList = array_map(
            static fn (string $number) => (int) $number,
            array_filter(explode(" ", $parts[1]))
        );

        return [array_values($firstList), array_values($secondList)];
    }

    public function resolvePuzzle(): int
    {
        $sum = 0;
        foreach ($this->readAllLines() as $line) {
            if (empty($line)) {
                continue;
            }
            $numberLists = $this->extractNumberListsFromLine($line);
            $winningNumbers = $this->findWinningNumbers($numberLists[0], $numberLists[1]);
            $points = $this->computePoints($winningNumbers);

            $sum += $points;
        }

        return $sum;
    }
}
