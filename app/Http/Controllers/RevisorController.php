<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class RevisorController extends Controller
{
    public function index(){
        $announcement_to_check = Announcement::where('is_accepted',NULL)->first();
        return view('revisor.revisor-panel', compact('announcement_to_check'));
    }

    public function trash_can(){
        $announcement=Announcement::where('is_accepted', false)->first();
        return view('revisor.trash-can',compact('announcement'));
    }

    public function manda_in_revisione(Announcement $announcement){
        $announcement->setAccepted(null);
        return redirect()->back()->with('message','Hai mandato l\'annuncio in revisione');
    }

    public function delete(Announcement $announcement){
        $announcement->delete();
        return redirect()->back()->with('message','Hai eliminato l\'annuncio');        
    }

    public function acceptAnnouncement(Announcement $announcement)
    {
    $announcement->setAccepted(true);
    return redirect()->back()->with('message','Complimenti,hai accettatol\'annuncio');
    }
    public function rejectAnnouncement(Announcement $announcement)
    {
    $announcement->setAccepted(false);
    return redirect()->back()->with('message','Complimenti,hai rifiutatol\'annuncio');
    }
}
