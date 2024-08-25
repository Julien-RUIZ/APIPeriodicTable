<?php

namespace App\Enum;

enum AtomGroup: string
{
    case Groupe1 = 'Alcalins';
    case Groupe2 = 'Alcalino-terreux';
    case Groupe3_12Mt = 'Métaux de transition';
    case Groupe3_12TP = 'Éléments de Transition Postérieurs';
    case Groupe13 = 'Groupe du Bore';
    case Groupe14 = 'Groupe du Carbone';
    case Groupe15 = 'Pnictogènes';
    case Groupe16 = 'Chalcogènes';
    case Groupe17 = 'Halogènes';
    case Groupe18 = 'Gaz Nobles';
}
