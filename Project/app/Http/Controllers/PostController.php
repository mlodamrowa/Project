<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function view()
    {
        $table = DB::table('form')->get()->toArray();
        return view('view', ['table' => $table]);
    }

    public function create(Request $request)
    {
        $message = null;
        $statusRequest = $request->has('title');
        if ($statusRequest) {
            $title = $request->input('title');
            $description = $request->input('description');
            if ($title !== null && $description !== null) {
                $time = date('Y-m-d H:i:s');
                try {
                    DB::table('form')->insert([
                        ['title' => $title, 'description' => $description, 'created_at' => $time, 'updated_at' => $time]
                    ]);
                    $message = 'Udalo sie utworzyc rekord o tytule: ' . $title;
                } catch (\Exception $e) {
                    $message = 'Cos poszlo nie tak.';
                }
            } else
                $message = 'Uzupelni dane: Tytul, opis';
        }
        return view('create', ['message' => $message]);
    }

    public function delete(Request $request)
    {
        DB::table('form')
            ->where('id', '=', $request->input('id'))
            ->delete();
        $table = DB::table('form')->get()->toArray();
        return view('view', ['table' => $table]);
    }

    public function edit(Request $request)
    {
        $statusRequest = $request->has('send');
        if ($statusRequest) {
            $title = $request->input('title');
            $description = $request->input('description');
            $time = date('Y-m-d H:i:s');
            DB::table('form')
                ->where('id', '=', $request->input('id'))
                ->update(['title' => $title, 'description' => $description, 'updated_at' => $time]);
            return redirect()->route('view');
        }
        $table = DB::table('form')
            ->where('id', '=', $request->input('id'))
            ->get()
            ->toArray();
        return view('edit', ['table' => $table]);
    }

}
