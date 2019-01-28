<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Event;

class EventController extends Controller
{
    public function index(Request $request){
        $events = new Event();
        $from = $request->from;
        $to = $request->to;

        return response()->json([
            "data" => $events->
                where("start_date", "<", $to)->
                where("end_date", ">=", $from)->get()
        ]);
    }

    public function store(Request $request){
        $event = new Event();
        $event->text = strip_tags($request->text);
        $event->start_date = $request->start_date;
        $event->end_date = $request->end_date;
        $event->rec_type = $this->convertNullable($request->rec_type);
        $event->event_length = $this->convertNullable($request->event_length);
        $event->event_pid = $this->convertNullable($request->event_pid);
        $event->save();
        $status = "inserted";

        if($event->rec_type == "none"){
            $status = "deleted";
        }
    
        return response()->json([
            "action"=> $status,
            "tid" => $event->id
        ]);
    }

    public function update(Event $event, Request $request){
        $event->text = strip_tags($request->text);
        $event->start_date = $request->start_date;
        $event->end_date = $request->end_date;
        $event->rec_type = $this->convertNullable($request->rec_type);
        $event->event_length = $this->convertNullable($request->event_length);
        $event->event_pid = $this->convertNullable($request->event_pid);
        $event->save();

        $this->deleteRelated($event);

        return response()->json([
            "action" => "updated"
        ]);
    }

    private function convertNullable($value) {
        return isset($value) && $value !== 'null' ? $value : null;
    }

    private function deleteRelated(Event $event){
        if($event->event_pid && $event->event_pid !== "none"){
            Event::where("event_pid", $event->id)->delete();
        }
    }

    public function destroy(Event $event){
        // delete the modified instance of the recurring series
        if($event->event_pid){
            $event->rec_type = "none";
            $event->save();
        } else {
            // delete a regular instance
            $event->delete();
        }

        $this->deleteRelated($event);

        return response()->json([
            "action" => "deleted"
        ]);
    }
}