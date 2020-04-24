<?php

namespace App\Http\Controllers\faq;

use App\FaqCategory;
use App\FaqQuestion;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyFaqQuestionRequest;
use App\Http\Requests\StoreFaqQuestionRequest;
use App\Http\Requests\UpdateFaqQuestionRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FaqQuestionController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('faq_question_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $faqQuestions = FaqQuestion::all();

        return view('faqQuestions.index', compact('faqQuestions'));
    }


}
