<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use \App\Student;
use \App\User;
use \App\Punishment;
use \App\Reward;
use \App\Major;
use \App\Rombel;
use \App\Rayon;

class SiswaController extends Controller
{
    //
    public function index()
    {
        $student = Student::all();
        $punishment = Punishment::all();
        $reward = Reward::all();
        $major = Major::all();
        $rombel = Rombel::all();
        $rayon = Rayon::all();
    	return view('admin/Siswa/index',compact('student','punishment','reward','major','rombel','rayon'));
 
    }

    public function create(Request $request)
    {
        $user = new User;
        $user->role = 'siswa';
        $user->name = $request->full_name;
        $user->email =$request->email;
        $user->password =bcrypt('rahasia');
        $user->remember_token = str::random(60);
        $user->save();
        
        $request->request->add(['user_id' => $user->id]);        
        $student = Student::create($request->all());
        return redirect('/siswa');
    }

    public function delete($id)
    {
        $student = Student::find($id);
        $student->delete($student);

        return redirect()->back();
        }
        public function edit($id)
        {       
            $student = Student::find(); 
            
            }
        public function update($id,Request $request)
        { 
            $this->validate($request,[
                'student' => 'required',
               ]);
               $student= Student::find($id);
               $student->user_id = $request->user_id;
               $student->save();
                    
                return redirect()->back();
    
            }

    }
