<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Session;
use Input;
use Redirect;
use DB;
use App\Imports\FinancialTransImport;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Articles;
use App\Category;
use App\User;
use App\Branches;


class TestingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function testing()
    {
        //return view('home');
        //echo 'Testing Home';
        $data['articles'] = Articles::with(['category','user'])->get();

        /*echo '<pre>';
        print_r($data);
        echo '</pre>';

        foreach($data as $key=>$value){
            echo $value->user->name;
            echo $value->category->category_name;
            echo $value->title;
        }*/
        //$this->load->view('articles')->with($data);
        //return view('articles')->with($data);
        return view('articles', $data);
    }
    public function edit_articles(Request $request){
        //echo 'edit articles';
        $id = request()->segment(2);
        $value = $id; //'someName';
        /*$data = Articles::with(['category', 'user' => function($q) use($value) {
        // Query the name field in status table
            $q->where('id', '=', $value); 
        }])
        //->whereUserId(Auth::user()->id)
        ->first();*/
        $data['article'] = Articles::find($id);
        $data['categories'] = Category::all();
        //print_r($data);
        /*echo '<pre>';
        print_r($data);
        echo '</pre>';*/
            return view('edit_article', $data);

    }
    public function delete_article(Request $request){
        $id = request()->segment(2);
        Articles::where('id',$id)->delete();
        Session::flash('alert-success', "Data Deleted Successfully.");
        return redirect()->back();
    }
    public function add_new_article(Request $request){
        $data['categories'] = Category::all();
        $data['users'] = User::all();

        /*echo '<pre>';
        print_r($data);
        echo '</pre>';

        foreach($data as $key=>$value){
            echo $value->user->name;
            echo $value->category->category_name;
            echo $value->title;
        }*/
        //$this->load->view('articles')->with($data);
        //return view('articles')->with($data);
        return view('new_article', $data);
    }
    public function submit_new_article(Request $request){
        //print_r($_POST);
        //get form data
        //$data = \Input::all();
        //print_r($data);
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'body' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/addnew')
                        ->withErrors($validator)
                        ->withInput();
        }
        $data = new Articles();
        $data->category_id = $request->category;
        $data->user_id = $request->user;
        $data->title = $request->title;
        $data->body = $request->body;
        $data->save();
        Session::flash('alert-success', "Data Added Successfully.");
        //return redirect()->back();
        return Redirect::route('articles.index');
    }
    public function developer_home(Request $request){
        echo 'developer home';
        $data['categories'] = Category::all();
        $data['users'] = User::all();
        return view('developer_home', $data);
    }
    public function udpate_article(Request $request){
        //print_r($_POST);
            //die();
            $id = $request->aid;
            $catid = $request->category;
            $title = $request->title;
            $body = $request->body;
        Articles::where('id', $id)->update(array('category_id'=>$catid,'title'=>$title,'body'=>$body));
        Session::flash('alert-success', "Data Updated Successfully.");
        return redirect()->back();
    }
    public function show_articles(Request $request){
        echo 'Developer Testing';
        $data = Articles::select('articles.*', 'category.category_name','users.*')
        ->leftJoin('category', 'articles.category_id', '=', 'category.id')
        ->leftJoin('users', 'articles.user_id', '=', 'users.id')
        ->get();
        echo '<pre>';
        print_r($data);
        echo '</pre>';
    }
    public function icloudehome_home(Request $request){
        return view('task.home');
    }

       /**
    * @return \Illuminate\Support\Collection
    */
    public function import(Request $request) 
    {
        /*$validator = Validator::make($request->all(), [
            'file' => 'max:105120', //5MB 
        ]);*/
        //DB::disableQueryLog();
        //Excel::import(new FinancialTransImport,request()->file('file'));
        //Excel::import(new UsersImport,request()->file('file'));
        //return back();

        $request->validate([
            'file' => 'required'
        ]);

        $path = $request->file('file')->getRealPath();
        $data = Excel::load($path)->get();

        if($data->count()){
            foreach ($data as $key => $value) {
                $arr[] = ['br_name' => $value->Status];
            }

            if(!empty($arr)){
                Branches::insert($arr);
            }
        }
    }
    public function exportTrans(Request $request){
        return Excel::download(new FinancialTransImport, 'financialtrans.xlsx');
    }
    public function demoapi(Request $request){
        echo 'Testing api ok';
    }
}
