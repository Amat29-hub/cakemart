@extends('layout.frontend.company.app')
@section('content')
    <!-- Blog Start -->
        <div class="blog">
            <div class="container">
                <div class="section-header text-center">
                    <br>
                    <h2>Gallery Kami</h2>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="blog-item">
                            <div class="blog-img">
                                <img src="{{ asset('assetfrontend/img/blog-1.jpg') }}" alt="Blog">
                            </div>
                            <div class="blog-content">
                                <h2 class="blog-title">Lorem ipsum dolor sit amet</h2>
                                <div class="blog-text">
                                    <p>
                                        Lorem ipsum dolor sit amet elit. Neca pretim miura bitur facili ornare velit non vulpte liqum metus tortor. Lorem ipsum dolor sit amet elit. Neca pretim miura bitur facili ornare velit non vulpte
                                    </p>
                                    <a class="btn custom-btn" href="">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="blog-item">
                            <div class="blog-img">
                                <img src="{{ asset('assetfrontend/img/blog-2.jpg') }}" alt="Blog">
                            </div>
                            <div class="blog-content">
                                <h2 class="blog-title">Lorem ipsum dolor sit amet</h2>
                                <div class="blog-text">
                                    <p>
                                        Lorem ipsum dolor sit amet elit. Neca pretim miura bitur facili ornare velit non vulpte liqum metus tortor. Lorem ipsum dolor sit amet elit. Neca pretim miura bitur facili ornare velit non vulpte
                                    </p>
                                    <a class="btn custom-btn" href="">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- Blog End -->
@endsection
