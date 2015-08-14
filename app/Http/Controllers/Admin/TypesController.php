<?php namespace App\Http\Controllers\Admin;

use App\GarbageType;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class TypesController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        if($request->has('q'))
            return view('backend.status.index')->with('types',GarbageType::search($request->input('q'))->paginate(5));
        return view('backend.types.index')->with('types',GarbageType::paginate(5));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3'
        ]);

        if(GarbageType::create($request->except('_token'))){
            return redirect()->back()->withSuccess('Garbage Type added');
        }else{
            return redirect()->back()->withSError('Failed to add new status');
        }

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param Request $request
     * @return mixed
     */
    public function edit(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3',
            'id' => 'required'
        ]);

        if(GarbageType::find($request->input('id'))->update($request->except('_token','id'))){
            return redirect()->back()->withSuccess('Status updated');
        }else{
            return redirect()->back()->withSError('Failed to update new status');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param GarbageType $garbageType
     * @return mixed
     * @throws \Exception
     */
    public function destroy(GarbageType $garbageType)
    {
        $garbageType->delete();
        return redirect()->back()->withSuccess('Status removed');
    }

}
