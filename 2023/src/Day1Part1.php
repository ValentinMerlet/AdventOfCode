<?php

declare(strict_types=1);

namespace ValentinMerlet\AdventOfCode2023;

final class Day1Part1
{
    private const INPUT_FILE = __DIR__ . '/../input/day1_part1.txt';

    public function getFirstFigure(string $input): ?int
    {
        foreach (str_split($input) as $figure) {
            if (is_numeric($figure)) {
                return (int) $figure;
            }
        }

        return null;
    }

    public function getLastFigure(string $input): ?int
    {
        for ($i = strlen($input) - 1; $i >= 0; $i--) {
            if (is_numeric($input[$i])) {
                return (int) $input[$i];
            }
        }

        return null;
    }

    public function readAllLines(): array
    {
        $content = file_get_contents(self::INPUT_FILE);
        $lines = explode("\n", $content);

        return $lines;
    }

    public function resolvePuzzle(): int
    {
        $lines = $this->readAllLines();

        $sum = 0;
        foreach ($lines as $line) {
            $firstFigure = $this->getFirstFigure($line);
            $lastFigure = $this->getLastFigure($line);

            if (null === $firstFigure && null === $lastFigure) {
                continue;
            }

            $sum += (int) ($firstFigure . $lastFigure);
        }

        return $sum;
    }
}
