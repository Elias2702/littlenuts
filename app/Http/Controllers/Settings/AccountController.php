<?php

namespace App\Http\Controllers\Settings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AccountController extends Controller
{
    /**
     * Update the user's profile information.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = $request->user();

        $this->validate($request, [
            // 'is_premium' => 'required',
            // 'referrer_id' => 'required',
        ]);

        return tap($user)->update($request->only('is_premium', 'referrer_id'));
    }
}
