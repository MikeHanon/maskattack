@extends('layouts.app')
@section('content')


                    @foreach($faqQuestions as $key => $faqQuestion)
                        <tr data-entry-id="{{ $faqQuestion->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $faqQuestion->id ?? '' }}
                            </td>
                            <td>
                                {{ $faqQuestion->category->category ?? '' }}
                            </td>
                            <td>
                                {{ $faqQuestion->question ?? '' }}
                            </td>
                            <td>
                                {{ $faqQuestion->answer ?? '' }}
                            </td>
                            <td>

                    @endforeach



@endsection
@section('scripts')

@endsection
