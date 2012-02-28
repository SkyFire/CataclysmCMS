<?php
ini_set('display_errors', 1); 
ini_set('log_errors', 1); 

error_reporting(E_ALL);

include("../Config/config.php");

if(web_mantenimiento != 1) header ("Location: /wow/index.php"); 

?>
<!DOCTYPE html>
<html lang="en-us">
<head>

    <title><? echo Title; ?>ss</title>

    <!--[if IE]>
    <meta content="false" http-equiv="imagetoolbar" />
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />
    <![endif]-->

    <meta name="robots" content="none" />
    <meta http-equiv="refresh" content="120" />

    <link rel="icon" type="image/png" href="<?=Root_Dir;?>static/local-common/images/favicons/root.png" />
    <!--[if LT IE 9]>
    <link rel="shortcut icon" type="image/x-icon" href="/static/local-common/images/favicons/root.ico" />
    <![endif]-->

    <style>
    html, body, div, span, object, iframe, h1, p, img { margin: 0; padding: 0; border: 0; outline: 0; font-size: 100%; }
    html, body { background: #000 url("<?=Root_Dir;?>static/local-common/images/layout/bg-wow.jpg") 50% 0 no-repeat; color: #aaafb8; font: normal 12px/1.5 "Trebuchet MS", "Arial", sans-serif; }

    br { clear: both; }

    a { color:#ffa400; text-decoration: none; }
    a:hover,
    a:focus { color: #fff; }

    ::-moz-selection { color: #eee;  background: #006a9b; }
    ::selection { color: #eee;  background: #006a9b; }

    .wrapper { width: 960px; margin: 0 auto; }

    .notice { width: 500px; margin: 0 auto; }
    .notice .logo { padding: 0; margin: 0 auto; width: 500px; height: 250px; overflow: hidden; overflow: hidden; -moz-user-select: none; -webkit-user-select: none; user-select: none; }
    .notice .logo span { text-indent: -9999px; display: block; width: 500px; height: 250px; overflow: hidden; }

    .info { padding: 32px; min-height: 320px; }
    .info .title { margin: 0; text-align: center; font-size: 44px; line-height: 1.25; letter-spacing: -.025em; color: #EFE3D2; font-family: "Palatino Linotype", "Georgia", "Times", serif; }
    .info .short { font-size: 16px; line-height: 1.5; margin: 1.5em 0; color: #efc9a0; }
    .info .twitter { color: #efb871; font-size: 20px; font-family: "Georgia", "Times New Roman", "Times", serif; padding: 16px 100px 16px 16px; background: #541805 url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAD4AAAAyCAMAAAAz3ZgNAAACH1BMVEVUGAXvuHFVGQVWGgbut3FWGwfrtG7osGy6gUxjKBDhqmdYHAiZYDVVGQZvNBjlrWrmr2tdIQtnKxJ0ORvepmVfIw1aHgnut3CrckLWnmB2Ox3krWlZHQjHj1Xlrmq7g03ttW+1fEnjrGndpWSQVi+hZzqITSnOllrRmVzdpmV3PB1mKxJgJQ1gJA1kKRBlKhHGjVSwd0VrMBXiq2jiqmjAiFCARSPpsm3gqGbqsm1sMRaBRiSDSCaITinqs26UWjFhJg7aomJcIAuTWTGudUTttnDao2Olaz2/hlC9hU64gEu7gk3VnV9wNRi5gEtZHgmtdENbIApzOBvOlVp/RSOKUCttMhbXn2BXGwffp2ZbHwq4f0rgqWeobz+xeEaRVy93PB6iaTzYoGHEjFODSSbDi1NxNRmeZDhnLBPcpGPBiVHfqGbnsGt4Ph54PR6sckJuMxd6Px+MUiyXXTSPVS62fUmfZjrBiFHZoWKkaz2FSyfAh1CXXjR9QyKARiR+QyLLk1icYjfSml1pLhSnbT+qcUGCRyXosWyQVS91OhyeZTmYXjR/RCOcYzfGjlXLkljIkFadYzjJkVejajyZXzVoLROfZTnPl1uRVzDXoGDCilKHTSmpcEDbo2OyeUfMlFl9QiGob0CmbT7stW+UWzJxNhnNlVlkKBCESiaGTCiiaDtyNxq9hE7ZoWHUnF6gZjqvdkWNUy3Vnl/JkFbjq2l00DCIAAAAAXRSTlMAQObYZgAAArdJREFUSA2lwYVW2wAABdD3krogBYq7u/s2Nthgis6VuQtzd3d3d/cPXEolaZpwmu5ejBNFwCkATgH2WhhmLipdvmjuwd/ve5nZmLftxV4Ai9PciJqwcGMvZWvNwIgLhiTeYUhjN3Izq2HMFsoqZtMDY+IslGVyNwwqptIyAcaMUalpKQxqTqDCyU0wZhXDOO7BEOdGKlmvAqhC9KZRqdAL4PhrSAQE1O6CPoY7A0Aof5AE3Cq/Epd7DEgceQVdwwzXD0kSaSk7TVrJJRlr2Qw9whGGa8+CZA6VbNDjLaXKZPjsNFG2ogQ6knKoclOAT9EFKhRB23qqpV6Cj72UCg5oa2OEBDsk06lkqoEWNzU0AR8u5tBvBiVtPWZoeUcts04lMyi98kTx9hRIzGMiVFzUlEBZBwA7kIFfK6HitDGPXJNjK7BSz2zsuNEH15Opm11QmW/Zf34grhoY2hBPPQ5yEcpmxvMwVPZNQtBlTiB+mYlMTsQ450L4JXYgROx61MpIc88yqB5+7i33U6BhaJBq275kM6gFAaP8tgAROvtyLQxn2r4rlUGVCEom50CloozhTFMGzcjazAArQu6StEFp/rR2qtRBANCxlX4HEFJDyW0Rsg2MYK2bB591hfTpQkiKhWRBBWQfUxmpKQXj6inZA1k+yXOQ7bBQSwn8VpHMh0I2WT5ZREAGIzWaE5iGgO4fj/Oh9JyM3wS/T62MNAkNtAkIERDGxtb+kiqgxuNiJMdXQOAh6HKnk5xhnbKVWlKrgSRTA/QtoK48FpqBpeswkeJ5PX8KGLT8adx1E9m2c/qzzs8zRURDrHpZ/31N+pK61aNZqKTkKCRuEdHzeiHx/HSQzS2LERN7Mrm+AbG6RqYPIGZp5GrELo0cRuxWkPgP2ZyF2L1l+1TErPbvm4eInWdlC6LyD0lZZJ4eKPyMAAAAAElFTkSuQmCC) no-repeat 350px center; -moz-border-radius: 12px; -webkit-border-radius: 12px; border-radius: 12px; line-height: 1.25; }

    .footer { overflow: auto; border-top: 1px solid #20140d; font-size: 10px; text-transform: uppercase; padding: 12px 0; margin: 64px 0 32px 0; -moz-user-select: none; -webkit-user-select: none; user-select: none; font-family: "Lucida Sans Unicode", "Lucida Grande", "Arial", sans-serif; }
    .footer .copyright { color: #70523d; display: inline-block; vertical-align: top; margin: 0 1em 0 0; }
    .footer .legal { display: inline-block; vertical-align: top; }
    .footer .legal a { display: inline-block; vertical-align: top; color: #eea200; margin: 0 1em 0 0; }
    .footer .legal a:hover,
    .footer .legal a:focus { color: #f5ebd1; }
    .footer .language { color: #552c09; float: right; display: inline-block; vertical-align: top; text-align: right; white-space: nowrap; }
    .footer .blizzard { margin: 32px 0 0 0; display: inline-block; vertical-align: top; }
    .footer .privacy { margin: 32px 0 0 0; text-align: right; float: right; display: inline-block; vertical-align: top; }
    .footer .privacy a { display: inline-block; vertical-align: top; margin-left: 1em; }
    .footer .privacy img { border: 0; }
    .footer .contact { clear: both; margin: 32px 0 0 0; text-align: center; color: #70523d; text-transform: none; }
    .footer .contact a { color: #eea200; }
    .footer .contact a:hover,
    .footer .contact a:focus { color: #fff; }

    body.ko-kr { font-family: "Dotum", "돋움", "Helvetica", "AppleGothic", sans-serif; }
    body.ko-kr .info .title,
    body.ko-kr .info .twitter,
    body.ko-kr .footer { font-family: "Malgun Gothic", "맑은 고딕", "AppleGothic", "Dotum", "돋움", "Trebuchet MS", "Arial", sans-serif; }
    body.ko-kr .footer { font-size: 11px; }

    body.zh-cn,
    body.zh-cn .info .twitter,
    body.zh-cn .footer { font-family: "微软雅黑", "Microsoft YaHei", "Helvetica", "Tahoma", "StSun", "宋体", "SimSun", sans-serif; }
    body.zh-cn .info .twitter { font-size: 16px; }
    body.zh-cn .footer { font-size: 12px; }
    body.zh-cn .notice .logo span { }
    body.zh-cn .logo { background: url("<?=Root_Dir;?>static/local-common/images/layout/bg-wow-cn.jpg"); }
    body.zh-cn .info .twitter { line-height: 1.5; background-image: url(data:image/png;base64,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); }
    body.zh-cn .short { text-align: center; }

    body.zh-tw,
    body.zh-tw .info .twitter,
    body.zh-tw .footer { font-family: "微軟正黑", "Microsoft JhengHei", "Helvetica", "Tahoma", "新明細體", "PMingLiU", "SimSun", sans-serif; }
    body.zh-tw .info .twitter { line-height: 1.5; }
    body.zh-tw .footer { font-size: 12px; }
    body.zh-tw .logo { background: url("<?=Root_Dir;?>static/local-common/images/layout/bg-wow-tw.jpg"); }
    </style>

    <!--[if LT IE 9]>
    <style>
    .info .twitter { background-image: url("/static/maintenance/wow/images/twitter.png"); }
    .footer .copyright { zoom: 1; float: left; }
    .footer .legal { zoom: 1; float: left; }
    .footer .legal a { zoom: 1; float: left; padding: 0 1em 0 0; }
    .footer .language { zoom: 1; white-space: normal; }
    .footer .blizzard { zoom: 1; float: left; }
    .footer .privacy { zoom: 1; }
    .footer .privacy a { zoom: 1; }

    body.zh-cn .notice .logo span { background-image: url("/static/local-common/images/logos/bnet-default-cn.gif"); }
    body.zh-cn .info .twitter { background-image: url("/static/maintenance/wow/images/twitter-cn.png"); }
    </style>
    <![endif]-->

    <!--[if IE 6]>
    <script>
    try { document.execCommand('BackgroundImageCache', false, true) } catch(e) {}
    </script>
    <![endif]-->

    <script>
    var css = 'class';
    var locale = (function() {
        var doc = document;
        var nav = navigator;
        var cookie = doc.cookie || '';
        var query = doc.location.search || '';
        var all = ['de-de', 'en-us', 'en-gb', 'es-mx', 'es-es', 'fr-fr', 'it-it', 'ko-kr', 'pl-pl', 'pt-br', 'ru-ru', 'zh-cn', 'zh-tw'];
        var test = -1;
        var start;
        var i;
        var loc;

        function getIndex(haystack) {
            return function(needle) {
                needle = needle.toLowerCase();
                needle = needle.replace('_', '-');

                for (i = 0; loc = haystack[i]; i++) {
                    if (loc === needle) {
                        return i;
                    }
                }

                needle = needle.substr(0, 2);

                for (i = 0; loc = haystack[i]; i++) {
                    if (loc.substr(0, 2) === needle) {
                        return i;
                    }
                }

                return -1;
            }
        };

        var index = getIndex(all);

        start = query.indexOf('loc=');
        if (start > -1) {
            test = index(encodeURIComponent(query.substr(start + 4, 5)));
            if (test > -1) {
                return all[test];
            }
        }

        start = cookie.indexOf('loc=');
        if (start > -1) {
            test = index(encodeURIComponent(cookie.substr(start + 4, 5)));
            if (test > -1) {
                return all[test];
            }
        }

        test = nav.userLanguage || nav.language;
        test = index(test);
        if (test > -1) {
            return all[test];
        }

        return 'en-us';
    })();

    (function(currentLocale) {
        var doc = document;
        var html = doc.getElementsByTagName('html')[0];
        html.setAttribute('lang', currentLocale);
    })(locale);
    </script>

    <!--[if lt IE 8]>
    <script>
    var css = 'className';
    </script>
    <![endif]-->

</head>
<body class="en-us">

    <script>
    (function(currentLocale) {
        var doc = document;
        var body = doc.getElementsByTagName('body')[0];
        body.setAttribute(css, currentLocale);
    })(locale);
    </script>

    <div class="wrapper">

        <!-- US -->

        <div class="notice" id="en-us:notice">
            <h1 class="logo"><span>World of Warcraft®: Cataclysm</span></h1>
            <div class="info">
                <h2 class="title">We’ll be back soon!</h2>
                <p class="short">The <?=Name_Comm?> family of websites is currently undergoing maintenance to improve your browsing experience. Thank you for your patience!</p>
                <div class="twitter">
                    For updates, follow <a tabindex="1" target="_blank" href="http://twitter.com/<?=Name_Comm?>CS">@<?=Name_Comm?>CS</a> on Twitter.
                </div>
            </div>
        </div>

        <div class="notice" id="es-mx:notice" style="display: none;">
            <h1 class="logo"><span>World of Warcraft®: Cataclysm</span></h1>
            <div class="info">
                <h2 class="title">¡Regresaremos pronto!</h2>
                <p class="short">Los sitios web de <?=Name_Comm?> no están disponibles por el momento. ¡Gracias por tu paciencia!</p>
                <div class="twitter">
                    Para más información, sigue <a tabindex="1" target="_blank" href="http://twitter.com/<?=Name_Comm?>cs_ES">@<?=Name_Comm?>CS_ES</a> en Twitter.
                </div>
            </div>
        </div>

        <div class="notice" id="pt-br:notice" style="display: none;">
            <h1 class="logo"><span>World of Warcraft®: Cataclysm</span></h1>
            <div class="info">
                <h2 class="title">Voltaremos logo!</h2>
                <p class="short">Os websites da <?=Name_Comm?> estão em manutenção para melhorar sua experiência de navegação. Obrigado por sua paciência!</p>
                <div class="twitter">
                    Para mais informações, siga <a tabindex="1" target="_blank" href="http://twitter.com/<?=Name_Comm?>CS">@<?=Name_Comm?>CS</a> no Twitter.
                </div>
            </div>
        </div>

        <!-- EU -->

        <div class="notice" id="en-gb:notice" style="display: none;">
            <h1 class="logo"><span>World of Warcraft®: Cataclysm</span></h1>
            <div class="info">
                <h2 class="title">We’ll be back soon!</h2>
                <p class="short">The <?=Name_Comm?> family of websites is currently undergoing maintenance to improve your browsing experience. Thank you for your patience!</p>
                <div class="twitter">
                    For updates, follow <a tabindex="1" target="_blank" href="http://twitter.com/<?=Name_Comm?>CSEU_EN">@<?=Name_Comm?>CSEU_EN</a> on Twitter.
                </div>
            </div>
        </div>

        <div class="notice" id="de-de:notice" style="display: none;">
            <h1 class="logo"><span>World of Warcraft®: Cataclysm</span></h1>
            <div class="info">
                <h2 class="title">Wir sind bald zurück!</h2>
                <p class="short">Die <?=Name_Comm?>-Webseiten werden derzeit gewartet, es werden Inhalte integriert, die eure Browsing-Erfahrung zukünftig verbessern werden. Vielen Dank für eure Geduld!</p>
                <div class="twitter">
                    Weitere Informationen erhaltet ihr über <a tabindex="1" target="_blank" href="http://twitter.com/<?=Name_Comm?>CSEU_DE">@<?=Name_Comm?>CSEU_DE</a> auf Twitter.
                </div>
            </div>
        </div>

        <div class="notice" id="es-es:notice" style="display: none;">
            <h1 class="logo"><span>World of Warcraft®: Cataclysm</span></h1>
            <div class="info">
                <h2 class="title">¡Volvemos en un periquete!</h2>
                <p class="short">Las páginas web de <?=Name_Comm?> están temporalmente bajo mantenimiento para asegurar la máxima calidad del servicio. ¡Agradecemos tu paciencia!</p>
                <div class="twitter">
                    Puedes mantenerte informado del estado en Twitter: <a tabindex="1" target="_blank" href="http://twitter.com/<?=Name_Comm?>CSEU_ES">@<?=Name_Comm?>CSEU_ES</a>
                </div>
            </div>
        </div>

        <div class="notice" id="fr-fr:notice" style="display: none;">
            <h1 class="logo"><span>World of Warcraft®: Cataclysm</span></h1>
            <div class="info">
                <h2 class="title">Nous serons bientôt de retour !</h2>
                <p class="short">Les sites <?=Name_Comm?> sont en maintenance pour le moment, afin d'améliorer votre expérience en ligne. Nous vous remercions pour votre patience et votre compréhension.</p>
                <div class="twitter">
                    Suivez <a tabindex="1" target="_blank" href="http://twitter.com/<?=Name_Comm?>CSEU_FR">@<?=Name_Comm?>CSEU_FR</a> sur Twitter pour obtenir les informations les plus récentes.
                </div>
            </div>
        </div>

        <div class="notice" id="it-it:notice" style="display: none;">
            <h1 class="logo"><span>World of Warcraft®: Cataclysm</span></h1>
            <div class="info">
                <h2 class="title">Torniamo subito!</h2>
                <p class="short">Le pagine web di <?=Name_Comm?> sono momentaneamente fuori servizio. Ti ringraziamo per la pazienza!</p>
                <div class="twitter">
                   Per tenerti informato, segui <a tabindex="1" target="_blank" href="http://twitter.com/<?=Name_Comm?>CSEU_EN">@<?=Name_Comm?>CSEU_EN</a> suTwitter.
                </div>
            </div>
        </div>

        <div class="notice" id="pl-pl:notice" style="display: none;">
            <h1 class="logo"><span>World of Warcraft®: Cataclysm</span></h1>
            <div class="info">
                <h2 class="title">Niedługo wracamy!</h2>
                <p class="short">Na stronach <?=Name_Comm?> trwają właśnie prace administracyjne. Dziękujemy za cierpliwość!</p>
                <div class="twitter">
                    Aktualne informacje można znaleźć śledząc profil <a tabindex="1" target="_blank" href="http://twitter.com/<?=Name_Comm?>CSEU_EN">@<?=Name_Comm?>CSEU_EN</a> na Twitterze.
                </div>
            </div>
        </div>

        <div class="notice" id="ru-ru:notice" style="display: none;">
            <h1 class="logo"><span>World of Warcraft®: Cataclysm</span></h1>
            <div class="info">
                <h2 class="title">Мы скоро вернемся!</h2>
                <p class="short">На сайтах <?=Name_Comm?> в настоящий момент проводится техобслуживание, чтобы потом вам было еще приятнее ими пользоваться. Благодарим вас за терпение и понимание!</p>
                <div class="twitter">
                    Информация об открытии сайтов будет сразу размещена на <a tabindex="1" target="_blank" href="http://twitter.com/<?=Name_Comm?>CSEU_RU">@<?=Name_Comm?>CSEU_RU</a> на Twitter.
                </div>
            </div>
        </div>

        <!-- KR -->

        <div class="notice" id="ko-kr:notice" style="display: none;">
            <h1 class="logo"><span>World of Warcraft®: Cataclysm</span></h1>
            <div class="info">
                <h2 class="title">잠시만 기다려<br />주시기 바랍니다.</h2>
                <p class="short">현재 일시적으로 블리자드 관련 사이트를 이용하실 수<br />없습니다. 여러분의 많은 양해 부탁드립니다.</p>
                <div class="twitter">
                    진행 상황 및 자세한 내용은 트위터의 <a tabindex="1" target="_blank" href="http://twitter.com/<?=Name_Comm?>CS_KR">@<?=Name_Comm?>CS_KR</a>에서 확인할 수 있습니다.
                </div>
            </div>
        </div>

        <!-- CN -->

        <div class="notice" id="zh-cn:notice" style="display: none;">
            <h1 class="logo"><span>《魔兽世界®：大地的裂变》</span></h1>
            <div class="info">
                <h2 class="title">我们很快会回来！</h2>
                <p class="short">为改善您的浏览体验，我们正在对网站进行维护。<br />请耐心等待！</p>
                <div class="twitter">
                    要获得进一步消息，请收听网易战网客服微博<a tabindex="1" target="_blank" href="http://t.163.com/battlenet">http://t.163.com/battlenet</a>。
                </div>
            </div>
        </div>

        <!-- TW -->

        <div class="notice" id="zh-tw:notice" style="display: none;">
            <h1 class="logo"><span>《魔獸世界：浩劫與重生》</span></h1>
            <div class="info">
                <h2 class="title">我們馬上回來！</h2>
                <p class="short">為了讓您享有更佳的瀏覽體驗，<br />各 <?=Name_Comm?> 網頁目前正在進行維護中。感謝您的耐心等待！</p>
                <div class="twitter">
                    請參閱 Twitter 上的 <a tabindex="1" target="_blank" href="http://twitter.com/<?=Name_Comm?>CS">@<?=Name_Comm?>CS</a> 了解更多有關維護相關更新訊息。
                </div>
            </div>
        </div>

        <script>
        (function(currentLocale) {
            var doc = document;
            var notice;
            var us;
            if (currentLocale !== 'en-us') {
                notice = doc.getElementById(currentLocale + ':notice');
                us = doc.getElementById('en-us:notice');
                notice.style.display = 'block';
                us.style.display = 'none';
            }
        })(locale);
        </script>

        <!-- US -->

        <div class="footer" id="en-us:footer">

            <span class="copyright">©2011 Blizzard Entertainment, Inc. All rights reserved</span>

            <span class="legal">
                <a target="_blank" href="http://us.blizzard.com/company/about/termsofuse.html" tabindex="2">Terms of Use</a>
                <a target="_blank" href="http://us.blizzard.com/company/legal/" tabindex="2">Legal</a>
                <a target="_blank" href="http://us.blizzard.com/company/about/privacy.html" tabindex="2">Privacy Policy</a>
                <a target="_blank" href="http://us.blizzard.com/company/about/infringementnotice.html" tabindex="2">Copyright Infringement</a>
            </span>

            <span class="language">Americas – English (US)</span>

            <br />

            <span class="blizzard">
                <a target="_blank" tabindex="3" href="http://blizzard.com/"><img src="<?=Root_Dir;?>static/local-common/images/logos/blizz-wow.png" alt="Blizzard Entertainment" width="136" height="76" /></a>
            </span>

            <span class="privacy">
                <a target="_blank" tabindex="3" href="//privacy-policy.truste.com/click-with-confidence/ctv/en/us.battle.net/seal_m" title="Validate TRUSTe privacy certification">
					<img src="//privacy-policy.truste.com/certified-seal/wps/en/us.battle.net/seal_m.png" alt="Validate TRUSTe privacy certification" width="143" height="45" />
				</a>
				<a target="_blank" tabindex="3" href="//www.esrb.org/ratings/ratings_guide.jsp">
                    <img src="<?=Root_Dir;?>static/local-common/images/legal/us/esrb-teen-wow.png" alt="ESRB Ratings Guide" width="149" height="91" />
                </a>
            </span>

        </div>

        <div class="footer" id="es-mx:footer" style="display: none;">

            <span class="copyright">©2011 Blizzard Entertainment, Inc. Todos los derechos reservados</span>

            <span class="legal">
                <a target="_blank" href="http://us.blizzard.com/company/about/termsofuse.html" tabindex="2">Condiciones de Uso</a>
                <a target="_blank" href="http://us.blizzard.com/company/legal/" tabindex="2">Legal</a>
                <a target="_blank" href="http://us.blizzard.com/company/about/privacy.html" tabindex="2">Políticas</a>
                <a target="_blank" href="http://us.blizzard.com/company/about/infringementnotice.html" tabindex="2">Derechos de autor</a>
            </span>

            <span class="language">América – Español (AL)</span>

            <br />

            <span class="blizzard">
                <a target="_blank" tabindex="3" href="http://blizzard.com/"><img src="<?=Root_Dir;?>static/local-common/images/logos/blizz-wow.png" alt="Blizzard Entertainment" width="136" height="76" /></a>
            </span>

            <span class="privacy">
                <a target="_blank" tabindex="3" href="//privacy-policy.truste.com/click-with-confidence/ctv/en/us.battle.net/seal_m" title="Validar certificado de privacidad TRUSTe">
					<img src="//privacy-policy.truste.com/certified-seal/wps/en/us.battle.net/seal_m.png" alt="Validar certificado de privacidad TRUSTe" width="143" height="45" />
				</a>
				<a target="_blank" tabindex="3" href="//www.esrb.org/ratings/ratings_guide.jsp">
                    <img src="<?=Root_Dir;?>static/local-common/images/legal/us/esrb-teen-wow-cat-es-mx.png" alt="Guía de clasificaciones de la ESRB" width="200" height="147" />
                </a>
            </span>

        </div>

        <div class="footer" id="pt-br:footer" style="display: none;">

            <span class="copyright">©2011 Blizzard Entertainment, Inc. Todos os direitos reservados</span>

            <span class="legal">
                <a target="_blank" href="http://us.blizzard.com/company/about/termsofuse.html" tabindex="2">Termos de Uso</a>
                <a target="_blank" href="http://us.blizzard.com/company/legal/" tabindex="2">Legal</a>
                <a target="_blank" href="http://us.blizzard.com/company/about/privacy.html" tabindex="2">Políticas</a>
                <a target="_blank" href="http://us.blizzard.com/company/about/infringementnotice.html" tabindex="2">Quebra de Direito Autorais</a>
            </span>

            <span class="language">Américas – Português</span>

            <br />

            <span class="blizzard">
                <a target="_blank" tabindex="3" href="http://blizzard.com/"><img src="<?=Root_Dir;?>static/local-common/images/logos/blizz-wow.png" alt="Blizzard Entertainment" width="136" height="76" /></a>
            </span>

            <span class="privacy">
                <a target="_blank" tabindex="3" href="//privacy-policy.truste.com/click-with-confidence/ctv/en/us.battle.net/seal_m" title="Validate TRUSTe privacy certification">
					<img src="//privacy-policy.truste.com/certified-seal/wps/en/us.battle.net/seal_m.png" alt="Validate TRUSTe privacy certification" width="143" height="45" />
				</a>
				<a target="_blank" tabindex="3" href="//www.esrb.org/ratings/ratings_guide.jsp">
                    <img src="<?=Root_Dir;?>static/local-common/images/legal/us/esrb-teen-wow.png" alt="ESRB Ratings Guide" width="149" height="91" />
                </a>
            </span>

        </div>

        <!-- EU -->

        <div class="footer" id="en-gb:footer" style="display: none;">

            <span class="copyright">©2011 Blizzard Entertainment, Inc. All rights reserved</span>

            <span class="legal">
                <a target="_blank" href="http://eu.blizzard.com/company/about/termsofuse.html" tabindex="2">Terms of Use</a>
                <a target="_blank" href="http://eu.blizzard.com/company/legal/" tabindex="2">Legal</a>
                <a target="_blank" href="http://eu.blizzard.com/company/about/privacy.html" tabindex="2">Privacy Policy</a>
                <a target="_blank" href="http://eu.blizzard.com/company/about/infringementnotice.html" tabindex="2">Copyright Infringement</a>
            </span>

            <span class="language">Europe – English (EU)</span>

            <br />

            <span class="blizzard">
                <a target="_blank" tabindex="3" href="http://blizzard.com/"><img src="<?=Root_Dir;?>static/local-common/images/logos/blizz-wow.png" alt="Blizzard Entertainment" width="136" height="76" /></a>
            </span>

            <span class="privacy">
                <a target="_blank" tabindex="3" href="//www.pegi.info/">
                    <img src="<?=Root_Dir;?>static/local-common/images/legal/eu/pegi-wow.png" alt="www.pegi.info" width="178" height="100" />
                </a>
            </span>

        </div>

        <div class="footer" id="de-de:footer" style="display: none;">

            <span class="copyright">©2011 Blizzard Entertainment, Inc. Alle Rechte vorbehalten</span>

            <span class="legal">
                <a target="_blank" href="http://eu.blizzard.com/company/about/termsofuse.html" tabindex="2">Nutzungsbestimmungen</a>
                <a target="_blank" href="http://eu.blizzard.com/company/legal/" tabindex="2">Rechtliches</a>
                <a target="_blank" href="http://eu.blizzard.com/company/about/privacy.html" tabindex="2">Datenschutzrichtlinien</a>
                <a target="_blank" href="http://eu.blizzard.com/company/about/infringementnotice.html" tabindex="2">Copyright-Verstoß</a>
            </span>

            <span class="language">Europa – Deutsch</span>

            <br />

            <span class="blizzard">
                <a target="_blank" tabindex="3" href="http://blizzard.com/"><img src="<?=Root_Dir;?>static/local-common/images/logos/blizz-wow.png" alt="Blizzard Entertainment" width="136" height="76" /></a>
            </span>

            <span class="privacy">
                <a target="_blank" tabindex="3" href="//www.usk.de/">
                    <img src="<?=Root_Dir;?>static/local-common/images/legal/eu/usk-12.png" alt="www.usk.de" width="100" height="100" />
                </a>
            </span>

        </div>

        <div class="footer" id="es-es:footer" style="display: none;">

            <span class="copyright">©2011 Blizzard Entertainment, Inc. Todos los derechos reservados</span>

            <span class="legal">
                <a target="_blank" href="http://eu.blizzard.com/company/about/termsofuse.html" tabindex="2">Condiciones de Uso</a>
                <a target="_blank" href="http://eu.blizzard.com/company/legal/" tabindex="2">Legal</a>
                <a target="_blank" href="http://eu.blizzard.com/company/about/privacy.html" tabindex="2">Política de protección de datos</a>
                <a target="_blank" href="http://eu.blizzard.com/company/about/infringementnotice.html" tabindex="2">Derechos de autor</a>
            </span>

            <span class="language">Europa – Español (EU)</span>

            <br />

            <span class="blizzard">
                <a target="_blank" tabindex="3" href="http://blizzard.com/"><img src="<?=Root_Dir;?>static/local-common/images/logos/blizz-wow.png" alt="Blizzard Entertainment" width="136" height="76" /></a>
            </span>

            <div class="privacy">
                <a target="_blank" tabindex="3" href="//www.pegi.info/">
                    <img src="<?=Root_Dir;?>static/local-common/images/legal/eu/pegi-wow.png" alt="www.pegi.info" width="178" height="100" />
                </a>
            </div>

        </div>

        <div class="footer" id="fr-fr:footer" style="display: none;">

            <span class="copyright">©2011 Blizzard Entertainment, Inc. Tous droits réservés</span>

            <span class="legal">
                <a target="_blank" href="http://eu.blizzard.com/company/about/termsofuse.html" tabindex="2">Conditions d’utilisation</a>
                <a target="_blank" href="http://eu.blizzard.com/company/legal/" tabindex="2">Mentions légales</a>
                <a target="_blank" href="http://eu.blizzard.com/company/about/privacy.html" tabindex="2">Politique de confidentialité</a>
                <a target="_blank" href="http://eu.blizzard.com/company/about/infringementnotice.html" tabindex="2">Droits</a>
            </span>

            <span class="language">Europe – Français</span>

            <br />

            <span class="blizzard">
                <a target="_blank" tabindex="3" href="http://blizzard.com/"><img src="<?=Root_Dir;?>static/local-common/images/logos/blizz-wow.png" alt="Blizzard Entertainment" width="136" height="76" /></a>
            </span>

            <span class="privacy">
                <a target="_blank" tabindex="3" href="//www.pegi.info/">
                    <img src="<?=Root_Dir;?>static/local-common/images/legal/eu/pegi-wow.png" alt="www.pegi.info" width="178" height="100" />
                </a>
            </span>

        </div>

        <div class="footer" id="it-it:footer" style="display: none;">

            <span class="copyright">©2011 Blizzard Entertainment, Inc. Tutti i diritti riservati</span>

            <span class="legal">
                <a target="_blank" href="http://eu.blizzard.com/company/about/termsofuse.html" tabindex="2">Condizioni d’uso</a>
                <a target="_blank" href="http://eu.blizzard.com/company/legal/" tabindex="2">Informazioni legali</a>
                <a target="_blank" href="http://eu.blizzard.com/company/about/privacy.html" tabindex="2">Politica sulla privacy</a>
                <a target="_blank" href="http://eu.blizzard.com/company/about/infringementnotice.html" tabindex="2">Menzioni sul</a>
            </span>

            <span class="language">Europa – Italiano</span>

            <br />

            <span class="blizzard">
                <a target="_blank" tabindex="3" href="http://blizzard.com/"><img src="<?=Root_Dir;?>static/local-common/images/logos/blizz-wow.png" alt="Blizzard Entertainment" width="136" height="76" /></a>
            </span>

            <span class="privacy">
                <a target="_blank" tabindex="3" href="//www.pegi.info/">
                    <img src="<?=Root_Dir;?>static/local-common/images/legal/eu/pegi-wow.png" alt="www.pegi.info" width="178" height="100" />
                </a>
            </span>

        </div>

        <div class="footer" id="pl-pl:footer" style="display: none;">

            <span class="copyright">©2011 Blizzard Entertainment, Inc. Wszystkie prawa zastrzeżone</span>

            <span class="legal">
                <a target="_blank" href="http://eu.blizzard.com/company/about/termsofuse.html" tabindex="2">Warunki użytkowania</a>
                <a target="_blank" href="http://eu.blizzard.com/company/legal/" tabindex="2">Prawne</a>
                <a target="_blank" href="http://eu.blizzard.com/company/about/privacy.html" tabindex="2">Polityka prywatności</a>
                <a target="_blank" href="http://eu.blizzard.com/company/about/infringementnotice.html" tabindex="2">Naruszenie praw autorskich</a>
            </span>

            <span class="language">Europa – Polski</span>

            <br />

            <span class="blizzard">
                <a target="_blank" tabindex="3" href="http://blizzard.com/"><img src="<?=Root_Dir;?>static/local-common/images/logos/blizz-wow.png" alt="Blizzard Entertainment" width="136" height="76" /></a>
            </span>

            <span class="privacy">
                <a target="_blank" tabindex="3" href="//www.pegi.info/">
                    <img src="<?=Root_Dir;?>static/local-common/images/legal/eu/pegi-wow.png" alt="www.pegi.info" width="178" height="100" />
                </a>
            </span>

        </div>

        <div class="footer" id="ru-ru:footer" style="display: none;">

            <span class="copyright">© Blizzard Entertainment, 2011 г.<br />Все права защищены</span>

            <span class="legal">
                <a target="_blank" href="http://eu.blizzard.com/company/about/termsofuse.html" tabindex="2">Пользовательское соглашение</a>
                <a target="_blank" href="http://eu.blizzard.com/company/legal/" tabindex="2">Соглашения</a>
                <a target="_blank" href="http://eu.blizzard.com/company/about/privacy.html" tabindex="2">Политика конфиденциальности</a>
                <a target="_blank" href="http://eu.blizzard.com/company/about/infringementnotice.html" tabindex="2">Авторское право</a>
            </span>

            <span class="language">Европа – Русский</span>

            <br />

            <span class="blizzard">
                <a target="_blank" tabindex="3" href="http://blizzard.com/"><img src="<?=Root_Dir;?>static/local-common/images/logos/blizz-wow.png" alt="Blizzard Entertainment" width="136" height="76" /></a>
            </span>

            <span class="privacy">
                <a target="_blank" tabindex="3" href="//www.pegi.info/">
                    <img src="<?=Root_Dir;?>static/local-common/images/legal/eu/pegi-wow.png" alt="www.pegi.info" width="178" height="100" />
                </a>
            </span>

        </div>

        <!-- KR -->

        <div class="footer" id="ko-kr:footer" style="display: none;">

            <span class="copyright">©2011 Blizzard Entertainment, Inc. All rights reserved</span>

            <span class="legal">
                <a target="_blank" href="http://kr.blizzard.com/company/about/termsofuse.html" tabindex="2">서비스 이용 약관</a>
                <a target="_blank" href="http://kr.blizzard.com/company/legal/" tabindex="2">법률 관련</a>
                <a target="_blank" href="http://kr.blizzard.com/company/about/privacy.html" tabindex="2">개인정보 취급방침</a>
                <a target="_blank" href="http://kr.blizzard.com/company/about/infringementnotice.html" tabindex="2">저작권 고지</a>
            </span>

            <span class="language">한국 – 한국어</span>

            <br />

            <span class="blizzard">
                <a target="_blank" tabindex="3" href="http://blizzard.com/"><img src="<?=Root_Dir;?>static/local-common/images/logos/blizz-wow.png" alt="Blizzard Entertainment" width="136" height="76" /></a>
            </span>

            <span class="privacy">
                <a target="_blank" tabindex="3" href="//grb.or.kr/">
                    <img src="<?=Root_Dir;?>static/local-common/images/legal/kr/wow.png" alt="grb.or.kr" width="660" height="70" />
                </a>
            </span>

            <br />

            <p class="contact">
                블리자드 엔터테인먼트 유한 회사<br />
                주소 : (135-766) 서울시 청담동 41-2 금하빌딩 2층<br />
                고객 센터 연락 번호 : 1577-3031 | 팩스 번호 : (02)544-3038 | 이메일 : <a tabindex="3" href="mailto:websupport@blizzard.co.kr">websupport@blizzard.co.kr</a><br />
                사업자 등록 번호:211-87-49910 | 통신 판매업 신고 번호:강남-6017호<br />
                대표이사:마이클에이라이더 | 개인정보 관리 책임자:이성계/대외업무팀 실장
            </p>

        </div>

        <!-- CN -->

        <div class="footer" id="zh-cn:footer" style="display: none;">

            <span class="copyright">©2011 暴雪娱乐股份有限公司版权所有 由上海网之易网络科技发展有限公司运营</span>
            <br />
            <span class="legal">
                <a target="_blank" href="https://www.battlenet.com.cn/account/legal/tou.html" tabindex="2">战网使用条款</a>
                <a target="_blank" href="https://www.battlenet.com.cn/account/legal/privacy.html" tabindex="2">隐私政策</a>
                <a target="_blank" href="http://www.battlenet.com.cn/static/local-common/images/legal/cn/license.png" tabindex="2">文网文[2008]164号</a>
                <a target="_blank" href="http://www.miitbeian.gov.cn/state/outPortal/loginPortal.action;jsessionid=dlzTMrPD6zqmX21YC6cyhJpNCrmVht21LFnZGxg0F5THxyyj01z3!807291226" tabindex="2">增值电信业务经营许可证编号：沪B2-20080012</a>
                <a target="_blank" href="http://www.battlenet.com.cn/legal-cn/infringementnotice" tabindex="2">著作权侵权</a>
            </span>

            <br />

            <span class="blizzard">
                <a target="_blank" tabindex="3" href="http://blizzard.com/"><img src="<?=Root_Dir;?>static/local-common/images/logos/blizz-wow.png" alt="Blizzard Entertainment" width="136" height="76" /></a>
            </span>

        </div>

        <!-- TW -->

        <div class="footer" id="zh-tw:footer" style="display: none;">

            <span class="copyright">©2011 Blizzard Entertainment, Inc. 版權所有</span>

            <span class="legal">
                <a target="_blank" href="http://tw.blizzard.com/company/about/termsofuse.html" tabindex="2">使用條款</a>
                <a target="_blank" href="http://tw.blizzard.com/company/legal/" tabindex="2">法律</a>
                <a target="_blank" href="http://tw.blizzard.com/company/about/privacy.html" tabindex="2">隱私權政策</a>
                <a target="_blank" href="http://tw.blizzard.com/company/about/infringementnotice.html" tabindex="2">違反版權</a>
            </span>

            <span class="language">台灣 – 繁體中文</span>

            <br />

            <span class="blizzard">
                <a target="_blank" tabindex="3" href="http://blizzard.com/"><img src="<?=Root_Dir;?>static/local-common/images/logos/blizz-wow.png" alt="Blizzard Entertainment" width="136" height="76" /></a>
            </span>

            <span class="privacy">
                <a target="_blank" tabindex="3" href="//gameservice.org.tw/gsgi_way.php">
                    <img src="<?=Root_Dir;?>static/local-common/images/legal/tw/pg-13.png" alt="gameservice.org.tw" width="140" height="94" />
                </a>
            </span>

        </div>

        <script>
        (function(currentLocale) {
            var doc = document;
            var notice;
            var us;
            if (currentLocale !== 'en-us') {
                notice = doc.getElementById(currentLocale + ':footer');
                us = doc.getElementById('en-us:footer');
                notice.style.display = 'block';
                us.style.display = 'none';
            }
        })(locale);
        </script>

    </div>

</body>
</html>
