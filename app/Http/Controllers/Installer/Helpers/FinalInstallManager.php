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
 namespace App\Http\Controllers\Installer\Helpers; use Exception; use Illuminate\Support\Facades\Artisan; use Symfony\Component\Console\Output\BufferedOutput; class FinalInstallManager { public function runFinal() { $outputLog = new BufferedOutput(); $this->generateKey($outputLog); $this->publishVendorAssets($outputLog); return $outputLog->fetch(); } private static function generateKey($outputLog) { try { if (!config("\151\x6e\x73\x74\x61\154\154\x65\x72\56\x66\151\156\x61\x6c\56\x6b\x65\x79")) { goto KB156; } Artisan::call("\x6b\145\171\72\x67\x65\x6e\x65\x72\141\x74\x65", ["\55\55\x66\x6f\162\143\x65" => true], $outputLog); KB156: } catch (Exception $e) { return static::response($e->getMessage(), $outputLog); } return $outputLog; } private static function publishVendorAssets($outputLog) { try { if (!config("\151\156\163\164\141\154\154\x65\162\56\146\151\x6e\x61\x6c\56\x70\165\142\x6c\151\163\x68")) { goto jIAPz; } Artisan::call("\x76\x65\156\144\157\162\x3a\160\165\x62\154\151\163\x68", ["\55\55\x61\x6c\x6c" => true], $outputLog); jIAPz: } catch (Exception $e) { return static::response($e->getMessage(), $outputLog); } return $outputLog; } private static function response($message, $outputLog) { return ["\163\164\141\164\165\x73" => "\x65\x72\162\157\162", "\155\145\163\163\x61\x67\145" => $message, "\x64\142\x4f\x75\164\160\x75\164\114\157\147" => $outputLog->fetch()]; } }
