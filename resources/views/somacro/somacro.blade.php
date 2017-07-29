<div id="share-buttons">
    <!-- Facebook -->
    <a href="http://www.facebook.com/sharer.php?u={{Request::url()}}" target="_blank">
        <img src="/somacro/facebook.png" alt="Facebook" />
    </a>

    <!-- Google+ -->
    <a href="https://plus.google.com/share?url={{Request::url()}}" target="_blank">
        <img src="/somacro/google.png" alt="Google" />
    </a>

    <!-- Twitter -->
    <a href="https://twitter.com/share?url={{Request::url()}}&amp;text=@yield('title_share', 'Digital Tuta Network.')&amp;hashtags=betawaran" target="_blank">
        <img src="/somacro/twitter.png" alt="Twitter" />
    </a>

    <!-- LinkedIn -->
    <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url={{Request::url()}}" target="_blank">
        <img src="/somacro/linkedin.png" alt="LinkedIn" />
    </a>

    <!-- StumbleUpon-->
    <a href="http://www.stumbleupon.com/submit?url={{Request::url()}}&amp;title=@yield('title_share', 'Digital Tuta Network.')" target="_blank">
        <img src="/somacro/stumbleupon.png" alt="StumbleUpon" />
    </a>

    <!-- Tumblr-->
    <a href="http://www.tumblr.com/share/link?url={{Request::url()}}&amp;title=@yield('title_share', 'Digital Tuta Network.')" target="_blank">
        <img src="/somacro/tumblr.png" alt="Tumblr" />
    </a>

    <!-- VK -->
    <a href="http://vkontakte.ru/share.php?url={{Request::url()}}" target="_blank">
        <img src="/somacro/vk.png" alt="VK" />
    </a>

    <!-- Yummly -->
    <a href="http://www.yummly.com/urb/verify?url={{Request::url()}}&amp;title=@yield('title_share', 'Digital Tuta Network.')" target="_blank">
        <img src="/somacro/yummly.png" alt="Yummly" />
    </a>

</div>
