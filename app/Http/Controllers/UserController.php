<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Auth;
use App\User;
use App\Role;
use App\RoleUser;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::get();
        
        return view('user.index', [
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::join('instansi', 'users.id_instansi', '=', 'instansi.id_instansi')
        ->find($id);
        if($user)
        {
            return view('user.show_user', [
                'user' => $user
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $roles = Role::get();
        $avl = User::find($id);
        if($avl)
        {
            $users = User::join('role_user', 'users.id_user', '=', 'role_user.id_user')
                        ->join('roles', 'users.id_user', '=', 'role_user.id_user')
                        ->select('users.*', 'role_user.id_role', 'role_user.id_user' , 'role_user.id_role_user')
                        ->where('users.id_user', '=', $id)
                        ->first();
            if($users){
                return view('user.update', [
                    'users' => $users,
                    'roles' => $roles
                ]);
            }
        }
        return redirect()->back();
    }


       /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateProfile(Request $request)
    {
        $uploadedFile=null;
        $fileKtpAvl=false;
        $fileProfileAvl=false;
        $fileKtp='';
        $dir = 'public/images/ktp';
        $dir2 = 'public/images/profilepicture';

         $this->validate($request, [
             'name'         => 'required|string|max:190',
             'email'        => 'required|string|email|max:190',
             'alamat'       => 'required|string|max:190',
             'id_instansi'     => 'required|string|max:32',
             'no_telp'      => 'required|string|max:13',
             'foto_ktp'     => 'file|image',
             'foto_profil'     => 'file|image',
         ]);

        $id_user = Auth::user()->id_user;

        $avl = User::find($id_user);
        
            $fileTemp=User::select('foto_ktp')->where('id_user', '=', $id_user)->first();//mengambil nama file yang ada di table
        if($avl)
        {
            if($request->foto_ktp==null)// file kosong
            {
                $fileKtp = $fileTemp->foto_ktp;
                $pathKtp = $fileKtp;
            }
            else { //file dimasukkan
                $uploadedFile = $request->file('foto_ktp');//menampung file yg di upload
                $avlFileName = $fileTemp->foto_ktp;
                $pathKtp = $uploadedFile->store($dir);//upload
                $fileKtpAvl=Storage::exists($avlFileKtp);//jika file ditemukan. untuk dihapus
            }      
            
            if($request->foto_profil==null)// file kosong
            {
                $fileProfile = $fileTemp->foto_profil;
                $pathProfile = $fileProfile;
            }
            else { //file dimasukkan
                $uploadedFile = $request->file('foto_profil');//menampung file yg di upload
                $avlFileProfile = $fileTemp->foto_profil;
                $pathProfile = $uploadedFile->store($dir2);//upload
                $fileProfileAvl=Storage::exists($avlFileProfile);//jika file ditemukan. untuk dihapus
            }  

            DB::beginTransaction();
            $updated = User::where('id_user', '=', $id_user)->update([
                'name'     => $request->name,
                'email'    => $request->email,
                'alamat'   => $request->alamat,
                'id_instansi' => $request->id_instansi,
                'no_telp'  => $request->no_telp,
                'foto_ktp' => $pathKtp,
                'foto_profil' => $pathProfile,
            ]);

         
            if($updated==true)
            {   
                $deletedKtp=true;
                $deletedProfile=true;

                if($fileKtpAvl==true)//jika ada file sebelumnya
                {
                   $deletedKtp = Storage::delete($avlFileName);//hapus filenya
                }

                if($fileProfileAvl==true)//jika ada file sebelumnya
                {
                   $deletedProfile = Storage::delete($avlFileName);//hapus filenya
                }

                if($deletedKtp==false||$deletedProfile==false)
                {
                    DB::rollBack();
                    Alert::error('Error', 'Gagal Menghapus Profil');
                    return redirect('profile');
                }
                else {
                    DB::commit();
                    Alert::success('Sukses', 'Berhasil Memperbaharui Profil');
                    // Alert::success('Sukses', '');
                    return redirect('profile');
                }
            }else {
                    DB::rollBack();
                     Alert::error('Error', 'Gagal Menghapus Profil');
                    //  Alert::error('Error', '');
                    return redirect('profile');
            }
            // return redirect()->back();
        }else {
             Alert::warning('Peringatan', 'Data Profil Tidak Ada');
            //  Alert::warning('Peringatan', '');
            return redirect()->back();
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $uploadedFile=null;
        $fileProfileAvl=false;
        $fileKtpAvl=false;
        $fileKtp='';
        $dir = 'public/images/ktp';
        $dir2 = 'public/images/profilepicture';

         $this->validate($request, [
             'id_user'      => 'required|string|max:32',
             'id_role_user' => 'required|string|max:32',
             'id_role'      => 'required|string|max:32',
             'name'         => 'required|string|max:190',
             'email'        => 'required|string|email|max:190',
             'alamat'       => 'required|string|max:190',
             'id_instansi'     => 'required|string|max:50',
             'no_telp'      => 'required|string|max:13',
             'foto_ktp'     => 'file|image',
             'foto_profil'     => 'file|image',
         ]);


        $avl = User::find($request->id_user);
        $avl2 = RoleUser::find($request->id_role_user);
        
        $fileTemp=User::select('foto_ktp')->where('id_user', '=', $request->id_user)->first();//mengambil nama file yang ada di table
        if($avl&&$avl2)
        {
            if($request->foto_ktp==null)// file kosong
            {
                $fileKtp = $fileTemp->foto_ktp;
                $pathKtp = $fileKtp;
            }
            else { //file dimasukkan
                $uploadedFile = $request->file('foto_ktp');//menampung file yg di upload
                $avlFileName = $fileTemp->foto_ktp;
                $pathKtp = $uploadedFile->store($dir);//upload
                $fileAvl=Storage::exists($avlFileName);//jika file ditemukan. untuk dihapus
            }                   

            if($request->foto_profil==null)// file kosong
            {
                $fileProfile = $fileTemp->foto_profil;
                $pathProfile = $fileProfile;
            }
            else { //file dimasukkan
                $uploadedFile = $request->file('foto_profil');//menampung file yg di upload
                $avlFileProfile = $fileTemp->foto_profil;
                $pathProfile = $uploadedFile->store($dir2);//upload
                $fileProfileAvl=Storage::exists($avlFileProfile);//jika file ditemukan. untuk dihapus
            }  

            DB::beginTransaction();
            $updated = User::where('id_user', '=', $request->id_user)->update([
                'name'     => $request->name,
                'email'    => $request->email,
                'alamat'   => $request->alamat,
                'id_instansi' => $request->id_instansi,
                'no_telp'  => $request->no_telp,
                'foto_ktp' => $pathKtp,
                'foto_profil' => $pathProfile,
            ]);

            $updated2 = RoleUser::where('id_role_user', '=', $request->id_role_user)->update([
                'id_role'     => $request->id_role,
            ]);

         
            if($updated==true&&$updated2==true)
            {   
                $deletedKtp=true;
                $deletedProfile=true;

                if($fileKtpAvl==true)//jika ada file sebelumnya
                {
                   $deletedKtp = Storage::delete($avlFileName);//hapus filenya
                }

                if($fileProfileAvl==true)//jika ada file sebelumnya
                {
                   $deletedProfile = Storage::delete($avlFileName);//hapus filenya
                }

                if($deletedKtp==false||$deletedProfile==false)
                {
                    DB::rollBack();
                    return redirect('user')->with(['error' => 'Gagal Menghapus User']);
                }
                else {
                    DB::commit();
                    return redirect('user')->with(['success' => 'Berhasil Memperbaharui User']);
                }
            }else {
                DB::rollBack();
                    return redirect('user')->with(['error' => 'Gagal Menghapus User']);
            }
            

            
            // return redirect()->back();
        }else {
            return redirect()->back()->with(['warning' => 'Data User Tidak Ada']);
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $avl = User::find($id);
        if($avl){
            $destroy = User::destroy($id);

            if($destroy)
            return redirect('user')->with(['success' => 'Berhasil Menghapus Data User']);
            else
            return redirect('user')->with(['error' => 'Gagal Menghapus Data User']);
        }else {
            return redirect('user')->with(['warning' => 'Data User Tidak Ada']);
        }
    }
}
