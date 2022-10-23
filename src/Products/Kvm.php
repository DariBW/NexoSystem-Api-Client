<?php
/*
 * Copyright (c) 2021, Bastian Leicht <mail@bastianleicht.de>
 * Copyright (c) 2022, Darius Aurich <darius.aurich@gmail.com>
 *
 * PDX-License-Identifier: BSD-2-Clause
 */

namespace NexoSystems\Products;

use GuzzleHttp\Exception\GuzzleException;
use NexoSystems\NexoSystems;

class Kvm
{
    private $nexosystems;

    public function __construct(NexoSystems $nexosystems)
    {
        $this->nexosystems = $nexosystems;
    }

	public function status(string $serviceid)
    {
        return $this->nexosystems->get(`vserver/{$serviceid}/status`);
    }
}
