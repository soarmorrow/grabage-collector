<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class HomeController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | Home Controller
    |--------------------------------------------------------------------------
    |
    | This controller renders your application's "dashboard" for users that
    | are authenticated. Of course, you are free to change or remove the
    | controller as you wish. It is just here to get your app started!
    |
    */

    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard to the user.
     *
     * @return Response
     */
    public function index()
    {
        return view('frontend.user.dashboard');
    }


    public function postIndex(Request $request)
    {
        dd($request->all());
    }

    /**
     * @param Request $request
     * @return string
     */
    public function postImages(Request $request)
    {
        $response = array();
        $root = 'uploads/';
        $savePath = $root . Auth::Id() . "/" . date('Y_m') . "/" . date('d');
        if ($request->hasFile('file')) {
            $image = $request->file('file');
            if ($image->isValid()) {
                $extension = $image->getClientOriginalExtension();
                $file_name = str_random(3) . time() . '.' . $extension;
                $image->move($savePath, $file_name);

                $response['status'] = true;
                $response['code'] = 200;
                $response['message'] = 'File uploaded successfully';
                $response['file_path'] = $savePath . "/" . $file_name;
                $response['file_name'] = $file_name;

            } else {
                $response['status'] = false;
                $response['code'] = 500;
                $response['message'] = 'Something went wrong while Uploading';
                $response['file_path'] = false;
                $response['file_name'] = false;
            }
        } else {
            $response['status'] = false;
            $response['code'] = 404;
            $response['message'] = 'No image uploaded';
            $response['file_path'] = false;
            $response['file_name'] = false;
        }
        return json_encode($response);
    }

    public function postDeleteImage(Request $request)
    {
        $response = [];
        if ($request->input('file_path')) {
            if (file_exists($request->input('file_path'))) {
                unlink($request->input('file_path'));
                $response['status'] = true;
                $response['code'] = 200;
                $response['message'] = 'File deleted from ' . $request->input('file_path');
            } else {
                $response['status'] = false;
                $response['code'] = 404;
                $response['message'] = $request->input('file_path') . ' does not exists';
            }
        } else {
            $response['status'] = false;
            $response['code'] = 500;
            $response['message'] = 'Invalid file path';
        }
        return json_encode($response);
    }

    public function search(Request $request)
    {
        $this->validate($request, [
            'q' => 'required'
        ]);
//        DB::connection()->enableQueryLog();
//        Auth::user()->orders()->search($request->input('q'))->get()->toArray();
//        dd(DB::getQueryLog());
        return view('frontend.user.order.index')->withOrders(Auth::user()->orders()->search($request->input('q'))->orderBy('created_at','desc')->paginate(5));
    }


}
