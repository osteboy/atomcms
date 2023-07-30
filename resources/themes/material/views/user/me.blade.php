<x-app-layout>
    <div class="container">
        <div class="row">
            <div class="col-8">
                <div id="news-content">
                    <div class="news-article show" style="background-image:url(https://habboloji.com/v2-web/img/user-uploads/AbTgQdjSIj.png)">
                        <div class="shadow"></div>

                        <div class="news-content">
                            <div class="news-title">Lorem ipsum</div>
                            <div class="news-short-text">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</div>
                        </div>

                        <div class="details-box">
                            <div class="back-news"><i class="fal fa-angle-left"></i></div>

                            <div class="authors-details">
                                <div class="written-by">
                                    <b>{{ __('Posted by') }}</b>
                                    <span>{{ auth()->user()->username }}</span>
                                </div>
                            </div>

                            <a href="news.php" class="btn green news-slider-btn">{{ __('Read more') }}</a>

                            <div class="next-news"><i class="fal fa-angle-right"></i></div>
                        </div>
                    </div>
                    <div class="news-article show" style="background-image:url(https://habboloji.com/v2-web/img/user-uploads/AbTgQdjSIj.png)">
                        <div class="shadow"></div>

                        <div class="news-content">
                            <div class="news-title">Lorem ipsum 22222</div>
                            <div class="news-short-text">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</div>
                        </div>

                        <div class="details-box">
                            <div class="back-news"><i class="fal fa-angle-left"></i></div>

                            <div class="authors-details">
                                <div class="written-by">
                                    <b>{{ __('Posted by') }}:</b>
                                    <span>{{ auth()->user()->username }}</span>
                                </div>
                            </div>

                            <a href="news.php" class="btn green news-slider-btn">{{ __('Read more') }}</a>

                            <div class="next-news"><i class="fal fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <iframe src="https://discordapp.com/widget?id={{ setting('discord_widget_id') }}&theme=dark" width="340" height="250" allowtransparency="true" frameborder="0"></iframe>
            </div>

            <div class="col-12">
                <div id="footer-content">
                    <p>Copyright &copy; {{ date('Y') }}. {{ setting('hotel_name') }} is a not for profit educational project.</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
