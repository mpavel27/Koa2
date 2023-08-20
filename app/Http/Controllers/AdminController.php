<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\MainController;
use App\Models\News;
use App\Models\Events;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function viewIndex() {
        $online_players = MainController::getPlayersOnline();
        $online_players_24 = MainController::getPlayersOnline24h();
        $accounts = MainController::getAccountsCount();
        $characters = MainController::getPlayersCount();
        return view('admin.index', compact([
            'online_players',
            'online_players_24',
            'accounts',
            'characters',
        ]));
    }

    public function viewEvents() {
        $events = Events::all();
        return view('admin.events', compact([
            'events'
        ]));
    }

    public function viewCreateEvents() {
        return view('admin.events_create');
    }

    public function viewNews() {
        $news = News::all();
        return view('admin.news', compact([
            'news'
        ]));
    }

    public function viewCreateNews() {
        return view('admin.news_create');
    }

    public function createNews(Request $request) {
        $news = News::create([
            'title' => $request->title,
            'content' => $request->editor,
            'created_by' => Auth::user()->id
        ]);
        // return dd($news);
        if($news) {
            toastr()->success("The announcement has been successfully created!");
            return redirect()->route('app.admin.news');
        }
        toastr()->error("Something went wrong");
        return redirect()->route('app.admin.news');
    }

    public function createEvents(Request $request) {
        $events = Events::create([
            'title' => $request->title,
            'event_date' => $request->event_date,
            'created_by' => Auth::user()->id
        ]);

        if($events) {
            toastr()->success("The event has been successfully created!");
            return redirect()->route('app.admin.events');
        }
        toastr()->error("Something went wrong");
        return redirect()->route('app.admin.events');
    }

    public function manageNews(Request $request) {
        $news = News::where('id', $request->id)->first();
        $news->title = $request->title;
        $news->content = $request->editor;
        $news->save();
        if($news) {
            toastr()->success("The announcement has been successfully updated!");
            return redirect()->route('app.admin.news');
        }
        toastr()->error("Something went wrong");
        return redirect()->route('app.admin.news');
    }

    public function deleteNews(Request $request) {
        $news = News::where('id', $request->id)->first();
        $news->delete();
        if($news) {
            toastr()->success("The announcement has been successfully deleted!");
            return redirect()->route('app.admin.news');
        }
        toastr()->error("Something went wrong");
        return redirect()->route('app.admin.news');
    }

    public function deleteEvents(Request $request) {
        $event = Events::where('id', $request->id)->first();
        $event->delete();
        if($event) {
            toastr()->success("The event has been successfully deleted!");
            return redirect()->route('app.admin.events');
        }
        toastr()->error("Something went wrong");
        return redirect()->route('app.admin.events');
    }

    public function viewManageNews($id) {
        $news = News::where('id', $id)->first();
        return view('admin.news_manage', compact([
            'news'
        ]));
    }
}
