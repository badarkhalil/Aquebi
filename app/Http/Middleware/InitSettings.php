<?php
namespace App\Http\Middleware;
use App\Models\Customer;
use App\Helpers\ListHelper;
use Closure;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

class InitSettings
{
	public function handle($request, Closure $next)
	{
		if (!$request->is("\x69\156\x73\164\x61\x6c\x6c\x2a")) {
			goto NeO0Y;
		}
		return $next($request);
		NeO0Y:setSystemConfig();
		View::addNamespace("\164\150\x65\155\x65", theme_views_path());
		if (!Auth::guard("\x77\x65\142")->check()) {
			goto RVzaT;
		}
		if (!$request->session()->has("\151\x6d\160\145\x72\x73\x6f\156\x61\x74\x65\144")) {
			goto KeH8i;
		}
		Auth::onceUsingId($request->session()->get("\x69\x6d\160\145\162\163\x6f\x6e\x61\164\x65\x64"));
		KeH8i:
		if ($request->is("\141\144\x6d\151\156\57\52") || $request->is("\x61\143\143\x6f\x75\156\164\x2f\52")) {
			goto bivNl;
		}
		return $next($request);
		goto SFFix;
		bivNl:$this->can_load();
		SFFix:$user = Auth::guard("\167\145\142")->user();
		if (!(!$user->isFromPlatform() && $user->merchantId())) {
			goto Bnjly;
		}
		setShopConfig($user->merchantId());
		Bnjly:$permissions = Cache::remember(
			"\160\x65\x72\x6d\151\163\x73\x69\157\156\163\x5f" . $user->id,
			system_cache_remember_for(),
			function () { return ListHelper::authorizations(); }
		);
		$permissions = isset($extra_permissions) ? array_merge($extra_permissions, $permissions) : $permissions;
		config()->set("\160\x65\162\155\x69\163\163\151\x6f\156\163", $permissions);
		if (!$user->isSuperAdmin()) {
			goto Z1uI5;
		}
		$slugs = Cache::remember("\x73\154\165\147\x73", system_cache_remember_for(), function () { return ListHelper::slugsWithModulAccess(); });
		config()->set("\141\165\x74\150\x53\x6c\x75\x67\x73", $slugs);
		Z1uI5:RVzaT:return $next($request);
	}
	private function can_load()
	{
		QFQql:incevioAutoloadHelpers(getMysqliConnection());
	}
}
