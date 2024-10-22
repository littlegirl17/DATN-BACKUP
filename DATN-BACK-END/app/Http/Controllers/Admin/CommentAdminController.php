<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentAdminController extends Controller
{
    private $commentModel;

    public function __construct()
    {
        $this->commentModel = new Comment();
    }

    public function comment()
    {
        return view('admin.comment');
    }
}
