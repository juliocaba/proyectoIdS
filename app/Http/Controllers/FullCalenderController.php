<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Models\Event;
use \DateTime;
use \DateTimeZone;
  
class FullCalenderController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index(Request $request)
    {
        $data = Event::whereDate('start', '>=', $request->start)
            ->whereDate('end',   '<=', $request->end)
            ->get(['id', 'title', 'start', 'end']);

        foreach ($data as &$date) {
            $date->start = (new DateTime($date->start))->format(DateTime::ISO8601);
            $date->end = (new DateTime($date->end))->format(DateTime::ISO8601);
        }

        return response()->json($data);
    }
 
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function ajax(Request $request)
    {
        switch ($request->type) {
            case 'add':
                $event = Event::create([
                    'title' => $request->title,
                    'start' => $request->start,
                    'end' => $request->end,
                ]);
    
                return response()->json($event);
                break;
    
            case 'update':
                $event = Event::find($request->id)->update([
                    'title' => $request->title,
                    'start' => $request->start,
                    'end' => $request->end,
                ]);
    
                return response()->json($event);
                break;
    
            case 'delete':
                $event = Event::find($request->id)->delete();
    
                return response()->json($event);
                break;
                
            default:
                # code...
                break;
        }
    }
}