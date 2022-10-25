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

class Plesk
{
    private $nexosystems;

    public function __construct(NexoSystems $nexosystems)
    {
        $this->nexosystems = $nexosystems;
    }

	public function get(string $license)
    {
        return $this->nexosystems->post('plesklicense/get', [
            'licenseSerial' => $license
        ]);
    }

    public function order(string $license)
    {

        $error = null;

        if(!str_contains($license, 'PLSK_12_ADMIN_VPS')) $error = true;
        if(!str_contains($license, 'PLSK_12_PRO_VPS')) $error = true;
        if(!str_contains($license, 'PLSK_12_HOST_VPS')) $error = true;
        if(!str_contains($license, 'PLSK_12_ADMIN')) $error = true;
        if(!str_contains($license, 'PLSK_12_PRO')) $error = true;
        if(!str_contains($license, 'PLSK_12_HOST')) $error = true;

        if (is_null($error)) {
            return $this->nexosystems->post('plesklicense/get', [
                'licenseSerial' => $license
            ]);
        }else{
            $data = [
                'state' => "error",
                'client' => "Message from API-Client",
                'message' => "The input does not contain a valid license type"
            ];

            return json_encode($data);
        }
        
    }

    public function binding(string $license, string $serveraddr)
    {
        return $this->nexosystems->post('plesklicense/binding', [
            'licenseSerial' => $license,
            'server_addr' => $serveraddr
        ]);
    }

    public function renew(string $license, string $duration)
    {
        return $this->nexosystems->post('plesklicense/renew', [
            'licenseSerial' => $license,
            'duration' => $duration
        ]);
    }

}