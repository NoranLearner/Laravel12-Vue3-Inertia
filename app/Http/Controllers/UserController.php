<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        // return Inertia::render('Users', ['username' => Auth::user()?->name ?? 'Guest']);
        return Inertia::render('Users');
    }

    public function updateAvatar(Request $request)
    {
        $validated = $request->validate([
            'avatar' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'name' => 'nullable|string|max:255'
        ]);

        // $user = Auth::user();
        $user = $request->user();

         // ✅ لو فيه صورة جديدة
        if ($request->hasFile('avatar')) {

            // لو عنده صورة قديمة نحذفها
            if ($user->avatar && Storage::disk('public')->exists($user->avatar)) {
                Storage::disk('public')->delete($user->avatar);
            }

            // نخزن الصورة الجديدة
            $path = $request->file('avatar')->store('avatars', 'public');
            $user->avatar = $path;
        }

        // ✅ لو الاسم اتغير
        if (!empty($validated['name'])) {
            $user->name = $validated['name'];
        }

        $user->save();

        if($user->save()){
            // 🔥 هنا استخدم redirect بدل render
            // عشان Inertia يعمل refresh للـ props
            return redirect()->back()->with('success', 'Profile updated successfully!');
        }else{
            return redirect()->back()->with('error', 'Failed to update profile.');
        }

    }
}
