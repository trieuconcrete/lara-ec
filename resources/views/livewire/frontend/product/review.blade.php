<div>
    <!--Comments-->
    <div class="comments-area">
        <div class="row">
            <div class="col-lg-8">
                <h4 class="mb-30">Customer reviews</h4>
                <div class="comment-list">
                    @if ($reviews)
                        @foreach($reviews as $review)
                        <div class="single-comment justify-content-between d-flex">
                            <div class="user justify-content-between d-flex">
                                <div class="thumb text-center">
                                    <img src="{{ optional($review->user)->avatar }}" alt="">
                                    <h6><a href="#">{{ $review->full_name }}</a></h6>
                                    <p class="font-xxs">Since 2012</p>
                                </div>
                                <div class="desc">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width:{{ ((int)round($review->point) * 2) * 10 }}%">
                                        </div>
                                    </div>
                                    <p>{{ $review->comment }}</p>
                                    <div class="d-flex justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <p class="font-xs mr-30"> 
                                                {{ $review->created_at->format('M d, Y h:i') }}
                                            </p>
                                            <a href="#" class="text-brand btn-reply">Reply <i class="fi-rs-arrow-right"></i> </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <!--pagination-->
                        <div class="pagination-area mt-15 mb-sm-5 mb-lg-0">
                        {{ $reviews->links() }}
                        </div>
                    @endif
                    <!--single-comment -->
                </div>
            </div>
            <div class="col-lg-4">
                <h4 class="mb-30">Customer reviews</h4>
                <div class="d-flex mb-30">
                    <div class="product-rate d-inline-block mr-15">
                        <div class="product-rating" style="width:90%">
                        </div>
                    </div>
                    <h6>4.8 out of 5</h6>
                </div>
                <div class="progress">
                    <span>5 star</span>
                    <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%</div>
                </div>
                <div class="progress">
                    <span>4 star</span>
                    <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                </div>
                <div class="progress">
                    <span>3 star</span>
                    <div class="progress-bar" role="progressbar" style="width: 45%;" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100">45%</div>
                </div>
                <div class="progress">
                    <span>2 star</span>
                    <div class="progress-bar" role="progressbar" style="width: 65%;" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">65%</div>
                </div>
                <div class="progress mb-30">
                    <span>1 star</span>
                    <div class="progress-bar" role="progressbar" style="width: 85%;" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">85%</div>
                </div>
                <a href="#" class="font-xs text-muted">How are ratings calculated?</a>
            </div>
        </div>
    </div>
    <!--comment form-->
    <div class="comment-form">
        <h4 class="mb-15">Add a review</h4>
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <form class="form-contact comment_form" action="#" id="commentForm" wire:submit.prevent="saveReview()" wire:target="saveReview">
                    <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <select name="point" class="form-control w-100" wire:model.defer="point" id="">
                                    <option value="0">Rating</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <textarea class="form-control w-100" wire:model.defer="comment" name="comment" id="comment" cols="30" rows="9" placeholder="Write Comment"></textarea>
                                @error('comment')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input class="form-control" wire:model.defer="full_name" name="name" id="name" type="text" placeholder="Name">
                                @error('full_name')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input class="form-control" wire:model.defer="email" name="email" id="email" type="email" placeholder="Email">
                                @error('email')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="button button-contactForm" wire:loading.remove wire:target="saveReview">Submit Review</button>
                        <button type="button" class="btn btn-warning" wire:loading wire:target="saveReview" disabled>
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            <span class="visually-hidden">Loading...</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
