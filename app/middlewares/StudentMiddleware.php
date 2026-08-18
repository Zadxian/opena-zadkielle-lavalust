<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class StudentMiddleware extends Middleware
{
    public function handle()
    {
        if (isset($_SESSION['student_access']) && $_SESSION['student_access'] === true) {
            return true;
        }

        redirect('student');
        exit();
    }
}