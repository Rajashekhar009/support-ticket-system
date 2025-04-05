<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TicketController extends Controller
{
    public function index(){

        return view('ticketlist',
        ['tickets'=>Ticket::orderBy('created_at','DESC')->paginate(5)]
        );

    }

    public function store(){

        request()->validate(
            ['txtTitle' => 'required|min:5|max:240',
            'txtDescription' => 'required|min:5',
            'selPriority' => 'required']
        );

        $ticket = Ticket::create(
            ['title' => request()->get('txtTitle',''),
            'description' => request()->get('txtDescription',''),
            'reference_number' => time(),
            'priority' => request()->get('selPriority',''),
            'user_id' => auth()->user()->id]
        );

        return redirect()->route('tickets.list')->with('success','The New Ticket has been created successfully!');
    }

    public function destroy($id){

        $ticket = Ticket::where("id", $id)->first();

        if($ticket==null){
            return redirect()->route('tickets.list')->with('success','The Ticket has already been deleted successfully!');
        }
        else{
            $ticket->delete();
            return redirect()->route('tickets.list')->with('success','The Ticket has been deleted successfully!');
        }
    }

    public function show($ticketid){
        $ticket = DB::table('tickets')
            ->where('tickets.id', $ticketid)
            ->join('users as users1', 'users1.id', '=', 'tickets.user_id')
            ->leftJoin ('users as users2', 'users2.id', '=', 'tickets.updated_by_user_id')
            ->select('tickets.*', 'users1.name as createdby', 'users2.name as updatedBy')
            ->get();

        return view('tickets.show', ['ticket' => $ticket[0]]);

    }

    public function edit(Ticket $ticket){
        return view('tickets.show',['ticket'=>$ticket]);
    }

    public function create(){
        return view('tickets.create');
    }

    public function update(Ticket $ticket){

        request()->validate(
            ['selStatus' => 'required']
        );

        $ticket->status = request()->get('selStatus','0');
        $ticket->updated_by_user_id = auth()->user()->id;
        $ticket->save();

        return redirect()->route('tickets.show', $ticket->id)->with('success','Ticket status has been updated successfully!');
    }

}
