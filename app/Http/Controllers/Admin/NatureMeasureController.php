<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\NatureMeasure;
use App\Http\Requests\CreateNatureMeasureRequest;
use App\Http\Requests\UpdateNatureMeasureRequest;
use Illuminate\Http\Request;



class NatureMeasureController extends Controller {

	/**
	 * Display a listing of naturemeasure
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $naturemeasure = NatureMeasure::all();

		return view('admin.naturemeasure.index', compact('naturemeasure'));
	}

	/**
	 * Show the form for creating a new naturemeasure
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    
	    
	    return view('admin.naturemeasure.create');
	}

	/**
	 * Store a newly created naturemeasure in storage.
	 *
     * @param CreateNatureMeasureRequest|Request $request
	 */
	public function store(CreateNatureMeasureRequest $request)
	{
	    
		NatureMeasure::create($request->all());

		return redirect()->route('admin.naturemeasure.index');
	}

	/**
	 * Show the form for editing the specified naturemeasure.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$naturemeasure = NatureMeasure::find($id);
	    
	    
		return view('admin.naturemeasure.edit', compact('naturemeasure'));
	}

	/**
	 * Update the specified naturemeasure in storage.
     * @param UpdateNatureMeasureRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateNatureMeasureRequest $request)
	{
		$naturemeasure = NatureMeasure::findOrFail($id);

        

		$naturemeasure->update($request->all());

		return redirect()->route('admin.naturemeasure.index');
	}

	/**
	 * Remove the specified naturemeasure from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		NatureMeasure::destroy($id);

		return redirect()->route('admin.naturemeasure.index');
	}

    /**
     * Mass delete function from index page
     * @param Request $request
     *
     * @return mixed
     */
    public function massDelete(Request $request)
    {
        if ($request->get('toDelete') != 'mass') {
            $toDelete = json_decode($request->get('toDelete'));
            NatureMeasure::destroy($toDelete);
        } else {
            NatureMeasure::whereNotNull('id')->delete();
        }

        return redirect()->route('admin.naturemeasure.index');
    }

}
