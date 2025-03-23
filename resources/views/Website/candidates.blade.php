@extends('Website.layouts.master')

@section('content')


    @component('Website.layouts.includes.bradcamp')

    @slot('title')
    Candidates
    @endslot
        
    @endcomponent
    <!-- featured_candidates_area_start  -->
    <div class="featured_candidates_area candidate_page_padding">
        <div class="container">
            <div class="row">

                @if($candidates->count() == 0)
                <div class="col-lg-12">
                    @component('Website.layouts.includes.alter')
                        @slot('content')

                        No Candidates Found
                        @endslot
                    @endcomponent
                </div>
                @else
                @foreach ($candidates as $candidate )
                    <div class="col-md-6 col-lg-3">
                        <div class="single_candidates text-center">
                            <div class="thumb">
                                <img src="{{$candidate->image ?asset($candidate->image) : asset('assets/website/img/defult-cand.jpg')}}" alt="">
                            </div>
                            <a href="{{route('candidate.details', ['user'=>$candidate->id])}}"><h4>{{$candidate->name}}</h4></a>
                            <p>Software Engineer</p>
                        </div>
                    </div>
                @endforeach
                @endif

            </div>
            {{-- @dd($candidates->lastPage()); --}}
            @if($candidates->lastPage() > 1)
            <div class="row">
                <div class="col-lg-12">
                    <div class="pagination_wrap">
                        <ul>
                            @if ($candidates->onFirstPage())
                                <li><span><i class="ti-angle-left"></i></span></li>
                            @else
                                <li><a href="{{ $candidates->previousPageUrl() }}"><i class="ti-angle-left"></i></a></li>
                            @endif
                            @foreach ($candidates->getUrlRange(1, $candidates->lastPage()) as $page => $url)
                                <li>
                                    @if ($page == $candidates->currentPage())
                                        <span style="background-color: rgb(16, 170, 241) ; width: 25px; height: 25px; border-radius: 50%; display: inline-block; margin-right: 5px; color: white; text-align: center; line-height: 25px;" >{{ $page }}</span> 
                                    @else
                                        <a href="{{ $url }}"><span>{{ $page }}</span></a>
                                    @endif
                                </li>
                            @endforeach
            
                            @if ($candidates->hasMorePages())
                                <li><a href="{{ $candidates->nextPageUrl() }}"><i class="ti-angle-right"></i></a></li>
                            @else
                                <li><span><i class="ti-angle-right"></i></span></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
            @endif
            
        </div>
    </div>
    <!-- featured_candidates_area_end  -->

@endsection
