<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Project;
use Calendar;
use Input;
use App\Activity;

class CalendarController extends Controller
{
	public function index($id)
	{
        $project = Project::find($id);
        $activities = $project->activities;
        $events = array();
        foreach ($activities as $activity) {
            if($activity->type == 'addPost')
            {
                $events["".$activity->created_at] = array("<a href=\"\posts\\$activity->post_id\" title=\"" . $activity->user->name ." posted ". $activity->post->title ."\">&#9673;</a>");
            }
            elseif($activity->type == 'addComment')
            {
                $events["".$activity->created_at] = array("<a href=\"\posts\\$activity->post_id\" title=\"" . $activity->user->name ." commented on ". $activity->post->title ."\">&#9673;</a>");
            }
            elseif($activity->type == 'uploadFile')
            {
                $events["".$activity->created_at] = array("<a href=\"\projects\\$activity->project_id\\files\\$activity->file_id\" title=\"" . $activity->user->name ." uploaded the file ". $activity->file->name ."\">&#9673;</a>");
            }


        }

		// $events = array(
  //       "2016-12-09 10:30:00" => array(
  //           "<a href=\"\" title=\"EventName\">&#9673;</a>",
  //       ),
    //);

    $cal = Calendar::make(); // create instance

    /**** OPTIONAL METHODS ****/
    $cal->setDate(Input::get('cdate')); //Set starting date
    $cal->setBasePath('/projects/1/calendar'); // Base path for navigation URLs
    $cal->showNav(true); // Show or hide navigation
    $cal->setView(Input::get('cv')); //'day' or 'week' or null
    $cal->setStartEndHours(8,20); // Set the hour range for day and week view
    $cal->setTimeClass('ctime'); //Class Name for times column on day and week views
    $cal->setEventsWrap(array('<span>', '</span>')); // Set the event's content wrapper
    $cal->setDayWrap(array('<div>','</div>')); //Set the day's number wrapper
    $cal->setNextIcon('<span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span>'); //Can also be html: <i class='fa fa-chevron-right'></i>
    $cal->setPrevIcon('<span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>'); // Same as above
    $cal->setDayLabels(array('Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat')); //Label names for week days
    $cal->setMonthLabels(array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December')); //Month names
    $cal->setDateWrap(array('<div>','</div>')); //Set cell inner content wrapper
    $cal->setTableClass('table'); //Set the table's class name
    $cal->setHeadClass('table-header panel'); //Set top header's class name
    $cal->setNextClass('btn pull-right'); // Set next btn class name
    $cal->setPrevClass('btn pull-left'); // Set Prev btn class name
    $cal->setEvents($events); // Receives the events array
    /**** END OPTIONAL METHODS ****/
    $project = Project::find($id);
    $html = $cal->generate(); // Return the calendar's html;
    return View('calendar.index')->with('html',$html)->with('project',$project);
	}
}
