<div class="footer-content">
    <div class="container">
        <div class="row footer-news">
            <div class="col-lg-3 content-footer">
                <h4>GET IN TOUCH</h4>
                <p>Any questions? Let us know in store at 8th floor, 379 Hudson St, New York, NY 10018 or call us on (+1) 96 716 6879</p>
                <a href=""><i class="fab fa-facebook-f"></i></a>
                <a href=""><i class="fab fa-instagram"></i></a>
                <a href=""><i class="fab fa-twitter"></i></a>
                <a href=""><i class="fab fa-facebook-f"></i></a>
                <a href=""><i class="fab fa-snapchat-ghost"></i></a>
            </div>
            <div class="col-lg-3 content-categories">
                <h4>Categories</h4>
                <div class="categories">
                    @foreach($categori as $kategori)
                        <a href="/blog?categori={{ $kategori->slug }}" class="text-decoration-none">
                            <p>
                                {{ $kategori->nama }}
                            </p>
                        </a>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-3 content-categories">
                <h4>Links</h4>
                <div class="categories">
                    @foreach($tags as $tag)
                        <a href="/blog?tags={{ $tag->slug_tags }}" class="text-decoration-none">
                            <p>
                                {{ $tag->nama_tags }}
                            </p>
                        </a>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-3 content-gif">
                <img src="{{ asset('img/breaking-news1.gif') }}" alt="Breaking news" class="breaking">
            </div>
        </div>
    </div>
    <div class="col text-center reserver">
        <p>2021 All rights Reserver by Aldian dwi hehehe</p>
    </div>
</div>
