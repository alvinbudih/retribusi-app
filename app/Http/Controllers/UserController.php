<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("dashboard.users.index", [
            "title" => "User",
            "users" => User::all(),
            "roles" => Role::all()
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
        // dd($request->all());

        $validated = $request->validate([
            "name" => "required|max:255",
            "username" => "required|max:255|min:3|unique:users",
            "email" => "required|email:dns|unique:users",
            "password" => "required|min:5"
        ]);

        $validated["username"] = strtolower($validated["username"]);
        $validated["password"] = Hash::make($validated["password"]);
        User::create($validated);

        $roles = [];
        foreach (Role::all() as $role) {
            if ($request->get("roles$role->id") == null) {
                continue;
            }
            $roles[] = [
                "user_id" => User::max("id"),
                "role_id" => $request->get("roles$role->id")
            ];
        }
        DB::table("role_user")->insert($roles);

        return back()->with("success", "Data Berhasil Ditambah");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        // echo json_encode($user);

        $userRole = [];

        foreach ($user->roles as $r) {
            $userRole[] = $r->role_name;
        }

        return view("dashboard.users.edit", [
            "title" => "Edit User",
            "user" => $user,
            "roles" => Role::all(),
            "userRole" => $userRole
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $rules = ["name" => "required|max:255"];

        if ($request->username != $user->username) {
            $rules["username"] = "required|max:255|unique:users";
        }

        if ($request->email != $user->email) {
            $rules["email"] = "required|max:255|unique:users|email:dns";
        }

        if ($request->password != null) {
            $rules["password"] = "min:5";
        }

        $validated = $request->validate($rules);
        if (isset($validated["password"])) {
            $validated["password"] = Hash::make($validated["password"]);
        }

        User::where("id", $user->id)->update($validated);

        $roleUser = DB::table("role_user")->where("user_id", $user->id);
        $roleUser->delete();

        foreach (Role::all() as $role) {
            $thatWas = $roleUser->where("role_id", $request->get("roles$role->id"));

            if ($thatWas->doesntExist() and $request->get("roles$role->id") != null) {
                // echo "it doesn't exist ";
                DB::table("role_user")->insert([
                    "user_id" => $user->id,
                    "role_id" => $request->get("roles$role->id")
                ]);
            }
        }

        return redirect()->route("user.index")->with("success", "Data Berhasil Diubah");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        DB::table("role_user")->where("user_id", $user->id)->delete();
        $user->delete();

        return back()->with("success", "Data Berhasil Dihapus");
    }
}
