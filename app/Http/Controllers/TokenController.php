<?php

namespace App\Http\Controllers;

use App\Models\Token;
use Illuminate\Http\Request;

class TokenController extends Controller
{
    public function token()
    {
        $data = Token::all();
        return view('page.Token_wa.table',compact('data'));
    }

    public function ubah_token($id)
    {
        $data = Token::find($id);
        return view('page.Token_wa.form', compact('data'));
    }

    public function update_token(Request $request, $id)
    {
        $data = Token::find($id);
        $data->update($request->all());
        return redirect()->route('token' ,compact('data'));

    }
}
