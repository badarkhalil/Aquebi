<?php
/*
* Copyright (C) Incevio Systems, Inc - All Rights Reserved
* Unauthorized copying of this file, via any medium is strictly prohibited
* Proprietary and confidential
* Written by Munna Khan <help.zcart@gmail.com>, September 2018
*/
 namespace App\Http\Controllers\Admin; use App\Models\Package; use App\Http\Controllers\Controller; use App\Http\Requests\Validations\PackageInstallationRequest; use App\Services\PackageInstaller; use Illuminate\Http\Request; use Illuminate\Support\Facades\Artisan; use Illuminate\Support\Facades\Log; use Illuminate\Support\Facades\DB; class PackagesController extends Controller { public function index() { $installables = $this->scanPackages(); $installs = Package::all(); return view("\141\x64\155\151\156\x2e\160\141\x63\x6b\x61\147\145\163\x2e\x69\x6e\144\145\x78", compact("\x69\x6e\x73\164\x61\x6c\x6c\x61\142\154\x65\163", "\151\x6e\163\164\141\154\154\x73")); } public function upload() { return view("\x61\x64\155\151\x6e\x2e\x70\x61\143\153\141\147\145\163\x2e\137\165\160\x6c\x6f\141\144"); } public function save(Request $request) { echo "\x3c\x70\x72\x65\x3e"; print_r($request->all()); echo "\74\x70\x72\145\76"; exit("\145\156\144\x21"); } public function initiate(Request $request, $package) { if (!(config("\141\x70\160\56\144\145\155\x6f") == true && config("\141\x70\160\56\144\145\142\x75\147") !== true)) { goto WqiNR; } return back()->with("\167\x61\162\156\x69\x6e\x67", trans("\155\145\x73\x73\x61\x67\x65\x73\x2e\144\145\x6d\x6f\x5f\x72\x65\x73\164\x72\x69\x63\x74\x69\157\156")); WqiNR: $installable = $this->scanPackages($package); if (!$installable) { goto bVyqi; } if (!Package::where("\x73\154\x75\147", $installable["\x73\x6c\x75\147"])->first()) { goto D24gz; } return back()->with("\x65\x72\162\x6f\x72", trans("\x6d\145\x73\163\x61\x67\145\163\x2e\160\141\143\153\141\x67\x65\x5f\151\x6e\163\164\x61\x6c\154\145\144\137\141\154\x72\145\141\x64\171", ["\160\141\x63\153\141\147\145" => $package])); D24gz: bVyqi: return view("\141\144\x6d\151\156\x2e\x70\x61\x63\x6b\141\147\145\163\56\x5f\x69\x6e\151\x74\x69\x61\164\x65", compact("\x69\x6e\163\164\x61\154\154\141\142\x6c\145")); } public function upgrade(Request $request, $package) { if (!(config("\141\160\160\x2e\x64\145\x6d\x6f") == true && config("\141\160\160\56\144\x65\x62\165\147") !== true)) { goto WNkTn; } return back()->with("\x77\141\162\156\151\156\147", trans("\155\x65\x73\x73\x61\147\145\x73\x2e\x64\x65\x6d\x6f\x5f\x72\x65\163\164\x72\x69\x63\164\151\157\x6e")); WNkTn: $installable = $this->scanPackages($package); if (!$installable) { goto CRWln; } try { $installer = new PackageInstaller($request, $installable); $installer->migrate(); } catch (\Exception $e) { Log::error($e); return back()->with("\145\162\x72\157\162", $e->getMessage()); } return back()->with("\x73\165\143\143\145\x73\x73", trans("\x6d\x65\x73\x73\141\147\x65\163\56\x70\x61\143\x6b\x61\147\x65\x5f\x75\160\147\162\141\144\x65\x64\x5f\163\x75\143\143\x65\163\163", ["\160\141\143\x6b\141\x67\145" => $package])); CRWln: } public function install(PackageInstallationRequest $request, $package) { if (!(config("\x61\160\x70\x2e\x64\x65\155\x6f") == true && config("\x61\160\160\x2e\x64\x65\x62\165\147") !== true)) { goto BzotA; } return back()->with("\167\141\162\x6e\x69\x6e\147", trans("\x6d\145\x73\163\x61\147\145\163\56\x64\145\155\x6f\x5f\162\x65\163\164\162\x69\x63\x74\151\x6f\x6e")); BzotA: $installable = $this->scanPackages($package); if (!$installable) { goto Syb72; } try { $installer = new PackageInstaller($request, $installable); $installer->install(); } catch (\Exception $e) { Log::error($e); $installer->uninstall(); $registered = Package::where("\x73\154\165\147", $package)->first(); if (!$registered) { goto C18Ro; } $registered->delete(); C18Ro: return back()->with("\145\x72\x72\x6f\162", $e->getMessage()); } Artisan::call("\x63\141\x63\x68\145\72\x63\154\145\141\x72"); Artisan::call("\162\157\165\164\145\72\143\x6c\x65\141\x72"); return back()->with("\163\165\143\x63\x65\x73\x73", trans("\x6d\145\163\163\141\147\x65\163\x2e\160\141\x63\x6b\x61\x67\145\137\151\156\163\164\141\x6c\x6c\145\144\137\x73\165\x63\143\x65\x73\x73", ["\x70\141\x63\x6b\x61\x67\145" => $package])); Syb72: return back()->with("\x65\x72\162\157\x72", trans("\155\x65\163\x73\141\147\145\x73\56\146\141\x69\154\x65\144")); } public function uninstall(Request $request, $package) { if (!(config("\x61\x70\x70\x2e\x64\x65\155\157") == true && config("\x61\160\x70\56\144\145\142\165\147") !== true)) { goto NZiU_; } return back()->with("\x77\141\162\x6e\151\156\x67", trans("\155\145\163\x73\x61\147\145\163\x2e\144\145\x6d\x6f\137\162\145\x73\164\x72\151\x63\x74\151\x6f\x6e")); NZiU_: $registered = Package::where("\163\x6c\165\x67", $package)->firstOrFail(); $uninstallable = $this->scanPackages($package); try { $installer = new PackageInstaller($request, $uninstallable); if (!$installer->uninstall()) { goto PDHl2; } Artisan::call("\143\x61\143\x68\145\x3a\x63\154\145\141\x72"); Artisan::call("\162\x6f\165\164\145\x3a\x63\x6c\x65\x61\x72"); if (!$registered->delete()) { goto NRIam; } $msg = trans("\x6d\145\x73\163\141\x67\x65\163\x2e\160\x61\x63\153\x61\147\x65\137\x75\156\151\156\163\164\x61\154\x6c\x65\144\x5f\163\x75\x63\143\x65\163\x73", ["\x70\x61\143\153\x61\147\145" => $package]); return back()->with("\163\x75\x63\143\x65\163\x73", $msg); NRIam: PDHl2: } catch (\Exception $e) { Log::error($e); return back()->with("\145\162\x72\x6f\x72", $e->getMessage()); } return back()->with("\x65\162\162\x6f\x72", trans("\155\x65\163\x73\141\x67\145\163\x2e\x66\141\x69\x6c\x65\144")); } public function activation(Request $request, $package) { if (!(config("\x61\160\160\56\144\145\155\157") == true && config("\141\x70\160\56\144\145\x62\x75\147") !== true)) { goto cbJMY; } return response("\x65\x72\162\157\162", 444); cbJMY: if (!($registered = Package::where("\163\x6c\x75\x67", $package)->first())) { goto K5oXG; } $registered->active = !$registered->active; $registered->save(); Artisan::call("\143\141\x63\x68\x65\x3a\x63\154\145\x61\162"); return response("\x73\x75\x63\143\145\x73\163", 200); K5oXG: $unregistered = $this->scanPackages($package); Log::info($unregistered); if (!$unregistered) { goto Rmg92; } $registered = Package::create($unregistered); Rmg92: return response("\163\165\143\x63\145\x73\163", 200); } public function updateConfig(Request $request) { if (!updateOptionTable($request)) { goto JuUYT; } Artisan::call("\143\141\143\150\x65\72\x63\x6c\x65\x61\162"); return back()->with("\x73\165\143\143\145\163\163", trans("\155\145\163\163\141\x67\145\x73\56\x70\x61\143\153\141\147\x65\137\x73\145\164\x74\x69\x6e\147\163\x5f\165\160\144\x61\x74\x65\144")); JuUYT: return back()->with("\x65\x72\x72\157\x72", trans("\x6d\145\x73\x73\141\147\x65\x73\56\x66\141\151\154\x65\x64")); } public function toggleConfig(Request $request, $option) { if (!(config("\x61\x70\x70\56\x64\145\x6d\157") == true && config("\141\x70\x70\56\x64\x65\142\165\147") !== true)) { goto ukcZw; } return response("\145\162\162\x6f\162", 444); ukcZw: if (!DB::table("\157\x70\164\x69\x6f\156\x73")->where("\157\x70\164\151\157\156\x5f\156\x61\x6d\x65", $option)->update(["\157\x70\x74\x69\x6f\156\137\x76\x61\x6c\165\x65" => DB::raw("\x4e\117\x54\x20\157\x70\164\x69\x6f\x6e\137\x76\141\154\165\145")])) { goto yoftJ; } Artisan::call("\143\141\x63\150\x65\x3a\143\x6c\x65\141\162"); return response("\163\165\x63\143\145\163\163", 200); yoftJ: return response("\145\162\162\157\x72", 405); } private function scanPackages($slug = null) { $packages = []; foreach (glob(base_path("\x70\x61\143\153\141\147\x65\x73\x2f\x2a"), GLOB_ONLYDIR) as $dir) { if (!file_exists($manifest = $dir . "\x2f\155\141\x6e\x69\x66\145\163\164\x2e\x6a\x73\157\x6e")) { goto sDvib; } $json = file_get_contents($manifest); if (!($json !== '')) { goto WrDpt; } $data = json_decode($json, true); if (!($data === null)) { goto G913C; } throw new \Exception("\111\156\x76\x61\154\x69\x64\40\x6d\x61\156\x69\x66\x65\163\x74\56\152\x73\157\156\40\x66\151\154\x65\40\141\x74\x20\133{$dir}\135"); G913C: $data["\160\141\x74\x68"] = $dir; if (!($slug && $data["\x73\154\x75\147"] == $slug)) { goto QPirE; } return $data; QPirE: $packages[] = $data; WrDpt: sDvib: pY2jI: } v6MOI: return $packages; } }