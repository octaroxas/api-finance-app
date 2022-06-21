<?php

namespace App\Http\Controllers\API\Account;

use App\Models\Account;
use Laravolt\Avatar\Facade as Avatar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\AccountResource;
use Symfony\Component\HttpFoundation\Response;

class AccountController
{
    public function store(Request $request)
    {
        try {
            $initials = $this->initials($request->name);
            $path = 'avatars/' . $initials . '.png';
            Avatar::create($request->name)->setDimension(256)->setFontSize(128)->save(storage_path('app/public/' . $path), 100);
            $data = array_merge($request->only('name'), ['avatar' => $path, 'user_id' => $request->user()->id]);
            $account = DB::transaction(fn () => Account::firstOrCreate($data));
            return response()->json(AccountResource::make($account), Response::HTTP_CREATED);
        } catch (\Exception $exception) {
            return response()->json($exception->getMessage(), Response::HTTP_BAD_GATEWAY);
        }
    }

    public function show(Account $account)
    {
        return response()->json(AccountResource::make($account), Response::HTTP_OK);
    }

    public function update(Request $request, Account $account)
    {
        $initials = $this->initials($request->name);
        $path = 'avatars/' . $initials . '.png';
        Avatar::create($request->name)->setDimension(256)->setFontSize(128)->save(storage_path('app/public/' . $path), 100);
        $account->update(array_merge($request->only('name'), ['avatar' => $path]));
        $account->save();
        return response()->json(AccountResource::make($account), Response::HTTP_OK);
    }

    private function initials($name)
    {
        $names = explode(' ', $name);
        $name = $names[0] . ' ' . $names[count($names) - 1];
        return preg_replace('/(?<=[A-Z\wÀ-ú])./', '', $name);
    }
}
