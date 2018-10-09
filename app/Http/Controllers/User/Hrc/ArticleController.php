<?php

namespace App\Http\Controllers\User\Hrc;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Repositories\ArticleRepositoryInterface;
use App\Repositories\ImageRepositoryInterface;
use App\Services\ArticleServiceInterface;
use App\Services\FileUploadServiceInterface;
use App\Services\ImageServiceInterface;

class ArticleController extends Controller
{
    /** @var \App\Repositories\ArticleRepositoryInterface */
    protected $articleRepository;

    /** @var ArticleServiceInterface $articleService */
    protected $articleService;

    /** @var FileUploadServiceInterface $fileUploadService */
    protected $fileUploadService;

    /** @var ImageRepositoryInterface $imageRepository */
    protected $imageRepository;

    /** @var  ImageServiceInterface $imageService */
    protected $imageService;

    protected $article;

    public function __construct(
        ArticleRepositoryInterface $articleRepository,
        ArticleServiceInterface $articleService,
        FileUploadServiceInterface $fileUploadService,
        ImageRepositoryInterface $imageRepository,
        ImageServiceInterface $imageService,
        Article $article
    )
    {
        $this->articleRepository = $articleRepository;
        $this->articleService = $articleService;
        $this->fileUploadService = $fileUploadService;
        $this->imageRepository = $imageRepository;
        $this->imageService = $imageService;
        $this->article = $article;

    }

    public function index()
    {
        $headerArticles = $this->articleRepository->get('id','desc', 0, 6);
        $topId = $headerArticles->pluck('id');
        $bodyArticles = Article::whereNotIn('id', $topId)->orderBy('id', 'desc')->offset(6)->paginate(10);
        $dataView = compact('bodyArticles','headerArticles');
        return view('pages.user.article.index', $dataView);
    }
    public function detail($slug){

        $model = $this->articleRepository->findBySlug($slug);
        if (empty($model)) {
            \App::abort(404);
        }

        $articlePrevious = $this->article->where([
            'is_enabled' => 1,
        ])->where('id', '<', $model->id)->orderBy('id')->first();
        $articleNext = $this->article->where([
            'is_enabled' => 1,
        ])->where('id', '>', $model->id)->orderBy('id','desc')->first();

        return view('pages.user.article.detail', ['model' => $model,'articlePrevious'=>$articlePrevious, 'articleNext'=>$articleNext]);
    }
}
