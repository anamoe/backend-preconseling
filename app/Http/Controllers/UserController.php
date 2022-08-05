<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //

    public function login(Request $request)
    {



        $users = User::where('no_telp', $request->no_telp)->first();



        if ($users) {
            if (password_verify($request->password, $users->password)) {

                return response()->json([
                    'code' => Response::HTTP_OK,
                    'user' => $users
                ]);
            }

            return response()->json([
                'code' => Response::HTTP_NOT_FOUND,
                'message' => "Kata sandi salah",
            ]);
           
        }

        return response()->json([
            'code' =>Response::HTTP_NOT_FOUND,
            'message' => "No. Telepon tidak terdaftar",
        ]);
    }

    public function register(Request $request)
    {

        $input = $request->all();
        $no_telp = User::where('no_telp', $request->no_telp)->first();

        if ($no_telp) {
            return response()->json([
                'code' => Response::HTTP_NOT_FOUND,
                'message' => "No. Telepon sudah terdaftar",
            ]);
        } else {
            $input['password'] = Hash::make($request->password);
            $input['status'] = 'aktif';
            $user = User::create($input);
            return response()->json([
                'code' => Response::HTTP_OK,
                'message' => "Pendaftaran Berhasil",
                'user' => $user
               
            ]);
        }
    }
}
