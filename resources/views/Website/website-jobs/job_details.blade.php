@extends('Website.layouts.master')

@section('content')
<style>

.comment-section {
    max-width: 800px;
    margin: 20px auto;
    padding: 20px;
    background: #fff;
    border-radius: 8px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.comment {
    background: white;
    padding: 10px;
    border-radius: 8px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    margin-bottom: 10px;
}

.user-info {
    display: flex;
    align-items: center;
    font-size: 0.9rem;
    color: #555;
    margin-bottom: 5px;
}

.user-info img {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    margin-right: 10px;
}

.comment-text {
    font-size: 1rem;
    color: #333;
}

/* Reply button */
.reply-btn {
    background: none;
    border: none;
    color: #007bff;
    cursor: pointer;
    font-size: 0.9rem;
    margin-top: 5px;
}

.reply-btn:hover {
    text-decoration: underline;
}

/* Reply form */
.reply-form {
    display: none;
    margin-top: 10px;
}

.reply-form textarea {
    width: 100%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 1rem;
    resize: vertical;
}

.reply-form button {
    background: #28a745;
    color: white;
    padding: 5px 10px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin-top: 5px;
}

.reply-form button:hover {
    background: #218838;
}

/* Nested replies */
.replies {
    /* margin-left: 30px; */
    margin-top: 10px;
}
.timestamp{
    margin-left: auto
}

.reply{
    border: 1px solid #ccc;
}
.comment-form textarea{
    width: 100% !important;
    padding: 8px !important;
    border: 1px solid #ccc !important;
}
.comment-form button{
    background-color: #28a745 !important;
    color: white !important;
    padding: 5px 10px !important;
    border: none !important;
    border-radius: 5px !important;
    cursor: pointer !important;
    margin-top: 5px !important;
}
#comments-container{
    overflow-y: scroll !important;
    max-height: 400px !important;
}
</style>


<div class="bradcam_area bradcam_bg_1">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text">
                    <h3>{{ $job->title }}</h3>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="job_details_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="job_details_header" id="job_details_header" data-id="{{ $job->id }}">
                    <div class="single_jobs white-bg d-flex justify-content-between">
                        <div class="jobs_left d-flex align-items-center">
                            <div class="thumb">
                                <img src="{{ asset('img/svg_icon/1.svg') }}" alt="">
                            </div>
                            <div class="jobs_conetent">
                                <a href="#"><h4>{{ $job->title }}</h4></a>
                                <div class="links_locat d-flex align-items-center">
                                    <div class="location">
                                        <p> <i class="fa fa-map-marker"></i> {{ $job->location }}</p>
                                    </div>
                                    <div class="location">
                                        <p> <i class="fa fa-clock-o"></i> {{ $job->work_type }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="descript_wrap white-bg">
                    <div class="single_wrap">
                        <h4>Job description</h4>
                        <p>{{ $job->description }}</p>
                    </div>
                    <div class="single_wrap">
                        <h4>Qualifications</h4>
                        <ul>
                            @foreach(json_decode($job->technologies ,true) as $tech)
                                <li>{{ $tech['value'] }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="single_wrap">
                        <h4>Salary</h4>
                        <p>${{ number_format($job->min_salary) }} - ${{ number_format($job->max_salary) }}</p>
                    </div>

              

                </div>

            <div class="apply_job_form white-bg">
                <h4>
                    @if(auth()->check() && auth()->user()->role === 'employer' && auth()->id() === $job->user_id)
                        Manage Job Applications
                    @else

                            <div class="col-md-12">
                                <div class="submit_btn">
                                        @if (isset($application->user_id) && Auth::id()===$application->user_id)
                                        <form action="{{route('website.jobs.delete_app', "$application->id","$job->id")}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="boxed-btn2 w-100" type="submit">Cancel</button>
                                        </form>
                                        @elseif(auth()->check() && auth()->user()->role === 'employer' && auth()->id() === $job->user_id)
                                        @else
                                            @if( !auth()->user() ||auth()->user()->role === 'candidate')
                                            <form action="{{route('website.jobs.apply',$job->id)}}" method="post">
                                                @csrf
                                                <button class="boxed-btn3 w-100" type="submit">Apply Now</button>
                                            </form>
                                            @endif
                                        @endif

                                </div>
                            </div>

                    @endif
                </h4>

                @if(auth()->check() && auth()->user()->role === 'employer' && auth()->id() === $job->user_id)
                    <div class="col-md-12">
                        <div class="submit_btn">
                        <a href="{{ route('website.job.applications', $job->id) }}" class="btn btn-primary w-100">View Applications</a>
                        </div>
                    </div>
                @endif
                  
            </div>
            </div>
            <div class="col-lg-5">
                <div class="job_sumary">
                    <div class="summery_header">
                        <h3>Job Summary</h3>
                    </div>
                    <div class="job_content">
                        <ul>
                            <li>Salary:   <span>${{ number_format($job->min_salary) }} - ${{ number_format($job->max_salary) }}</span></li>
                            <li>Location: <span>{{ $job->location }}</span></li>
                            <li>Job Type: <span>{{ $job->work_type }}</span></li>
                            <li>Deadline: <span>{{ $job->application_deadline }}</span></li>
                            <li>Number of Applications: <span> {{count($job->applications)}} </span></li>
                        </ul>
                    </div>
                </div>
                <div class="job_sumary mt-4">
                    <div class="summery_header p-3">
                        <h3>Comments</h3>
                    </div>
                    <div class="job_content p-3">
                            <div id="comments-container" class="text-center">
                                @if($job->comments->count() == 0)
                                    <p>No comments yet.</p>
                                @endif
                            </div> 
                        @auth
                            <div class="comment-form">
                                <h3>Leave a Comment</h3>
                                <textarea id="comment-input" placeholder="Write your comment here..." rows="4"></textarea>
                                <button id="post-comment-btn">Post Comment</button>
                            </div>
                        @endauth
                        {{-- </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>


class CommentSystem {
                constructor() {
                    this.postCommentBtn = document.getElementById("post-comment-btn");
                    this.commentInput = document.getElementById("comment-input");
                    this.commentsContainer = document.getElementById("comments-container");
                    this.jobId = document.getElementById("job_details_header").getAttribute("data-id");
                    this.init();
                }

                init() {
                    this.loadComments();
                    this.attachEventListeners();
                }

                createCommentElement(comment) {
                    const commentDiv = document.createElement("div");
                    commentDiv.classList.add("comment");

                    commentDiv.innerHTML = `
                        <div class="user-info">
                            <img src="/storage/${comment.user.profile_picture ?? 'default-user.avif'}" alt="" class="rounded-circle">
                            <span class="username">${comment.user.name}</span>
                            <span class="timestamp">${comment.created_at}</span>
                        </div>
                        <p class="comment-text">${comment.comment}</p>
                    `;
                    return commentDiv;
                }

                async loadComments() {
                    try {
                        const response = await fetch(`/comments/${this.jobId}`);
                        const comments = await response.json();

                        this.commentsContainer.innerHTML = "";

                        if (comments.length === 0) {
                            this.showNoCommentsMessage();
                            return;
                        }

                        comments.forEach(comment => {
                            if (!comment.parent_id) {
                                this.commentsContainer.appendChild(this.createCommentElement(comment));
                            }
                        });
                    } catch (error) {
                        console.error("Error loading comments:", error);
                        this.showError("Failed to load comments. Please refresh the page.", this.commentsContainer);
                    }
                }

                showNoCommentsMessage() {
                    const noComments = document.createElement("p");
                    noComments.className = "no-comments ";
                    noComments.textContent = "No comments yet. Be the first to comment!";
                    this.commentsContainer.appendChild(noComments);
                }

                attachEventListeners() {
                    this.postCommentBtn.addEventListener("click", () => this.handleNewComment());
                }

                async handleNewComment() {
                    const commentText = this.commentInput.value.trim();
                    if (!commentText) {
                        this.showValidationError(this.commentInput.parentNode);
                        return;
                    }

                    this.setLoadingState(this.postCommentBtn, true);

                    try {
                        const comment = await this.submitComment(commentText);
                        this.commentsContainer.appendChild(this.createCommentElement(comment));
                        this.commentInput.value = "";
                        this.removeNoCommentsMessage();
                    } catch (error) {
                        this.showError( "Failed to post comment. Please try again.", this.commentInput.parentNode);
                    } finally {
                        this.setLoadingState(this.postCommentBtn, false);
                    }
                }

                async submitComment(text) {
                    try {
                        const response = await fetch("/comments", {
                            method: "POST",
                            headers: {
                                "Content-Type": "application/json",
                                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
                            },
                            body: JSON.stringify({
                                comment: text,
                                commentable_id: this.jobId,
                            }),
                        });
                        const data = await response.json();
                        if (!response.ok) {
                            throw new Error(data.message || "Something went wrong");
                        }
                        return data;
                        } catch (error) {
                            this.showError( error.message, this.commentInput.parentNode);
                        }
                }


                showError(message, container, duration = 5000) {
                    const errorMsg = document.createElement("div");
                    errorMsg.className = "error-message";
                    errorMsg.textContent = message;
                    container.appendChild(errorMsg);

                    setTimeout(() => errorMsg.remove(), duration);
                }

                showValidationError(container) {
                    this.showError("Comment cannot be empty", container, 3000);
                }

                setLoadingState(button, isLoading) {
                    button.textContent = isLoading ? "Posting..." : "Post Comment";
                    button.disabled = isLoading;
                }

                removeNoCommentsMessage() {
                    const noComments = this.commentsContainer.querySelector(".no-comments");
                    if (noComments) noComments.remove();
                }
            }

            document.addEventListener("DOMContentLoaded", () => new CommentSystem());
</script>
@endsection
