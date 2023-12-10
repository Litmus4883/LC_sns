<div class="card-body line-height">
                <div id="reply-post-{{ $post->id }}">
                    @include('posts.reply_list')
                </div>
                <a class="light-color post-time no-text-decoration" href="/posts/{{ $post->id }}">{{ $post->created_at }}</a>
                <hr>
                <div class="row actions" id="reply-form-post-{{ $post->id }}">
                    <form class="w-100" id="new_reply" action="/posts/{{ $post->id }}/replies" accept-charset="UTF-8" data-remote="true" method="post"><input name="utf8" type="hidden" value="&#x2713;" />
                        @csrf
                        <input value="{{ $post->id }}" type="hidden" name="post_id" />
                        <input value="{{ Auth::id() }}" type="hidden" name="user_id" />
                        <input class="form-control reply-input border-0" placeholder="コメント" autocomplete="off" type="text" name="reply" />
                    </form>
                </div>
            </div>