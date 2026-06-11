<?php

final class ScoreMapper
{
    public static function mapToObject(array $scoreData): Score
    {
        $score = new Score($scoreData['id'], $scoreData['score'],  $scoreData['qcm'],  $scoreData['joueur'], $scoreData['chrono']);

        return $score;
    }
}
