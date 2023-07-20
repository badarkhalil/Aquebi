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
 namespace App\Http\Controllers\Installer\Helpers; use Exception; use Illuminate\Http\Request; class EnvironmentManager { private $envPath; private $envExamplePath; public function __construct() { $this->envPath = base_path("\56\x65\x6e\x76"); $this->envExamplePath = base_path("\x2e\145\156\166\x2e\145\170\141\x6d\160\x6c\145"); } public function getEnvContent() { if (file_exists($this->envPath)) { goto YK26e; } if (file_exists($this->envExamplePath)) { goto MTwdp; } touch($this->envPath); goto jFjtm; MTwdp: copy($this->envExamplePath, $this->envPath); jFjtm: YK26e: return file_get_contents($this->envPath); } public function getEnvPath() { return $this->envPath; } public function getEnvExamplePath() { return $this->envExamplePath; } public function saveFileClassic(Request $input) { $message = trans("\151\x6e\x73\x74\141\154\x6c\x65\x72\137\155\x65\163\x73\x61\x67\145\163\x2e\145\156\166\x69\x72\x6f\156\155\x65\156\x74\x2e\x73\x75\x63\143\145\x73\163"); try { file_put_contents($this->envPath, $input->get("\145\x6e\166\x43\157\x6e\146\x69\x67")); } catch (Exception $e) { $message = trans("\x69\156\163\x74\x61\x6c\x6c\x65\162\137\x6d\145\163\x73\x61\x67\x65\163\x2e\145\156\166\x69\162\157\x6e\155\145\156\x74\x2e\x65\162\162\x6f\162\x73"); } return $message; } }
