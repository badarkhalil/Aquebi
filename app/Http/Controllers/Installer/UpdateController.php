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
 namespace App\Http\Controllers\Installer; use App\Http\Controllers\Installer\Helpers\DatabaseManager; use App\Http\Controllers\Installer\Helpers\InstalledFileManager; use Illuminate\Routing\Controller; class UpdateController extends Controller { use \App\Http\Controllers\Installer\Helpers\MigrationsHelper; public function welcome() { return view("\151\x6e\163\164\x61\154\154\x65\x72\x2e\x75\160\144\x61\164\145\56\x77\x65\154\143\157\x6d\x65"); } public function overview() { $migrations = $this->getMigrations(); $dbMigrations = $this->getExecutedMigrations(); return view("\x69\x6e\163\x74\x61\x6c\154\145\162\x2e\165\x70\144\x61\164\145\x2e\157\166\x65\x72\x76\151\x65\x77", ["\x6e\165\155\142\145\x72\x4f\146\x55\160\144\141\164\145\x73\120\x65\x6e\144\x69\x6e\147" => count($migrations) - count($dbMigrations)]); } public function database() { $databaseManager = new DatabaseManager(); $response = $databaseManager->migrateAndSeed(); return redirect()->route("\114\141\162\x61\x76\145\154\125\x70\x64\141\164\145\x72\x3a\x3a\x66\x69\x6e\141\154")->with(["\155\145\163\x73\141\147\x65" => $response]); } public function finish(InstalledFileManager $fileManager) { $fileManager->update(); return view("\151\x6e\x73\x74\141\154\x6c\145\x72\56\x75\x70\144\x61\x74\145\x2e\x66\151\x6e\151\163\150\145\144"); } }
