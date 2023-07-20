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
 namespace App\Http\Controllers\Installer; use App\Http\Controllers\Installer\Helpers\DatabaseManager; use Exception; use Illuminate\Routing\Controller; use Illuminate\Support\Facades\DB; class DatabaseController extends Controller { private $databaseManager; public function __construct(DatabaseManager $databaseManager) { $this->databaseManager = $databaseManager; } public function database() { if ($this->checkDatabaseConnection()) { goto iutEu; } return redirect()->back()->withErrors(["\x64\x61\x74\141\x62\x61\x73\145\x5f\x63\157\156\156\x65\x63\164\x69\x6f\x6e" => trans("\x69\156\x73\164\x61\154\154\x65\162\x5f\x6d\145\x73\x73\141\147\145\x73\56\x65\x6e\166\x69\x72\157\156\x6d\145\156\x74\x2e\x77\151\172\141\x72\x64\56\146\x6f\x72\x6d\56\x64\142\x5f\143\x6f\x6e\156\x65\x63\164\x69\157\x6e\x5f\146\141\151\x6c\145\x64")]); iutEu: ini_set("\x6d\141\x78\137\x65\x78\x65\143\x75\x74\151\x6f\x6e\137\x74\151\x6d\145", 600); $response = $this->databaseManager->migrateAndSeed(); return redirect()->route("\111\x6e\163\x74\x61\154\154\145\x72\x2e\146\151\x6e\x61\154")->with(["\x6d\x65\163\163\141\x67\145" => $response]); } private function checkDatabaseConnection() { try { DB::connection()->getPdo(); return true; } catch (Exception $e) { return false; } } }
