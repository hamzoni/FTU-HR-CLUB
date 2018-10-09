<?php

namespace App\Http\Controllers\User\Hrc;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Repositories\SiteConfigurationRepositoryInterface;
use App\Models\SiteConfiguration;
use App\Models\UserInformation;

class HomeController extends Controller
{
    protected $article;
    public function __construct(Article $article, SiteConfigurationRepositoryInterface $siteConfigurationRepository)
    {
        $this->article = $article;
		$this->siteConfigurationRepository = $siteConfigurationRepository;
    }
	
    public function index()
    {
        $latestArticles = $this->article->with('coverImage')->where([
            'is_enabled' => 1
        ])->orderBy('created_at', 'desc')->limit(4)->get();
		
		
		$fakeCvCount = SiteConfiguration::where('name', 'cv_count')->first();
        $cvCount = UserInformation::count();
		if($fakeCvCount->description){
			$cvCount += $fakeCvCount->description;
		}

        return view('pages.user.home.index', compact('latestArticles', 'highlightArticle', 'cvCount'));
    }
	
	public function finalIndex()
    {
        $latestArticles = $this->article->with('coverImage')->where([
            'is_enabled' => 1
        ])->orderBy('created_at', 'desc')->limit(4)->get();

        $top32 = DB::table('top32')->get();
		
        return view('pages.user.home.final_index', compact('latestArticles', 'top32'));
    }

    public function facebookShare($result = 'ENFJ')
    {
        $result = Str::upper($result);

        return view('pages.user.home.facebookShare', [
            'result' => $result,
            'thumbnail_url' => asset('static/user/images/test/'.$result.'.jpg'),
            'thumbnail_width' => 1552,
            'thumbnail_height' => 812
        ]);
    }

    public function redirectPersonalityTest()
    {
        return redirect()->to(route('hrc.index').'#hrc-personality-test');
    }

    public function redirectCommentCv()
    {
        return redirect()->to(route('hrc.index').'#hrc-comment-cv');
    }
    public function partners(){
        return view('pages.user.partner.index');
    }
    public function joins(){
//        return view('pages.user.join.index');
        return view('pages.user.join.final_index');
    }
}