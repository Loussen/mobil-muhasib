<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Contact;
use App\Models\ContactForm;
use App\Models\Faq;
use App\Models\MenuItem;
use App\Models\OurProduct;
use App\Models\Partner;
use App\Models\Portfolio;
use App\Models\Service;
use App\Models\Team;
use Doctrine\DBAL\Types\BlobType;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Http;
use mysql_xdevapi\XSession;

class MainController extends Controller
{
    public function dashboard(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $services = Service::orderByDesc('featured')->get();
        $portfolios = Portfolio::limit(5)->get();
        $partners = Partner::get();
        $blog = Article::where('featured',1)->orderByDesc('created_at')->get();


        $seoMeta = MenuItem::where('link', 'home')->first();

        if ($seoMeta && isset($seoMeta->extras)) {
            $extras = json_decode($seoMeta->extras, true);
        }

        $metaTitle = $extras['meta_title'] ?? null;
        $metaKeywords = $extras['meta_keywords'] ?? null;
        $metaDescription = $extras['meta_description'] ?? null;
        return view('pages.home', ['services' => $services, 'portfolios' => $portfolios, 'partners' => $partners, 'blog' => $blog, 'metaTitle' => $metaTitle, 'metaKeywords' => $metaKeywords, 'metaDescription' => $metaDescription,
        ]);
    }


    public function about(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $team = Team::get();
        $partners = Partner::get();
        $seoMeta = MenuItem::where('link', 'about')->first();

        if ($seoMeta && isset($seoMeta->extras)) {
            $extras = json_decode($seoMeta->extras, true);
        }

        $metaTitle = $extras['meta_title'] ?? null;
        $metaKeywords = $extras['meta_keywords'] ?? null;
        $metaDescription = $extras['meta_description'] ?? null;
        return view('pages.about', ['team' => $team, 'partners' => $partners,'metaTitle' => $metaTitle, 'metaKeywords' => $metaKeywords, 'metaDescription' => $metaDescription,]);
    }

    public function portfolio(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $portfolios = Portfolio::get();
        $seoMeta = MenuItem::where('link', 'portfolio')->first();

        if ($seoMeta && isset($seoMeta->extras)) {
            $extras = json_decode($seoMeta->extras, true);
        }

        $metaTitle = $extras['meta_title'] ?? null;
        $metaKeywords = $extras['meta_keywords'] ?? null;
        $metaDescription = $extras['meta_description'] ?? null;
        return view('pages.portfolio', ['portfolios' => $portfolios,'metaTitle' => $metaTitle, 'metaKeywords' => $metaKeywords, 'metaDescription' => $metaDescription,]);
    }

    public function portfolioDetail(Request $request): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $portfolio = Portfolio::findBySlugOrFail($request->slug);
        $metaImage = $portfolio->inner_image;

        if ($portfolio && isset($portfolio->extras)) {
            $extras = json_decode($portfolio->extras, true);
        }

        $metaTitle = $extras['meta_title'] ?? null;
        $metaKeywords = $extras['meta_keywords'] ?? null;
        $metaDescription = $extras['meta_description'] ?? null;
        return view('pages.portDetail',compact('portfolio','metaTitle','metaKeywords','metaDescription','metaImage'));
    }

    public function ourProduct(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $products = OurProduct::get();
        $seoMeta = MenuItem::where('link', 'ourProduct')->first();

        if ($seoMeta && isset($seoMeta->extras)) {
            $extras = json_decode($seoMeta->extras, true);
        }

        $metaTitle = $extras['meta_title'] ?? null;
        $metaKeywords = $extras['meta_keywords'] ?? null;
        $metaDescription = $extras['meta_description'] ?? null;
        return view('pages.our-product', ['products' => $products,'metaTitle' => $metaTitle, 'metaKeywords' => $metaKeywords, 'metaDescription' => $metaDescription,]);
    }

    public function ourProductDetail(Request $request): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $productDetail = OurProduct::findBySlugOrFail($request->slug);
        $metaImage = $productDetail->inner_image;
        if ($productDetail && isset($productDetail->extras)) {
            $extras = json_decode($productDetail->extras, true);
        }

        $metaTitle = $extras['meta_title'] ?? null;
        $metaKeywords = $extras['meta_keywords'] ?? null;
        $metaDescription = $extras['meta_description'] ?? null;
        return view('pages.productDetail',compact('productDetail','metaDescription','metaKeywords','metaTitle','metaImage'));
    }

    public function services(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $services = Service::orderByDesc('featured')->get();
        $seoMeta = MenuItem::where('link', 'services')->first();

        if ($seoMeta && isset($seoMeta->extras)) {
            $extras = json_decode($seoMeta->extras, true);
        }

        $metaTitle = $extras['meta_title'] ?? null;
        $metaKeywords = $extras['meta_keywords'] ?? null;
        $metaDescription = $extras['meta_description'] ?? null;
        return view('pages.services', ['services' => $services,'metaTitle' => $metaTitle, 'metaKeywords' => $metaKeywords, 'metaDescription' => $metaDescription,]);
    }

    public function service(Request $request): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $service = Service::findBySlugOrFail($request->slug);
        $metaImage =  $service->inner_image;
        if ($service && isset($service->extras)) {
            $extras = json_decode($service->extras, true);
        }

        $metaTitle = $extras['meta_title'] ?? null;
        $metaKeywords = $extras['meta_keywords'] ?? null;
        $metaDescription = $extras['meta_description'] ?? null;

        return view('pages.service', ['service' => $service,'metaTitle' => $metaTitle, 'metaKeywords' => $metaKeywords, 'metaDescription' => $metaDescription,'metaImage' => $metaImage]);
    }

    public function team(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $team = Team::get();
        return view('pages.team', ['team' => $team]);
    }

    public function member(Request $request)
    {
        $member = Team::findBySlugOrFail($request->slug);
        return view('pages.member', ['member' => $member]);
    }

    public function blog(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $blog = Article::get();
        $seoMeta = MenuItem::where('link', 'blog')->first();

        if ($seoMeta && isset($seoMeta->extras)) {
            $extras = json_decode($seoMeta->extras, true);
        }

        $metaTitle = $extras['meta_title'] ?? null;
        $metaKeywords = $extras['meta_keywords'] ?? null;
        $metaDescription = $extras['meta_description'] ?? null;
        return view('pages.blog', ['blog' => $blog,'metaTitle' => $metaTitle, 'metaKeywords' => $metaKeywords, 'metaDescription' => $metaDescription,]);
    }

    public function article(Request $request): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $article = Article::findBySlugOrFail($request->slug);
         $metaImage = $article->inner_image;
        if ($article && isset($article->extras)) {
            $extras = json_decode($article->extras, true);
        }

        $metaTitle = $extras['meta_title'] ?? null;
        $metaKeywords = $extras['meta_keywords'] ?? null;
        $metaDescription = $extras['meta_description'] ?? null;
        $relatedArticles = Article::where('slug',  '!=', $article->slug)->get();
        return view('pages.article', ['article' => $article, 'relatedArticles' => $relatedArticles,
            'metaTitle' => $metaTitle, 'metaKeywords' => $metaKeywords, 'metaDescription' => $metaDescription,'metaImage' =>$metaImage]);
    }

    public function faq(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $faq = Faq::get();
        $seoMeta = MenuItem::where('link', 'faq')->first();

        if ($seoMeta && isset($seoMeta->extras)) {
            $extras = json_decode($seoMeta->extras, true);
        }

        $metaTitle = $extras['meta_title'] ?? null;
        $metaKeywords = $extras['meta_keywords'] ?? null;
        $metaDescription = $extras['meta_description'] ?? null;
        return view('pages.faq', ['faq' => $faq,'metaTitle' => $metaTitle, 'metaKeywords' => $metaKeywords, 'metaDescription' => $metaDescription,]);
    }

    public function contact(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $contact = Contact::find(1);
        $seoMeta = MenuItem::where('link', 'contact')->first();

        if ($seoMeta && isset($seoMeta->extras)) {
            $extras = json_decode($seoMeta->extras, true);
        }

        $metaTitle = $extras['meta_title'] ?? null;
        $metaKeywords = $extras['meta_keywords'] ?? null;
        $metaDescription = $extras['meta_description'] ?? null;
        return view('pages.contact', ['contact' => $contact,'metaTitle' => $metaTitle, 'metaKeywords' => $metaKeywords, 'metaDescription' => $metaDescription,]);
    }

    public function contactFrom(Request $request)
    {
        $recaptchaResponse = $request->input('g-recaptcha-response');

        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => '6Lc1L3gpAAAAAIyd_3zCzU6Xs3oQlTq217o-3bVr',
            'response' => $recaptchaResponse,
        ]);

        $responseBody = json_decode($response->body());

        $validatedData = $request->validate([
            'name' => 'required|max:20',
            'email' => 'required|email',
            'phone' => 'nullable',
            'subject' => 'required|max:50',
            'message' => 'required|max:255',
        ]);

        if ($responseBody->success) {
            ContactForm::create($validatedData);

            // Başarılı bir yanıt döndür
            return response()->json(['success' => 'Mesajınız uğurla göndərildi!']);
        } else {
            return response()->json(['error' => 'Google recaptcha error'], 422);
        }
    }
}
