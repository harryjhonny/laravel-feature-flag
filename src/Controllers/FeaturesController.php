<?php

namespace Harryjhonny\FeatureFlags\Controllers;

use Harryjhonny\FeatureFlags\Facades\Features;

class FeaturesController
{
    public function __invoke()
    {
        return response()
            ->json(['features' => Features::all()]);
    }
}
