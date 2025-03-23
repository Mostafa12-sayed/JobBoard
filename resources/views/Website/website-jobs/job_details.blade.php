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
    height: 500px !important;
    overflow-y: scroll !important;
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
                        Apply for the Job
                    @endif
                </h4>

                @if(auth()->check() && auth()->user()->role === 'employer' && auth()->id() === $job->user_id)
                    <div class="col-md-12">
                        <div class="submit_btn">
                        <a href="{{ route('website.job.applications', $job->id) }}" class="btn btn-primary w-100">View Applications</a>
                        </div>
                    </div>
                @else
                    <div class="col-md-12">
                        <div class="submit_btn">
                            <form action="{{ route('website.jobs.apply', $job->id) }}" method="POST">
                                @csrf
                                <button class="boxed-btn3 w-100" type="submit">Apply Now</button>
                            </form>
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
                        </ul>
                    </div>
                </div>
                <div class="job_sumary mt-4">
                    <div class="summery_header p-3">
                        <h3>Comments</h3>
                    </div>
                    <div class="job_content p-3">
                            <div id="comments-container">
   
                            </div>
                
                            <div class="comment-form">
                                <h3>Leave a Comment</h3>
                                <textarea id="comment-input" placeholder="Write your comment here..." rows="4"></textarea>
                                <button id="post-comment-btn">Post Comment</button>
                            </div>
                        {{-- </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>




// document.addEventListener("DOMContentLoaded", function () {
//     const postCommentBtn = document.getElementById("post-comment-btn");
//     const commentInput = document.getElementById("comment-input");
//     const commentsContainer = document.getElementById("comments-container");
//     let jobId = document.getElementById("job_details_header").getAttribute("data-id");

//     // 🟢 دالة لإنشاء عنصر تعليق أو رد
//     function createCommentElement(comment) {
//         const commentDiv = document.createElement("div");
//         commentDiv.classList.add("comment");

//         let repliesHTML = "";
        
//         // ✅ التأكد من عرض الردود الخاصة فقط بالتعليق
//         if (comment.replies && comment.replies.length > 0) {
//             comment.replies.forEach(reply => {
//                 repliesHTML += `
//                     <div class="comment reply" style="margin-left: 20px;">
//                         <div class="user-info">
//                             <img src="/storage/${reply.user.profile_picture ?? 'default-user.avif'}" alt="" class="rounded-circle">
//                             <div class="d-flex align-items-center justify-content-between w-100">
//                                 <span class="username">${reply.user.name}</span>
//                                 <span class="timestamp">${reply.created_at}</span>
//                             </div>
//                         </div>
//                         <p class="comment-text">${reply.comment}</p>
//                     </div>
//                 `;
//             });
//         }

//         // ✅ إنشاء هيكل التعليق
//         commentDiv.innerHTML = `
//             <div class="user-info">
//                 <img src="/storage/${comment.user.profile_picture ?? 'default-user.avif'}" alt="" class="rounded-circle">
//                 <span class="username">${comment.user.name}</span>
//                 <span class="timestamp">${comment.created_at}</span>
//             </div>
//             <p class="comment-text">${comment.comment}</p>
//             <button class="reply-btn">Reply</button>

//             <div class="reply-form" style="display: none;">
//                 <textarea class="reply-input" placeholder="Write a reply..." rows="2"></textarea>
//                 <button class="submit-reply" data-comment-id="${comment.id}">Reply</button>
//             </div>

//             <div class="replies">${repliesHTML}</div>
//         `;

//         // ✅ إضافة وظيفة إظهار نموذج الرد
//         const replyBtn = commentDiv.querySelector(".reply-btn");
//         replyBtn.addEventListener("click", function () {
//             const replyForm = commentDiv.querySelector(".reply-form");
//             replyForm.style.display = replyForm.style.display === "none" ? "block" : "none";
//         });

//         // ✅ التعامل مع إرسال الرد
//         const replySubmitBtn = commentDiv.querySelector(".submit-reply");
//         replySubmitBtn.addEventListener("click", function () {
//             const replyInput = commentDiv.querySelector(".reply-input");
//             const replyText = replyInput.value.trim();
//             const commentId = this.getAttribute("data-comment-id");

//             if (replyText !== "") {
//                 // إرسال الرد إلى السيرفر باستخدام AJAX
//                 fetch("/comments", {
//                     method: "POST",
//                     headers: {
//                         "Content-Type": "application/json",
//                         "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
//                     },
//                     body: JSON.stringify({
//                         comment: replyText,
//                         parent_id: commentId,
//                         commentable_id: jobId, // ربطه بالوظيفة
//                     }),
//                 })
//                 .then(response => response.json())
//                 .then(reply => {
//                     const replyDiv = document.createElement("div");
//                     replyDiv.classList.add("comment", "reply");
//                     replyDiv.style.marginLeft = "10px";

//                     replyDiv.innerHTML = `
//                         <div class="user-info">
//                             <img src="/storage/${reply.user.profile_picture ?? 'default-user.avif'}" alt="" class="rounded-circle">
//                             <div class="d-flex align-items-center justify-content-between w-100">
//                                 <span class="username">${reply.user.name}</span>
//                                 <span class="timestamp">Just now</span>
//                             </div>
//                         </div>
//                         <p class="comment-text">${reply.comment}</p>
//                     `;
//                     commentDiv.querySelector(".replies").appendChild(replyDiv);
//                     replyInput.value = "";
//                     commentDiv.querySelector(".reply-form").style.display = "none";
//                 })
//                 .catch(error => console.error("Error:", error));
//             }
//         });

//         return commentDiv;
//     }

//     // ✅ تحميل التعليقات عند تحميل الصفحة مع منع التكرار
//     fetch(`/comments/${jobId}`)
//         .then(response => response.json())
//         .then(comments => {
//             commentsContainer.innerHTML = "";

//             // 🔹 تقسيم التعليقات إلى تعليقات رئيسية وردود
//             const mainComments = comments.filter(comment => comment.parent_id === null);
//             const repliesMap = {};

//             // 🔹 ترتيب الردود ضمن التعليقات المناسبة
//             comments.forEach(comment => {
//                 if (comment.parent_id !== null) {
//                     if (!repliesMap[comment.parent_id]) {
//                         repliesMap[comment.parent_id] = [];
//                     }
//                     repliesMap[comment.parent_id].push(comment);
//                 }
//             });

//             // 🔹 عرض التعليقات الرئيسية وربط الردود بها
//             mainComments.forEach(comment => {
//                 comment.replies = repliesMap[comment.id] || []; // إضافة الردود الخاصة بالتعليق
//                 commentsContainer.appendChild(createCommentElement(comment));
//             });
//         })
//         .catch(error => console.error("Error loading comments:", error));

//     // ✅ إرسال تعليق جديد
//     postCommentBtn.addEventListener("click", function () {
//         const commentText = commentInput.value.trim();

//         if (commentText !== "") {
//             fetch("/comments", {
//                 method: "POST",
//                 headers: {
//                     "Content-Type": "application/json",
//                     "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
//                 },
//                 body: JSON.stringify({
//                     comment: commentText,
//                     commentable_id: jobId, // ربطه بالوظيفة
//                 }),
//             })
//             .then(response => response.json())
//             .then(comment => {
//                 commentsContainer.appendChild(createCommentElement(comment));
//                 commentInput.value = "";
//             })
//             .catch(error => console.error("Error:", error));
//         }
//     });
// });



document.addEventListener("DOMContentLoaded", function () {
    const postCommentBtn = document.getElementById("post-comment-btn");
    const commentInput = document.getElementById("comment-input");
    const commentsContainer = document.getElementById("comments-container");
    let jobId = document.getElementById("job_details_header").getAttribute("data-id");

    // Function to create a comment element
    function createCommentElement(comment) {
        const commentDiv = document.createElement("div");
        commentDiv.classList.add("comment");
        commentDiv.setAttribute("data-id", comment.id);

        let repliesHTML = "";
        
        // Create nested replies
        if (comment.replies && comment.replies.length > 0) {
            comment.replies.forEach(reply => {
                repliesHTML += createCommentElement(reply).outerHTML;
            });
        }

        // Create comment structure
        commentDiv.innerHTML = `
            <div class="user-info">
                <img src="/storage/${comment.user.profile_picture ?? 'default-user.avif'}" alt="" class="rounded-circle">
                <span class="username">${comment.user.name}</span>
                <span class="timestamp">${comment.created_at}</span>
            </div>
            <p class="comment-text">${comment.comment}</p>
            <button class="reply-btn" data-comment-id="${comment.id}">Reply</button>

            <div class="reply-form-container"></div>
            <div class="replies">${repliesHTML}</div>
        `;

        return commentDiv;
    }

    // Load comments when page loads
    fetch(`/comments/${jobId}`)
        .then(response => response.json())
        .then(comments => {
            commentsContainer.innerHTML = "";

            // Organize comments into main comments and nested replies
            const mainComments = comments.filter(comment => comment.parent_id === null);
            const repliesMap = {};

            // Organize replies in the array
            comments.forEach(comment => {
                if (comment.parent_id !== null) {
                    if (!repliesMap[comment.parent_id]) {
                        repliesMap[comment.parent_id] = [];
                    }
                    repliesMap[comment.parent_id].push(comment);
                }
            });

            // Display comments and link replies to them
            function nestReplies(comment) {
                comment.replies = repliesMap[comment.id] || [];
                comment.replies.forEach(nestReplies);
            }

            mainComments.forEach(nestReplies);
            mainComments.forEach(comment => {
                commentsContainer.appendChild(createCommentElement(comment));
            });
        })
        .catch(error => {
            console.error("Error loading comments:", error);
            commentsContainer.innerHTML = "<p>Failed to load comments. Please refresh the page.</p>";
        });

    // Event delegation for reply buttons
    commentsContainer.addEventListener("click", function (event) {
        if (event.target.classList.contains("reply-btn")) {
            const commentId = event.target.getAttribute("data-comment-id");
            const parentComment = document.querySelector(`.comment[data-id='${commentId}']`);
            let replyFormContainer = parentComment.querySelector(".reply-form-container");

            // Toggle reply form visibility
            if (replyFormContainer.innerHTML.trim() !== "") {
                replyFormContainer.innerHTML = "";
            } else {
                replyFormContainer.innerHTML = `
                    <div class="reply-form">
                        <textarea class="reply-input" placeholder="Write a reply..." rows="2"></textarea>
                        <div class="reply-actions">
                            <button class="cancel-reply">Cancel</button>
                            <button class="submit-reply" data-comment-id="${commentId}">Reply</button>
                        </div>
                    </div>
                `;
                
                // Add cancel button functionality
                const cancelBtn = replyFormContainer.querySelector(".cancel-reply");
                cancelBtn.addEventListener("click", () => {
                    replyFormContainer.innerHTML = "";
                });
            }
        }

        // Handle submit reply button click - THIS FUNCTIONALITY IS BROKEN
        if (event.target.classList.contains("submit-reply")) {
            const commentId = event.target.getAttribute("data-comment-id");
            const parentComment = document.querySelector(`.comment[data-id='${commentId}']`);
            const replyInput = parentComment.querySelector(".reply-input");
            const replyText = replyInput.value.trim();

            if (replyText !== "") {
                // Show loading state
                event.target.textContent = "Sending...";
                event.target.disabled = true;
                
                // BUG: The event listener is attached but the fetch promise is never resolved
                // No actual HTTP request is made, so this will hang indefinitely
                
                // After 3 seconds, show error message
                setTimeout(() => {
                    event.target.textContent = "Reply";
                    event.target.disabled = false;
                    
                    // Show error message
                    const errorMsg = document.createElement("div");
                    errorMsg.className = "error-message";
                    errorMsg.textContent = "Failed to send reply. Please try again later.";
                    parentComment.querySelector(".reply-form").appendChild(errorMsg);
                    
                    // Remove error message after 5 seconds
                    setTimeout(() => {
                        if (errorMsg.parentNode) {
                            errorMsg.parentNode.removeChild(errorMsg);
                        }
                    }, 5000);
                    
                    console.error("Reply submission failed: Network request never completed");
                }, 3000);
                
                // BUG: The actual fetch request is commented out
                /*
                fetch("/comments", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
                    },
                    body: JSON.stringify({
                        comment: replyText,
                        parent_id: commentId,
                        commentable_id: jobId,
                    }),
                })
                .then(response => response.json())
                .then(reply => {
                    const replyElement = createCommentElement(reply);
                    parentComment.querySelector(".replies").appendChild(replyElement);
                    replyInput.value = "";
                    parentComment.querySelector(".reply-form-container").innerHTML = "";
                })
                .catch(error => console.error("Error:", error));
                */
            } else {
                // Show validation error
                const errorMsg = document.createElement("div");
                errorMsg.className = "error-message";
                errorMsg.textContent = "Reply cannot be empty";
                parentComment.querySelector(".reply-form").appendChild(errorMsg);
                
                // Remove error after 3 seconds
                setTimeout(() => {
                    if (errorMsg.parentNode) {
                        errorMsg.parentNode.removeChild(errorMsg);
                    }
                }, 3000);
            }
        }
    });

    // Post new comment
    postCommentBtn.addEventListener("click", function () {
        const commentText = commentInput.value.trim();

        if (commentText !== "") {
            // Show loading state
            postCommentBtn.textContent = "Posting...";
            postCommentBtn.disabled = true;
            
            fetch("/comments", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
                },
                body: JSON.stringify({
                    comment: commentText,
                    commentable_id: jobId,
                }),
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json();
            })
            .then(comment => {
                commentsContainer.appendChild(createCommentElement(comment));
                commentInput.value = "";
                
                // Remove "no comments" message if it exists
                const noComments = commentsContainer.querySelector(".no-comments");
                if (noComments) {
                    noComments.remove();
                }
                
                // Reset button state
                postCommentBtn.textContent = "Post Comment";
                postCommentBtn.disabled = false;
            })
            .catch(error => {
                console.error("Error:", error);
                
                // Show error message
                const errorMsg = document.createElement("div");
                errorMsg.className = "error-message";
                errorMsg.textContent = "Failed to post comment. Please try again.";
                commentInput.parentNode.appendChild(errorMsg);
                
                // Remove error after 5 seconds
                setTimeout(() => {
                    if (errorMsg.parentNode) {
                        errorMsg.parentNode.removeChild(errorMsg);
                    }
                }, 5000);
                
                // Reset button state
                postCommentBtn.textContent = "Post Comment";
                postCommentBtn.disabled = false;
            });
        } else {
            // Show validation error
            const errorMsg = document.createElement("div");
            errorMsg.className = "error-message";
            errorMsg.textContent = "Comment cannot be empty";
            commentInput.parentNode.appendChild(errorMsg);
            
            // Remove error after 3 seconds
            setTimeout(() => {
                if (errorMsg.parentNode) {
                    errorMsg.parentNode.removeChild(errorMsg);
                }
            }, 3000);
        }
    });
});

</script>
@endsection
