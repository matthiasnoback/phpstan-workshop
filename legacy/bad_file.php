<?php

declare(strict_types=1);

use NonExistingClass;

function isBadFunction(array $whatIsInsideWeDoNotKnow, $thisHasNoType)
{
    if ($thisHasNoType) {
        return true;
    }

    $object = new NonExistingClass();
    if (count($object)) {
        return false;
    }

    return count($whatIsInsideWeDoNotKnow);
}
