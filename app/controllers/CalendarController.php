<?php

use Carbon\Carbon;
class CalendarController extends \BaseController {

	public $layout = 'layouts.master';

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$this->layout->content = View::make('calendar.index');
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$this->layout = null;
        $data         = array('error' => true, 'msg' => '');

        $event = new EventModel;
		$event->title = Input::get('eventTitle');
		$event->from = Carbon::createFromFormat(Lang::get('app.format.date'), Input::get('startTime'));
		$event->to = Carbon::createFromFormat(Lang::get('app.format.date'), Input::get('endTime'));
		$event->description = Input::get('description');
		$event->user_id = Auth::getUser()->id;
		$event->save();
		
		$data['error'] = false;
		$data['event'] = $event->toArray();

		return json_encode($data);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function get()
	{
		$this->layout = null;
		
		$events = [];
		
		foreach (Auth::getUser()->events as $event)
		{
			$event = $event->toArray();
			
			$event['start'] = strtotime($event['from'])*1000;
			$event['end'] = strtotime($event['to'])*1000;
			$event['url'] = null;
			$event['class'] = 'hhh';
			
			$events[] = $event;
		}
		
		return json_encode(array('success' => 1, 'result' => $events));
		
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

    public function logout()
	{
		try
		{
			Auth::logout(); // log the user out of our application
		}
		catch (Exception $ex)
		{
			// fail silently
		}

		return Redirect::route('login.index'); // redirect the user to the login screen
	}
}
