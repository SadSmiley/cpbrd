<?php
namespace App\Http\Controllers;
use Request;
use Redirect;
use DB;
use Validator;
use PDF;
use Session;
use Input;

class MainController extends Controller
{
	function __construct()
	{
		$user = Session::get("user");
		$this->user = $user;
	}
	public function index()
	{
		$data["page"] = "Landing Page";
		
		return view("main.landing", $data);
	}
	public function login()
	{
		$data["page"] = "Login Page";
		
		return view("main.login", $data);
	}
	public function proponent()
	{
		$data["page"] = "Proponents";
		$data["_proponent"] = DB::table("proponent")->where("deleted_at", NULL)->get();
		
		return view("main.proponent", $data);
	}
	public function report($id)
	{
		$data["page"] = "Input Page";
		$data["_proponent"] = DB::table("proponent")->where("deleted_at", NULL)->get();
		$data["_monitoring"] = DB::table("monitoring")->where("deleted_at", NULL)->get();
		$data["_naturemeasure"] = DB::table("naturemeasure")->where("deleted_at", NULL)->get();
		$data["_committeebill"] = DB::table("committeebill")->where("deleted_at", NULL)->get();

		if ($id > 0)
		{
			$data["_report"] = DB::table("tbl_new_report")->where("report_id", $id)->first();
		}
		
		return view("main.report", $data);
	}
	public function submit_report()
	{
		$rules['title_measure'] = 'required';
		$insert['title_measure'] = Request::input('title_measure');
		$rules['background'] = 'required';
		$insert['background'] = Request::input('background');
		$rules['opinion'] = 'required';
		$insert['opinion'] = serialize(Request::input('opinion'));
		$rules['brief_description'] = 'required';
		$insert['brief_description'] = Request::input('brief_description');
		$rules['features'] = 'required';
		$insert['features'] = serialize(Request::input('features'));
		$rules['bill'] = 'required';
		$insert['bill'] = serialize(Request::input('bill'));
		$rules['status'] = 'required';
		$insert['status'] = Request::input('status');

		$chart = Input::file("chart");
		
		$validator = Validator::make($insert, $rules);

        if ($validator->fails()) 
        {
            return Redirect::back()
                        ->withErrors($validator)
                        ->withInput();
        }	
        else
        {
        	dd(Request::input());
        	// INSERT 
        	$report_id = DB::table("tbl_new_report")->insertGetId($insert);
        	// GET PROPONENT
        	$proponent = Request::input('proponent');
	        // CHECK PROPONENT
	        if (isset($proponent)) 
	        {
	        	foreach ($proponent as $key => $value) 
		        {
		        	DB::table("rel_report_proponent")->where("report_id", $report_id)->delete();
		        	
		        	$insert_rel['report_id'] = $report_id;
		        	$insert_rel['proponent_id'] = $value;
		        	
		        	DB::table("rel_report_proponent")->insert($insert_rel);
		        }
	        }
	        
			return Redirect::to("/");
        }
	}
	public function print_proponent($id)
	{
		$data["page"] = "Proponent View - Print";
		$data["proponent"] = DB::table("proponent")->where("id", $id)->first();
		$agenda = DB::table("rel_report_proponent")->where("proponent_id", $id)
															->leftJoin('tbl_report', 'rel_report_proponent.report_id', '=', 'tbl_report.report_id')
															->get();
		$data["_agenda"] = [];
		foreach ($agenda as $key => $value) 
		{
			if (!isset($data["_agenda"][$value->report_legistative_agenda])) 
			{
				$data["_agenda"][$value->report_legistative_agenda] = [];
			}
			
			array_push($data["_agenda"][$value->report_legistative_agenda], $value);
		};

		$pdf = PDF::loadView('main.proponent_print', $data);
		return $pdf->download('Print.pdf');
	}
	public function proponent_view($id)
	{
		$data["page"] = "Proponent View";
		$data["proponent"] = DB::table("proponent")->where("id", $id)->first();
		$agenda = DB::table("rel_report_proponent")->where("proponent_id", $id)
															->leftJoin('tbl_report', 'rel_report_proponent.report_id', '=', 'tbl_report.report_id')
															->get();
		$data["_agenda"] = [];
		foreach ($agenda as $key => $value) 
		{
			if (!isset($data["_agenda"][$value->report_legistative_agenda])) 
			{
				$data["_agenda"][$value->report_legistative_agenda] = [];
			}
			
			array_push($data["_agenda"][$value->report_legistative_agenda], $value);
		};

		return view("main.proponent_view", $data);
	}
	public function agenda()
	{
		$data["page"] = "View by Agenda";
		$agenda = DB::table("tbl_report")->where("archived", 0)
										 ->get();
										 
		$data["_agenda"] = [];
		foreach ($agenda as $key => $value) 
		{
			if (!isset($data["_agenda"][$value->report_legistative_agenda])) 
			{
				$data["_agenda"][$value->report_legistative_agenda] = [];
			}
			
			array_push($data["_agenda"][$value->report_legistative_agenda], $value);
		};
	
		return view("main.agenda", $data);
	}
	public function view_agenda($name)
	{
		$data["page"] = "View by Measures under Agenda";
		$agenda = DB::table("tbl_report")->where("archived", 0)
										 ->where("report_legistative_agenda", $name)
										 ->get();
										 
		$data["_agenda"] = [];
		foreach ($agenda as $key => $value) 
		{
			if (!isset($data["_agenda"][$value->report_legistative_agenda])) 
			{
				$data["_agenda"][$value->report_legistative_agenda] = [];
			}
			
			array_push($data["_agenda"][$value->report_legistative_agenda], $value);
		};
		
		return view("main.view_agenda", $data);
	}
	public function measure()
	{
		$data["page"] = "View by Measures";
		$agenda = DB::table("tbl_report")->where("archived", 0)
										 ->get();
										 
		$data["_agenda"] = [];
		foreach ($agenda as $key => $value) 
		{
			if (!isset($data["_agenda"][$value->report_legistative_agenda])) 
			{
				$data["_agenda"][$value->report_legistative_agenda] = [];
			}
			
			array_push($data["_agenda"][$value->report_legistative_agenda], $value);
		};
		
		return view("main.measure", $data);
	}
	public function search_result()
	{
		$data["page"] = "Search Result";
		return view("main.search_result", $data);
	}
}