<?php
/*   __________________________________________________
    |  Obfuscated by YAK Pro - Php Obfuscator  2.0.14  |
    |              on 2023-06-13 21:39:27              |
    |    GitHub: https://github.com/pk-fr/yakpro-po    |
    |__________________________________________________|
*/
/*
* Copyright (C) Incevio Systems, Inc - All Rights Reserved
* Unauthorized copying of this file, via any medium is strictly prohibited
* Proprietary and confidential
* Written by Munna Khan <help.zcart@gmail.com>, September 2018
*/
 namespace App\Http\Controllers\Installer\Helpers; class InstalledFileManager { public function create() { $installedLogFile = storage_path("\151\x6e\163\x74\141\154\154\x65\144"); $dateStamp = date("\131\57\155\57\144\40\x68\x3a\x69\72\x73\x61"); if (!file_exists($installedLogFile)) { goto nGPJw; } $message = trans("\151\156\x73\164\141\x6c\154\x65\x72\x5f\x6d\x65\x73\x73\x61\x67\x65\x73\x2e\165\160\x64\141\x74\145\162\x2e\154\157\147\56\163\x75\143\x63\x65\x73\x73\x5f\155\x65\163\x73\141\147\x65") . $dateStamp; file_put_contents($installedLogFile, $message . PHP_EOL, FILE_APPEND | LOCK_EX); goto mN0N9; nGPJw: $message = trans("\x69\x6e\x73\x74\x61\154\x6c\145\162\137\x6d\145\x73\x73\x61\x67\145\163\x2e\151\156\163\x74\x61\x6c\x6c\x65\144\x2e\163\x75\143\143\145\x73\x73\x5f\x6c\x6f\147\x5f\155\145\163\163\x61\x67\145") . $dateStamp . "\xa"; file_put_contents($installedLogFile, $message); mN0N9: return $message; } public function update() { return $this->create(); } }
