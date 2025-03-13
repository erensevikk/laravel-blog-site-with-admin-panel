<div id="blog" class="services_section layout_padding">
    <div class="container">
        <h1 class="services_taital">Blog Posts </h1>
        <p class="services_text">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration</p>
        <div class="services_section_2">
            <div class="row">
                @foreach($posts as $post)

                    <div class="col-md-4" style="padding: 20px">
                        <div><img style="margin-bottom: 20px; height:200px" width="350px" src="postimage/{{$post->image}}" class="services_img"></div>
                        <h4>{{$post->title}}</h4>
                        @if($post->usertype=='admin')
                                <p>Post by <b>{{$post->usertype}}</b></p>
                        @else
                            <p>Post by <b>{{$post->name}}</b></p>
                        @endif
                        <div class="btn_main"><a href="{{route('post.details',$post->id)}}">Read More</a></div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
