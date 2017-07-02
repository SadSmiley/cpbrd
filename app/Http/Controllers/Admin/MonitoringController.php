<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Monitoring;
use App\Http\Requests\CreateMonitoringRequest;
use App\Http\Requests\UpdateMonitoringRequest;
use Illuminate\Http\Request;



class MonitoringController extends Controller {

	/**
	 * Display a listing of monitoring
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $monitoring = Monitoring::all();

		return view('admin.monitoring.index', compact('monitoring'));
	}

	/**
	 * Show the form for creating a new monitoring
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    
	    
	    return view('admin.monitoring.create');
	}

	/**
	 * Store a newly created monitoring in storage.
	 *
     * @param CreateMonitoringRequest|Request $request
	 */
	public function store(CreateMonitoringRequest $request)
	{
	    
		Monitoring::create($request->all());

		return redirect()->route('admin.monitoring.index');
	}

	/**
	 * Show the form for editing the specified monitoring.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$monitoring = Monitoring::find($id);
	    
	    
		return view('admin.monitoring.edit', compact('monitoring'));
	}

	/**
	 * Update the specified monitoring in storage.
     * @param UpdateMonitoringRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateMonitoringRequest $request)
	{
		$monitoring = Monitoring::findOrFail($id);

        

		$monitoring->update($request->all());

		return redirect()->route('admin.monitoring.index');
	}

	/**
	 * Remove the specified monitoring from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Monitoring::destroy($id);

		return redirect()->route('admin.monitoring.index');
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
            Monitoring::destroy($toDelete);
        } else {
            Monitoring::whereNotNull('id')->delete();
        }

        return redirect()->route('admin.monitoring.index');
    }

}
