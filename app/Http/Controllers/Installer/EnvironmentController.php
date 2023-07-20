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
 namespace App\Http\Controllers\Installer; use App\Http\Controllers\Installer\Helpers\EnvironmentManager; use Illuminate\Http\Request; use Illuminate\Routing\Controller; use Illuminate\Routing\Redirector; use Validator; class EnvironmentController extends Controller { protected $EnvironmentManager; public function __construct(EnvironmentManager $environmentManager) { $this->EnvironmentManager = $environmentManager; } public function environmentMenu() { return view("\x69\x6e\163\x74\x61\x6c\x6c\145\x72\56\145\156\166\x69\x72\x6f\x6e\x6d\x65\x6e\x74"); } public function environmentWizard() { } public function environmentClassic() { $envConfig = $this->EnvironmentManager->getEnvContent(); return view("\x69\156\x73\164\141\x6c\154\x65\162\x2e\145\156\x76\151\162\x6f\156\155\145\156\164\x2d\x63\x6c\141\x73\x73\151\143", compact("\x65\156\166\103\x6f\156\146\151\147")); } public function saveClassic(Request $input, Redirector $redirect) { $message = $this->EnvironmentManager->saveFileClassic($input); return $redirect->route("\x49\x6e\x73\x74\x61\154\x6c\145\x72\x2e\x65\x6e\x76\151\162\x6f\x6e\155\x65\156\x74\x43\x6c\x61\163\x73\x69\x63")->with(["\x6d\x65\x73\163\141\147\x65" => $message]); } }
