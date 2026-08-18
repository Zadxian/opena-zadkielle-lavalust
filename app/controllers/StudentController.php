<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class StudentController extends Controller
{

    public function index()
    {
        
        $data['title'] = 'Zadkielle Opena';
        $this->call->view('student_home', $data);
    }
    public function access()
    {
        session_start();
        $_SESSION['student_access'] = true;
        session_write_close();
        redirect('/student/profile');
    }

    public function profile()
    {
        $student = [
            'student_id' => 'MCC2024-00224',
            'name'       => 'Zadkielle Opena',
            'course'     => 'Bachelor of Science in Information Technology',
            'year'       => '3rd Year',
            'section'    => 'F5',
            'email'      => 'dazie@gmail.com'
        ];

        $this->call->view('student_profile', $student);
    }
}