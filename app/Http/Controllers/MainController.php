<?php
namespace App\Http\Controllers;
use Request;
use Redirect;
use DB;
use Validator;
use PDF;

class MainController extends Controller
{
	public function index()
	{
		$data["page"] = "Landing Page";
		
		return view("main.landing", $data);
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
	
		if ($id > 0) 
		{
			$data["report"] = DB::table("tbl_report")->where("report_id", $id)->first();
			foreach ($data["_proponent"] as $key => $value) 
			{
				$exist = DB::table("rel_report_proponent")->where("report_id", $id)->where("proponent_id", $value->id)->first();
				
				if($exist)
				{
					$data["_proponent"][$key]->checked = true;
				}
				else
				{
					$data["_proponent"][$key]->checked = false;
				}
			}
		}
		
		return view("main.report", $data);
	}
	public function submit_report()
	{
		$rules['report_legistative_agenda'] = 'required';
		$rules['report_measures'] = 'required';
		$rules['report_salient_related_house_bill'] = 'required';
		$rules['report_author_related_house_bill'] = 'required';
		$rules['report_significance_related_house_bill'] = 'required';
		$rules['report_status_related_house_bill'] = 'required';
		$rules['report_author_related_senate_bill'] = 'required';
		$rules['report_salient_related_senate_bill'] = 'required';
		$rules['report_significance_related_senate_bill'] = 'required';
		$rules['report_status_related_senate_bill'] = 'required';
		$rules['report_notes'] = 'required';
		
		$insert['report_legistative_agenda'] = Request::input('report_legistative_agenda');
		$insert['report_measures'] = Request::input('report_measures');
		$insert['report_salient_related_house_bill'] = Request::input('report_salient_related_house_bill');
		$insert['report_author_related_house_bill'] = Request::input('report_author_related_house_bill');
		$insert['report_significance_related_house_bill'] = Request::input('report_significance_related_house_bill');
		$insert['report_status_related_house_bill'] = Request::input('report_status_related_house_bill');
		$insert['report_author_related_senate_bill'] = Request::input('report_author_related_senate_bill');
		$insert['report_salient_related_senate_bill'] = Request::input('report_salient_related_senate_bill');
		$insert['report_significance_related_senate_bill'] = Request::input('report_significance_related_senate_bill');
		$insert['report_status_related_senate_bill'] = Request::input('report_status_related_senate_bill');
		$insert['report_notes'] = Request::input('report_notes');
		
		$validator = Validator::make($insert, $rules);

        if ($validator->fails()) 
        {
            return Redirect::back()
                        ->withErrors($validator)
                        ->withInput();
        }	
        else
        {
        	// INSERT 
        	$report_id = DB::table("tbl_report")->insertGetId($insert);
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
}