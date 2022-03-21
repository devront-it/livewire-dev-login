<?php

namespace Devront\DevLogin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DevLogin extends Component
{

    public function render()
    {
        /** @var Model $userModel */
        $userModel = config('auth.providers.users.model');
        $implements = (new $userModel) instanceof DevLoginInterface;

        $data = $userModel::all()->map(function (Model|DevLoginInterface $user) use ($implements) {
            return [
                'label' => $implements
                    ? $user->getDevLoginLabel()
                    : $user->email,
                'key' => $user->getKey()
            ];
        });

        return view('dev-login::dev-login', [
            'data' => $data,
            'currentUser' => $implements ? auth()->user()?->getDevLoginLabel() : auth()->user()?->email
        ]);
    }

    private function getRedirectUrl()
    {
        return (($model = (new (config('auth.providers.users.model')))) instanceof DevLoginInterface)
            ? $model->getRedirectUrlAfterDevLogin()
            : '/';
    }

    public function login($user_id)
    {
        if (!app()->environment('local')) return;

        if (config('auth.providers.users.model')::find($user_id)) Auth::loginUsingId($user_id);

        return redirect()->to($this->getRedirectUrl());
    }

    public function logout()
    {
        if (!app()->environment('local')) return;

        Auth::logout();

        return redirect()->to($this->getRedirectUrl());
    }
}
