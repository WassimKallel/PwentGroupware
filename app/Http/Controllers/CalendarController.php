<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\EventModel;
use App\Project;

class CalendarController extends Controller
{
	public function index($id)
	{
		$events = [];

        $events[] = \Calendar::event(
            'Event One', //event title
            false, //full day event?
            '2015-02-11T0800', //start time (you can also use Carbon instead of DateTime)
            '2015-02-12T0800', //end time (you can also use Carbon instead of DateTime)
            0 //optionally, you can specify an event ID
        );

        $events[] = \Calendar::event(
            "Groupware", //event title
            true, //full day event?
            new \DateTime('2016-11-20'), //start time (you can also use Carbon instead of DateTime)
            new \DateTime('2016-11-23'), //end time (you can also use Carbon instead of DateTime)
            'stringEventId' //optionally, you can specify an event ID
        );

        $eloquentEvent = EventModel::first(); //EventModel implements MaddHatter\LaravelFullcalendar\Event

        $calendar = \Calendar::addEvents($events); //add an array with addEvents
            //->addEvent($eloquentEvent, [ //set custom color fo this event
            //    'color' => '#800',
            //])->setOptions([ //set fullcalendar options
            //    'firstDay' => 1
            //])->setCallbacks([ //set fullcalendar callback options (will not be JSON encoded)
            //    'viewRender' => 'function() {alert("Callbacks!");}'
            //]); 
        $project = Project::find($id);
        return view('calendar.index', compact('calendar','project'));
	}
}
