<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Proponent;
use App\Http\Requests\CreateProponentRequest;
use App\Http\Requests\UpdateProponentRequest;
use Illuminate\Http\Request;



class ProponentController extends Controller {

	/**
	 * Display a listing of proponent
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $proponent = Proponent::all();

		return view('admin.proponent.index', compact('proponent'));
	}

	/**
	 * Show the form for creating a new proponent
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    
	    
	    return view('admin.proponent.create');
	}

	/**
	 * Store a newly created proponent in storage.
	 *
     * @param CreateProponentRequest|Request $request
	 */
	public function store(CreateProponentRequest $request)
	{
	    
		Proponent::create($request->all());

		return redirect()->route('admin.proponent.index');
	}

	/**
	 * Show the form for editing the specified proponent.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$proponent = Proponent::find($id);
	    
	    
		return view('admin.proponent.edit', compact('proponent'));
	}

	/**
	 * Update the specified proponent in storage.
     * @param UpdateProponentRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateProponentRequest $request)
	{
		$proponent = Proponent::findOrFail($id);

        

		$proponent->update($request->all());

		return redirect()->route('admin.proponent.index');
	}

	/**
	 * Remove the specified proponent from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Proponent::destroy($id);

		return redirect()->route('admin.proponent.index');
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
            Proponent::destroy($toDelete);
        } else {
            Proponent::whereNotNull('id')->delete();
        }

        return redirect()->route('admin.proponent.index');
    }

}
