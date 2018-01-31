<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Course;

class CourseController extends Controller
{

    /**
     * Makes sure all the functions are authenticated
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getCourses(Request $request, $user_id) {
        if(!Auth::check() || Auth::id() != $user_id) {
            abort(401, 'unauthorized');
        }

        $user = User::findOrFail($user_id);
        $courses = $user->courses;

        $data = [
            'user' => $user,
            'courses' => $courses
        ];

        return \Response::json($data);
    }

    /**
     * Given a course_id, finds the associated Course object and returns it in JSON.
     * @param Request $request
     * @param $user_id
     * @param $course_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCourseById(Request $request, $user_id, $course_id) {
        if(!Auth::check() || Auth::id() != $user_id) {
            abort(401, 'unauthorized');
        }

        $user = User::findOrFail($user_id);
        $course = $user->courses->where('id', '=', $course_id)->first();

        if($course == null) {
            abort(404, 'not found.');
        }

        $data = [
            'course' => $course
        ];

        return \Response::json($data);
    }

    public function createCourse(Request $request, $user_id) {
        if(!Auth::check() || Auth::id() != $user_id) {
            abort(401, 'unauthorized');
        }

        $user = User::findOrFail($user_id);
        $new_course = new Course([
            'name' => $request->input('name'),
            'department' => $request->input('department'),
            'course_code' => $request->input('course_code'),
            'instructor' => $request->input('instructor'),
            'time' => $request->input('time'), // TODO: improve time with a datetime picker
            'user_id' => $user->id
        ]);

        $new_course->save();

        $data = [
            'user' => $user,
            'new_course' => $new_course
        ];

        return \Response::json($data, 200);

    }
}
