<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\CommitteeBill;
use App\Http\Requests\CreateCommitteeBillRequest;
use App\Http\Requests\UpdateCommitteeBillRequest;
use Illuminate\Http\Request;



class CommitteeBillController extends Controller {

	/**
	 * Display a listing of committeebill
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $committeebill = CommitteeBill::all();

		return view('admin.committeebill.index', compact('committeebill'));
	}

	/**
	 * Show the form for creating a new committeebill
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    
	    
	    return view('admin.committeebill.create');
	}

	/**
	 * Store a newly created committeebill in storage.
	 *
     * @param CreateCommitteeBillRequest|Request $request
	 */
	public function store(CreateCommitteeBillRequest $request)
	{
	    
		CommitteeBill::create($request->all());

		return redirect()->route('admin.committeebill.index');
	}

	/**
	 * Show the form for editing the specified committeebill.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$committeebill = CommitteeBill::find($id);
	    
	    
		return view('admin.committeebill.edit', compact('committeebill'));
	}

	/**
	 * Update the specified committeebill in storage.
     * @param UpdateCommitteeBillRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateCommitteeBillRequest $request)
	{
		$committeebill = CommitteeBill::findOrFail($id);

        

		$committeebill->update($request->all());

		return redirect()->route('admin.committeebill.index');
	}

	/**
	 * Remove the specified committeebill from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		CommitteeBill::destroy($id);

		return redirect()->route('admin.committeebill.index');
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
            CommitteeBill::destroy($toDelete);
        } else {
            CommitteeBill::whereNotNull('id')->delete();
        }

        return redirect()->route('admin.committeebill.index');
    }

}
