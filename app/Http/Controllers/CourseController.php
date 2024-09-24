<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
  public function index (String $string) {
    $course[] = 'course';
    $course['title'] = $string;
    $course['up-skill'] = Course::where('level', $string)->get();
    $course['artisan'] = Course::where('level', $string)->get();
    $course['craft-certificate'] = Course::where('level', $string)->get();
    $course['diploma'] = Course::where('level', $string)->get();

    return view('course.index', compact('course'));
  }

  public function create () {
    return view('course.section.create');
  }

  public function courseDuration (String $string) {
    $result = '';
    switch ($string) {
      case 'up-skill':
        $result = 3;
        break;
      case 'artisan':
        $result = 6;
        break;
      case 'craft-certificate':
        $result = 18;
        break;

      case 'diploma':
        $result = 27;
        break;
      
      default:
        $result = 0;
        break;
    }

    return $result;
  }

  public function coursePrice (String $course, String $level) {
    $price = '';
    switch ($course) {
      //billing for robotics engineering
      case 'robotics-engineering':
        if ($level == 'up-skill') {
          $price = '30000';
        } elseif ($level == 'artisan') {
          $price = '150000';
        }elseif ($level == 'craft-certificate') {
          $price = '150000';
        }elseif ($level == 'diploma') {
          $price = '225000';
        } else {
          return redirect()->back()->with('danger', 'We cannot process your request at the moment. try again later.');
        }
        break;

      //billing for computer science
      case 'computer-science':
        if ($level == 'up-skill') {
          $price = '30000';
        } elseif ($level == 'artisan') {
          $price = '150000';
        }elseif ($level == 'craft-certificate') {
          $price = '150000';
        }elseif ($level == 'diploma') {
          $price = '225000';
        } else {
          return redirect()->back()->with('danger', 'We cannot process your request at the moment. try again later.');
        }
        break;

      //billing for robotics engineering
      case 'prototyping':
        if ($level == 'up-skill') {
          $price = '30000';
        } elseif ($level == 'artisan') {
          $price = '150000';
        }elseif ($level == 'craft-certificate') {
          $price = '150000';
        }elseif ($level == 'diploma') {
          $price = '225000';
        } else {
          return redirect()->back()->with('danger', 'We cannot process your request at the moment. try again later.');
        }
        break;
      
      default:
        return redirect()->back()->with('danger', 'We cannot process your request at the moment. try again later.');
        break;
    }
    $result = $price;
    return $result;
  }

  public function store (Request $request) {
    $request->validate([
        'name' => 'required',
        'cover_photo' => ['required', 'mimes:jpg,jpeg,png,ico'],
        'level' => 'required',
    ]);

    if ($request->input('name') == 'robotics-engineering' || $request->input('name') == 'computer-science' || $request->input('name') == 'prototyping') {

    $store = new Course;
    $store->name = $request->input('name');
      if ($request->hasfile('cover_photo')) {
        $file = $request->file('cover_photo');
        $extension = $file->getClientOriginalExtension();
        $fileName = time().'.'.$extension;
        $file->storeAs('public/pictures', $fileName);
        $store->cover_photo = $fileName;
      }
    $store->duration = $this->courseDuration($request->input('level'));
    $store->level = $request->input('level');
    $store->price = $this->coursePrice($request->input('name'), $request->input('level'));
    $store->status = 1;
    $store->save();

    return redirect()->back()->with('success', $request->input('name').' created successfully');
  } else {
    return redirect()->back()->with('danger', 'Failed to create new course. Contact Accademics for further assistance.');
  }
  }

  public function show (String $string) {
    $course = Course::findOrFail($string);
    $course['title'] = $course['name'];
    return view('course.section.show', compact('course'));
  }

  public function edit (String $string) {
    $course = Course::findOrFail($string);
    $course['title'] = $course['name'];
    return view ('course.section.edit', compact('course'));
  }

  public function update (Request $request, String $id) {
    $request->validate([
        'name' => 'required',
        'cover_photo' => ['required', 'mimes:jpg,jpeg,png,ico'],
        'level' => 'required',
    ]);

    $update = Course::findOrFail($id);
    $update->name = $request->input('name');
      if ($request->hasfile('cover_photo')) {
        $file = $request->file('cover_photo');
        $extension = $file->getClientOriginalExtension();
        $fileName = time().'.'.$extension;
        $file->storeAs('public/pictures', $fileName);
        $update->cover_photo = $fileName;
      }
    $update->duration = $this->courseDuration($request->input('level'));
    $update->level = $request->input('level');
    $update->price = $this->coursePrice($request->input('level'));
    $update->status = $request->input('status');
    $update->update();
    return redirect()->back()->with('success', 'Course updated successfully!');
  }
}