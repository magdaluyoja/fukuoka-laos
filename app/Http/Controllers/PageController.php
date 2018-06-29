<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Content;
use App\Attachment;

class PageController extends Controller
{
    
    public function getIndex(){
        $contents = Content::where([
                        ['date', '<=', date('Y-m-d')]
                    ])
                    ->orderby("date","desc")
                    ->limit(5)
                    ->get();
    	return view("pages.home")->with("contents",$contents);
    }

    public function getGreeetingsAndOverview(){
        $contents = Content::where([
                        ['date', '<=', date('Y-m-d')]
                    ])
                    ->orderby("date","desc")
                    ->limit(5)
                    ->get();
    	return view("pages.greetings-and-overview")->with("contents",$contents);
    }

    public function getOfficersList(){
        $contents = Content::where([
                        ['date', '<=', date('Y-m-d')]
                    ])
                    ->orderby("date","desc")
                    ->limit(5)
                    ->get();
    	return view("pages.officers-list")->with("contents",$contents);
    }

    public function getCompanyMembers(){
        $contents = Content::where([
                        ['date', '<=', date('Y-m-d')]
                    ])
                    ->orderby("date","desc")
                    ->limit(5)
                    ->get();
    	return view("pages.company-members")->with("contents",$contents);
    }
    public function getBusinessPlans(){
        $contents = Content::where([
                        ['date', '<=', date('Y-m-d')]
                    ])
                    ->orderby("date","desc")
                    ->limit(5)
                    ->get();
        $plans = Content::where([
                    ['content_type', "plan"],
                    ['date', '<=', date("Y-m-d")]
                ])
               ->orderBy('date', 'desc')
               ->paginate(5);
        $paging = $plans->currentPage()."of".$plans->total();
    	return view("pages.business-plans")->with("plans", $plans)->with("contents",$contents)->with("paging",$paging);
    }

    public function getBusinessReports(){
        $contents = Content::where([
                        ['date', '<=', date('Y-m-d')]
                    ])
                    ->orderby("date","desc")
                    ->limit(5)
                    ->get();
        $reports = Content::where([
                    ['content_type', "report"],
                    ['date', '<=', date("Y-m-d")]
                ])
               ->orderBy('date', 'desc')
               ->paginate(5);
        $paging = $reports->currentPage()."of".$reports->total();
    	return view("pages.business-reports")->with("reports", $reports)->with("contents",$contents)->with("paging",$paging);
    }

    public function getNews(){
        $contents = Content::where([
                        ['date', '<=', date('Y-m-d')]
                    ])
                    ->orderby("date","desc")
                    ->limit(5)
                    ->get();
        $news = Content::where([
                    ['content_type', "news"],
                    ['date', '<=', date("Y-m-d")]
                ])
               ->orderBy('date', 'desc')
               ->paginate(5);
        $paging = $news->currentPage()."of".$news->total();
    	return view("pages.news")->with("news", $news)->with("contents",$contents)->with("paging",$paging);
    }

    public function getContactUs(){
        $contents = Content::where([
                        ['date', '<=', date('Y-m-d')]
                    ])
                    ->orderby("date","desc")
                    ->limit(5)
                    ->get();
        return view("pages.contact-us")->with("contents",$contents);
    }

    public function getBusinessPlansDetails($id){
        $contents = Content::where([
                        ['date', '<=', date('Y-m-d')]
                    ])
                    ->orderby("date","desc")
                    ->limit(5)
                    ->get();
        $content = Content::find($id);
        return view("pages.business-plans-details")->with("content", $content)->with("contents",$contents);
    }

    public function getBusinessReportsDetails($id){
        $contents = Content::where([
                        ['date', '<=', date('Y-m-d')]
                    ])
                    ->orderby("date","desc")
                    ->limit(5)
                    ->get();
        $content = Content::find($id);
        return view("pages.business-reports-details")->with("content", $content)->with("contents",$contents);
    }

    public function getNewsDetails($id){
        $contents = Content::where([
                        ['date', '<=', date('Y-m-d')]
                    ])
                    ->orderby("date","desc")
                    ->limit(5)
                    ->get();
        $content = Content::find($id);
        return view("pages.news-details")->with("content", $content)->with("contents",$contents);
    }
}
