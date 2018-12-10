<?php

namespace App;

abstract class Category
{

    const MORNING = 'Frühstück';
    const MIDDAY = 'Mittagessen';
    const EVENING = 'Abendessen';
    const ITALIAN = 'Italienisch';
    const THAI = 'Thai';
    const VEGAN = 'Vegan';
    const ONE_POT = 'Eintopf';
    const MEXICAN = 'Mexikanisch';
    const DESSERT = 'Dessert';
    const SPRING = 'Frühling';
    const AUTUMN = 'Herbst';
    const WINTER = 'Winter';

    public static function getValueFor($const)
    {
        switch ($const) {
            case "MORNING":
                return 'Frühstück';
            case "MIDDAY":
                return 'Mittagessen';
            case "EVENING":
                return 'Abendessen';
            case "ITALIAN":
                return 'Italienisch';
            case "THAI":
                return 'Thai';
            case "VEGAN":
                return 'Vegan';
            case "ONE_POT":
                return 'Eintopf';
            case "MEXICAN":
                return 'Mexikanisch';
            case "DESSERT":
                return 'Dessert';
            case "SPRING":
                return 'Frühling';
            case "AUTUMN":
                return 'Herbst';
            case "WINTER":
                return 'Winter';
            default:
                return 'WHY THE FUCK THE CONST METHOD DO NOT WORK!';
        }
    }

}
