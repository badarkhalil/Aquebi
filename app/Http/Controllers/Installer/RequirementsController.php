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
 namespace App\Http\Controllers\Installer; use App\Http\Controllers\Installer\Helpers\RequirementsChecker; use Illuminate\Routing\Controller; class RequirementsController extends Controller { protected $requirements; public function __construct(RequirementsChecker $checker) { $this->requirements = $checker; } public function requirements() { $phpSupportInfo = $this->requirements->checkPHPversion(config("\x69\x6e\x73\x74\x61\x6c\154\145\162\x2e\x63\157\162\x65\56\x6d\151\156\120\x68\160\x56\145\x72\x73\151\157\156"), config("\151\x6e\x73\164\141\x6c\154\145\162\x2e\143\157\162\x65\56\155\141\170\x50\150\x70\126\145\x72\163\151\157\156")); $requirements = $this->requirements->check(config("\151\x6e\163\x74\x61\x6c\x6c\x65\162\56\162\x65\161\165\151\162\x65\x6d\x65\x6e\x74\163")); return view("\151\156\x73\x74\x61\154\x6c\x65\162\56\x72\x65\161\x75\x69\162\x65\155\x65\x6e\x74\163", compact("\162\x65\161\x75\151\162\145\x6d\x65\x6e\x74\x73", "\160\x68\x70\x53\165\x70\160\x6f\x72\x74\111\156\146\x6f")); } }
