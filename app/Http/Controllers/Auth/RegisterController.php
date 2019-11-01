<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\User;
use App\RoleUser;
use App\Instansi;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Ramsey\Uuid\Uuid;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        $instansi=Instansi::get();
        return view('auth.register', 
        [
            'instansi' => $instansi
        ]);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        // dd($data);
        return Validator::make($data, [
            // 'id' => ['required', 'string', 'max:32'],
            'name' => ['required', 'string', 'max:190'],
            'email' => ['required', 'string', 'email', 'max:190', 'unique:users'],
            'alamat' => ['required', 'string', 'max:190'],
            'id_instansi' => ['required', 'string', 'max:32'],
            'no_telp' => ['required', 'string', 'max:13'],
            'foto_ktp' => ['required','file', 'image'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $uploadedFile = $data['foto_ktp'];
        $path = $uploadedFile->store('public/images/ktp');
        if($path)
        {
            DB::beginTransaction();
            $uuid = Uuid::uuid4();
            $user = User::create([
                'id_user'   => $uuid->getHex(),
                'name' => $data['name'],
                'email' => $data['email'],
                'alamat' => $data['alamat'],
                'id_instansi' => $data['id_instansi'],
                'no_telp' => $data['no_telp'],
                'foto_ktp' => $path,
                'password' => Hash::make($data['password']),
            ]);
            //  dd($user);
            $uuid2 = Uuid::uuid4();
            $role=RoleUser::create([
                'id_role_user'  => $uuid2->getHex(),
                'id_role' => '5cd69df8-beda-4fb3-9366-67ef34fe',
                'id_user' => $uuid->getHex(),
             ]);
             
             if($user&&$role)
             {
                Alert::success('Sukses', 'Berhasil Registerasi');
                DB::commit();
             }
             else {
                 Alert::error('Error', 'Gagal Registrasi');
                 DB::rollBack();
                }
            return $user;

        }
    }
}
