<?php

namespace App\Enum;

enum AtomCategory: string
{
    case actinide = 'Actinide';
    case gazNoble = 'Gaze noble';
    case halogene = 'Halogène';

    case lanthanide = 'Lanthanide';
    case metalAlcalin = 'Métal alcalin';
    case metalAlcalinoTerreux = 'Métal alcalino terreux';
    case metalDeTransition = 'Métal de transition';
    case metalloide = 'Métalloide';
    case metalPauvre = 'Métal pauvre';
    case nonMetal = 'Non métal';
}
