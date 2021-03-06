<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CommentModel;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    function index()
    {
     return view('/admin.allcomment');
    }

    function action(Request $request)
    {
     if($request->ajax())
     {
      $output = '';
      $query = $request->get('query');
      if($query != '')
      {
       $data = DB::table('comment')
         ->where('comment_id', 'like', '%'.$query.'%')
         ->orWhere('comment_content', 'like', '%'.$query.'%')
         ->orWhere('comment_by', 'like', '%'.$query.'%')
         ->orWhere('post_of_comment', 'like', '%'.$query.'%')
         ->orderBy('comment_id', 'desc')
         ->get();   
      }
      else
      {
       $data = DB::table('comment')
         ->orderBy('comment_id', 'desc')
         ->get();
      }
      $total_row = $data->count();
      if($total_row > 0)
      {
       foreach($data as $row)
       {
        $output .= '
        <tr>
         <td align="center" >'.$row->comment_id.'</td>
         <td align="center" >'.$row->comment_content.'</td>
         <td align="center" >'.$row->comment_by.'</td>
         <td align="center" >'.$row->post_of_comment.'</td>
         <td align="center" s>
                <a href="" class="btn btn-danger btn sm">Delete</a> 
            </td>
                  
         
        </tr>
        ';
       }
      }
      else
      {
       $output = '
       <tr>
        <td align="center" colspan="5">No Data Found</td>
       </tr>
       ';
      }
      $data = array(
       'table_data'  => $output,
       'total_data'  => $total_row
      );

      echo json_encode($data);
     }
    }
}
