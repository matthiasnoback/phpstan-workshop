<?php

declare(strict_types=1);

function isBadFunction(array $whatIsInsideWeDoNotKnow, $thisHasNoType)
{
    if ($thisHasNoType) {
        return true;
    }

    return count($whatIsInsideWeDoNotKnow);
}
