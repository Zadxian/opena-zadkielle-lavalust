<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');


class StudentMiddleware extends Middleware
{
    public function handle()
    {
        session_start();
        if (!isset($_SESSION['student_access']) || $_SESSION['student_access'] !== true) {
            session_write_close();
            redirect('/student');
        }
        session_write_close();
    }
}




?>
